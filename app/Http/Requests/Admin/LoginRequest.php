<?php

namespace App\Http\Requests\Admin;

use App\Libs\Request\BaseRequest;

class LoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => 'bail|required',
            'password' => 'bail|required',
            'captcha' => 'bail|required|captcha',
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => '请输入用户名',
            'password.required' => '请输入密码',
            'captcha.required' => '请输入验证码',
            'captcha.captcha' => '验证码错误',
        ];
    }
}
