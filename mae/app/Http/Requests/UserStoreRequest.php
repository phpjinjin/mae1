<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * 存放验证规则
     * @return array
     */
    public function rules()
    {
        return [
        'account' => 'required||regex:/^[\d]{6,18}$/',
        'password' => 'required|regex:/^[\w]{6,18}$/',
        'respass' => 'required|same:password',
        'auname' => 'required|regex:/^[a-zA-Z]{4,20}$/',
        'sex' => 'required',
        'phone' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
        'email' => 'required|email',
        'power' => 'required',
        ];
    }

    /**
     * 自定义提示错误信息
     */
    public function messages()
    {
        return [
        'account.required' => '账号必填',
        'password.required' => '密码必填',
        'respass.required' => '确定密码必填',
        'auname.required' => '用户名必填',
        'sex.required'=> '性别必填',
        'phone.required' => '手机号必填',
        'email.required' => '邮箱必填',
        'power.required' => '权限必填',
        ];
    }
}
