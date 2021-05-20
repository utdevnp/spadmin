<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FixAssetRequest extends FormRequest
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
            "name_chart_id"=>"required|numeric",
            "category_id"=>"required|numeric",
            "item_id"=>"required|numeric",
            "purchase_date"=>"required|string",
            "quantity"=>"required|numeric",
            "rate"=>"required|numeric",
            "responsable_person"=>"required|numeric",

        ];
    }
}
