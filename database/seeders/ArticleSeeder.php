<?php
 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use InnoShop\Common\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $items = $this->getArticles();
        if ($items) {
            Article::query()->truncate();
            foreach ($items as $item) {
                Article::query()->create($item);
            }
        }

        $items = $this->getArticleTranslations();
        if ($items) {
            Article\Translation::query()->truncate();
            foreach ($items as $item) {
                Article\Translation::query()->create($item);
            }
        }

        $items = $this->getArticleTags();
        if ($items) {
            Article\Tag::query()->truncate();
            foreach ($items as $item) {
                Article\Tag::query()->create($item);
            }
        }
    }

    /**
     * @return array[]
     */
    private function getArticles(): array
    {
        return [
            [
                'id'         => 1,
                'catalog_id' => 1,
                'slug'       => 'innoshop-innovative-open-source-ecommerce',
                'position'   => 0,
                'viewed'     => 16,
                'author'     => 'InnoShop',
                'active'     => 1,
            ],
            [
                'id'         => 2,
                'catalog_id' => 1,
                'slug'       => null,
                'position'   => 0,
                'viewed'     => 16,
                'author'     => 'InnoShop',
                'active'     => 1,
            ],
            [
                'id'         => 3,
                'catalog_id' => 2,
                'slug'       => null,
                'position'   => 0,
                'viewed'     => 16,
                'author'     => null,
                'active'     => 1,
            ],
            [
                'id'         => 4,
                'catalog_id' => 2,
                'slug'       => null,
                'position'   => 0,
                'viewed'     => 16,
                'author'     => 'InnoShop',
                'active'     => 1,
            ],
        ];
    }

    /**
     * @return array[]
     */
    private function getArticleTranslations(): array
    {
        return [
            
            [
                'article_id'       => 1,
                'locale'           => 'en',
                'title'            => 'InnoShop - Innovative ecommerce',
                'summary'          => 'InnoShop，An open-source e-commerce platform with innovation',
                'image'            => 'images/demo/news/1.jpg',
                'content'          => 'This is english test article',
                'meta_title'       => 'InnoShop - Innovative ecommerce',
                'meta_description' => 'InnoShop - Innovative ecommerce',
                'meta_keywords'    => 'InnoShop - Innovative ecommerce',
            ],
            
            [
                'article_id'       => 2,
                'locale'           => 'en',
                'title'            => 'New generation ecommerce system',
                'summary'          => 'InnoShop，An open-source e-commerce platform with innovation',
                'image'            => 'images/demo/news/2.jpg',
                'content'          => 'This is english test article',
                'meta_title'       => 'InnoShop - Innovative ecommerce',
                'meta_description' => 'InnoShop - Innovative ecommerce',
                'meta_keywords'    => 'InnoShop - Innovative ecommerce',
            ],
           
            [
                'article_id'       => 3,
                'locale'           => 'en',
                'title'            => 'Ecommerce integrated with AI',
                'summary'          => 'InnoShop，An open-source e-commerce platform with innovation',
                'image'            => 'images/demo/news/3.jpg',
                'content'          => 'This is english test article',
                'meta_title'       => 'InnoShop - Innovative ecommerce',
                'meta_description' => 'InnoShop - Innovative ecommerce',
                'meta_keywords'    => 'InnoShop - Innovative ecommerce',
            ],
           
            [
                'article_id'       => 4,
                'locale'           => 'en',
                'title'            => 'New version released!',
                'summary'          => 'InnoShop，An open-source e-commerce platform with innovation',
                'image'            => 'images/demo/news/4.jpg',
                'content'          => 'This is english test article',
                'meta_title'       => 'InnoShop - Innovative ecommerce',
                'meta_description' => 'InnoShop - Innovative ecommerce',
                'meta_keywords'    => 'InnoShop - Innovative ecommerce',
            ],
        ];

    }

    /**
     * @return \int[][]
     */
    private function getArticleTags(): array
    {
        return [
            [
                'id'         => 1,
                'article_id' => 1,
                'tag_id'     => 1,
            ],
            [
                'id'         => 2,
                'article_id' => 1,
                'tag_id'     => 2,
            ],
        ];
    }
}
