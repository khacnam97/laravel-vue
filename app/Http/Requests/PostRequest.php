<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    private $filename = array();

    public function authorize(): bool
    {
        return true;
    }
    public function attributes(): array
    {
        return [
            'title'          => __('Title'),
            'describer'          => __('Describer'),
        ];
    }

    public function rules(): array
    {
        return [
            'title'          => 'required',
        ];
    }
}
