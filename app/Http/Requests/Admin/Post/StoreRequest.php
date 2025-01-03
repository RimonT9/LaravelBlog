<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class StoreRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'main_image' => 'required|file',
            'preview_image' => 'required|file',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];

    }

    public function messages()
    {
        return[
        'title.required' => 'Это поле необходимо для заполнения',
        'title.string' => 'Данные должны соответствовать строчному типу',
        'content.required' => 'Это поле необходимо для заполнения',
        'content.string' => 'Данные должны соответствовать строчному типу',
        'preview_image.required' => 'Это поле необходимо для заполнения',
        'preview_image.file' => 'Необходимо выбрать файл',
        'preview_main.required' => 'Это поле необходимо для заполнения',
        'preview_main.file' => 'Необходимо выбрать файл',
        'category_id.required' => 'Это поле необходимо для заполнения',
        'category_id.integer' => 'ID категории должен быть числом',
        'category_id.exists' => 'ID категории должен быть в базе данных',
        'tag_ids.array' => 'Необходимо отправить массив данных'
        ];
    }
}