<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname'=> $this->faker->name(),
            'section_id' =>$this->faker->numberBetween(1,25)
        ];
    }
}
