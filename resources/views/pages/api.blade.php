@extends('layouts.app')

@section('title', 'API Demo')

@section('content')
    <section class="panel section">
        <div class="section-header">
            <div>
                <h2>API playground</h2>
                <p>
                    This screen pulls test data from a free public API so you can experiment with cards, images, and menu navigation.
                </p>
            </div>

            <a href="{{ route('api.demo') }}" class="button-secondary">Refresh</a>
        </div>

        @if ($error)
            <div class="notice">{{ $error }}</div>
        @endif

        <article class="quote-card">
            <span class="eyebrow">Random quote</span>
            <p>"{{ $quote['quote'] }}"</p>
            <strong>{{ $quote['author'] }}</strong>
        </article>
    </section>

    <section class="panel section">
        <div class="section-header">
            <div>
                <h2>Remote menu cards</h2>
                <p>Each card is built from API data, which makes this page useful for testing realistic layouts.</p>
            </div>
        </div>

        <div class="cards">
            @foreach ($products as $product)
                <article class="api-card">
                    <img src="{{ $product['thumbnail'] }}" alt="{{ $product['title'] }}">

                    <div class="pill-row">
                        <span class="pill">{{ $product['category'] }}</span>
                        <span class="pill">${{ $product['price'] }}</span>
                        <span class="pill">{{ $product['rating'] }}/5</span>
                    </div>

                    <h3>{{ $product['title'] }}</h3>
                    <p>{{ $product['description'] }}</p>
                </article>
            @endforeach
        </div>
    </section>
@endsection
