<?php
 
namespace InnoShop\Panel\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        if ($this->category) {
            $slugRule = 'alpha_dash|unique:categories,slug,'.$this->category->id;
        } else {
            $slugRule = 'alpha_dash|unique:categories,slug';
        }

        return [
            'catalog_id' => 'integer',
            'slug'       => $slugRule,
            'position'   => 'integer',
            'viewed'     => 'integer',
            'active'     => 'bool',

            'translations.*.locale' => 'required',
            'translations.*.name'   => 'required',
        ];
    }
}
