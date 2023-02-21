<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'name'=>['required','min:1','max:255'],
            'description'=>['required','min:1','max:1000'],
            'category'=>['required'],
            'price'=>['required','numeric','between:0,1000000'],
            'image' => [
                'required',
                'file', // ファイルがアップロードされている
                'image', // 画像ファイルである
                'mimes:jpeg,jpg,png', // 形式はjpegかpng
                'dimensions:min_width=50,min_height=50,max_width=1000,max_height=1000', // 50*50 ~ 1000*1000 まで
            ],
        ];
    }
}
