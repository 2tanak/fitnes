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
class BaseRequest extends FormRequest
{
    /**
     * @return bool
     */
	 public $messages =[];
	 
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
		//блок блог
		if (Route::currentRouteName() === 'blog.store' || Route::currentRouteName() === 'blog.update'){
			$rules = [
            'name'    => ['required', 'string','min:3'],
			'photo'    => ['sometimes','nullable', 'file','mimes:jpeg,png,svg'],
            'description'    => ['required', 'string','min:3'],
            ];
			$this->messages =[
			'name.required'     => 'поле name обязательно к заполнению',
            'photo.file'       => 'не правильный тип заполнения',
            'description.required'     => 'поле description обязательно к заполнению',
			];
		}
		//
		

        return $rules;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages(): array
    {
        return $this->messages;
    }
}