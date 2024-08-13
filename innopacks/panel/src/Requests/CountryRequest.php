<?php
 
namespace InnoShop\Panel\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
        if ($this->country) {
            $slugRule = 'alpha_dash|unique:countries,code,'.$this->country->id;
        } else {
            $slugRule = 'alpha_dash|unique:countries,code';
        }

        return [
            'name'      => 'string|required|max:32',
            'code'      => $slugRule,
            'continent' => 'string|required',
            'position'  => 'string',
            'active'    => 'bool',
        ];
    }
}
