<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest
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
            "project_id"=>"required|numeric",
            "leave_type_id"=>"required|numeric",
            "leave_hour"=>"required|numeric",
            "leave_form"=>"required|string",
            "leave_end_time"=>"required|string",
            "leave_start_time"=>"required|string",
            "leave_to"=>"required|string",
            "standing_person_id"=>"required|numeric",
            "submitted_to"=>"required|numeric",
        ];
    }
}
