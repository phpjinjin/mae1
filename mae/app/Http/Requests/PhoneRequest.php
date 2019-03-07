<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneRequest extends FormRequest
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
            'phone'=>'required|regex:/^1[34578]\d{9}$/',
            'password' => 'required|regex:/^[\w]{6,18}$/',
            'repassword' => 'required|same:password',
        ];
    }
    // 自定义错误信息
    public function messages()
    {
        return [
            'phone.regex'=>'手机号格式不正确',
            'phone.required'=>'手机号必填',
            'password.regex'=>'密码格式不正确',
            'password.required'=>'密码必填',
            'repassword.required'=>'确认密码必填',
            'repassword.same'=>'两次密码不一致',
        ];
    }
}
