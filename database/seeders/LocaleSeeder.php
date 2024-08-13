<?php
 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use InnoShop\Common\Models\Locale;

class LocaleSeeder extends Seeder
{
    public function run(): void
    {
        $items = $this->getLocales();
        if ($items) {
            Locale::query()->truncate();
            foreach ($items as $item) {
                Locale::query()->create($item);
            }
        }
    }

    private function getLocales(): array
    {
        return [
            [
                'name'     => 'English',
                'code'     => 'en',
                'image'    => 'images/flag/en.png',
                'position' => 0,
                'active'   => 1,
            ],
            [
                'name'     => 'arabic',
                'code'     => 'an',
                'image'    => 'images/flag/ar.png',
                'position' => 0,
                'active'   => 1,
            ],
            [
                'name'     => '简体中文',
                'code'     => 'zh_cn',
                'image'    => 'images/flag/zh_cn.png',
                'position' => 2,
                'active'   => 1,
            ],
        ];
    }
}
