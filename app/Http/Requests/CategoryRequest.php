<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *     $this->validate($request, [
    'thumbnail' => 'required',
    'name' => 'required|unique:categories,name,' . $category->id,
    ],
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'thumbnail' => 'required',
            'name' =>[ 'required',
            Rule::unique('categories')->ignore($this->category)]
        ];
    }
    public function messages()
    {
        return [
            'thumbnail.required' => 'Enter thumbnail url',
            'name.required' => 'Enter name',
            'name.unique' => 'Category already exist',
        ];
    }
}
