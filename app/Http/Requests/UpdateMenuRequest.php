<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "id" => ["required"],
            "category_id" => ["required"],
            "title" => ["required"],
            "description" => ["required"],
            "image_old" => ["required"],
            "image_old" => ["sometimes", "required"],
            "price" => ["required"],
        ];
    }
}
