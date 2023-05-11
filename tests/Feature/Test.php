<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Test extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_a_basic_request(): void
    {
        // $response = $this->get(route('home'));
				$response = $this->get('/');

        $response->assertStatus(200);
    }
}
