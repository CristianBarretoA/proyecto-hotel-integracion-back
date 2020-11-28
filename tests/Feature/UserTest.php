<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function testGetUsers()
    {

        $user = factory(User::class)->create();
        $response = $this->json('GET', '/api/users');

        $response->assertStatus(200)
            ->assertJsonFragment([
                "id" => $user->id,
                "name" => $user->name,
                "email" => $user->email,
                "last_name" => $user->last_name,
                "identification" => $user->identification,
                "identification_type" => $user->identification_type
            ]);
    }

    /**
     * @test
     */
    public function test_should_create_user()
    {
        $data = [
            'name' => "Pepito",
            'last_name' => "Perez",
            'identification' => "123456789",
            'identification_type' => User::CEDULA_DE_CIUDADANIA,
            'email' => "pperez@mail.com",
            'password' => "pass1234",
            'password_confirmation' => "pass1234"
        ];

        $response = $this->json('POST', '/api/users/store', $data);

        $response->assertStatus(200);
        $this->assertCount(1, User::all());
        $this->assertDatabaseHas('users', [
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'identification' => $data['identification'],
            'identification_type' => $data['identification_type'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }
}
