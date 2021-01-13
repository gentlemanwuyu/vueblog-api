<?php
/**
 * 系统配置请求类
 * User: Woozee
 * Date: 2020/12/13
 * Time: 1:25
 */

namespace App\Http\Requests\Admin;

use App\Libs\Request\BaseRequest;

class SystemConfigRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['bail', 'required'],
            'address' => ['bail', 'required'],
            'email' => ['bail', 'required'],
            'title' => ['bail', 'required'],
            'keyword_list' => ['bail', 'required', 'array'],
            'desc' => ['bail', 'required'],
            'about' => ['bail', 'required'],
            'icp' => ['bail', 'required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '请输入博客名',
            'address.required' => '请输入博客地址',
            'email.required' => '请输入博主邮箱',
            'title.required' => '请输入博客标题',
            'keyword_list.required' => '请输入关键词',
            'keyword_list.array' => '关键词必须是数组',
            'desc.required' => '请输入描述',
            'about.required' => '请输入关于',
            'icp.required' => '请输入ICP备案号',
        ];
    }
}
