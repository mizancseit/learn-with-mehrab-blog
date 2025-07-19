<?php

namespace App\Http\Requests\Template;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
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
            'title'=>'required',
            'slug'=>'required',
            'course_category_id'=>'required',
            'course_level_id'=>'required',
            'course_type_id'=>'required',
            'types'=>'required',
            'thumbnail'=>'required',
        ];
    }
}
