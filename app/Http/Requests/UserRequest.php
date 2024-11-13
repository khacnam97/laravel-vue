<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * @var mixed
     */
    private $password;
    private $role_id;

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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {

        if($this->id){
            return [
                'name'          => 'required|unique:users,name,'.$this->id,
                'password'      => 'nullable|min:8',
            ];
        }
        return [
            'password'      => 'required|min:8',
            'name'          => 'required|unique:users,name,'.$this->id,
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name'          => __('user.User name'),
            'password'          => __('user.Password'),
            'email'           => __('user.Email'),
            'address'         => __('user.Address'),
        ];
    }
}
