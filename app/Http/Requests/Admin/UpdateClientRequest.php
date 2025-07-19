<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'company_name'=>'required|min:3|max:255',
            'contact_person'=>'required|min:3|max:255',
            'mobile'=>'required|min:11',
            'email'=>'required|email|unique:users,id'.$this->id,
            'user_name'=>'required|min:4|max:20|unique:users,id'.$this->id,
            'password'=>'required|min:4|max:15',
            'pin'=>'required|min:4|max:7',
        ];
    }
}
