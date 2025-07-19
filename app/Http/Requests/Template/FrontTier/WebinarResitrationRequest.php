<?php

namespace App\Http\Requests\Template\FrontTier;

use Illuminate\Foundation\Http\FormRequest;

class WebinarResitrationRequest extends FormRequest
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
            'course_id'=>'required',
            'webinar_id'=>'required',
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required'
        ];
    }
}
