<?php

namespace App\Http\Requests\Settings\Field;

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
        return [
            'label'    => 'required|max:255',
            'value'    => 'required|max:255',
            'icon_id'  => 'nullable|exists:icons,id',
            'type_id'  => 'required|exists:types,id',
            'group_id' => 'required|exists:groups,id',
            'key_id'  => 'required|exists:keys,id'
        ];
    }
}
