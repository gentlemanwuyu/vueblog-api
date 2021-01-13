<?php
/**
 * Created by PhpStorm
 * User: Woozee
 * Date: 2020/10/28
 * Time: 15:52
 */

namespace App\Libs\Traits;

trait ArrayAccessTrait
{
    public function offsetSet($offset, $value) {
        $this->{$offset} = $value;
    }

    public function offsetExists($offset) {
        return isset($this->{$offset});
    }

    public function offsetUnset($offset) {
        unset($this->{$offset});
    }

    public function offsetGet($offset) {
        return $this->{$offset};
    }
}
