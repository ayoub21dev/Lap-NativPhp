@extends('layouts.app')

@section('title', 'Menu Lab')

@section('content')
    <section class="panel hero">
        <span class="badge">NativePHP mobile demo</span>

        <div class="hero-grid">
            <div class="stack">
                <h1>Icon, menu, and API all in one small app.</h1>
                <p class="lead">
                    Your hello-world screen is now a simple playground. It uses NativePHP mobile navigation,
                    shows a real app icon preview, and includes a free public API page for testing.
                </p>

                <div class="actions">
                    <a href="{{ route('api.demo') }}" class="button">Open API Demo</a>
                    <a href="{{ route('about') }}" class="button-secondary">Check Setup Notes</a>
                </div>
            </div>

            <div class="icon-card">
                <img src="{{ asset('icon.png') }}" alt="Menu Lab app icon preview">
            </div>
        </div>

        <div class="stats">
            <article class="mini-card">
                <span>Top bar</span>
                <strong>Native</strong>
                <p class="lead">Rendered with <span class="inline-code">&lt;native:top-bar&gt;</span>.</p>
            </article>

            <article class="mini-card">
                <span>Bottom menu</span>
                <strong>3 tabs</strong>
                <p class="lead">Primary navigation built with EDGE components.</p>
            </article>

            <article class="mini-card">
                <span>Free API</span>
                <strong>DummyJSON</strong>
                <p class="lead">No key required for quick experiments.</p>
            </article>
        </div>
    </section>

    <section class="panel section">
        <div class="section-header">
            <div>
                <h2>What changed</h2>
                <p>The app now looks like a small product instead of a blank demo page.</p>
            </div>
        </div>

        <div class="info-grid">
            <article class="info-card">
                <h3>App icon</h3>
                <p>
                    A project icon file was added at <code>public/icon.png</code> so you can use it for NativePHP packaging.
                </p>
            </article>

            <article class="info-card">
                <h3>Menu navigation</h3>
                <p>
                    The app uses a top bar plus a bottom navigation menu so you can move between screens like a real mobile app.
                </p>
            </article>

            <article class="info-card">
                <h3>API sandbox</h3>
                <p>
                    The API page fetches remote demo data, but falls back to local data when the public service is unavailable.
                </p>
            </article>
        </div>
    </section>
@endsection
