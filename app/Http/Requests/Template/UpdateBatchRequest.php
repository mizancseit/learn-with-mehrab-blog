<?php

namespace App\Http\Requests\Template;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBatchRequest  extends FormRequest
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
            'batch_ID'=>'required|unique:batches,batch_ID,'.$this->route('batch'),
            'start_time'=>'required',
            'batch_name'=>'required',
            'fee'=>'required',
            'status'=>'required',
            'teacher_id'=>'required|array',
        ];
    }

}
