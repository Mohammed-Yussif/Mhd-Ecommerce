<?php
 
namespace InnoShop\Panel\Repositories;

use Illuminate\Support\Str;

class ThemeRepo
{
    /**
     * @return self
     */
    public static function getInstance(): ThemeRepo
    {
        return new self;
    }

    /**
     * Get theme list from themes path.
     *
     * @return array
     */
    public function getListFromPath(): array
    {
        $path       = base_path('themes');
        $themePaths = glob($path.'/*');

        $themes = [];
        foreach ($themePaths as $themePath) {
            $theme    = trim(str_replace($path, '', $themePath), '/');
            $themes[] = [
                'code'  => $theme,
                'name'  => Str::studly($theme),
                'value' => system_setting('theme') == $theme,
            ];
        }

        return $themes;
    }
}
