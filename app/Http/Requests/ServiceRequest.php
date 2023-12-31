<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ServiceRequest extends FormRequest
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

    public function messages()
    {
        return [
            'orNum.required' => 'OR number should not be empty.',
            'orNum.unique' => 'OR number cannot be the same with the existing issued OR number.',
            'inputedAmount.required' => 'Inputed amount should not be empty.',
            'inputedAmount.numeric' => 'Inputed amount should be a number format.',
            'inputedAmount.gt' => 'Inputed amount should be greater than zero.',
            'inputedAmount.gte' => 'Inputed amount should be greater than or equal to Amount.',
            'amount.required' => 'Amount should not be empty.',
            'amount.gt' => 'Amount should be greater than zero.',
            'amount.numeric' => 'Amount should be a number format.',
        ];
    }

    protected function failedValidation($validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json([ 'created'=>false,'errors' => $errors])
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'orNum' => 'required|unique:payment_work_orders,or_no',
            'inputedAmount' => 'required|numeric|gt:0|gte:amount',
            'amount' => 'required|numeric|gt:0',
        ];
    }
}
