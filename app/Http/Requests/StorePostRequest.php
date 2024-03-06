<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
    	//todo Проверить авторизацию пользователя для редактирования статьи
    	return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'post_name' => 'required|string',
            'content' => 'required|string',
            'cover_img' => 'string',
//            'cover_img_file' => 'mimes:jpg,png',
        ];
    }
}
