<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Writer Panel - AGRONEX</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-primary-cream/15 text-charcoal antialiased flex min-h-screen">

    <!-- Sidebar navigation -->
    <aside class="w-64 bg-forest text-primary-cream flex flex-col justify-between p-6">
        <div class="space-y-8">
            <!-- Brand -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3">
                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center text-white font-bold">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L4 10H9V22H15V10H20L12 2Z" fill="currentColor"/>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-extrabold text-sm tracking-widest font-display">AGRONEX</span>
                    <span class="text-[7.5px] uppercase tracking-widest text-fresh-lime font-bold">Field Writer</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="space-y-1.5 text-xs font-semibold text-primary-cream/80">
                <a href="{{ route('writer.dashboard') }}" class="flex items-center space-x-2.5 px-3 py-2.5 rounded-xl hover:bg-white/5 hover:text-white transition-colors {{ request()->routeIs('writer.dashboard') ? 'bg-white/10 text-white' : '' }}">
                    <span>Overview</span>
                </a>
                <a href="{{ route('writer.stories') }}" class="flex items-center space-x-2.5 px-3 py-2.5 rounded-xl hover:bg-white/5 hover:text-white transition-colors {{ request()->routeIs('writer.stories*') ? 'bg-white/10 text-white' : '' }}">
                    <span>Field Stories</span>
                </a>
                <a href="{{ route('writer.activities') }}" class="flex items-center space-x-2.5 px-3 py-2.5 rounded-xl hover:bg-white/5 hover:text-white transition-colors {{ request()->routeIs('writer.activities*') ? 'bg-white/10 text-white' : '' }}">
                    <span>Documented Activities</span>
                </a>
                <a href="{{ route('writer.gallery') }}" class="flex items-center space-x-2.5 px-3 py-2.5 rounded-xl hover:bg-white/5 hover:text-white transition-colors {{ request()->routeIs('writer.gallery*') ? 'bg-white/10 text-white' : '' }}">
                    <span>Media Assets / Gallery</span>
                </a>
                <a href="{{ route('writer.knowledge') }}" class="flex items-center space-x-2.5 px-3 py-2.5 rounded-xl hover:bg-white/5 hover:text-white transition-colors {{ request()->routeIs('writer.knowledge*') ? 'bg-white/10 text-white' : '' }}">
                    <span>Knowledge Center</span>
                </a>
                <a href="{{ route('writer.news') }}" class="flex items-center space-x-2.5 px-3 py-2.5 rounded-xl hover:bg-white/5 hover:text-white transition-colors {{ request()->routeIs('writer.news*') ? 'bg-white/10 text-white' : '' }}">
                    <span>Newsroom Press</span>
                </a>
                <a href="{{ route('writer.map') }}" class="flex items-center space-x-2.5 px-3 py-2.5 rounded-xl hover:bg-white/5 hover:text-white transition-colors {{ request()->routeIs('writer.map*') ? 'bg-white/10 text-white' : '' }}">
                    <span>Ecosystem Map</span>
                </a>
            </nav>
        </div>

        <!-- Footer profile -->
        <div class="space-y-4 pt-6 border-t border-white/10 text-xs">
            <div>
                <span class="font-bold text-[10px] text-white block">{{ auth()->user()->name }}</span>
                <span class="text-[9px] text-primary-cream/60">Field Writer Role</span>
            </div>
            <a href="{{ route('logout') }}" class="block text-center w-full py-2 bg-white/10 hover:bg-white/20 text-white font-bold rounded-lg transition-colors text-[10px]">
                Sign Out Panel
            </a>
        </div>
    </aside>

    <!-- Main Workspace -->
    <main class="flex-1 flex flex-col min-w-0">
        <!-- Top bar -->
        <header class="h-16 border-b border-sand/40 bg-white/70 backdrop-blur px-8 flex items-center justify-between">
            <span class="text-xs font-semibold text-charcoal/50">FIELD CONTROL WORKSPACE</span>
            <a href="{{ route('home') }}" class="text-[10px] font-bold text-forest hover:text-leaf-green transition-colors">&larr; Back to Public Website</a>
        </header>

        <!-- Dynamic Content -->
        <div class="p-8 flex-1 overflow-y-auto">
            @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-leaf-green/10 border border-leaf-green/30 text-xs font-semibold text-leaf-green">
                {{ session('success') }}
            </div>
            @endif

            @yield('content')
        </div>
    </main>

</body>
</html>
