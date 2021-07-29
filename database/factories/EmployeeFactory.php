<?php

namespace Database\Factories;

use App\Models\Dept;
use App\Models\Employee;
use App\Models\Level;
use App\Models\Store;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $number = rand(200, 300);
        $image = "https://picsum.photos/id/{$number}/200/300";

        return [
            'id' => rand(111111, 999999),
            'name' => $this->faker->name,
            'store_id' => Store::inRandomOrder()->first()->id,
            'dept_id' => Dept::inRandomOrder()->first()->id,
            'level_id' => Level::inRandomOrder()->first()->id,
            'team_id' => Team::inRandomOrder()->first()->id,
            'image' => $image,

        ];
    }
}
