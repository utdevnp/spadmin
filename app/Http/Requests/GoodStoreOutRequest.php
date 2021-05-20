<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodStoreOutRequest extends FormRequest
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
            "project_id"=>"required",
            "grn_out_number"=>"required",
            "submitted_date"=>"required",
            "item_name"=>"required",
            "unit"=>"required",
            "quantity_required"=>"required",
            "quantity_issued"=>"required",
        ];
    }
}
