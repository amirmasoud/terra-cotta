<?php

namespace App\Http\Requests\Settings\Group;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name'    => 'required|max:255',
            'icon_id' => 'nullable|exists:icons,id',
            'safe_id' => 'required|exists:safes,id'
        ];
    }
}
