<?php
 
namespace InnoShop\Common\Models\Product;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use InnoShop\Common\Models\BaseModel;
use InnoShop\Common\Models\Variant;
use InnoShop\Common\Models\VariantValue;

class SkuVariant extends BaseModel
{
    protected $table = 'product_sku_variants';

    public function variant(): BelongsTo
    {
        return $this->belongsTo(Variant::class, 'variant_id');
    }

    public function variantValue(): BelongsTo
    {
        return $this->belongsTo(VariantValue::class, 'variant_value_id');
    }
}
