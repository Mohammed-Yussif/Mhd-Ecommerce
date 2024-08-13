<?php
 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use InnoShop\Common\Models\Category;
use InnoShop\Common\Repositories\CategoryRepo;
use Throwable;

class CategorySeeder extends Seeder
{
    /**
     * @throws Throwable
     */
    public function run(): void
    {
        $items = $this->getCategories();
        if ($items) {
            Category::query()->truncate();
            foreach ($items as $item) {
                CategoryRepo::getInstance()->create($item);
            }
        }
    }

    /**
     * @return array[]
     */
    private function getCategories(): array
    {
        return [
            [
                'slug'         => 'women-clothing',
                'position'     => 1,
                'active'       => 1,
                'translations' => [
                   
                    [
                        'locale'  => 'en',
                        'name'    => 'Women',
                        'content' => 'Fashion clothing for women',
                    ],
                ],
                'children' => [
                    [
                        'slug'         => 'casual-wear',
                        'position'     => 1,
                        'active'       => 1,
                        'translations' => [
                            
                            [
                                'locale'  => 'en',
                                'name'    => 'Casual Wear',
                                'content' => 'Casual style women\'s clothing',
                            ],
                        ],
                    ],
                    [
                        'slug'         => 'formal-wear',
                        'position'     => 2,
                        'active'       => 1,
                        'translations' => [
                           
                            [
                                'locale'  => 'en',
                                'name'    => 'Formal Wear',
                                'content' => 'Formal women\'s clothing for special occasions',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'slug'         => 'men-clothing',
                'position'     => 2,
                'active'       => 1,
                'translations' => [
                    
                    [
                        'locale'  => 'en',
                        'name'    => 'Men',
                        'content' => 'Fashion clothing for men',
                    ],
                ],
                'children' => [
                    [
                        'slug'         => 'casual-wear-men',
                        'position'     => 1,
                        'active'       => 1,
                        'translations' => [
                            
                            [
                                'locale'  => 'en',
                                'name'    => 'Casual Wear',
                                'content' => 'Casual style men\'s clothing',
                            ],
                        ],
                    ],
                    [
                        'slug'         => 'business-wear',
                        'position'     => 2,
                        'active'       => 1,
                        'translations' => [
                           
                            [
                                'locale'  => 'en',
                                'name'    => 'Business Wear',
                                'content' => 'Business men\'s clothing for professional occasions',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'slug'         => 'children-clothing',
                'position'     => 3,
                'active'       => 1,
                'translations' => [
                    
                    [
                        'locale'  => 'en',
                        'name'    => 'Children',
                        'content' => 'Fashion clothing for children',
                    ],
                ],
                'children' => [
                    [
                        'slug'         => 'boys-clothing',
                        'position'     => 1,
                        'active'       => 1,
                        'translations' => [
                           
                            [
                                'locale'  => 'en',
                                'name'    => 'Boys',
                                'content' => 'Fashion clothing for boys',
                            ],
                        ],
                    ],
                    [
                        'slug'         => 'girls-clothing',
                        'position'     => 2,
                        'active'       => 1,
                        'translations' => [
                            
                            [
                                'locale'  => 'en',
                                'name'    => 'Girls',
                                'content' => 'Fashion clothing for girls',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'slug'         => 'sportswear',
                'position'     => 4,
                'active'       => 1,
                'translations' => [
                    
                    [
                        'locale'  => 'en',
                        'name'    => 'Sports',
                        'content' => 'Clothing for sports activities',
                    ],
                ],
                'children' => [
                    [
                        'slug'         => 'sports-clothing',
                        'position'     => 1,
                        'active'       => 1,
                        'translations' => [
                            
                            [
                                'locale'  => 'en',
                                'name'    => 'Sports Clothing',
                                'content' => 'Clothing designed for sports',
                            ],
                        ],
                    ],
                    [
                        'slug'         => 'sports-accessories',
                        'position'     => 2,
                        'active'       => 1,
                        'translations' => [
                            
                            [
                                'locale'  => 'en',
                                'name'    => 'Sports Accessories',
                                'content' => 'Accessories needed for sports',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'slug'         => 'accessories',
                'position'     => 5,
                'active'       => 1,
                'translations' => [
                   
                    [
                        'locale'  => 'en',
                        'name'    => 'Accessories',
                        'content' => 'Accessories for clothing',
                    ],
                ],
                'children' => [
                    [
                        'slug'         => 'hats',
                        'position'     => 1,
                        'active'       => 1,
                        'translations' => [
                           
                            [
                                'locale'  => 'en',
                                'name'    => 'Hats',
                                'content' => 'Various styles of hats',
                            ],
                        ],
                    ],
                    [
                        'slug'         => 'scarves',
                        'position'     => 2,
                        'active'       => 1,
                        'translations' => [
                           
                            [
                                'locale'  => 'en',
                                'name'    => 'Scarves',
                                'content' => 'Various styles of scarves',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
