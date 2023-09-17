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
            'id' => 'required|unique:posts|max:11',
            'emp_name' => 'required| min:5|max:255',       
            'department' => 'required| min:5|max:255',       
            'dep_id' => 'required|max:11',       
            'shift' => 'required|max:255',       
            'salary' => 'required|max:255',   
        ];
    }
}
