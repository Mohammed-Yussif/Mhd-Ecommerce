<?php
 
namespace InnoShop\Plugin\Repositories;

use InnoShop\Common\Repositories\SettingRepo as CommonSettingRepo;
use InnoShop\Plugin\Models\Setting;

class SettingRepo extends CommonSettingRepo
{
    /**
     * Get plugin active field.
     *
     * @return array
     */
    public function getPluginActiveField(): array
    {
        return [
            'name'     => 'active',
            'label'    => trans('panel::common.status'),
            'type'     => 'bool',
            'required' => true,
        ];
    }

    /**
     * Get all fields by plugin code.
     *
     * @param  $pluginCode
     * @return mixed
     */
    public function getPluginFields($pluginCode): mixed
    {
        return Setting::query()
            ->where('space', $pluginCode)
            ->get()
            ->keyBy('name');
    }
}
