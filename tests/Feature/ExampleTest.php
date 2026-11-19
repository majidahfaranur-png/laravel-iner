<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Uji dasar untuk memastikan halaman awal aplikasi dapat dibuka.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response
            ->assertStatus(200)
            ->assertInertia(fn (Assert $page) => $page->component('SkyWelcome'));
    }

    public function test_authenticated_users_are_redirected_to_the_posts_page(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ])->assertRedirect(route('dashboard'));

        $this->get(route('dashboard'))
            ->assertInertia(fn (Assert $page) => $page->component('Dashboard'));

        $this->get(route('posts.index'))
            ->assertInertia(fn (Assert $page) => $page->component('Post/Index')->has('posts'));
    }

    public function test_posts_page_displays_all_posts(): void
    {
        $user = User::factory()->create();
        $titles = ['Post Alpha', 'Post Beta', 'Post Gamma'];

        foreach ($titles as $title) {
            Post::create([
                'title' => $title,
                'content' => "Content for {$title}",
            ]);
        }

        $response = $this->actingAs($user)->get(route('posts.index'));

        $expectedTitles = collect($titles)->sort()->values()->all();

        $response->assertInertia(fn (Assert $page) => $page
            ->component('Post/Index')
            ->has('posts', 3)
            ->where('posts', fn ($posts) => collect($posts)->pluck('title')->sort()->values()->all() === $expectedTitles));
    }
}
