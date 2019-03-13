<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
        'lname' => 'required',
        'lurl' => 'required',
        'limg' => 'required',
        
        ];
    }

    /**
     * 自定义提示错误信息
     */
    public function messages()
    {
        return [
        'lname.required' => '链接名称必填',
        'lurl.required' => '链接地址必填',
        'limg.required' => '链接图片必填',
        
        ];
    }
}
