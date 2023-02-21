<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'comment' => ['required', 'max:200'],
            'image' => [
              'file', // ファイルがアップロードされている
              'image', // 画像ファイルである
              'mimes:jpeg,jpg,png', // 形式はjpegかpng
              'dimensions:min_width=0,min_height=0,max_width=2000,max_height=2000', // 50*50 ~ 1000*1000 まで
            ],
        ];
    }
    
}
