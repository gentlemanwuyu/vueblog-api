<?php
/**
 * Created by PhpStorm
 * User: Woozee
 * Date: 2020/10/29
 * Time: 15:09
 */

namespace App\Http\Requests\Admin;

use App\Libs\Request\BaseRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $uniqueNameRule = Rule::unique('categories', 'name');
        if ($id = $this->get('id')) {
            $uniqueNameRule->ignore($id);
        }
        return [
            'name' => ['bail', 'required', 'max:255', $uniqueNameRule],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '请输入分类名',
            'name.max' => '分类名不能超过:max个字符',
            'name.unique' => '分类名已存在',
        ];
    }
}
