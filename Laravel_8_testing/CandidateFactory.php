<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;


class CandidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {	
		return [
			'description' => $this->faker->text,
			'currency'    => $this->faker->randomElement(['EUR', 'GBP', 'USD']),
			'rate'        => $this->faker->randomDigit,
			'user_id'     => 1
		];
	}
}
