<?php
namespace Modules\Admin\App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

/**
 * User Request
 *
 * @property-read string $email
 * @property-read string $password
 */
class RoleRequest extends FormRequest
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
            'name'    => ['required', 'string','min:3'],
			'slug'    => ['sometimes','required', 'string','min:3'],
            "permissions.*"  => "sometimes|required|integer|distinct",
			"roles.*"  => "sometimes|required|integer|distinct",

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
            'email.unique'       => 'такой email уже есть',
            'email.email'        => 'Не правильный email',
            'password.min'       => 'пароль не менее :min символов',
            'password.confirmed' => 'Пароли не совподают',
        ];
    }
}
