<?php
/**
 * 标签数据填充类
 * User: Woozee
 * Date: 2020/10/29
 * Time: 20:04
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Label;

class LabelsTableSeeder extends Seeder
{
    public function run()
    {
        Label::factory(130)->create();
    }
}
