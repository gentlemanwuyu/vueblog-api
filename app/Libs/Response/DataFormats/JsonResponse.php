<?php
/**
 * Json响应数据格式
 * User: Woozee
 * Date: 2020/10/7
 * Time: 19:38
 */

namespace App\Libs\ApiResponse\DataFormats;

use App\Libs\Response\Enums\CodeBaseEnum;

class JsonResponse
{
    /** @var int 状态编号 */
    public int $code;

    /** @var string 消息 */
    public string $message;

    /** @var array 数据 */
    public $data = null;

    public function __construct($data = null, string $message = '', int $code = CodeBaseEnum::OK)
    {
        $this->data = $data;
        $this->message = $message;
        $this->code = $code;
    }
}
