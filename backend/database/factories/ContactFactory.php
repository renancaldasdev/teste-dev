<?php

namespace Database\Factories;

use App\Contacts\Models\Contact;
use App\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name,
            'telephone' => $this->faker->phoneNumber,
            'age' => $this->faker->numberBetween(18, 80),
            'zip_code' => $this->faker->postcode,
            'address' => $this->faker->streetAddress,
            'address_number' => $this->faker->buildingNumber,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
        ];
    }
}
