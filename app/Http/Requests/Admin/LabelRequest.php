<?php
/**
 * 标签请求类
 * User: Woozee
 * Date: 2020/10/29
 * Time: 20:56
 */

namespace App\Http\Requests\Admin;

use App\Libs\Request\BaseRequest;

class LabelRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['bail', 'required', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '请输入标签名称',
            'name.max' => '标签名称不能超过:max个字符',
        ];
    }
}
