<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'file' => 'required|file|mimes:pdf',
            'cover' => 'required|file|mimes:jpeg,jpg,png',
            'user_id' => 'required|exists:users,id',
        ];
    }
}