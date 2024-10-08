<?php
 
namespace InnoShop\RestAPI\FrontApiControllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InnoShop\Common\Repositories\Customer\FavoriteRepo;

class FavoriteController extends BaseController
{
    /**
     * @param  Request  $request
     * @return mixed
     */
    public function index(): mixed
    {
        $filters = [
            'customer_id' => token_customer_id(),
        ];
        $favorites = FavoriteRepo::getInstance()->list($filters);

        $data = [
            'favorites' => $favorites,
        ];

        return read_json_success($data);
    }

    /**
     * Add to favorite list.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $data = [
                'customer_id' => token_customer_id(),
                'product_id'  => $request->get('product_id'),
            ];
            FavoriteRepo::getInstance()->create($data);

            return json_success(trans('front::common.saved_success'));
        } catch (\Exception $e) {
            return json_fail($e->getMessage());
        }
    }

    /**
     * Destroy favorite item.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function cancel(Request $request): JsonResponse
    {
        try {
            $filters = [
                'customer_id' => token_customer_id(),
                'product_id'  => $request->get('product_id'),
            ];

            $favorite = FavoriteRepo::getInstance()->builder($filters)->first();
            if (current_customer_id() != $favorite->customer_id) {
                throw new \Exception(trans('front::not_belongs_to_you'));
            }

            $favorite->delete();

            return json_success(trans('front::common.deleted_success'));
        } catch (\Exception $e) {
            return json_fail($e->getMessage());
        }
    }
}
