<?php
/**
 * 友情链接请求类
 * User: Woozee
 * Date: 2020/10/30
 * Time: 13:43
 */

namespace App\Http\Requests\Admin;

use App\Libs\Request\BaseRequest;

class FriendlinkRequest extends BaseRequest
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
            'link' => ['bail', 'required', 'max:255'],
            'desc' => ['bail', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '请输入友情链接名称',
            'name.max' => '友情链接名称不能超过:max个字符',
            'link.required' => '请输入链接名称',
            'link.max' => '链接名称不能超过:max个字符',
            'desc.max' => '描述名称不能超过:max个字符',
        ];
    }
}
