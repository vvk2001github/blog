<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MainPageTest extends TestCase
{
    use RefreshDatabase;


    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertSee(__('Blog'))
            ->assertSee(__('Categories'))
            ->assertSee(__('Login'))
            ->assertStatus(200);
    }

    public function test_the_categoty_page_exists(): void
    {
        $response = $this->get('/categories');

        $response->assertSee('<h1 class="edica-page-title" data-aos="fade-up">'. __('Categories').'</h1>', false)
            ->assertStatus(200);
    }

    public function test_from_personal_we_redirected_to_login_page(): void
    {
        $response = $this->get('/personal');

        $response->assertRedirect('/login');
    }
}
