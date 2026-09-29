<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'AGRONEX NUSANTARA - Living Agritech Ecosystem' }}</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('favicon-48x48.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <meta name="theme-color" content="#143823">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- AlpineJS for interactive components (Optional, let's use standard light JS to keep it simple, lightweight and fast) -->
</head>
<body class="bg-bg-base text-charcoal antialiased selection:bg-leaf-green selection:text-white">

    <!-- Global Header -->
    <header class="sticky top-0 z-50 glassmorphism transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group flex-shrink-0 mr-4">
                <img src="{{ asset('images/logopanjang.png') }}" alt="AGRONEX NUSANTARA Logo" class="h-8 object-contain group-hover:scale-102 transition-transform duration-300">

            </a>

            <!-- Navigation Links (Simple, Clean, Professional) -->
            <nav class="hidden lg:flex items-center space-x-7 font-semibold text-[13px] tracking-wide text-forest/90">
                <!-- Tentang / Problem & Solution -->
                <a href="{{ route('home') }}#problem" class="hover:text-leaf-green transition-colors duration-200">{{ app()->getLocale() === 'en' ? 'About' : 'Tentang' }}</a>

                <!-- Produk -->
                <a href="{{ route('products.index') }}" class="hover:text-leaf-green transition-colors duration-200 {{ request()->routeIs('products.index') ? 'text-leaf-green font-bold' : '' }}">{{ app()->getLocale() === 'en' ? 'Products' : 'Produk' }}</a>

                <!-- Teknologi & Cara Kerja -->
                <a href="{{ route('home') }}#how-it-works" class="hover:text-leaf-green transition-colors duration-200">{{ app()->getLocale() === 'en' ? 'Technology' : 'Teknologi' }}</a>

                <!-- Validasi Lapangan -->
                <a href="{{ route('home') }}#validation" class="hover:text-leaf-green transition-colors duration-200">{{ app()->getLocale() === 'en' ? 'Validation' : 'Validasi' }}</a>

                <!-- More Dropdown (Simple) -->
                <div class="relative group py-2">
                    <button class="flex items-center space-x-1 hover:text-leaf-green transition-colors duration-200 focus:outline-none">
                        <span>{{ app()->getLocale() === 'en' ? 'Explore' : 'Eksplorasi' }}</span>
                        <svg class="w-3.5 h-3.5 transform group-hover:rotate-180 transition-transform duration-200 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="absolute top-full right-0 hidden group-hover:block w-52 bg-white border border-sand/40 rounded-2xl shadow-xl py-2 z-50 text-xs text-charcoal font-sans">
                        <a href="{{ route('home') }}#business-model" class="block px-4 py-2 hover:bg-primary-cream/40 hover:text-leaf-green transition-colors font-medium">
                            {{ app()->getLocale() === 'en' ? 'Business Model' : 'Model Bisnis' }}
                        </a>
                        <a href="{{ route('home') }}#impact" class="block px-4 py-2 hover:bg-primary-cream/40 hover:text-leaf-green transition-colors font-medium">
                            {{ app()->getLocale() === 'en' ? 'Impact & Sustainability' : 'Dampak & Keberlanjutan' }}
                        </a>
                        <a href="{{ route('home') }}#stories" class="block px-4 py-2 hover:bg-primary-cream/40 hover:text-leaf-green transition-colors font-medium">
                            {{ app()->getLocale() === 'en' ? 'Field Story' : 'Kisah Lapangan' }}
                        </a>
                        <a href="{{ route('home') }}#roadmap" class="block px-4 py-2 hover:bg-primary-cream/40 hover:text-leaf-green transition-colors font-medium">
                            {{ app()->getLocale() === 'en' ? 'Roadmap' : 'Peta Jalan' }}
                        </a>
                        <a href="{{ route('home') }}#team" class="block px-4 py-2 hover:bg-primary-cream/40 hover:text-leaf-green transition-colors font-medium">
                            {{ app()->getLocale() === 'en' ? 'Official Team' : 'Tim Pengembang' }}
                        </a>
                        <div class="border-t border-sand/40 my-1"></div>
                        <a href="{{ route('knowledge') }}" class="block px-4 py-2 hover:bg-primary-cream/40 hover:text-leaf-green transition-colors font-medium">
                            {{ app()->getLocale() === 'en' ? 'Knowledge Hub' : 'Pusat Pengetahuan' }}
                        </a>
                        <a href="{{ route('journey') }}" class="block px-4 py-2 hover:bg-primary-cream/40 hover:text-leaf-green transition-colors font-medium">
                            {{ app()->getLocale() === 'en' ? 'Our Journey' : 'Perjalanan Kami' }}
                        </a>
                        <a href="{{ route('credibility') }}" class="block px-4 py-2 hover:bg-primary-cream/40 hover:text-leaf-green transition-colors font-medium">
                            {{ app()->getLocale() === 'en' ? 'Credibility & HAKI' : 'Kredibilitas & HAKI' }}
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Actions -->
            <div class="hidden lg:flex items-center space-x-3 flex-shrink-0 ml-4">
                <!-- Language Selector Toggle -->
                <div class="flex items-center border border-sand bg-white/40 backdrop-blur rounded-full p-0.5 shadow-sm">
                    <a href="{{ route('set-locale', 'id') }}" class="px-2.5 py-1 text-[10px] font-bold rounded-full transition-colors {{ app()->getLocale() === 'id' ? 'bg-forest text-primary-cream' : 'text-forest hover:bg-primary-cream/40' }}">ID</a>
                    <a href="{{ route('set-locale', 'en') }}" class="px-2.5 py-1 text-[10px] font-bold rounded-full transition-colors {{ app()->getLocale() === 'en' ? 'bg-forest text-primary-cream' : 'text-forest hover:bg-primary-cream/40' }}">EN</a>
                </div>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 rounded-full text-xs font-semibold bg-forest text-primary-cream hover:bg-forest-dark shadow-sm transition-all">{{ app()->getLocale() === 'en' ? 'Admin Panel' : 'Panel Admin' }}</a>
                    @elseif(auth()->user()->role === 'penulis')
                        <a href="{{ route('writer.dashboard') }}" class="px-4 py-2 rounded-full text-xs font-semibold bg-leaf-green text-white hover:bg-forest transition-all">{{ app()->getLocale() === 'en' ? 'Writer Panel' : 'Panel Penulis' }}</a>
                    @endif
                @else
                    <a href="{{ route('home') }}#contact" class="px-5 py-2.5 rounded-full text-xs font-bold bg-forest text-primary-cream hover:bg-forest-dark shadow-sm transition-all duration-200">{{ app()->getLocale() === 'en' ? 'Partner With Us' : 'Bermitra dengan Kami' }}</a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden p-2 text-forest focus:outline-none" aria-label="Toggle menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation Dropdown (Simple & Clean) -->
        <div id="mobile-menu" class="hidden lg:hidden bg-bg-base border-b border-sand px-6 py-4 space-y-2 shadow-inner">
            <!-- Language Selector for Mobile -->
            <div class="flex items-center justify-between pb-2 border-b border-sand">
                <span class="text-xs font-semibold text-forest">{{ app()->getLocale() === 'en' ? 'Language:' : 'Bahasa:' }}</span>
                <div class="flex items-center border border-sand bg-white/40 rounded-full p-0.5 shadow-sm">
                    <a href="{{ route('set-locale', 'id') }}" class="px-3 py-1 text-[10px] font-bold rounded-full transition-colors {{ app()->getLocale() === 'id' ? 'bg-forest text-primary-cream' : 'text-forest' }}">ID</a>
                    <a href="{{ route('set-locale', 'en') }}" class="px-3 py-1 text-[10px] font-bold rounded-full transition-colors {{ app()->getLocale() === 'en' ? 'bg-forest text-primary-cream' : 'text-forest' }}">EN</a>
                </div>
            </div>
            <a href="{{ route('home') }}#problem" class="block text-sm font-medium text-forest hover:text-leaf-green py-1.5">{{ app()->getLocale() === 'en' ? 'About' : 'Tentang' }}</a>
            <a href="{{ route('products.index') }}" class="block text-sm font-medium text-forest hover:text-leaf-green py-1.5 {{ request()->routeIs('products.index') ? 'text-leaf-green font-bold' : '' }}">{{ app()->getLocale() === 'en' ? 'Products' : 'Produk' }}</a>
            <a href="{{ route('home') }}#how-it-works" class="block text-sm font-medium text-forest hover:text-leaf-green py-1.5">{{ app()->getLocale() === 'en' ? 'Technology' : 'Teknologi' }}</a>
            <a href="{{ route('home') }}#validation" class="block text-sm font-medium text-forest hover:text-leaf-green py-1.5">{{ app()->getLocale() === 'en' ? 'Field Validation' : 'Validasi Lapangan' }}</a>
            <a href="{{ route('home') }}#business-model" class="block text-sm font-medium text-forest hover:text-leaf-green py-1.5">{{ app()->getLocale() === 'en' ? 'Business Model' : 'Model Bisnis' }}</a>
            <a href="{{ route('knowledge') }}" class="block text-sm font-medium text-forest hover:text-leaf-green py-1.5">{{ app()->getLocale() === 'en' ? 'Knowledge Hub' : 'Pusat Pengetahuan' }}</a>
            <a href="{{ route('journey') }}" class="block text-sm font-medium text-forest hover:text-leaf-green py-1.5">{{ app()->getLocale() === 'en' ? 'Our Journey' : 'Perjalanan Kami' }}</a>
            <hr class="border-sand">
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="block text-center px-4 py-2 rounded-xl text-xs font-semibold bg-forest text-white">{{ app()->getLocale() === 'en' ? 'Admin Dashboard' : 'Dashboard Admin' }}</a>
                @else
                    <a href="{{ route('writer.dashboard') }}" class="block text-center px-4 py-2 rounded-xl text-xs font-semibold bg-leaf-green text-white">{{ app()->getLocale() === 'en' ? 'Writer Dashboard' : 'Dashboard Penulis' }}</a>
                @endif
            @else
                <a href="{{ route('home') }}#contact" class="block text-center px-4 py-2.5 rounded-xl text-xs font-bold bg-forest text-primary-cream">{{ app()->getLocale() === 'en' ? 'Partner With Us' : 'Bermitra dengan Kami' }}</a>
            @endauth
        </div>
    </header>

    <!-- Main Content Area -->
    <main>
        @yield('content')
    </main>

    <!-- Global Footer -->
    <footer class="bg-primary-cream border-t border-sand pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-12 gap-10 mb-12">
            <!-- Brand Info -->
            <div class="md:col-span-4 space-y-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <img src="{{ asset('images/logopanjang.png') }}" alt="AGRONEX NUSANTARA Logo" class="h-9 object-contain">
                </a>
                <p class="text-xs font-semibold text-forest leading-snug">
                    "From Field Signals to Smarter, Climate-Resilient Agriculture."
                </p>
                <p class="text-xs text-charcoal/70 leading-relaxed">
                    {{ app()->getLocale() === 'en' 
                        ? 'AGRONEX helps farmers and agricultural partners make better decisions by bridging real ground data, AI, market signals, and hands-on field assistance.' 
                        : 'AGRONEX membantu petani dan mitra pertanian mengambil keputusan yang lebih tepat dengan menghubungkan data nyata dari lahan, AI, informasi pasar, dan pendampingan lapangan.' 
                    }}
                </p>
                <div class="text-[10px] text-forest/80 font-semibold space-y-2 pt-2 border-t border-sand/50">
                    <div class="flex items-center space-x-2">
                        <img src="https://yotainovasi.id/logotulisan.png" alt="YOTA INOVASI NUSANTARA Logo" class="h-4 object-contain">
                        <a href="https://yotainovasi.id/" target="_blank" class="uppercase tracking-wider hover:text-leaf-green">Part of PT Yota Inovasi Nusantara</a>
                    </div>
                    <div class="flex items-center space-x-2">
                        <img src="https://siyota.org/image/logo.png" alt="YOTA ADIWIDYA CENTER Logo" class="h-4 object-contain">
                        <a href="https://siyota.org/" target="_blank" class="uppercase tracking-wider hover:text-leaf-green font-display">Official Partner YOTA ADIWIDYA CENTER</a>
                    </div>
                </div>
            </div>

            <!-- Links Column 1: Ecosystem & Products -->
            <div class="md:col-span-3">
                <h4 class="font-bold text-xs text-forest uppercase tracking-widest mb-4">{{ app()->getLocale() === 'en' ? 'Core Architecture' : 'Arsitektur Inti' }}</h4>
                <ul class="space-y-2.5 text-xs font-medium text-charcoal/80">
                    <li><a href="{{ route('products.index') }}" class="font-bold text-leaf-green hover:underline">{{ app()->getLocale() === 'en' ? 'Store & Product Bundles' : 'Katalog & Toko Produk' }}</a></li>
                    <li><a href="{{ route('home') }}#problem" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? 'The Problem' : 'Masalah Ketidakpastian' }}</a></li>
                    <li><a href="{{ route('home') }}#solution" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? 'System Solution' : 'Solusi & Alur Kerja' }}</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? '01 Field Sensing (SoilSense & Terra)' : '01 Field Sensing (SoilSense & Terra)' }}</a></li>
                    <li><a href="{{ route('home') }}#how-it-works" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? '02 AgroPredict Engine & Intelligence' : '02 AgroPredict Engine & Intelligence' }}</a></li>
                    <li><a href="{{ route('home') }}#how-it-works" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? '03 Advisory (WhatsApp & Mobile)' : '03 Advisory (WhatsApp & Mobile)' }}</a></li>
                    <li><a href="{{ route('home') }}#how-it-works" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? '04 Action (Smart Irrigation)' : '04 Action (Irigasi Cerdas)' }}</a></li>
                </ul>
            </div>

            <!-- Links Column 2: Validation & Business -->
            <div class="md:col-span-3">
                <h4 class="font-bold text-xs text-forest uppercase tracking-widest mb-4">{{ app()->getLocale() === 'en' ? 'Validation & Trust' : 'Validasi & Kepercayaan' }}</h4>
                <ul class="space-y-2.5 text-xs font-medium text-charcoal/80">
                    <li><a href="{{ route('home') }}#validation" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? 'Field Validation Timeline' : 'Kronologi Validasi Lapangan' }}</a></li>
                    <li><a href="{{ route('home') }}#stories" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? 'Field Story: Ibu Karminah' : 'Kisah Lapangan: Ibu Karminah' }}</a></li>
                    <li><a href="{{ route('home') }}#business-model" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? 'Sustainable Business Model' : 'Model Bisnis Berkelanjutan' }}</a></li>
                    <li><a href="{{ route('home') }}#impact" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? 'Triple Bottom Line Impact' : 'Dampak Sosial & Lingkungan' }}</a></li>
                    <li><a href="{{ route('home') }}#haki" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? 'Intellectual Property (HAKI)' : 'Kekayaan Intelektual (HAKI)' }}</a></li>
                    <li><a href="{{ route('home') }}#team" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? 'Official Pitch Team' : 'Tim Pengembang Resmi' }}</a></li>
                </ul>
            </div>

            <!-- Links Column 3: Resources & External -->
            <div class="md:col-span-2">
                <h4 class="font-bold text-xs text-forest uppercase tracking-widest mb-4">{{ app()->getLocale() === 'en' ? 'Resources' : 'Pusat Akses' }}</h4>
                <ul class="space-y-2.5 text-xs font-medium text-charcoal/80">
                    <li><a href="{{ route('knowledge') }}" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? 'Knowledge Hub' : 'Pusat Pengetahuan' }}</a></li>
                    <li><a href="{{ route('journey') }}" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? 'Our Journey' : 'Perjalanan Kami' }}</a></li>
                    <li><a href="{{ route('credibility') }}" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? 'Credibility & Awards' : 'Kredibilitas & Penghargaan' }}</a></li>
                    <li><a href="{{ route('esg') }}" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? 'ESG Dashboard' : 'Dashboard ESG' }}</a></li>
                    <li><a href="{{ route('investors') }}" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? 'Investor Relations' : 'Hubungan Investor' }}</a></li>
                    <li><a href="{{ route('home') }}#contact" class="hover:text-leaf-green">{{ app()->getLocale() === 'en' ? 'Partner With Us' : 'Bermitra dengan Kami' }}</a></li>
                </ul>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 border-t border-sand/60 pt-6 flex flex-col md:flex-row justify-between items-center text-[10px] text-charcoal/60 space-y-4 md:space-y-0">
            <div class="space-y-0.5 text-left">
                <p class="font-bold text-forest">&copy; 2026 AGRONEX NUSANTARA. Ekosistem Agritech Berbasis Dampak untuk Indonesia.</p>
                <p class="text-[9px] text-charcoal/60">HAKI Hak Cipta EC002026124181 &bull; EC002026184233 &bull; DJKI Kementerian Hukum Republik Indonesia</p>
                <p class="text-[9px] text-charcoal/50">Legally represented by PT Yota Inovasi Nusantara &bull; Partnered with YOTA Adiwidya Center</p>
            </div>
            <div class="flex space-x-6">
                <span class="text-leaf-green font-semibold">"Teknologi rumit di belakang. Keputusan sederhana di depan."</span>
            </div>
        </div>
    </footer>

    <!-- Global JS helpers -->
    <script>
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>
