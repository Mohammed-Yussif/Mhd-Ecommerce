<?php
 
namespace InnoShop\Common\Models\Attribute;

use Illuminate\Database\Eloquent\Relations\HasMany;
use InnoShop\Common\Models\BaseModel;

class Group extends BaseModel
{
    protected $table = 'attribute_groups';

    protected $fillable = [
        'position',
    ];

    /**
     * Define translations relationship
     *
     * @return HasMany
     */
    public function translations(): HasMany
    {
        $class = \InnoShop\Common\Models\Attribute\Group\Translation::class;

        return $this->hasMany($class, 'attribute_group_id', 'id');
    }

    /**
     * Locale translation object
     *
     * @return mixed
     * @throws \Exception
     */
    public function translation(): mixed
    {
        $class = \InnoShop\Common\Models\Attribute\Group\Translation::class;

        return $this->hasOne($class, 'attribute_group_id', 'id')
            ->where('locale', locale_code());
    }
}
