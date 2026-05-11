<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;

class PlaygroundController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function api(): View
    {
        $error = null;

        try {
            $products = Http::acceptJson()
                ->timeout(8)
                ->get('https://dummyjson.com/products', [
                    'limit' => 6,
                    'select' => 'title,description,price,category,rating,thumbnail',
                ])
                ->throw()
                ->json('products');
        } catch (\Throwable $exception) {
            $products = $this->fallbackProducts();
            $error = 'Live API is unavailable right now. Showing local demo data instead.';
        }

        try {
            $quote = Http::acceptJson()
                ->timeout(8)
                ->get('https://dummyjson.com/quotes/random')
                ->throw()
                ->json();
        } catch (\Throwable $exception) {
            $quote = [
                'quote' => 'Small demos are the fastest way to learn a new stack.',
                'author' => 'Local fallback',
            ];
            $error ??= 'Live API is unavailable right now. Showing local demo data instead.';
        }

        return view('pages.api', [
            'products' => collect($products)->map(fn (array $product) => [
                'title' => $product['title'],
                'description' => $product['description'],
                'price' => $product['price'],
                'category' => str($product['category'])->replace('-', ' ')->title()->value(),
                'rating' => number_format((float) $product['rating'], 1),
                'thumbnail' => $product['thumbnail'],
            ]),
            'quote' => $quote,
            'error' => $error,
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function fallbackProducts(): array
    {
        return [
            [
                'title' => 'Starter Kit',
                'description' => 'A simple API card to prove your NativePHP screen is wired correctly.',
                'price' => 19,
                'category' => 'demo menu',
                'rating' => 4.7,
                'thumbnail' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'title' => 'Testing Pack',
                'description' => 'Useful when you want fake data, buttons, and card layouts while building.',
                'price' => 24,
                'category' => 'demo menu',
                'rating' => 4.8,
                'thumbnail' => 'https://images.unsplash.com/photo-1523475472560-d2df97ec485c?auto=format&fit=crop&w=900&q=80',
            ],
            [
                'title' => 'Mobile Preview',
                'description' => 'Built for quick experiments with menus, icons, and polished screens.',
                'price' => 29,
                'category' => 'demo menu',
                'rating' => 4.9,
                'thumbnail' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=900&q=80',
            ],
        ];
    }
}
