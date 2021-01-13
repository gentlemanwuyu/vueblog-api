<?php
/**
 * Created by PhpStorm
 * User: Woozee
 * Date: 2020/10/13
 * Time: 12:43
 */

namespace App\Libs\Request;

use App\Libs\Exceptions\ValidationException;
use App\Libs\Helpers\Arr;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
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
     * Handle a failed validation attempt.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $messageBags = $validator->errors()->messages();
        $errors = Arr::flatten($messageBags);
        $e = new ValidationException('参数校验错误');
        $e->setData($errors);
        throw $e;
    }
}
