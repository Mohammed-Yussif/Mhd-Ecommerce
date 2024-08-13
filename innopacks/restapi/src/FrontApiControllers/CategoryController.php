<?php
 
namespace InnoShop\RestAPI\FrontApiControllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InnoShop\Common\Repositories\Category\TreeRepo;
use InnoShop\Common\Repositories\CategoryRepo;

class CategoryController extends BaseController
{
    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $filters = $request->all();

        $categories = CategoryRepo::getInstance()->withActive()->builder($filters)->paginate();

        return read_json_success($categories);
    }

    /**
     * @return JsonResponse
     * @throws Exception
     */
    public function tree(): JsonResponse
    {
        $categoryTree = TreeRepo::getInstance()->getCategoryTree();

        return read_json_success($categoryTree);
    }
}
