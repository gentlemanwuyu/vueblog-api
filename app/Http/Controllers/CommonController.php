<?php
/**
 *
 * User: Woozee
 * Date: 2020/10/13
 * Time: 16:48
 */

namespace App\Http\Controllers;


class CommonController extends Controller
{
    /**
     * @apidoc 验证码
     * @return array|mixed
     */
    public function captcha()
    {
        return \Captcha::create();
    }
}
