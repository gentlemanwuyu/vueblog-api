<?php
/**
 * 友情链接数据填充类
 * User: Woozee
 * Date: 2020/10/30
 * Time: 12:31
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Friendlink;

class FriendlinksTableSeeder extends Seeder
{
    public function run()
    {
        Friendlink::factory(30)->create();
    }
}
