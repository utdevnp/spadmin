<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodReceiptRequest extends FormRequest
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
            "grn_number"=>"required",
            "purchese_order_number"=>"required",
            "recived_date"=>"required",
            "invoice_number"=>"required",
            "invoice_date"=>"required",
            "item_name"=>"required",
            "unit"=>"required",
            "quantity_order"=>"required",
            "quantity_recived"=>"required",
        ];
    }
}
