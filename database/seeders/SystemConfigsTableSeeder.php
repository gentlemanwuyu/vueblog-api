<?php
/**
 * 系统配置填充类
 * User: Woozee
 * Date: 2020/12/13
 * Time: 0:53
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SystemConfig;

class SystemConfigsTableSeeder extends Seeder
{
    public function run()
    {
        SystemConfig::create(['name' => 'name', 'value' => 'Woozee个人博客']);
        SystemConfig::create(['name' => 'address', 'value' => 'http://www.blog.xyz/']);
        SystemConfig::create(['name' => 'email', 'value' => '492444775@qq.com']);
        SystemConfig::create(['name' => 'title', 'value' => 'Woozee的个人博客']);
        SystemConfig::create(['name' => 'keywords', 'value' => 'php,全栈开发,Laravel']);
        SystemConfig::create(['name' => 'desc', 'value' => '分享个人在php开发中的经验']);
        SystemConfig::create(['name' => 'about', 'value' => '一个80后的油腻腻的大叔']);
        SystemConfig::create(['name' => 'icp', 'value' => '粤ICP备18158153号-1']);
    }
}
