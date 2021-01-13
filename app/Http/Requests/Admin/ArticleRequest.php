<?php
/**
 * 文章表单类
 * User: Woozee
 * Date: 2020/11/29
 * Time: 11:07
 */

namespace App\Http\Requests\Admin;

use App\Libs\Request\BaseRequest;

class ArticleRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['bail', 'required', 'max:255'],
            'content' => ['bail', 'required'],
            'summary' => ['bail', 'required', 'max:1024'],
            'category_id' => ['bail', 'required', 'integer'],
            'label_list' => ['bail', 'required', 'array'],
            'keyword_list' => ['bail', 'required', 'array'],
            'keyword_list.*' => ['bail', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => '请输入文章标题',
            'title.max' => '文章标题不能超过:max个字符',
            'content.required' => '请输入文章内容',
            'summary.required' => '请输入摘要',
            'summary.max' => '摘要不能超过:max个字符',
            'category_id.required' => '请选择分类',
            'label_list.required' => '请输入标签',
            'keyword_list.required' => '请输入关键词',
            'keyword_list.*.max' => '关键词不能超过:max个字符',
        ];
    }
}
