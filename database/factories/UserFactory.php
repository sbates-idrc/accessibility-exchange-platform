<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => function (array $attributes) {
                return Str::slug($attributes['name']).'@'.$this->faker->safeEmailDomain();
            },
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'locale' => config('app.locale'),
            'theme' => 'system',
            'context' => 'individual',
            'preferred_contact_person' => 'me',
            'preferred_contact_method' => 'email',
            'preferred_notification_method' => 'email',
            'accepted_privacy_policy_at' => now(),
            'accepted_terms_of_service_at' => now(),
            'oriented_at' => now(),
        ];
    }
}
