<?php

namespace App\Http\Requests;

use http\Exception\InvalidArgumentException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateRoleRequest extends FormRequest
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
            'name' => 'required|max:255|unique:roles,name,'.decrypt($request->segment(2)).',id',
        ];
    }

    public function messages()
    {
        return [
            'permissions.*' => 'Please select at least one permission'
        ];
    }
}
