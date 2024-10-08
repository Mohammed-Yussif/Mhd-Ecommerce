<?php
 
namespace InnoShop\Panel\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        if ($this->article) {
            $slugRule = 'alpha_dash|unique:articles,slug,'.$this->article->id;
        } else {
            $slugRule = 'alpha_dash|unique:articles,slug';
        }

        return [
            'catalog_id' => 'integer',
            'slug'       => $slugRule,
            'position'   => 'integer',
            'viewed'     => 'integer',
            'active'     => 'bool',

            'translations.*.locale'  => 'required',
            'translations.*.title'   => 'required',
            'translations.*.content' => 'required',
        ];
    }
}
