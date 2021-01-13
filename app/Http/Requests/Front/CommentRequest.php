<?php
/**
 * 评论请求类
 * User: Woozee
 * Date: 2020/12/14
 * Time: 9:57
 */

namespace App\Http\Requests\Front;

use App\Libs\Request\BaseRequest;

class CommentRequest extends BaseRequest
{
    protected function prepareForValidation()
    {
        if (!$this->get('link')) {
            $this->merge(['link' => '']);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'content' => ['bail', 'required'],
            'username' => ['bail', 'required', 'max:255'],
            'email' => ['bail', 'required', 'max:255', 'email'],
            'link' => ['bail', 'max:255', 'url'],
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => '大神，点评几句吧？',
            'username.required' => '大神，您怎么称呼呢？',
            'email.required' => '大神，请填写下邮箱吧',
            'email.max' => '大神，您的邮箱地址超过了:max个字符，是不是输错了？',
            'email.email' => '大神，您的邮箱地址不对哦',
            'link.required' => '大神，您输入的主页地址太长了，是不是输错了？',
            'link.url' => '大神，您输入的主页地址格式不对哦',
        ];
    }
}
