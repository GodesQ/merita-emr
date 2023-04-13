<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->post('/save-register', [
            'email' => 'james@godesq.com',
            'password' => '123456789',
            'password_confirmation' => '123456789'
        ]);

        $response->assertRedirect('/verify-message');
    }
}
