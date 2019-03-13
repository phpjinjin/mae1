<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersStoreRequest extends FormRequest
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
        'account' => 'required',
        'password' => 'required|regex:/^[\w]{6,18}$/',
        'repassword' => 'required|same:password',
        'pname' => 'required',
        'uname' => 'required',
        'sex' => 'required',
        'phone' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
        'email' => 'required|email',
        ];
    }

    /**
     * 自定义提示错误信息
     */
    public function messages()
    {
        return [
        'account.required' => '账号必填',
        'password.regex'=>'密码格式不正确',
        'password.required'=>'密码必填',
        'repassword.required'=>'确认密码必填',
        'repassword.same'=>'次密码不一致',
        'pname.required' => '昵称必填',
        'uname.required' => '真实姓名必填',
        'sex.required' => '性别必填',
        'phone.required' => '手机号必填',
        'email.required' => '邮箱必填',
        ];
    }
}
