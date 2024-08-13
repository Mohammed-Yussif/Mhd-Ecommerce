<?php
 
namespace InnoShop\RestAPI\FrontApiControllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InnoShop\Common\Models\Product;
use InnoShop\Common\Repositories\ProductRepo;
use InnoShop\Common\Resources\ProductSimple;

class ProductController extends BaseController
{
    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $filters = $request->all();

        $products = ProductRepo::getInstance()->withActive()->builder($filters)->paginate();

        $collection = ProductSimple::collection($products);

        return read_json_success($collection);
    }

    /**
     * @param  Product  $product
     * @return JsonResponse
     */
    public function show(Product $product): JsonResponse
    {
        $single = new ProductSimple($product);

        return read_json_success($single);
    }
}
