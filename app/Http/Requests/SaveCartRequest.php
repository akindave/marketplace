<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SaveCartRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'qty' => 'required',
            'user_id' => 'required|unique:users',
            'product_item_id' => 'required|unique:users'
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(
            (new BaseController)->sendError(
                'Validation Error',
                $validator->errors()->all(),
                422
            )
        );
    }
}
