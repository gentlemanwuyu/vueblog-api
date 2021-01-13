<?php
/**
 * 数组帮助类
 * User: Woozee
 * Date: 2020/10/29
 * Time: 14:28
 */

namespace App\Libs\Helpers;

/**
 * Class Arr
 * @package App\Libs\Helpers
 * @mixin \Illuminate\Support\Arr
 */
class Arr extends \Illuminate\Support\Arr
{
    /**
     * 将数组转为树形结构数据
     *
     * @param array $data 原始数据
     * @param string $field 主字段名
     * @param string $parentField 父字段名
     * @param string|int $defaultParentId 初始ID
     * @param string $childrenField children字段名称
     * @param int $maxLevel 最大层级
     * @param int $currentLevel 当前层级, 无需传入
     * @return array
     */
    public static function toTree(
        array $data,
        string $field = 'id',
        string $parentField = 'parent_id',
        $defaultParentId = 0,
        $childrenField = 'children',
        int $maxLevel = 3,
        int $currentLevel = 0
    ): array {
        $currentLevel++;
        if ($currentLevel > $maxLevel) {
            return [];
        }

        $trees = [];
        foreach ($data as $key => $item) {
            $item['level'] = $currentLevel;
            if ($item[$parentField] == $defaultParentId) {
                unset($data[$key]);
                $item[$childrenField] = self::toTree($data, $field, $parentField, $item[$field], $childrenField, $maxLevel, $currentLevel);
                $trees[] = $item;
            }
        }

        return $trees;
    }

    /**
     * 递归获取下级键值
     *
     * @param array $data
     * @param $parentKey
     * @param string $keyField
     * @param string $parentField
     * @param int $currentLevel
     * @param int $maxLevel
     * @return array
     */
    public static function getChildrenKeys(array $data, $parentKey, string $keyField = 'id', string $parentField = 'parent_id', int $currentLevel = 1, int $maxLevel = 3): array
    {
        $keyList = [];
        $currentLevel++;
        if ($currentLevel > $maxLevel) {
            return $keyList;
        }
        foreach ($data as $key => $item) {
            if ($item[$parentField] == $parentKey) {
                $keyList[] = $item[$keyField];
                unset($data[$key]);
                $keyList = array_merge($keyList, self::getChildrenKeys($data, $item[$keyField], $keyField, $parentField, $currentLevel, $maxLevel));
            }
        }
        return $keyList;
    }
}
