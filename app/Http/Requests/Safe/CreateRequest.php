<?php

namespace App\Http\Requests\Safe;

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
        $rules = [
            'name'       => 'required',
            'categories' => 'required',
            'tags'       => 'nullable',
        ];
        if (array_key_exists('groups', request())) {
            foreach (request()['groups'] as $gkey => $group) {
                $rules['groups.' . $gkey . '.name'] = 'required';
                if ($group['fields']) {
                    foreach ($group['fields'] as $fkey => $field) {
                        $rules['groups.' . $gkey . '.fields.' . $fkey . '.label'] = 'required';
                        $rules['groups.' . $gkey . '.fields.' . $fkey . '.value'] = 'required' . $this->smartRules($field['label'], $field['type']);
                    }
                }
            }
        }
        return $rules;
    }

    /**
     * Guess additional rules from label and type
     *
     * @return string
     */
    private function smartRules($label, $type)
    {
        $label = strtolower($label);
        $rules = [];

        switch ($label) {
            case 'ip':
                $rules[] = 'ip';
                break;

            case 'mail':
            case 'email':
            case 'e-mail':
                $rules[] = 'email';
                break;

            case 'url':
                $rules[] = 'url';
                break;

            default:
                //
                break;
        }

        if (empty($rules)) {
            return '';
        } else {
            return '|' . implode('|', $rules);
        }
    }
}
