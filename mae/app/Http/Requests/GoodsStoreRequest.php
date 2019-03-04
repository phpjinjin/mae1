<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsStoreRequest extends FormRequest
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
        'gname' => 'required',
        'tid' => 'required',
        'price' => 'required',
        'stock' => 'required',
        
        ];
    }

    /**
     * 自定义提示错误信息
     */
    public function messages()
    {
        return [
        'gname.required' => '商品名称必填',
        'tid.required' => '所属分类必填',
        'price.required' => '定价必填',
        'stock.required' => '库存必填',
        
        ];
    }
}
