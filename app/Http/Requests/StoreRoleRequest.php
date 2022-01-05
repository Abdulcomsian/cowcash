<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreRoleRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'permissions' => 'required|array|min:1',
            'name' => 'required|unique:roles,name|max:255',
        ];
    }

    public function messages()
    {
        return [
            'permissions.*' => 'Please select at least one permission'
        ];
    }
}
