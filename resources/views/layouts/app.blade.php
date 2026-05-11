<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>@yield('title', 'Menu Lab')</title>
    <style>
        :root {
            --ink: #0f172a;
            --paper: #f8fafc;
            --muted: #5b6472;
            --accent: #ef6c00;
            --accent-deep: #d84315;
            --accent-soft: #fff3e0;
            --line: rgba(15, 23, 42, 0.12);
            --card-shadow: 0 20px 45px rgba(15, 23, 42, 0.12);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background:
                radial-gradient(circle at top left, rgba(255, 183, 77, 0.55), transparent 32%),
                radial-gradient(circle at bottom right, rgba(251, 192, 45, 0.32), transparent 28%),
                linear-gradient(180deg, #fff8f1 0%, #fffdf8 100%);
            color: var(--ink);
        }

        a {
            color: inherit;
        }

        .app-shell {
            width: min(960px, 100%);
            margin: 0 auto;
            padding: 22px 18px 110px;
        }

        .web-nav {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        .web-nav a {
            padding: 10px 14px;
            border-radius: 999px;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid var(--line);
            color: var(--muted);
            font-weight: 700;
        }

        .web-nav a.active {
            background: var(--ink);
            border-color: var(--ink);
            color: #fff;
        }

        .panel {
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 28px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .hero {
            display: grid;
            gap: 22px;
            padding: 24px;
        }

        .badge {
            display: inline-flex;
            width: fit-content;
            padding: 8px 12px;
            border-radius: 999px;
            background: var(--accent-soft);
            color: var(--accent-deep);
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        h1, h2, h3, p {
            margin: 0;
        }

        .hero h1 {
            font-size: clamp(32px, 7vw, 56px);
            line-height: 0.95;
            letter-spacing: -0.04em;
        }

        .lead {
            color: var(--muted);
            font-size: 16px;
            line-height: 1.7;
            max-width: 60ch;
        }

        .hero-grid,
        .stats,
        .cards,
        .info-grid {
            display: grid;
            gap: 16px;
        }

        .hero-grid {
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            align-items: stretch;
        }

        .icon-card,
        .mini-card,
        .api-card,
        .info-card,
        .quote-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 24px;
            padding: 18px;
        }

        .icon-card {
            display: grid;
            place-items: center;
            min-height: 280px;
            background:
                linear-gradient(160deg, rgba(239, 108, 0, 0.12), rgba(255, 241, 118, 0.18)),
                #fff;
        }

        .icon-card img {
            width: min(220px, 60vw);
            aspect-ratio: 1;
            border-radius: 28px;
            box-shadow: 0 22px 40px rgba(216, 67, 21, 0.24);
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 4px;
        }

        .button,
        .button-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 48px;
            padding: 0 18px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 700;
        }

        .button {
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-deep) 100%);
            color: #fff;
        }

        .button-secondary {
            background: #fff;
            color: var(--ink);
            border: 1px solid var(--line);
        }

        .stats {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }

        .mini-card span,
        .eyebrow {
            display: block;
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-bottom: 8px;
        }

        .mini-card strong {
            font-size: 28px;
            letter-spacing: -0.04em;
        }

        .section {
            margin-top: 18px;
            padding: 24px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 16px;
            margin-bottom: 16px;
        }

        .section-header p {
            color: var(--muted);
            max-width: 48ch;
            line-height: 1.6;
        }

        .cards {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }

        .api-card img {
            width: 100%;
            aspect-ratio: 4 / 3;
            object-fit: cover;
            border-radius: 18px;
            margin-bottom: 14px;
            background: #f1f5f9;
        }

        .pill-row {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 12px;
        }

        .pill {
            display: inline-flex;
            padding: 7px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            background: #fff7ed;
            color: #c2410c;
        }

        .quote-card {
            background: linear-gradient(145deg, #111827 0%, #1f2937 100%);
            color: #fff;
        }

        .quote-card p {
            font-size: 18px;
            line-height: 1.7;
        }

        .quote-card strong {
            display: inline-block;
            margin-top: 12px;
            color: #fed7aa;
        }

        .notice {
            margin-bottom: 14px;
            padding: 14px 16px;
            border-radius: 18px;
            background: #fff7ed;
            border: 1px solid #fdba74;
            color: #9a3412;
            font-weight: 700;
        }

        .info-grid {
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
        }

        .info-card p,
        .api-card p {
            color: var(--muted);
            line-height: 1.6;
        }

        .info-card code,
        .inline-code {
            padding: 2px 7px;
            border-radius: 999px;
            background: #f1f5f9;
            font-family: Consolas, monospace;
            font-size: 13px;
        }

        .stack {
            display: grid;
            gap: 12px;
        }

        @media (max-width: 640px) {
            .app-shell {
                padding-inline: 14px;
                padding-bottom: 104px;
            }

            .panel,
            .icon-card,
            .mini-card,
            .api-card,
            .info-card,
            .quote-card {
                border-radius: 22px;
            }

            .hero,
            .section {
                padding: 18px;
            }
        }
    </style>
    @yield('head')
</head>
<body class="nativephp-safe-area">
    <native:top-bar title="Menu Lab" subtitle="NativePHP mobile playground" background-color="#0f172a" text-color="#f8fafc">
        <native:top-bar-action id="home-action" icon="home" label="Home" :url="route('home')" />
        <native:top-bar-action id="api-action" icon="search" label="API Demo" :url="route('api.demo')" />
        <native:top-bar-action id="docs-action" icon="settings" label="NativePHP Docs" url="https://nativephp.com/docs/mobile/3" />
    </native:top-bar>

    <native:side-nav :gestures-enabled="true">
        <native:side-nav-header
            title="Menu Lab"
            subtitle="Open a page from the menu"
            icon="home"
            background-color="#fff3e0"
            :show-close-button="true"
        />

        <native:side-nav-item
            id="drawer-home"
            label="Home"
            icon="home"
            :url="route('home')"
            :active="request()->routeIs('home')"
        />

        <native:side-nav-item
            id="drawer-api"
            label="API Demo"
            icon="search"
            :url="route('api.demo')"
            :active="request()->routeIs('api.demo')"
            badge="Live"
        />

        <native:side-nav-item
            id="drawer-about"
            label="About"
            icon="person"
            :url="route('about')"
            :active="request()->routeIs('about')"
        />

        <native:horizontal-divider />

        <native:side-nav-item
            id="drawer-docs"
            label="NativePHP Docs"
            icon="settings"
            url="https://nativephp.com/docs/mobile/3"
            :open-in-browser="true"
        />
    </native:side-nav>

    <main class="app-shell">
        <nav class="web-nav" aria-label="Preview navigation">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('api.demo') }}" class="{{ request()->routeIs('api.demo') ? 'active' : '' }}">API Demo</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
        </nav>

        @yield('content')
    </main>

    <native:bottom-nav label-visibility="labeled">
        <native:bottom-nav-item id="home-nav" icon="home" label="Home" :url="route('home')" :active="request()->routeIs('home')" />
        <native:bottom-nav-item id="api-nav" icon="search" label="API Demo" :url="route('api.demo')" :active="request()->routeIs('api.demo')" badge="Live" />
        <native:bottom-nav-item id="about-nav" icon="person" label="About" :url="route('about')" :active="request()->routeIs('about')" :news="true" />
    </native:bottom-nav>
</body>
</html>
