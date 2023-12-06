<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:10',
            'article' => 'required|string|regex:/^[a-zA-Z0-9]+$/|' . Rule::unique('products')->ignore($this->product->id),
            'status' => 'required|in:available,unavailable',
            'data' => 'nullable|array',
        ];
    }
}
