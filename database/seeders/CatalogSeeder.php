<?php
 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use InnoShop\Common\Models\Catalog;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        $items = $this->getCatalogs();
        if ($items) {
            Catalog::query()->truncate();
            foreach ($items as $item) {
                Catalog::query()->create($item);
            }
        }

        $items = $this->getCatalogTranslations();
        if ($items) {
            Catalog\Translation::query()->truncate();
            foreach ($items as $item) {
                Catalog\Translation::query()->create($item);
            }
        }
    }

    /**
     * @return array[]
     */
    private function getCatalogs(): array
    {
        return [
            [
                'id'        => 1,
                'parent_id' => 0,
                'slug'      => 'product',
                'position'  => 0,
                'active'    => 1,
            ],
            [
                'id'        => 2,
                'parent_id' => 0,
                'slug'      => 'industry',
                'position'  => 0,
                'active'    => 1,
            ],
        ];
    }

    /**
     * @return array[]
     */
    private function getCatalogTranslations(): array
    {
        return [
            
            [
                'catalog_id'       => 1,
                'locale'           => 'en',
                'title'            => 'Product Updates',
                'summary'          => 'Here are the product updates',
                'meta_title'       => 'Product Updates',
                'meta_description' => 'Latest information and updates on products',
                'meta_keywords'    => 'Product, Updates, News',
            ],
           
            [
                'catalog_id'       => 2,
                'locale'           => 'en',
                'title'            => 'Industry News',
                'summary'          => 'Here is the industry information',
                'meta_title'       => 'Industry News',
                'meta_description' => 'Industry information',
                'meta_keywords'    => 'Industry News',
            ],
        ];
    }
}
