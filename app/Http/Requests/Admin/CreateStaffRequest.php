<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateStaffRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|min:3|max:255',
            'mobile'=>'required|min:11',
            'email'=>'required|email|unique:users',
            'user_name'=>'required|min:4|max:20|unique:users',
            'password'=>'required|min:4|max:15',
            'pin'=>'required|min:4|max:7',
            'role_id'=>'required',
        ];
    }
}
