<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class PlaygroundPagesTest extends TestCase
{
    public function test_home_page_renders(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('Icon, menu, and API all in one small app.');
    }

    public function test_api_page_renders_remote_data(): void
    {
        Http::fake([
            'https://dummyjson.com/products*' => Http::response([
                'products' => [
                    [
                        'title' => 'Starter Kit',
                        'description' => 'A seeded test product.',
                        'price' => 19,
                        'category' => 'demo-menu',
                        'rating' => 4.7,
                        'thumbnail' => 'https://example.com/test-image.jpg',
                    ],
                ],
            ]),
            'https://dummyjson.com/quotes/random' => Http::response([
                'quote' => 'Testing keeps small demos honest.',
                'author' => 'Codex',
            ]),
        ]);

        $response = $this->get(route('api.demo'));

        $response->assertOk();
        $response->assertSee('Starter Kit');
        $response->assertSee('Testing keeps small demos honest.');
    }

    public function test_about_page_renders_setup_notes(): void
    {
        $response = $this->get(route('about'));

        $response->assertOk();
        $response->assertSee('public/icon.png');
        $response->assertSee('nativephp-safe-area');
    }
}
