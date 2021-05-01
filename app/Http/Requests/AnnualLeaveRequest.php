<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnualLeaveRequest extends FormRequest
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
            'user_id'=>'required',
            'title_id'=>'required',
             'department_id'=>'required',
             'applyfor'=>'required',
             'year'=>'required',
             'effectiveDate'=>'required',
             'signatureID'=>'required',
        ];



    }
}
