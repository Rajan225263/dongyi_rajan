<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class TransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'account_id' =>'required',
            'amount' =>'required|numeric|min:0',
            'type' =>'required',
            'date' =>'required|date_format:d-m-Y',
          

        ];
    }

    public function messages() {
        return [
            'account_id.required' => 'Account is required!',
            'amount.required' => 'Amount is required!',
            'type.required' => 'Type is required!',
            'date.required' => 'Date is required!',
            'date.date_format' => 'Date format is Wrong!',
        
        ];
    }
}
