<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_admin_user(): void
    {
        User::create([
            "name" => "Victor",
            "email" => "victor@example.com",
            "password" => bcrypt("12345678"),
            "role" => 2,
        ]);

        $this->assertDatabaseHas('users', [
            "name" => "Victor",
            "email" => "victor@example.com",
            "role" => 2,
        ]);
    }

    public function test_admin_can_see_dasboard_link()
    {
        $admin = User::factory()->create();

        $admin->update([
            'role' => 2,
        ]);

        $this->actingAs($admin)
            ->get('/')
            ->assertSee(__('Dashboard'))
            ->assertSee('http://localhost:8000/admin', false);
    }

    public function test_admin_can_see_links_on_admin_page()
    {
        $admin = User::factory()->create();

        $admin->update([
            'role' => 2,
        ]);

        $this->actingAs($admin)
            ->get('/admin')
            ->assertSee(__('Dashboard'))
            ->assertSee(__('Main page'))
            ->assertSee(__('Users'))
            ->assertSee(__('Posts'))
            ->assertSee(__('Categories'))
            ->assertSee(__('Tags'))
            ->assertStatus(200);
    }
}
