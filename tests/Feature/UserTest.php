<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHolaMundo()
    {
        $response = $this->json('GET','/api/users');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'saludo'
            ])
            ->assertJsonFragment([
                'saludo' => 'Hola Mundo'
            ]);
    }
}
