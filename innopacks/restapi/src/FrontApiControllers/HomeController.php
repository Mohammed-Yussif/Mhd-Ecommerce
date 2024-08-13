<?php
 
namespace InnoShop\RestAPI\FrontApiControllers;

use Illuminate\Http\JsonResponse;

class HomeController extends BaseController
{
    /**
     * Home page data.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = [
            [
                'type'  => 'icon',
                'items' => [
                    ['url' => '', 'image' => ''],
                    ['url' => '', 'image' => ''],
                ],
            ],
            [
                'type'  => 'slideshow',
                'items' => [
                    ['url' => '', 'image' => ''],
                    ['url' => '', 'image' => ''],
                ],
            ],
        ];

        return read_json_success($data);
    }
}
