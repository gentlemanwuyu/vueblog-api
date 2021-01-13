<?php
/**
 * 模型基类
 * User: Woozee
 * Date: 2020/11/8
 * Time: 18:12
 */

namespace App\Models;

use App\Libs\Exceptions\FatalErrorException;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * 同步数据
     *
     * @param string $className
     * @param string $foreignKey
     * @param array $data
     * @param string $dataKey
     * @throws FatalErrorException
     */
    protected function sync(string $className, string $foreignKey, array $data, string $dataKey): void
    {
        $model = new $className;
        if (!($model instanceof self)) {
            throw new FatalErrorException("程序内部错误");
        }
        $insertModel = clone $model;
        $existsData = [];
        $model->newQuery()->where($foreignKey, $this->{$this->primaryKey})->get()->map(function ($item) use ($data, $dataKey, &$existsData) {
            if (in_array($item->{$dataKey}, $data)) {
                $existsData[] = $item->{$dataKey};
            } else {
                $item->delete();
            }
        });
        $diffData = array_diff($data, $existsData);
        $insertData = [];
        foreach ($diffData as $item) {
            $insertData[] = [
                $foreignKey => $this->{$this->primaryKey},
                $dataKey => $item,
            ];
        }
        $insertModel->insert($insertData);
    }
}
