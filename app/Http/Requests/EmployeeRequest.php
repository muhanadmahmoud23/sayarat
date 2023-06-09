<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'image' => 'sometimes',
            'manager_id' => 'required|string|max:255|exists:users,id',
            'department_id' => 'required|string|max:255|exists:departments,id',
            'email' => 'required|email|unique:users,email,' . $this->id . ',id',
            'password' => ['required', 'string', 'min:8'],
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
