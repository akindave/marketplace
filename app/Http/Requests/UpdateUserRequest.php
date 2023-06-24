<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Controllers\Api\BaseController;

class UpdateUserRequest extends FormRequest
{
    // use BaseController;
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
            'password' => 'required|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'The name field is required.',
            'password.min' => 'Password must be above 8 character length',
            'password.regex' => 'The password must contain at least one letter, one digit, and one special character.',
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
