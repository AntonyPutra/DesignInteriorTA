<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="@yield('meta_description', 'Pratamaid - interior & exterior design and build studio in Jakarta.')" />
    <title>@yield('title', 'pratamaid.') — Design Studio & Contractor</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Self-Contained Theme Controller & Initialization -->
    <script>
        (function() {
            window.setTheme = function(theme, animate) {
                var isDark = (theme === 'dark');
                var root = document.documentElement;
                var body = document.body;

                if (animate && body) {
                    root.classList.add('theme-in-transition');

                    // Phase 1: fade-in the directional veil
                    var ripple = document.createElement('div');
                    ripple.className = 'theme-transition-ripple ' + (isDark ? 'to-dark' : 'to-light');
                    body.appendChild(ripple);

                    // Kick off the fade-in on next frame
                    requestAnimationFrame(function() {
                        requestAnimationFrame(function() {
                            ripple.classList.add('is-active');
                        });
                    });

                    // Phase 2: mid-point — apply the theme while veil is opaque
                    setTimeout(function() {
                        applyThemeClasses(isDark, root, body);

                        // Phase 3: fade the veil back out
                        ripple.classList.remove('is-active');
                        ripple.classList.add('is-out');

                        setTimeout(function() {
                            if (ripple.parentNode) ripple.parentNode.removeChild(ripple);
                            root.classList.remove('theme-in-transition');
                        }, 600);
                    }, 350);

                } else {
                    applyThemeClasses(isDark, root, body);
                }

                try { localStorage.setItem('pratama_theme', theme); } catch (e) {}

                var allButtons = document.querySelectorAll('.theme-toggle-btn');
                allButtons.forEach(function(btn) {
                    btn.setAttribute('aria-pressed', String(isDark));
                    btn.setAttribute('title', isDark ? 'Beralih ke Mode Terang' : 'Beralih ke Mode Gelap');
                    btn.classList.toggle('is-dark', isDark);
                });
            };

            function applyThemeClasses(isDark, root, body) {
                if (isDark) {
                    root.setAttribute('data-theme', 'dark');
                    root.classList.add('dark-theme');
                    if (body) { body.setAttribute('data-theme', 'dark'); body.classList.add('dark-theme'); }
                } else {
                    root.setAttribute('data-theme', 'light');
                    root.classList.remove('dark-theme');
                    if (body) { body.setAttribute('data-theme', 'light'); body.classList.remove('dark-theme'); }
                }
            }

            window.toggleTheme = function() {
                var current = document.documentElement.getAttribute('data-theme') ||
                              (document.body && document.body.classList.contains('dark-theme') ? 'dark' : 'light');
                var target = (current === 'dark') ? 'light' : 'dark';
                window.setTheme(target, true);
            };

            try {
                var stored = localStorage.getItem('pratama_theme');
                var prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
                var initial = stored ? stored : (prefersDark ? 'dark' : 'light');
                if (initial === 'dark') {
                    document.documentElement.setAttribute('data-theme', 'dark');
                    document.documentElement.classList.add('dark-theme');
                } else {
                    document.documentElement.setAttribute('data-theme', 'light');
                    document.documentElement.classList.remove('dark-theme');
                }
            } catch (e) {}

            document.addEventListener('DOMContentLoaded', function() {
                var active = document.documentElement.getAttribute('data-theme') || 'light';
                window.setTheme(active, false);
            });

            document.addEventListener('click', function(e) {
                var btn = e.target.closest && e.target.closest('.theme-toggle-btn');
                if (btn) {
                    e.preventDefault();
                    e.stopPropagation();
                    window.toggleTheme();
                }
            });
        })();
    </script>

    <!-- Core Stylesheet with Cache-Busting -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ file_exists(public_path('css/style.css')) ? filemtime(public_path('css/style.css')) : time() }}" />

    @yield('head')

    <!-- Deferred Application Logic with Cache-Busting -->
    <script defer src="{{ asset('js/app.js') }}?v={{ file_exists(public_path('js/app.js')) ? filemtime(public_path('js/app.js')) : time() }}"></script>
</head>
<body>

    {{-- Flash Alert: Success --}}
    @if(session('success'))
    <div id="flash-success" style="position: fixed; top: 90px; right: 20px; z-index: 999; background: #ffffff; border: 1px solid #c3e6cb; border-radius: 8px; box-shadow: 0 4px 16px rgba(0,0,0,0.1); padding: 16px 20px; display: flex; align-items: center; gap: 12px; max-width: 380px;">
        <span style="color: #155724; font-size: 18px;">✓</span>
        <div style="font-size: 13px; color: #155724;">{{ session('success') }}</div>
        <button onclick="document.getElementById('flash-success').remove()" style="margin-left: auto; background: none; border: none; font-size: 16px; cursor: pointer; color: #888;">&times;</button>
    </div>
    @endif

    {{-- Flash Alert: Error --}}
    @if(session('error'))
    <div id="flash-error" style="position: fixed; top: 90px; right: 20px; z-index: 999; background: #ffffff; border: 1px solid #f5c6cb; border-radius: 8px; box-shadow: 0 4px 16px rgba(0,0,0,0.1); padding: 16px 20px; display: flex; align-items: center; gap: 12px; max-width: 380px;">
        <span style="color: #721c24; font-size: 18px;">⚠</span>
        <div style="font-size: 13px; color: #721c24;">{{ session('error') }}</div>
        <button onclick="document.getElementById('flash-error').remove()" style="margin-left: auto; background: none; border: none; font-size: 16px; cursor: pointer; color: #888;">&times;</button>
    </div>
    @endif

    @yield('content')

    <script>
        setTimeout(() => {
            document.getElementById('flash-success')?.remove();
            document.getElementById('flash-error')?.remove();
        }, 5000);
    </script>

    @yield('scripts')
</body>
</html>
