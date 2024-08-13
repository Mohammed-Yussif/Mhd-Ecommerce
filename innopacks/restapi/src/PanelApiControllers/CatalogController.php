<?php
 
namespace InnoShop\RestAPI\PanelApiControllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use InnoShop\Common\Models\Catalog;
use InnoShop\Common\Repositories\CatalogRepo;
use InnoShop\Common\Resources\CatalogSimple;
use InnoShop\Panel\Requests\CatalogRequest;
use Throwable;

class CatalogController extends BaseController
{
    /**
     * @param  Request  $request
     * @return mixed
     * @throws Exception
     */
    public function index(Request $request): mixed
    {
        $filters = $request->all();

        return CatalogRepo::getInstance()->list($filters);
    }

    /**
     * @param  CatalogRequest  $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(CatalogRequest $request): JsonResponse
    {
        try {
            $data    = $request->all();
            $catalog = CatalogRepo::getInstance()->create($data);

            return json_success(trans('panel::common.updated_success'), $catalog);
        } catch (Exception $e) {
            return json_fail($e->getMessage());
        }
    }

    /**
     * @param  CatalogRequest  $request
     * @param  Catalog  $catalog
     * @return JsonResponse
     */
    public function update(CatalogRequest $request, Catalog $catalog): JsonResponse
    {
        try {
            $data = $request->all();
            CatalogRepo::getInstance()->update($catalog, $data);

            return json_success(trans('panel::common.updated_success'), $catalog);
        } catch (Exception $e) {
            return json_fail($e->getMessage());
        }
    }

    /**
     * @param  Catalog  $catalog
     * @return JsonResponse
     */
    public function destroy(Catalog $catalog): JsonResponse
    {
        try {
            CatalogRepo::getInstance()->destroy($catalog);

            return json_success(trans('panel::common.deleted_success'));
        } catch (Exception $e) {
            return json_fail($e->getMessage());
        }
    }

    /**
     * Fuzzy search for auto complete.
     * /api/panel/catalogs/autocomplete?keyword=xxx
     *
     * @param  Request  $request
     * @return AnonymousResourceCollection
     * @throws Exception
     */
    public function autocomplete(Request $request): AnonymousResourceCollection
    {
        $title    = $request->get('keyword');
        $catalogs = CatalogRepo::getInstance()->searchByTitle($title);

        return CatalogSimple::collection($catalogs);
    }
}
