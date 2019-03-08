<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeUsersRequest extends FormRequest
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
     * 存放 验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [       
            'password' => 'required|regex:/^[\w]{6,18}$/',
            'repassword' => 'required|same:password',
            
        ];
    }
    // 自定义错误信息
    public function messages()
    {
        return [
            'password.regex'=>'密码格式不正确',
            'password.required'=>'密码必填',
            'repassword.required'=>'确认密码必填',
            'repassword.same'=>'俩次密码不一致',
        ];
    }
}
