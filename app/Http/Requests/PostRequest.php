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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:20', //名前は必須で20字以下
            'body'  => 'required',        //内容は必須
            'image' => 'mimes:jpeg,jpg,png,gif|max:10240', //ファイルタイプとサイズを指定
        ];
    }
    public function messages()
    {
        return [
            'title.required' => '名前は必須です',
            'title.max'      => '名前は20字以内です',
            'body.required'  => '内容は必須です',
            'image.mimes'    => 'ファイルタイプをjpeg,jpg,png,gifに設定してください。',
            'image.max'      => 'ファイルサイズを10MB以下に設定してください。', 
        ];
    }
}
