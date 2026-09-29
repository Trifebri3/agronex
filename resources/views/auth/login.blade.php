<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - AGRONEX</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-primary-cream to-bg-base min-h-screen flex items-center justify-center p-6 text-charcoal antialiased">
    <div class="w-full max-w-md bg-white border border-sand/40 p-8 rounded-3xl shadow-xl space-y-8 relative overflow-hidden">
        <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-leaf-green to-forest"></div>

        <div class="text-center space-y-2">
            <!-- Brand -->
            <a href="{{ route('home') }}" class="inline-flex items-center space-x-3 justify-center">
                <div class="w-10 h-10 rounded-xl bg-forest flex items-center justify-center text-white font-bold text-lg shadow-sm">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L4 10H9V22H15V10H20L12 2Z" fill="currentColor"/>
                    </svg>
                </div>
                <span class="font-extrabold text-xl tracking-tight text-forest font-display">AGRONEX</span>
            </a>
            <h2 class="text-xl font-extrabold text-forest-dark font-display pt-2">CMS Portal Access</h2>
            <p class="text-xs text-charcoal/50">Enter authorized credentials to proceed.</p>
        </div>

        @if($errors->any())
        <div class="p-3 bg-red-50 border border-red-200 text-[11px] font-semibold text-red-600 rounded-xl">
            {{ $errors->first() }}
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div class="space-y-1.5">
                <label for="email" class="text-[10px] font-bold uppercase tracking-wider text-forest">Registered Email</label>
                <input type="email" name="email" id="email" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green text-xs bg-bg-base" placeholder="name@agronex.com" value="{{ old('email') }}">
            </div>

            <div class="space-y-1.5">
                <div class="flex justify-between items-center">
                    <label for="password" class="text-[10px] font-bold uppercase tracking-wider text-forest">Security Password</label>
                </div>
                <input type="password" name="password" id="password" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green text-xs bg-bg-base" placeholder="••••••••">
            </div>

            <button type="submit" class="w-full py-3.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full shadow transition-all">
                Authenticate Sign In
            </button>
        </form>

        <div class="text-center pt-2">
            <a href="{{ route('home') }}" class="text-[10px] text-charcoal/40 hover:text-leaf-green transition-colors font-medium">&larr; Back to Platform Home</a>
        </div>
    </div>
</body>
</html>
