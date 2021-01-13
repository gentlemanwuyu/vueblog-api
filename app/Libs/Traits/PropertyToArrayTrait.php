<?php
/**
 * Created by PhpStorm
 * User: Woozee
 * Date: 2020/10/28
 * Time: 15:52
 */

namespace App\Libs\Traits;

trait PropertyToArrayTrait
{
    /** @var array 当前属性集合 */
    protected static array $_properties = [];

    /**
     * 转化为数组形式, 未设置的值会忽略
     *
     * @return array
     */
    public function toArray(): array
    {
        return (array)json_decode(json_encode($this), true);
    }

    /**
     * 将所有字段转化为数组形式, null的不会忽略
     *
     * @param bool $deep 是否深度循环转换
     * @return array
     * @throws \ReflectionException
     */
    public function toArrayAll($deep = true): array
    {
        $properties = self::getProperties();
        $data = [];
        foreach ($properties as $attr) {
            $value = $this->{$attr} ?? null;
            $data[$attr] = $this->getDeepValue($value, $deep);
        }
        return $data;
    }

    public function toJson(): string
    {
        return json_encode($this);
    }

    private function getDeepValue($value, $deep)
    {
        $data = [];
        if ($deep && is_object($value) && method_exists($value, 'toArrayAll')) {
            $data = $value->toArrayAll($deep);
        } elseif ($deep && $value && is_array($value)) {
            foreach ($value as $key => $item) {
                $data[$key] = $this->getDeepValue($item, $deep);
            }
        } else {
            $data = $value;
        }
        return $data;
    }

    /**
     * 获取属性集合
     *
     * @return array
     * @throws \ReflectionException
     */
    public static function getProperties(): array
    {
        if (! self::$_properties) {
            $reflection = new \ReflectionClass(static::class);
            $properties = $reflection->getProperties();
            foreach ($properties as $property) {
                if ($property->isPublic()) {
                    self::$_properties[] = $property->getName();
                }
            }
        }
        return self::$_properties;
    }
}
