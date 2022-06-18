<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

abstract class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Return failed validation
     * 
     * @param Validator $validator
     * 
     * @return RedirectResponse
     */

    protected function failedValidation(Validator $validator): RedirectResponse
    {
        return redirect()->back()->withErrors($validator->errors()->messages());
    }

    /**
     * Return failed authorization
     * 
     * @return void
     */

    protected function failedAuthorization(): void
    {
        abort(403);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    abstract public function rules(): array;
}
