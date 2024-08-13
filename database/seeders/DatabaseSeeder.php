<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            ArticleSeeder::class,
            AttributeSeeder::class,
            BrandSeeder::class,
            CatalogSeeder::class,
            CategorySeeder::class,
            CountrySeeder::class,
            CurrencySeeder::class,
            CustomerGroupSeeder::class,
            LocaleSeeder::class,
            PageSeeder::class,
            ProductSeeder::class,
            SettingSeeder::class,
            StateSeeder::class,
            TagSeeder::class,
            RegionSeeder::class,
            TaxSeeder::class,
        ]);

        touch(storage_path('installed'));
    }
}
