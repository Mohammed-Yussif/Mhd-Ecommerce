<?php
 
namespace InnoShop\Common\Repositories\Product;

use InnoShop\Common\Models\Product;
use InnoShop\Common\Repositories\BaseRepo;

class ImageRepo extends BaseRepo
{
    /**
     * @param  Product  $product
     * @param  $path
     * @return mixed
     */
    public function findOrCreate(Product $product, $path): mixed
    {
        if (empty($path)) {
            return null;
        }

        $image = $product->images()->where('path', $path)->first();
        if ($image) {
            return $image;
        }

        return $product->images()->create([
            'path'     => $path,
            'position' => 0,
        ]);
    }
}
