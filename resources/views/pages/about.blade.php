@extends('layouts.app')

@section('title', 'About This Demo')

@section('content')
    <section class="panel section">
        <div class="section-header">
            <div>
                <h2>How this NativePHP app works</h2>
                <p>
                    NativePHP Mobile lets Laravel render your app inside a mobile shell, and EDGE components can render truly native UI on top.
                </p>
            </div>
        </div>

        <div class="info-grid">
            <article class="info-card">
                <h3>Icon file</h3>
                <p>
                    NativePHP looks for <code>public/icon.png</code>. The docs require a <code>1024x1024</code> PNG with no transparency.
                </p>
            </article>

            <article class="info-card">
                <h3>Safe area</h3>
                <p>
                    The layout now uses <code>viewport-fit=cover</code> and the <code>nativephp-safe-area</code> body class so it behaves better on phones with notches.
                </p>
            </article>

            <article class="info-card">
                <h3>Native menu</h3>
                <p>
                    The top bar and bottom navigation are built with <code>&lt;native:top-bar&gt;</code> and <code>&lt;native:bottom-nav&gt;</code>.
                </p>
            </article>
        </div>
    </section>

    <section class="panel section">
        <div class="section-header">
            <div>
                <h2>Useful next step</h2>
                <p>You can keep this screen as a starter and then replace the free API with your real backend later.</p>
            </div>
        </div>

        <div class="stack">
            <article class="info-card">
                <h3>Recommended demo flow</h3>
                <p>
                    Keep the bottom menu for <code>Home</code>, <code>API Demo</code>, and <code>About</code> while you test the native shell.
                    Once that feels stable, swap the API endpoint and change the icon to your final brand.
                </p>
            </article>
        </div>
    </section>
@endsection
