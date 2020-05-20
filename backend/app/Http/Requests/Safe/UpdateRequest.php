<?php

namespace App\Http\Requests\Key;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
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
        $rules = [
            'name'       => 'required',
            'categories' => 'required',
            'tags'       => 'nullable',
        ];
        if (!is_null(request()->groups)) {
            foreach (request()['groups'] as $gkey => $group) {
                $rules['groups.' . $gkey . '.name'] = 'required';
                if (array_key_exists('fields', $group)) {
                    foreach ($group['fields'] as $fkey => $field) {
                        $rules['groups.' . $gkey . '.fields.' . $fkey . '.label'] = 'required';
                        $rules['groups.' . $gkey . '.fields.' . $fkey . '.value'] = 'required';
                    }
                }
            }
        }
        return $rules;
    }
}
