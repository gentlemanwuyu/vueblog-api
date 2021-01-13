<?php
/**
 * 友情链接数据填充工厂
 * User: Woozee
 * Date: 2020/10/30
 * Time: 10:23
 */

namespace Database\Factories;

use App\Models\Friendlink;
use Illuminate\Database\Eloquent\Factories\Factory;

class FriendlinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Friendlink::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(15),
            'link' => $this->faker->url,
            'desc' => $this->faker->text(30),
        ];
    }
}
