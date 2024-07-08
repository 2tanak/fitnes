<?php
namespace Modules\Auth\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

/**
 * User Request
 *
 * @property-read string $email
 * @property-read string $password
 */
class ForgotRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
		
        $rules = [
            'email'    => ['required', 'email'],
          ];

        return $rules;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.required'     => 'поле email обязательно к заполнению',
          ];
    }
}
