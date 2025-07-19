<?php

namespace App\Http\Requests\Template\Webinar;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWebinarRequest extends FormRequest
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
            'title'=>'required:255',
            'date'=>'required',
            'course_id'=>'required',
           // 'thumbnail'=>'required',
            'duration'=>'required',
            'short_description'=>'required',
            'medium'=>'required',
        ];
    }

}
