<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $this->seed();
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('PT Pratama Berkah Utama');
        $response->assertSee('Company Profile');
        $response->assertSee('Pratama');
        $response->assertSee('Studio');
        $response->assertSee('Explore Projects');
        $response->assertSee('Start a Project');
        $response->assertSee('About Us');
        $response->assertSee('Professionalism');
        $response->assertSee('Integrity');
        $response->assertSee('Innovation');
        $response->assertSee('Attention to Detail');
        $response->assertSee('What We Do');
        $response->assertSee('Fit-Out Consultation');
        $response->assertSee('Project Plan &amp; Schedule', false);
        $response->assertSee('Project Budgeting');
        $response->assertSee('Digital Rendering');
        $response->assertSee('Transforming Ideas');
        $response->assertSee('into Living Spaces');
    }
}
