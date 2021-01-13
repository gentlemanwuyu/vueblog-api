<?php
/**
 * 可填充基类
 * User: Woozee
 * Date: 2020/10/28
 * Time: 15:49
 */

namespace App\Libs\Base;

use App\Libs\Traits\ArrayAccessTrait;
use App\Libs\Traits\PropertyToArrayTrait;
use App\Libs\Traits\FillDataTrait;

abstract class BaseFillable implements \ArrayAccess
{
    use ArrayAccessTrait, PropertyToArrayTrait, FillDataTrait;

    public function __construct($data = null)
    {
        if ($data) {
            $this->fill($data);
        }
    }
}
