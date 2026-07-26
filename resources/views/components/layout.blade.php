<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>OMF &lt;code/&gt; Développement, IA & Formation pour tous</title>
    <meta name="description" content="Studio tech basé en Afrique. Nous concevons sites, apps, agents IA et formons vos équipes à l'ère numérique."/>
    
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700;800&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config={darkMode:'class'}</script>
    
    <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    
    <!-- Injection du Header via site.js -->
    <div id="siteHeader"></div>

    <main>
        {{ $slot }}
    </main>

    <!-- Injection du Footer via site.js -->
    <div id="siteFooter"></div>

    <!-- Script complet du template pour garantir le fonctionnement exact (mobile, dropdown, animations) -->
    <script src="{{ asset('assets/js/site.js') }}"></script>
    
</body>
</html>
