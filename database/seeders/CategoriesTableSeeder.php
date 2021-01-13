<?php
/**
 * 分类数据填充类
 * User: Woozee
 * Date: 2020/10/29
 * Time: 13:57
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $category = Category::create([
            'name' => 'PHP',
        ]);
        Category::create([
            'name' => 'Laravel',
            'parent_id' => $category->id,
        ]);
        $category = Category::create([
            'name' => 'Mysql',
        ]);
        $category = Category::create([
            'name' => 'Linux',
        ]);
        $category = Category::create([
            'name' => 'Nginx',
        ]);
        $category = Category::create([
            'name' => 'Redis',
        ]);
        $category = Category::create([
            'name' => '编辑器',
        ]);
        Category::create([
            'name' => 'phpstorm',
            'parent_id' => $category->id,
        ]);
        Category::create([
            'name' => 'sublime',
            'parent_id' => $category->id,
        ]);
        $category = Category::create([
            'name' => '前端',
        ]);
        Category::create([
            'name' => 'HTML',
            'parent_id' => $category->id,
        ]);
        Category::create([
            'name' => 'CSS',
            'parent_id' => $category->id,
        ]);
        Category::create([
            'name' => 'Jquery',
            'parent_id' => $category->id,
        ]);
        $category = Category::create([
            'name' => 'Git',
        ]);

        $category = Category::create([
            'name' => '个股研究',
        ]);
        $category = Category::create([
            'name' => '大V原创',
        ]);
        Category::create([
            'name' => '风生水起',
            'parent_id' => $category->id,
        ]);
        Category::create([
            'name' => '闲来一坐s话投资',
            'parent_id' => $category->id,
        ]);
        $category = Category::create([
            'name' => '投资周记',
        ]);
    }
}
