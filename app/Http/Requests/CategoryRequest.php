<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function attributes(): array
    {
        return [
            'name'          => __('Name Category'),
        ];
    }

    public function rules(): array
    {
        return [
            'name'          => 'required',
        ];
    }
}
