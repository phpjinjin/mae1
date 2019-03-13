<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebRequest extends FormRequest
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
        'web_name' => 'required',
        'describe' => 'required',
        'filing' => 'required',
        'telephone' => 'required',
        'status' => 'required',
        'cright' => 'required',
        
        ];
    }

    /**
     * 自定义提示错误信息
     */
    public function messages()
    {
        return [
        'web_name.required' => '网站名称必填',
        'describe.required' => '网站描述必填',
        'filing.required' => '备案号必填',
        'telephone.required' => '联系方式必填',
        'status.required' => '网站状态必选必填',
        'cright.required' => '版权信息必填',
        
        ];
    }
}
