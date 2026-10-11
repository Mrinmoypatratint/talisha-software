<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test public pages render successfully.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $this->seed();

        $response = $this->get('/');
        $response->assertStatus(200);

        $responseAbout = $this->get('/about');
        $responseAbout->assertStatus(200);

        $responseSolutions = $this->get('/solutions');
        $responseSolutions->assertStatus(200);
    }
}
