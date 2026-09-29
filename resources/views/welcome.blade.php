@extends('layouts.public')

@section('content')
<!-- HERO SECTION -->
<section class="relative min-h-screen flex flex-col justify-between bg-gradient-to-b from-primary-cream via-primary-cream/60 to-bg-base overflow-hidden pt-24 pb-12">
    <!-- Canvas Particle Background -->
    <canvas id="hero-canvas" class="absolute inset-0 w-full h-full pointer-events-none z-0"></canvas>

    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10 my-auto">
        <!-- Hero Texts -->
        <div class="lg:col-span-7 space-y-6">
            <!-- Eyebrow -->
            <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-forest/5 border border-forest/15 text-xs font-bold text-forest uppercase tracking-widest">
                <span class="w-2 h-2 rounded-full bg-leaf-green animate-pulse"></span>
                <span>LIVING AGRITECH ECOSYSTEM</span>
            </div>
            
            <!-- Headline -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-forest leading-[1.12] font-display">
                {!! nl2br(e(trans_db($settings['hero_headline'] ?? "Keputusan pertanian\ndimulai dari apa yang\nterjadi di lahan."))) !!}
            </h1>
            
            <!-- Subheadline -->
            <p class="text-base sm:text-lg text-charcoal/85 max-w-xl font-normal leading-relaxed">
                {{ trans_db($settings['hero_subheadline'] ?? 'AGRONEX menghubungkan data tanah, air, iklim, dan pasar dengan AI untuk membantu petani mengambil keputusan yang lebih tepat — dari lahan hingga pasar.') }}
            </p>

            <!-- Small line -->
            <p class="text-xs font-semibold text-leaf-green tracking-wide">
                &ldquo;{{ trans_db($settings['main_positioning'] ?? 'From Field Signals to Smarter, Climate-Resilient Agriculture.') }}&rdquo;
            </p>
            
            <!-- CTAs -->
            <div class="flex flex-wrap items-center gap-4 pt-2">
                <a href="#products" class="px-8 py-3.5 bg-forest text-primary-cream hover:bg-forest-dark font-bold text-xs uppercase tracking-wider rounded-full shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
                    {{ trans_db($settings['hero_cta_explore'] ?? 'Jelajahi Produk') }}
                </a>
                <a href="#validation" class="px-8 py-3.5 bg-white border border-sand hover:border-leaf-green text-forest hover:bg-primary-cream font-bold text-xs uppercase tracking-wider rounded-full shadow-sm hover:shadow transition-all duration-300 transform hover:-translate-y-0.5">
                    {{ trans_db($settings['hero_cta_demo'] ?? 'Lihat Validasi Lapangan') }}
                </a>
            </div>
        </div>

        <!-- Authentic Field Photograph Hero Visual -->
        <div class="lg:col-span-5 flex justify-center items-center relative">
            <div class="relative w-full max-w-[440px] aspect-square rounded-3xl overflow-hidden border border-sand/60 bg-white shadow-2xl group">
                <!-- Authentic Field Photograph with AGRONEX Team, Farmers, and Sensors -->
                <img src="{{ asset('konten/fotoutama.JPG') }}" alt="AGRONEX Field Testing with Farmers" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-102">
                
                <div class="absolute inset-0 bg-gradient-to-t from-forest/85 via-forest/20 to-transparent flex flex-col justify-end p-6">
                    <span class="text-[10px] font-bold text-fresh-lime uppercase tracking-widest font-mono">DOKUMENTASI LAPANGAN ASLI</span>
                    <h3 class="text-base font-bold text-white font-display mt-0.5">Validasi Lahan Bersama Petani Hortikultura</h3>
                    <p class="text-[11px] text-white/80 mt-1 leading-snug">Jawa Barat &bull; Pengukuran kondisi tanah, kelembapan, dan kalibrasi sensor di lahan riil.</p>
                </div>

                <div class="absolute top-4 right-4 px-3 py-1 bg-white/90 backdrop-blur-md rounded-full border border-sand/40 text-[9px] font-bold text-forest uppercase tracking-wider shadow-sm">
                    Field Tested &bull; 2026
                </div>
            </div>
        </div>
    </div>

    <!-- Live Counters Footer Section (from Database: impacts) -->
    <div class="border-t border-sand/40 bg-white/60 backdrop-blur-sm py-6 relative z-10 mt-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 text-center divide-x-0 md:divide-x divide-sand/40">
                @foreach($impacts as $stat)
                <div class="px-4">
                    <div class="text-2xl md:text-3xl font-extrabold text-forest font-display live-counter" data-target="{{ preg_replace('/[^0-9]/', '', trans_db($stat->value)) }}">
                        {{ trans_db($stat->value) }}
                    </div>
                    <div class="text-[10px] font-bold text-charcoal/60 uppercase tracking-widest mt-1">
                        {{ trans_db($stat->label) }}
                    </div>
                    <span class="inline-block mt-1 px-2 py-0.5 rounded-full text-[8px] font-bold uppercase tracking-wider {{ str_contains(trans_db($stat->label), 'Efisiensi') || str_contains(trans_db($stat->label), 'Observasi') ? 'bg-amber-100 text-amber-800' : 'bg-leaf-green/10 text-leaf-green' }}">
                        {{ str_contains(trans_db($stat->label), 'Efisiensi') || str_contains(trans_db($stat->label), 'Observasi') ? 'OBSERVED' : 'VALIDATED' }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- IMMEDIATELY BELOW HERO: 5-STEP CORE PIPELINE -->
<section class="py-16 bg-white border-b border-sand/30">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-10 space-y-3">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Alur Logika Inti &bull; Core Pipeline</span>
            <p class="text-xl sm:text-2xl font-bold font-display text-forest">
                &ldquo;AGRONEX mengubah sinyal dari lahan menjadi keputusan yang dapat ditindaklanjuti.&rdquo;
            </p>
            <p class="text-xs text-charcoal/70">
                {{ trans_db($settings['core_principle'] ?? 'Teknologi rumit di belakang. Keputusan sederhana di depan.') }}
            </p>
        </div>

        <!-- Visual Flow: FIELD -> DATA -> INTELLIGENCE -> DECISION -> ACTION -->
        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-5 gap-4 relative">
            <!-- 01 FIELD / UKUR -->
            <div class="p-6 rounded-2xl bg-primary-cream/30 border border-sand/40 text-center space-y-2 hover-lift group">
                <span class="w-8 h-8 rounded-full bg-forest/10 text-forest text-xs font-bold font-mono inline-flex items-center justify-center">01</span>
                <h4 class="font-extrabold text-forest font-display text-sm tracking-wide">FIELD</h4>
                <p class="text-[11px] font-semibold text-leaf-green uppercase tracking-wider">UKUR &bull; Measure</p>
                <p class="text-xs text-charcoal/70 leading-relaxed pt-1">Membaca sinyal tanah, air, iklim mikro, dan tanaman secara objektif di lahan.</p>
            </div>

            <!-- 02 DATA -->
            <div class="p-6 rounded-2xl bg-primary-cream/30 border border-sand/40 text-center space-y-2 hover-lift group">
                <span class="w-8 h-8 rounded-full bg-forest/10 text-forest text-xs font-bold font-mono inline-flex items-center justify-center">02</span>
                <h4 class="font-extrabold text-forest font-display text-sm tracking-wide">DATA</h4>
                <p class="text-[11px] font-semibold text-leaf-green uppercase tracking-wider">HIMPUN &bull; Telemetry</p>
                <p class="text-xs text-charcoal/70 leading-relaxed pt-1">Transmisi telemetri nirkabel terenkripsi aman langsung ke server komputasi awan.</p>
            </div>

            <!-- 03 INTELLIGENCE / PAHAMI -->
            <div class="p-6 rounded-2xl bg-forest/5 border border-forest/20 text-center space-y-2 hover-lift group">
                <span class="w-8 h-8 rounded-full bg-forest text-primary-cream text-xs font-bold font-mono inline-flex items-center justify-center">03</span>
                <h4 class="font-extrabold text-forest font-display text-sm tracking-wide">INTELLIGENCE</h4>
                <p class="text-[11px] font-semibold text-forest uppercase tracking-wider">PAHAMI &bull; Understand</p>
                <p class="text-xs text-charcoal/70 leading-relaxed pt-1">AgroPredict Engine memproses data tanah, satelit, cuaca, dan harga pasar.</p>
            </div>

            <!-- 04 DECISION / PUTUSKAN -->
            <div class="p-6 rounded-2xl bg-primary-cream/30 border border-sand/40 text-center space-y-2 hover-lift group">
                <span class="w-8 h-8 rounded-full bg-forest/10 text-forest text-xs font-bold font-mono inline-flex items-center justify-center">04</span>
                <h4 class="font-extrabold text-forest font-display text-sm tracking-wide">DECISION</h4>
                <p class="text-[11px] font-semibold text-leaf-green uppercase tracking-wider">PUTUSKAN &bull; Decide</p>
                <p class="text-xs text-charcoal/70 leading-relaxed pt-1">Rekomendasi sederhana via WhatsApp dan mobile tanpa angka rumit.</p>
            </div>

            <!-- 05 ACTION / TINDAK -->
            <div class="p-6 rounded-2xl bg-leaf-green/10 border border-leaf-green/30 text-center space-y-2 hover-lift group">
                <span class="w-8 h-8 rounded-full bg-leaf-green text-white text-xs font-bold font-mono inline-flex items-center justify-center">05</span>
                <h4 class="font-extrabold text-forest font-display text-sm tracking-wide">ACTION</h4>
                <p class="text-[11px] font-semibold text-leaf-green uppercase tracking-wider">TINDAK &bull; Act</p>
                <p class="text-xs text-charcoal/70 leading-relaxed pt-1">Otomasi irigasi cerdas bertenaga surya dan keputusan pemasaran terukur.</p>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: THE PROBLEM (FROM DATABASE: challenges) -->
<section id="problem" class="py-24 bg-bg-base border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Tantangan Pertanian &bull; The Problem</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">
                Masalah pertanian bukan hanya produksi.<br>
                Masalahnya adalah ketidakpastian.
            </h2>
            <p class="text-sm text-charcoal/75">
                Pertanian tidak diselesaikan di atas kertas atau teori semata. Kami memotret tiga ketidakpastian mendasar yang dialami petani setiap hari.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($challenges as $challenge)
            <div class="bg-white border border-sand/40 rounded-3xl p-6 shadow-sm hover-lift flex flex-col justify-between space-y-5">
                <div class="space-y-4">
                    <div class="w-full aspect-[4/3] rounded-2xl overflow-hidden border border-sand/30 bg-primary-cream/30">
                        <img src="{{ asset($challenge->icon) }}" alt="{{ trans_db($challenge->title) }}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex items-center space-x-2.5">
                        <span class="px-2.5 py-0.5 rounded-md bg-forest/10 text-forest text-[11px] font-bold font-mono">0{{ $loop->iteration }}</span>
                        <h3 class="font-extrabold text-base text-forest font-display">{{ trans_db($challenge->title) }}</h3>
                    </div>
                    <p class="text-xs text-charcoal/80 leading-relaxed">
                        {{ trans_db($challenge->description) }}
                    </p>
                </div>
                <div class="pt-3 border-t border-sand/30 text-[10px] text-charcoal/60 font-semibold uppercase tracking-wider">
                    @if($loop->iteration === 1)
                        Dampak: Risiko pemborosan pupuk &amp; penurunan produktivitas
                    @elseif($loop->iteration === 2)
                        Dampak: Kerusakan struktur tanah &amp; pemborosan air
                    @else
                        Dampak: Panen terpaksa dilepas murah karena biaya mendesak
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- SECTION: WHAT AGRONEX DOES -->
<section id="solution" class="py-24 bg-white border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Solusi Ekosistem &bull; What AGRONEX Does</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">
                AGRONEX menghubungkan lahan, data, dan keputusan.
            </h2>
            <p class="text-sm text-charcoal/75 leading-relaxed">
                Menyatukan empat pilar utama &mdash; Field Sensing, Intelligence, Advisory, dan Action &mdash; dalam satu siklus tertutup yang saling memperkuat.
            </p>
        </div>

        <!-- Clean Systematic Diagram -->
        <div class="max-w-4xl mx-auto space-y-4">
            <!-- Node 1: FIELD -->
            <div class="p-6 rounded-2xl bg-primary-cream/35 border border-sand/50 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="space-y-1">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-leaf-green font-mono">01 &bull; SUMBER FISIK</span>
                    <h3 class="font-extrabold text-lg text-forest font-display">FIELD (Lahan)</h3>
                    <p class="text-xs text-charcoal/70">Parameter nyata dari objek pertanian di lapangan.</p>
                </div>
                <div class="flex flex-wrap gap-2 text-xs font-semibold">
                    <span class="px-3 py-1 bg-white border border-sand rounded-full text-forest">Tanah (Soil)</span>
                    <span class="px-3 py-1 bg-white border border-sand rounded-full text-forest">Air (Water)</span>
                    <span class="px-3 py-1 bg-white border border-sand rounded-full text-forest">Lingkungan (Environment)</span>
                    <span class="px-3 py-1 bg-white border border-sand rounded-full text-forest">Tanaman (Crop)</span>
                </div>
            </div>

            <!-- Down Arrow -->
            <div class="flex justify-center text-leaf-green">
                <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
            </div>

            <!-- Node 2: AGRONEX DATA -->
            <div class="p-6 rounded-2xl bg-primary-cream/35 border border-sand/50 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="space-y-1">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-leaf-green font-mono">02 &bull; TELEMETRI &amp; DATA</span>
                    <h3 class="font-extrabold text-lg text-forest font-display">AGRONEX DATA</h3>
                    <p class="text-xs text-charcoal/70">Transmisi data telemetri nirkabel terenkripsi aman secara kontinu.</p>
                </div>
                <div class="flex flex-wrap gap-2 text-xs font-semibold">
                    <span class="px-3 py-1 bg-white border border-sand rounded-full text-forest">Sensor Log</span>
                    <span class="px-3 py-1 bg-white border border-sand rounded-full text-forest">LoRa / GSM</span>
                    <span class="px-3 py-1 bg-white border border-sand rounded-full text-forest">Cloud Ingestion</span>
                </div>
            </div>

            <!-- Down Arrow -->
            <div class="flex justify-center text-leaf-green">
                <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
            </div>

            <!-- Node 3: INTELLIGENCE -->
            <div class="p-6 rounded-2xl bg-forest/5 border border-forest/20 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="space-y-1">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-leaf-green font-mono">03 &bull; PUSAT KECERDASAN</span>
                    <h3 class="font-extrabold text-lg text-forest font-display">INTELLIGENCE</h3>
                    <p class="text-xs text-charcoal/70">Mengkorelasikan data lapangan, citra spasial, dan informasi pasar.</p>
                </div>
                <div class="flex flex-wrap gap-2 text-xs font-semibold">
                    <span class="px-3 py-1 bg-white border border-forest/20 rounded-full text-forest">AgroPredict Engine</span>
                    <span class="px-3 py-1 bg-white border border-forest/20 rounded-full text-forest">Satellite &amp; GIS</span>
                    <span class="px-3 py-1 bg-white border border-forest/20 rounded-full text-forest">Climate Models</span>
                    <span class="px-3 py-1 bg-white border border-forest/20 rounded-full text-forest">Market Intelligence</span>
                </div>
            </div>

            <!-- Down Arrow -->
            <div class="flex justify-center text-leaf-green">
                <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
            </div>

            <!-- Node 4: ADVISORY -->
            <div class="p-6 rounded-2xl bg-primary-cream/35 border border-sand/50 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="space-y-1">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-leaf-green font-mono">04 &bull; KANAL INFORMASI</span>
                    <h3 class="font-extrabold text-lg text-forest font-display">ADVISORY (Rekomendasi)</h3>
                    <p class="text-xs text-charcoal/70">Disampaikan melalui saluran yang mudah dipahami petani.</p>
                </div>
                <div class="flex flex-wrap gap-2 text-xs font-semibold">
                    <span class="px-3 py-1 bg-white border border-sand rounded-full text-forest">WhatsApp Alerts</span>
                    <span class="px-3 py-1 bg-white border border-sand rounded-full text-forest">Mobile Application</span>
                    <span class="px-3 py-1 bg-white border border-sand rounded-full text-forest">Web Dashboard</span>
                </div>
            </div>

            <!-- Down Arrow -->
            <div class="flex justify-center text-leaf-green">
                <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
            </div>

            <!-- Node 5: ACTION -->
            <div class="p-6 rounded-2xl bg-leaf-green/10 border border-leaf-green/30 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="space-y-1">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-leaf-green font-mono">05 &bull; TINDAKAN LAPANGAN</span>
                    <h3 class="font-extrabold text-lg text-forest font-display">ACTION (Tindakan)</h3>
                    <p class="text-xs text-charcoal/70">Implementasi nyata untuk hasil panen dan pendapatan yang optimal.</p>
                </div>
                <div class="flex flex-wrap gap-2 text-xs font-semibold">
                    <span class="px-3 py-1 bg-white border border-leaf-green/30 rounded-full text-forest">Irigasi Cerdas (Smart Irrigation)</span>
                    <span class="px-3 py-1 bg-white border border-leaf-green/30 rounded-full text-forest">Dosis Nutrisi Tepat</span>
                    <span class="px-3 py-1 bg-white border border-leaf-green/30 rounded-full text-forest">Keputusan Waktu Tanam</span>
                    <span class="px-3 py-1 bg-white border border-leaf-green/30 rounded-full text-forest">Peluang Pasar Langsung</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: PRODUCTS (FROM DATABASE: products) -->
<section id="products" class="py-24 bg-bg-base border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6 space-y-16">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div class="space-y-3">
                <span class="text-xs font-extrabold uppercase tracking-widest text-leaf-green">Katalog &amp; Penjualan Resmi Lapangan &bull; E-Commerce Ready</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">Produk &amp; Sensor AGRONEX</h2>
                <p class="text-sm text-charcoal/75 max-w-2xl leading-relaxed">
                    Instrumen telemetri teruji untuk membaca kondisi nyata lahan. Siap dipesan untuk petani mandiri, kelompok tani, maupun perusahaan agribisnis.
                </p>
            </div>
            
            <a href="{{ route('products.index') }}" class="inline-flex items-center space-x-2 px-6 py-3 rounded-full bg-forest text-primary-cream hover:bg-forest-dark font-extrabold text-xs uppercase tracking-wider shadow-md hover:shadow-lg transition-all flex-shrink-0">
                <span>Buka Katalog Produk</span>
                <span>&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            @foreach($products as $product)
            @php
                $translatedProduct = clone $product;
                $translatedProduct->name = trans_db($product->name);
                $translatedProduct->description = trans_db($product->description);
                $translatedProduct->features = trans_db($product->features);
                $translatedProduct->detail_content = trans_db($product->detail_content);

                $statusLabel = 'PROTOTYPE / FIELD TESTING';
                $categoryLabel = 'FIELD SENSING';
                if ($product->slug === 'watersense' || $product->slug === 'envirosense') {
                    $statusLabel = 'DEVELOPMENT / FIELD VALIDATION';
                } elseif ($product->slug === 'terra') {
                    $statusLabel = 'PROTOTYPE / DEVELOPMENT';
                    $categoryLabel = 'SOIL INTELLIGENCE';
                }

                $priceFormatted = $product->price ? number_format($product->price, 0, ',', '.') : null;
                $origPriceFormatted = $product->original_price ? number_format($product->original_price, 0, ',', '.') : null;
                $sku = $product->sku ?? ('AGX-' . strtoupper(substr($product->slug, 0, 4)));
                $badge = $product->badge ?? $categoryLabel;
                $hook = trans_db($product->hook ?? 'Investasi alat presisi yang balik modal dalam 1 siklus panen.');
            @endphp
            <div 
                class="bg-white border border-sand/40 hover:border-leaf-green rounded-3xl p-8 shadow-xs hover:shadow-xl transition-all duration-300 group flex flex-col justify-between space-y-6 relative overflow-hidden"
            >
                <div class="space-y-5">
                    <!-- Photo Header -->
                    <div class="w-full aspect-[16/9] rounded-2xl overflow-hidden border border-sand/40 bg-primary-cream/40 relative">
                        @if($product->image_path)
                            <img src="{{ asset($product->image_path) }}" class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-500" alt="{{ $translatedProduct->name }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-forest/5 text-forest font-bold font-display">
                                AGRONEX {{ $translatedProduct->name }}
                            </div>
                        @endif
                        <div class="absolute top-3 left-3 px-2.5 py-1 bg-forest text-primary-cream text-[9px] font-bold uppercase rounded-full font-mono shadow-sm">
                            {{ $badge }}
                        </div>
                        <div class="absolute top-3 right-3 px-2.5 py-1 bg-white/95 backdrop-blur-sm text-leaf-green border border-sand/50 text-[9px] font-bold uppercase rounded-full tracking-wider flex items-center space-x-1.5 shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-leaf-green"></span>
                            <span>Ready Stock</span>
                        </div>
                    </div>

                    <!-- Title & Rating -->
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between">
                            <span class="font-mono text-[10px] text-charcoal/50 uppercase font-semibold">SKU: {{ $sku }}</span>
                            <div class="text-charcoal/70 text-xs font-semibold">
                                <span>Rating: {{ $product->rating ?? '4.9' }}/5</span>
                                <span class="text-charcoal/40 text-[10px]">({{ $product->reviews_count ?? 40 }} ulasan)</span>
                            </div>
                        </div>

                        <h3 class="font-extrabold text-2xl text-forest font-display group-hover:text-leaf-green transition-colors">
                            {{ $translatedProduct->name }}
                        </h3>
                        <p class="text-xs text-charcoal/80 leading-relaxed font-light">
                            {{ $translatedProduct->description }}
                        </p>
                    </div>

                    <!-- Commercial Hook Callout -->
                    <div class="p-3 bg-primary-cream/40 rounded-2xl border border-sand/40 text-[11px] text-forest/90 italic font-medium leading-relaxed">
                        &ldquo;{{ $hook }}&rdquo;
                    </div>

                    <!-- Purpose & Parameters Badge -->
                    <div class="p-3 bg-bg-base rounded-xl border border-sand/30 space-y-1 text-xs text-charcoal/75">
                        @if($product->slug === 'soilsense')
                            <div class="flex items-center space-x-1.5">
                                <span class="font-bold text-forest text-[10px] uppercase">Penggunaan:</span>
                                <span>pH &bull; NPK &bull; Kelembapan Tanah</span>
                            </div>
                            <div class="text-[10px] text-leaf-green font-semibold flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-leaf-green inline-block mr-1.5 flex-shrink-0"></span>
                                <span>Terbukti menghemat pupuk kimia hingga 25% di lahan Garut</span>
                            </div>
                        @elseif($product->slug === 'watersense')
                            <div class="flex items-center space-x-1.5">
                                <span class="font-bold text-forest text-[10px] uppercase">Penggunaan:</span>
                                <span>Volumetrik Air &bull; Kualitas Air Irigasi</span>
                            </div>
                            <div class="text-[10px] text-leaf-green font-semibold flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-leaf-green inline-block mr-1.5 flex-shrink-0"></span>
                                <span>Mengurangi penyiraman berlebih &amp; mencegah busuk akar</span>
                            </div>
                        @elseif($product->slug === 'envirosense')
                            <div class="flex items-center space-x-1.5">
                                <span class="font-bold text-forest text-[10px] uppercase">Parameter:</span>
                                <span>Suhu &bull; Kelembapan Relatif &bull; Iklim Mikro</span>
                            </div>
                            <div class="text-[10px] text-leaf-green font-semibold flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-leaf-green inline-block mr-1.5 flex-shrink-0"></span>
                                <span>Peringatan dini risiko serangan hama &amp; jamur via WhatsApp</span>
                            </div>
                        @elseif($product->slug === 'hydrosense')
                            <div class="flex items-center space-x-1.5">
                                <span class="font-bold text-forest text-[10px] uppercase">Parameter:</span>
                                <span>EC / TDS &bull; pH Cairan &bull; Suhu &bull; Water Level</span>
                            </div>
                            <div class="text-[10px] text-leaf-green font-semibold flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-leaf-green inline-block mr-1.5 flex-shrink-0"></span>
                                <span>Otomasi pompa dosing pupuk AB Mix &amp; sirkulasi hidroponik presisi</span>
                            </div>
                        @elseif($product->slug === 'agrocore-cpu')
                            <div class="flex items-center space-x-1.5">
                                <span class="font-bold text-forest text-[10px] uppercase">Fungsi:</span>
                                <span>CPU Edge Gateway &bull; Modbus RS485 &bull; Relai Pompa</span>
                            </div>
                            <div class="text-[10px] text-leaf-green font-semibold flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-leaf-green inline-block mr-1.5 flex-shrink-0"></span>
                                <span>Otak kontrol sentral multi-sensor, integrasi katup solenoid &amp; pompa</span>
                            </div>
                        @elseif($product->slug === 'agrosolar-bundle')
                            <div class="flex items-center space-x-1.5">
                                <span class="font-bold text-forest text-[10px] uppercase">Paket Lapangan:</span>
                                <span>Panel Surya 15W + Tripod + SoilSense + LiFePO4</span>
                            </div>
                            <div class="text-[10px] text-leaf-green font-semibold flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-leaf-green inline-block mr-1.5 flex-shrink-0"></span>
                                <span>100% Portable &amp; Mandiri Energi, siap pasang tanpa kabel listrik PLN</span>
                            </div>
                        @elseif($product->slug === 'terra')
                            <div class="flex items-center space-x-1.5">
                                <span class="font-bold text-forest text-[10px] uppercase">Fungsi:</span>
                                <span>Soil Scanning Praktis &bull; Pemetaan Tanah Cepat</span>
                            </div>
                            <div class="text-[10px] text-leaf-green font-semibold flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-leaf-green inline-block mr-1.5 flex-shrink-0"></span>
                                <span>Uji kesuburan tanah 1 petak langsung di tempat dalam 3 menit</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Commercial Pricing & Order CTA -->
                <div class="pt-4 border-t border-sand/40 space-y-3">
                    <div class="flex items-baseline justify-between">
                        <div>
                            @if($origPriceFormatted)
                                <div class="text-[10px] text-charcoal/40 line-through">Rp {{ $origPriceFormatted }}</div>
                            @endif
                            <div class="flex items-baseline space-x-1">
                                <span class="text-xs text-charcoal/60 font-bold">Rp</span>
                                <span class="text-2xl font-black text-forest font-mono tracking-tight">{{ $priceFormatted ?? 'Hubungi Tim' }}</span>
                                <span class="text-[10px] text-charcoal/50">/ unit</span>
                            </div>
                        </div>

                        @if($product->subscription_price && $product->subscription_price > 0)
                            <div class="text-right">
                                <div class="text-[10px] text-charcoal/50">Skema Sewa</div>
                                <div class="text-xs font-bold text-leaf-green font-mono">Rp {{ number_format($product->subscription_price, 0, ',', '.') }}/bln</div>
                            </div>
                        @endif
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <a 
                            href="https://wa.me/{{ $settings['contact_whatsapp'] ?? '6285862319524' }}?text=Halo%20Tim%20Agronex,%20saya%20tertarik%20membeli%20perangkat%20{{ urlencode($translatedProduct->name) }}%20(SKU:%20{{ $sku }}).%20Mohon%20info%20ketersediaan%20stok%20dan%20cara%20pemesanannya." 
                            target="_blank"
                            class="py-2.5 bg-leaf-green hover:bg-leaf-green-dark text-white font-extrabold text-xs uppercase tracking-wider rounded-xl text-center shadow-xs hover:shadow-md transition-all flex items-center justify-center"
                        >
                            <span>Pesan via WA</span>
                        </a>

                        <button 
                            type="button"
                            onclick="openProductModal({{ json_encode($translatedProduct) }})"
                            class="py-2.5 bg-primary-cream/50 hover:bg-primary-cream text-forest border border-sand/60 font-bold text-xs rounded-xl transition-colors text-center"
                        >
                            Spesifikasi &rarr;
                        </button>
                    </div>

                    <div class="text-[9px] text-center text-charcoal/50">
                        {{ $product->warranty_info ?? 'Garansi Resmi 12 Bulan Ganti Baru' }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Promo Banner Bottom -->
        <div class="p-8 sm:p-10 rounded-3xl bg-forest text-primary-cream border border-forest-dark shadow-xl flex flex-col md:flex-row items-center justify-between gap-6 max-w-5xl mx-auto">
            <div class="space-y-2 text-center md:text-left">
                <span class="text-[10px] font-extrabold uppercase tracking-widest text-leaf-green-light">Hemat Biaya Hingga 30%</span>
                <h3 class="text-2xl font-bold font-display">Butuh Paket Lengkap dengan Instalasi &amp; Kalibrasi Lahan?</h3>
                <p class="text-xs text-primary-cream/80 max-w-xl leading-relaxed">
                    Dapatkan Paket Tani Mandiri (Starter Kit) atau Skema Kemitraan Poktan dengan cicilan ringan / bagi hasil panen.
                </p>
            </div>

            <a href="{{ route('products.index') }}#paket-bundle" class="px-8 py-3.5 bg-leaf-green hover:bg-leaf-green-dark text-white font-extrabold text-xs uppercase tracking-wider rounded-full shadow-lg hover:shadow-xl transition-all whitespace-nowrap">
                Lihat Paket Bundling &rarr;
            </a>
        </div>
    </div>
</section>

<!-- SECTION: AGRONEX INTELLIGENCE, ADVISORY, ACTION -->
<section id="how-it-works" class="py-24 bg-white border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6 space-y-24">
        
        <!-- PART 1: AGRONEX INTELLIGENCE -->
        <div class="space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Mesin Inteligensi &bull; AGRONEX Intelligence</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">Data tidak berhenti menjadi angka.</h2>
                <p class="text-sm text-charcoal/75 leading-relaxed">
                    AGRONEX Intelligence mengubah data lapangan menjadi informasi yang membantu keputusan budidaya dan distribusi.
                </p>
            </div>

            <!-- Architecture Logic: Ground Truth + Satellite + Climate + Market -> Intelligence -> Recommendation -->
            <div class="p-8 sm:p-10 rounded-3xl bg-primary-cream/35 border border-sand/50 shadow-sm max-w-5xl mx-auto space-y-8">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
                    <div class="p-4 rounded-2xl bg-white border border-sand/40">
                        <span class="text-[9px] font-bold text-leaf-green uppercase tracking-wider block">Input 01</span>
                        <h4 class="font-bold text-forest text-sm mt-1">Ground Truth</h4>
                        <p class="text-[11px] text-charcoal/60 mt-1">Sensor tanah riil</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-sand/40">
                        <span class="text-[9px] font-bold text-leaf-green uppercase tracking-wider block">Input 02</span>
                        <h4 class="font-bold text-forest text-sm mt-1">Satellite &amp; GIS</h4>
                        <p class="text-[11px] text-charcoal/60 mt-1">Citra Sentinel &amp; vegetasi</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-sand/40">
                        <span class="text-[9px] font-bold text-leaf-green uppercase tracking-wider block">Input 03</span>
                        <h4 class="font-bold text-forest text-sm mt-1">Climate Data</h4>
                        <p class="text-[11px] text-charcoal/60 mt-1">Iklim mikro &amp; perkiraan</p>
                    </div>
                    <div class="p-4 rounded-2xl bg-white border border-sand/40">
                        <span class="text-[9px] font-bold text-leaf-green uppercase tracking-wider block">Input 04</span>
                        <h4 class="font-bold text-forest text-sm mt-1">Market Intel</h4>
                        <p class="text-[11px] text-charcoal/60 mt-1">Harga komoditas pasar</p>
                    </div>
                </div>

                <div class="flex justify-center text-leaf-green">
                    <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                </div>

                <!-- Center Box: AgroPredict Engine & Modules -->
                <div class="p-6 rounded-2xl bg-forest text-primary-cream text-center space-y-4">
                    <span class="px-3 py-1 rounded-full bg-leaf-green/20 text-fresh-lime text-[10px] font-bold uppercase tracking-widest font-mono">
                        INTELLIGENCE ENGINE
                    </span>
                    <h3 class="text-2xl font-extrabold font-display">AgroPredict Engine &bull; Edge AI</h3>
                    <p class="text-xs text-primary-cream/80 max-w-2xl mx-auto leading-relaxed">
                        AgroPredict Engine membantu membaca pola harga, permintaan, dan peluang pasar untuk mendukung keputusan distribusi dan business matching secara transparan.
                    </p>
                    <div class="flex flex-wrap justify-center gap-2 pt-2 text-[11px] font-semibold text-primary-cream/90">
                        <span class="px-3 py-1 bg-white/10 rounded-full">AgroPredict Engine</span>
                        <span class="px-3 py-1 bg-white/10 rounded-full">Edge AI</span>
                        <span class="px-3 py-1 bg-white/10 rounded-full">GIS Analysis</span>
                        <span class="px-3 py-1 bg-white/10 rounded-full">Satellite Telemetry</span>
                        <span class="px-3 py-1 bg-white/10 rounded-full">Market Intelligence</span>
                        <span class="px-3 py-1 bg-amber-500/20 text-amber-200 border border-amber-400/30 rounded-full">Plant AR (Advanced / Future)</span>
                    </div>
                </div>

                <div class="flex justify-center text-leaf-green">
                    <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                </div>

                <!-- Recommendation Output -->
                <div class="p-6 rounded-2xl bg-white border border-sand/50 text-center space-y-2">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-leaf-green font-mono">OUTPUT SISTEM</span>
                    <h4 class="font-extrabold text-base text-forest font-display">Actionable Agricultural Recommendations</h4>
                    <p class="text-xs text-charcoal/70 max-w-xl mx-auto">
                        Keputusan berbasis data diterjemahkan ke dalam panduan praktis pemupukan, jadwal irigasi tetes, dan waktu terbaik menjual hasil panen.
                    </p>
                </div>
            </div>
        </div>

        <hr class="border-sand/40">

        <!-- PART 2: AGRONEX ADVISORY -->
        <div class="space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Kanal Akses Petani &bull; AGRONEX Advisory</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">Petani tidak perlu membaca data yang rumit.</h2>
                <p class="text-sm text-charcoal/75 leading-relaxed">
                    Tiga saluran komunikasi yang disesuaikan dengan profil pengguna &mdash; dari pesan singkat untuk petani di lahan hingga dashboard analitik untuk koperasi dan lembaga.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- WhatsApp -->
                <div class="p-6 bg-primary-cream/25 border border-sand/40 rounded-3xl space-y-4 hover-lift">
                    <div class="w-10 h-10 rounded-xl bg-forest/10 flex items-center justify-center text-forest">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    </div>
                    <h3 class="font-extrabold text-lg text-forest font-display">WHATSAPP ADVISORY</h3>
                    <p class="text-xs text-charcoal/80 leading-relaxed">
                        Peringatan sederhana dan rekomendasi langsung berbahasa lokal tanpa perlu memasang aplikasi berat di ponsel pintar sederhana.
                    </p>
                    <div class="p-3 bg-white rounded-xl border border-sand/40 text-[11px] font-sans space-y-1.5 text-charcoal/80">
                        <span class="text-[9px] font-bold text-forest uppercase tracking-wider block">Contoh Rekomendasi:</span>
                        <p class="italic text-forest leading-snug">&ldquo;Tanah pada blok A membutuhkan perhatian terhadap kelembapan.&rdquo;</p>
                    </div>
                </div>

                <!-- Mobile -->
                <div class="p-6 bg-primary-cream/25 border border-sand/40 rounded-3xl space-y-4 hover-lift">
                    <div class="w-10 h-10 rounded-xl bg-forest/10 flex items-center justify-center text-forest">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="font-extrabold text-lg text-forest font-display">MOBILE INTERFACE</h3>
                    <p class="text-xs text-charcoal/80 leading-relaxed">
                        Akses ramah lapangan untuk agronomis, ketua kelompok tani, dan petugas pendamping dengan visualisasi kode warna praktis.
                    </p>
                    <div class="p-3 bg-white rounded-xl border border-sand/40 text-[11px] font-sans space-y-1.5 text-charcoal/80">
                        <span class="text-[9px] font-bold text-forest uppercase tracking-wider block">Contoh Peringatan Lapangan:</span>
                        <p class="italic text-forest leading-snug">&ldquo;Periksa kondisi tanaman sebelum melakukan penyiraman sore ini.&rdquo;</p>
                    </div>
                </div>

                <!-- Dashboard -->
                <div class="p-6 bg-primary-cream/25 border border-sand/40 rounded-3xl space-y-4 hover-lift">
                    <div class="w-10 h-10 rounded-xl bg-forest/10 flex items-center justify-center text-forest">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z"/></svg>
                    </div>
                    <h3 class="font-extrabold text-lg text-forest font-display">DASHBOARD LEMBAGA</h3>
                    <p class="text-xs text-charcoal/80 leading-relaxed">
                        Dirancang untuk koperasi tani, instansi pemerintah (TPID/Dinas Pertanian), korporasi CSR, dan offtaker berskala agregat.
                    </p>
                    <div class="p-3 bg-white rounded-xl border border-sand/40 text-[11px] font-sans space-y-1.5 text-charcoal/80">
                        <span class="text-[9px] font-bold text-forest uppercase tracking-wider block">Contoh Sinyal Pasar:</span>
                        <p class="italic text-forest leading-snug">&ldquo;Pasar komoditas menunjukkan perubahan harga &amp; peluang matching pembeli.&rdquo;</p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="border-sand/40">

        <!-- PART 3: AGRONEX ACTION -->
        <div class="space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Tindakan Nyata Lahan &bull; AGRONEX Action</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">Data menjadi tindakan.</h2>
                <p class="text-sm text-charcoal/75 leading-relaxed">
                    AGRONEX tidak berhenti pada dashboard. Kami menghubungkan informasi dengan tindakan di lapangan.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-5xl mx-auto">
                <div class="p-6 rounded-2xl bg-bg-base border border-sand/40 space-y-2 hover-lift">
                    <span class="text-leaf-green font-bold text-xs font-mono">01</span>
                    <h4 class="font-extrabold text-forest font-display text-sm">Smart Irrigation</h4>
                    <p class="text-xs text-charcoal/70 leading-relaxed">
                        Integrasi katup solenoid dan timer irigasi tetes presisi yang menyala otomatis saat sensor membaca tanah kering.
                    </p>
                </div>
                <div class="p-6 rounded-2xl bg-bg-base border border-sand/40 space-y-2 hover-lift">
                    <span class="text-leaf-green font-bold text-xs font-mono">02</span>
                    <h4 class="font-extrabold text-forest font-display text-sm">Solar-Powered Irrigation</h4>
                    <p class="text-xs text-charcoal/70 leading-relaxed">
                        Pompa air bertenaga surya untuk mengurangi ketergantungan pada bahan bakar diesel genset yang mahal dan kotor.
                    </p>
                </div>
                <div class="p-6 rounded-2xl bg-bg-base border border-sand/40 space-y-2 hover-lift">
                    <span class="text-leaf-green font-bold text-xs font-mono">03</span>
                    <h4 class="font-extrabold text-forest font-display text-sm">Field Deployment</h4>
                    <p class="text-xs text-charcoal/70 leading-relaxed">
                        Pemasangan sensor secara langsung di lahan bersama kelompok tani dengan instalasi plug-and-play yang mudah dirawat.
                    </p>
                </div>
                <div class="p-6 rounded-2xl bg-bg-base border border-sand/40 space-y-2 hover-lift">
                    <span class="text-leaf-green font-bold text-xs font-mono">04</span>
                    <h4 class="font-extrabold text-forest font-display text-sm">End-to-End Field Support</h4>
                    <p class="text-xs text-charcoal/70 leading-relaxed">
                        Pendampingan tatap muka, pelatihan kelompok tani, dan evaluasi hasil panen secara berkelanjutan di pedesaan.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- SECTION: USE CASES -->
<section id="usecases" class="py-24 bg-bg-base border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Kasus Penggunaan &bull; Use Cases</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">Tiga Skenario Nyata di Lahan</h2>
            <p class="text-sm text-charcoal/75">
                Bagaimana ekosistem AGRONEX memecahkan masalah riil petani dari pengelolaan hara hingga pemasaran.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <!-- 01 SOIL & NUTRIENT -->
            <div class="p-8 rounded-3xl bg-white border border-sand/40 space-y-6 hover-lift shadow-sm flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="px-3 py-1 rounded-full bg-forest text-primary-cream text-[9px] font-bold uppercase tracking-wider font-mono">01 &bull; TANAH &amp; NUTRISI</span>
                    <h3 class="font-extrabold text-lg text-forest font-display">SOIL &amp; NUTRIENT</h3>
                    
                    <div class="space-y-1.5 p-3.5 bg-red-50/70 border border-red-200/60 rounded-xl text-xs">
                        <span class="font-bold text-red-700 text-[10px] uppercase tracking-wider block">Masalah Lapangan:</span>
                        <p class="text-charcoal/80 leading-relaxed">Pemupukan dilakukan tanpa mengetahui kondisi tanah sebenarnya.</p>
                    </div>

                    <div class="space-y-2 text-xs">
                        <span class="font-bold text-forest text-[10px] uppercase tracking-wider block">Solusi AGRONEX:</span>
                        <div class="flex items-center space-x-1.5 text-charcoal/80 font-medium">
                            <span class="px-2 py-0.5 rounded bg-primary-cream border border-sand text-forest">SoilSense / Terra</span>
                            <span>&rarr;</span>
                            <span class="px-2 py-0.5 rounded bg-primary-cream border border-sand text-forest">Data Tanah</span>
                        </div>
                        <div class="flex items-center space-x-1.5 text-charcoal/80 font-medium">
                            <span>&rarr;</span>
                            <span class="px-2 py-0.5 rounded bg-primary-cream border border-sand text-forest">Intelligence</span>
                            <span>&rarr;</span>
                            <span class="px-2 py-0.5 rounded bg-leaf-green/20 text-forest font-bold">Rekomendasi Dosis</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-sand/30 text-[11px] text-charcoal/60 leading-snug">
                    Hasil: Mencegah tanah menjadi asam (pH 4.8 &rarr; 6.2) dan menghemat biaya pupuk kimia.
                </div>
            </div>

            <!-- 02 WATER & IRRIGATION -->
            <div class="p-8 rounded-3xl bg-white border border-sand/40 space-y-6 hover-lift shadow-sm flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="px-3 py-1 rounded-full bg-forest text-primary-cream text-[9px] font-bold uppercase tracking-wider font-mono">02 &bull; AIR &amp; IRIGASI</span>
                    <h3 class="font-extrabold text-lg text-forest font-display">WATER &amp; IRRIGATION</h3>
                    
                    <div class="space-y-1.5 p-3.5 bg-red-50/70 border border-red-200/60 rounded-xl text-xs">
                        <span class="font-bold text-red-700 text-[10px] uppercase tracking-wider block">Masalah Lapangan:</span>
                        <p class="text-charcoal/80 leading-relaxed">Penyiraman tidak berdasarkan kebutuhan aktual tanaman.</p>
                    </div>

                    <div class="space-y-2 text-xs">
                        <span class="font-bold text-forest text-[10px] uppercase tracking-wider block">Solusi AGRONEX:</span>
                        <div class="flex items-center space-x-1.5 text-charcoal/80 font-medium">
                            <span class="px-2 py-0.5 rounded bg-primary-cream border border-sand text-forest">WaterSense</span>
                            <span>&rarr;</span>
                            <span class="px-2 py-0.5 rounded bg-primary-cream border border-sand text-forest">Soil Moisture</span>
                        </div>
                        <div class="flex items-center space-x-1.5 text-charcoal/80 font-medium">
                            <span>&rarr;</span>
                            <span class="px-2 py-0.5 rounded bg-primary-cream border border-sand text-forest">Recommendation</span>
                            <span>&rarr;</span>
                            <span class="px-2 py-0.5 rounded bg-leaf-green/20 text-forest font-bold">Smart Irrigation</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-sand/30 text-[11px] text-charcoal/60 leading-snug">
                    Hasil: Efisiensi air hingga 28% dan eliminasi konflik rebutan pompa irigasi.
                </div>
            </div>

            <!-- 03 MARKET & DISTRIBUTION -->
            <div class="p-8 rounded-3xl bg-white border border-sand/40 space-y-6 hover-lift shadow-sm flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="px-3 py-1 rounded-full bg-forest text-primary-cream text-[9px] font-bold uppercase tracking-wider font-mono">03 &bull; PASAR &amp; DISTRIBUSI</span>
                    <h3 class="font-extrabold text-lg text-forest font-display">MARKET &amp; DISTRIBUTION</h3>
                    
                    <div class="space-y-1.5 p-3.5 bg-red-50/70 border border-red-200/60 rounded-xl text-xs">
                        <span class="font-bold text-red-700 text-[10px] uppercase tracking-wider block">Masalah Lapangan:</span>
                        <p class="text-charcoal/80 leading-relaxed">Petani menghadapi fluktuasi harga dan keterbatasan akses pasar.</p>
                    </div>

                    <div class="space-y-2 text-xs">
                        <span class="font-bold text-forest text-[10px] uppercase tracking-wider block">Solusi AGRONEX:</span>
                        <div class="flex items-center space-x-1.5 text-charcoal/80 font-medium">
                            <span class="px-2 py-0.5 rounded bg-primary-cream border border-sand text-forest">AgroPredict Engine</span>
                            <span>&rarr;</span>
                            <span class="px-2 py-0.5 rounded bg-primary-cream border border-sand text-forest">Market Data</span>
                        </div>
                        <div class="flex items-center space-x-1.5 text-charcoal/80 font-medium">
                            <span>&rarr;</span>
                            <span class="px-2 py-0.5 rounded bg-primary-cream border border-sand text-forest">Price Intelligence</span>
                            <span>&rarr;</span>
                            <span class="px-2 py-0.5 rounded bg-leaf-green/20 text-forest font-bold">Business Matching</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-sand/30 text-[11px] text-charcoal/60 leading-snug">
                    Hasil: Transparansi harga komoditas dan alternatif jalur penjualan langsung.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: REAL FIELD VALIDATION (FROM DATABASE: activities & mapMarkers) -->
<section id="validation" class="py-24 bg-white border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6 space-y-16">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Validasi Lapangan Riil &bull; Real Validation</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">
                AGRONEX dibangun dari lapangan, bukan dari ruang rapat.
            </h2>
            <p class="text-sm text-charcoal/75 leading-relaxed">
                Catatan kronologis kegiatan validasi langsung bersama petani, kelompok tani, pedagang pasar, dan pemangku kepentingan di Jawa Barat.
            </p>
        </div>

        <!-- Chronological Field Validation Timeline from Database -->
        <div class="relative pl-6 md:pl-10 border-l border-sand/80 max-w-4xl mx-auto space-y-8">
            @foreach($activities as $activity)
            <div class="relative group">
                <div class="absolute -left-[31px] md:-left-[47px] top-2 w-4 h-4 rounded-full bg-white border-4 border-leaf-green group-hover:scale-125 transition-transform duration-300"></div>
                <div class="bg-primary-cream/20 border border-sand/40 rounded-2xl p-6 shadow-sm hover-lift grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                    <div class="md:col-span-4 aspect-[4/3] rounded-xl overflow-hidden border border-sand/30 bg-primary-cream">
                        @if($activity->photo_path)
                            <img src="{{ asset($activity->photo_path) }}" class="w-full h-full object-cover" alt="{{ trans_db($activity->title) }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-forest/5 text-forest font-bold text-xs p-4 text-center">
                                {{ $activity->location }}
                            </div>
                        @endif
                    </div>
                    <div class="md:col-span-8 space-y-2">
                        <div class="flex items-center space-x-2 text-xs font-semibold">
                            <span class="px-2.5 py-0.5 rounded-full bg-forest text-primary-cream text-[9px] font-bold uppercase">
                                {{ $activity->activity_date ? date('M Y', strtotime($activity->activity_date)) : '2026' }}
                            </span>
                            <span class="text-leaf-green font-bold">{{ $activity->location }}</span>
                        </div>
                        <h4 class="font-extrabold text-base text-forest font-display">{{ trans_db($activity->title) }}</h4>
                        <p class="text-xs text-charcoal/80 leading-relaxed">
                            {{ trans_db($activity->description) }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Interactive Map Leaflet (Rendered dynamically from Database: mapMarkers) -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <div id="map" class="pt-8">
            <div class="text-center max-w-2xl mx-auto mb-8 space-y-2">
                <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Titik Lapangan Terverifikasi</span>
                <h3 class="text-2xl font-extrabold text-forest font-display">Peta Penempatan &amp; Pengamatan Lapangan</h3>
                <p class="text-xs text-charcoal/70">Koordinat nyata stasiun sensor IoT, observasi iklim mikro, dan kelompok tani dampingan.</p>
            </div>
            <div class="bg-primary-cream/20 border border-sand/40 p-4 rounded-[32px] shadow-sm max-w-5xl mx-auto">
                <div id="public-map" class="w-full h-[450px] rounded-2xl overflow-hidden border border-sand shadow-inner relative z-10"></div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: FIELD STORY (FROM DATABASE: stories) -->
<section id="stories" class="py-24 bg-bg-base border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Catatan Kisah Lapangan &bull; Field Story</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">
                Ibu Karminah &mdash; Kp. Kiaragoong, Garut
            </h2>
            <p class="text-sm text-charcoal/75">
                Kisah nyata yang mendasari mengapa kami merancang sistem prediksi harga dan integrasi rantai pasok.
            </p>
        </div>

        @php
            $featuredStory = $stories->firstWhere('slug', 'validasi-kebutuhan-kiaragoong') ?? $stories->first();
        @endphp
        @if($featuredStory)
        <div class="max-w-4xl mx-auto bg-white border border-sand/40 rounded-3xl p-6 sm:p-10 shadow-sm grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
            <!-- Authentic Square Photo of Ibu Karminah in Garut -->
            <div class="md:col-span-5">
                <div class="w-full aspect-square rounded-2xl overflow-hidden border border-sand/40 shadow-sm relative group">
                    <img src="{{ asset($featuredStory->photo_path ?? 'konten/fotogarut.png') }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-103" alt="{{ trans_db($featuredStory->title) }}">
                    <div class="absolute bottom-3 left-3 px-3 py-1 bg-forest/90 backdrop-blur-md rounded-full text-[9px] font-bold text-white uppercase tracking-wider">
                        {{ $featuredStory->village_name }}
                    </div>
                </div>
            </div>

            <!-- Story details: Problem -> Learning -> Response -->
            <div class="md:col-span-7 space-y-5">
                <div class="space-y-2">
                    <span class="text-[10px] font-bold text-leaf-green uppercase tracking-wider">Validasi Kebutuhan Petani</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-forest font-display">Ketika Modal Produksi Tidak Bisa Menunggu</h3>
                </div>

                <div class="space-y-3 text-xs leading-relaxed">
                    <!-- Problem -->
                    <div class="p-3.5 bg-red-50/60 border border-red-200/50 rounded-xl space-y-1">
                        <span class="font-bold text-red-700 text-[10px] uppercase tracking-wider block">Masalah Riil (Problem):</span>
                        <p class="text-charcoal/85">
                            &ldquo;{{ trans_db($featuredStory->problems) }}&rdquo;
                        </p>
                    </div>

                    <!-- Learning -->
                    <div class="p-3.5 bg-amber-50/60 border border-amber-200/50 rounded-xl space-y-1">
                        <span class="font-bold text-amber-800 text-[10px] uppercase tracking-wider block">Pembelajaran Lapangan (Learning):</span>
                        <p class="text-charcoal/85">
                            &ldquo;{{ trans_db($featuredStory->lessons) }}&rdquo;
                        </p>
                    </div>

                    <!-- Response -->
                    <div class="p-3.5 bg-leaf-green/10 border border-leaf-green/30 rounded-xl space-y-1">
                        <span class="font-bold text-forest text-[10px] uppercase tracking-wider block">Respons Solusi (Response):</span>
                        <p class="text-charcoal/85">
                            {{ trans_db($featuredStory->solutions) }}
                        </p>
                    </div>
                </div>

                <div class="pt-3 border-t border-sand/30 flex items-center justify-between text-[11px] text-charcoal/60">
                    <span class="italic">Sumber: Wawancara langsung bersama Ibu Karminah di lahan.</span>
                    <span class="font-bold text-forest font-mono">DOKUMENTASI FAKTUAL</span>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- SECTION: TRACTION / CURRENT STAGE -->
<section id="traction" class="py-24 bg-white border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Tahapan &amp; Validasi &bull; Traction</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">Tahapan Perkembangan AGRONEX</h2>
            <p class="text-sm text-charcoal/75">
                Membedakan secara tegas dan jujur antara pencapaian lapangan yang telah tervalidasi saat ini dengan proyeksi target masa depan.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">
            <!-- Left Card: CURRENT FIELD VALIDATION -->
            <div class="p-8 rounded-3xl bg-forest/5 border-2 border-forest/30 space-y-6 shadow-sm flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 rounded-full bg-forest text-primary-cream text-[10px] font-bold uppercase tracking-wider font-mono">CURRENT STATUS</span>
                        <span class="text-[10px] text-forest font-bold uppercase tracking-wider">Terverifikasi Lapangan</span>
                    </div>
                    
                    <h3 class="text-2xl font-extrabold text-forest font-display">CURRENT FIELD VALIDATION</h3>
                    <p class="text-xs text-charcoal/80 leading-relaxed font-light">
                        Data empiris yang diperoleh dari penempatan sensor, pendampingan petani hortikultura, dan observasi di Jawa Barat.
                    </p>

                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-4 border-t border-sand/40">
                        <div class="p-3 bg-white rounded-2xl border border-sand/40 text-center">
                            <span class="text-xl font-extrabold text-forest font-display">3+</span>
                            <span class="text-[9px] font-bold text-charcoal/60 uppercase block mt-0.5">Petani Terdampingi</span>
                            <span class="text-[8px] text-leaf-green font-bold uppercase">VALIDATED</span>
                        </div>
                        <div class="p-3 bg-white rounded-2xl border border-sand/40 text-center">
                            <span class="text-xl font-extrabold text-forest font-display">12+</span>
                            <span class="text-[9px] font-bold text-charcoal/60 uppercase block mt-0.5">Kegiatan Komunitas</span>
                            <span class="text-[8px] text-leaf-green font-bold uppercase">VALIDATED</span>
                        </div>
                        <div class="p-3 bg-white rounded-2xl border border-sand/40 text-center">
                            <span class="text-xl font-extrabold text-forest font-display">2+</span>
                            <span class="text-[9px] font-bold text-charcoal/60 uppercase block mt-0.5">Desa Observasi</span>
                            <span class="text-[8px] text-leaf-green font-bold uppercase">VALIDATED</span>
                        </div>
                        <div class="p-3 bg-white rounded-2xl border border-sand/40 text-center">
                            <span class="text-xl font-extrabold text-forest font-display">2m</span>
                            <span class="text-[9px] font-bold text-charcoal/60 uppercase block mt-0.5">Plot Observasi</span>
                            <span class="text-[8px] text-amber-800 font-bold uppercase">OBSERVED</span>
                        </div>
                        <div class="p-3 bg-white rounded-2xl border border-sand/40 text-center col-span-2 sm:col-span-2">
                            <span class="text-xl font-extrabold text-forest font-display">28%</span>
                            <span class="text-[9px] font-bold text-charcoal/60 uppercase block mt-0.5">Efisiensi Irigasi Teramati</span>
                            <span class="text-[8px] text-amber-800 font-bold uppercase">OBSERVED FIELD</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-forest/15 text-[11px] text-forest font-semibold">
                    &bull; Seluruh angka di atas bersumber dari pengujian nyata dan bukan proyeksi hipotetis.
                </div>
            </div>

            <!-- Right Card: NEXT TARGET -->
            <div class="p-8 rounded-3xl bg-white border border-sand/60 space-y-6 shadow-sm flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="px-3 py-1 rounded-full bg-sand/60 text-charcoal text-[10px] font-bold uppercase tracking-wider font-mono">ROADMAP PROJECTION</span>
                        <span class="text-[10px] text-amber-800 font-bold uppercase tracking-wider bg-amber-50 px-2 py-0.5 rounded-full">STRATEGIC TARGET</span>
                    </div>

                    <h3 class="text-2xl font-extrabold text-forest font-display">NEXT TARGET</h3>
                    <p class="text-xs text-charcoal/80 leading-relaxed font-light">
                        Sasaran pengembangan platform dan perluasan adopsi teknologi secara bertahap bersama mitra ekosistem dan koperasi.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4 border-t border-sand/40">
                        <div class="p-4 bg-primary-cream/20 rounded-2xl border border-sand/40 text-center space-y-1">
                            <span class="text-2xl font-extrabold text-forest font-display">50</span>
                            <span class="text-[10px] font-bold text-charcoal/70 uppercase block">Desa</span>
                            <span class="px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[8px] font-bold uppercase">TARGET</span>
                        </div>
                        <div class="p-4 bg-primary-cream/20 rounded-2xl border border-sand/40 text-center space-y-1">
                            <span class="text-2xl font-extrabold text-forest font-display">10+</span>
                            <span class="text-[10px] font-bold text-charcoal/70 uppercase block">Klaster Hortikultura</span>
                            <span class="px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[8px] font-bold uppercase">TARGET</span>
                        </div>
                        <div class="p-4 bg-primary-cream/20 rounded-2xl border border-sand/40 text-center space-y-1">
                            <span class="text-2xl font-extrabold text-forest font-display">10.000+</span>
                            <span class="text-[10px] font-bold text-charcoal/70 uppercase block">Petani Aktif</span>
                            <span class="px-2 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[8px] font-bold uppercase">TARGET</span>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-sand/30 text-[11px] text-charcoal/60 leading-relaxed">
                    Catatan: Angka target di atas adalah rencana peta jalan ekspansi (2027) dan tidak diperlakukan sebagai klaim pencapaian masa kini.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: BUSINESS MODEL -->
<section id="business-model" class="py-24 bg-bg-base border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Model Keberlanjutan Finansial &bull; Business Model</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">
                Bagaimana AGRONEX menghasilkan pendapatan?
            </h2>
            <p class="text-sm text-charcoal/75">
                Struktur multi-stream yang dirancang adil bagi petani kecil dan bernilai ekonomis bagi institusi.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
            <!-- 01 EQUIPMENT LEASING & RENTAL -->
            <div class="p-6 bg-white border border-sand/40 rounded-3xl space-y-4 hover-lift shadow-sm flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="w-8 h-8 rounded-full bg-forest text-primary-cream text-xs font-bold font-mono inline-flex items-center justify-center">01</span>
                    <h3 class="font-extrabold text-base text-forest font-display">EQUIPMENT LEASING &amp; RENTAL</h3>
                    <div class="p-2.5 bg-primary-cream/40 rounded-xl text-[10px] font-bold uppercase tracking-wider text-forest">
                        Petani / Gapoktan
                    </div>
                    <p class="text-xs text-charcoal/75 leading-relaxed">
                        Sewa perangkat SoilSense, WaterSense, dan sistem smart irrigation dengan skema bayar musiman atau bulanan yang terjangkau tanpa belanja modal awal yang berat.
                    </p>
                </div>
                <div class="pt-3 border-t border-sand/30 text-[10px] text-leaf-green font-bold uppercase tracking-wider">
                    Model: Hardware-as-a-Service (HaaS)
                </div>
            </div>

            <!-- 02 INSTITUTIONAL DEPLOYMENT -->
            <div class="p-6 bg-white border border-sand/40 rounded-3xl space-y-4 hover-lift shadow-sm flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="w-8 h-8 rounded-full bg-forest text-primary-cream text-xs font-bold font-mono inline-flex items-center justify-center">02</span>
                    <h3 class="font-extrabold text-base text-forest font-display">INSTITUTIONAL DEPLOYMENT</h3>
                    <div class="p-2.5 bg-primary-cream/40 rounded-xl text-[10px] font-bold uppercase tracking-wider text-forest">
                        CSR &bull; BUMN &bull; Corporation &bull; Foundation
                    </div>
                    <p class="text-xs text-charcoal/75 leading-relaxed">
                        Paket komprehensif pengadaan hardware cerdas, implementasi klaster pertanian desa binaan, dashboard agregat analitik, dan pelaporan dampak ESG berkala.
                    </p>
                </div>
                <div class="pt-3 border-t border-sand/30 text-[10px] text-leaf-green font-bold uppercase tracking-wider">
                    Model: Enterprise &amp; B2B Partnerships
                </div>
            </div>

            <!-- 03 FARMER SUBSCRIPTION -->
            <div class="p-6 bg-white border border-sand/40 rounded-3xl space-y-4 hover-lift shadow-sm flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="w-8 h-8 rounded-full bg-forest text-primary-cream text-xs font-bold font-mono inline-flex items-center justify-center">03</span>
                    <h3 class="font-extrabold text-base text-forest font-display">FARMER SUBSCRIPTION</h3>
                    <div class="p-2.5 bg-primary-cream/40 rounded-xl text-[10px] font-bold uppercase tracking-wider text-forest">
                        AI Advisory &bull; WhatsApp Insights
                    </div>
                    <p class="text-xs text-charcoal/75 leading-relaxed">
                        Langganan rekomendasi budidaya cerdas, peringatan dini serangan hama/iklim mikro, serta akses sinyal harga pasar AgroPredict melalui notifikasi WhatsApp.
                    </p>
                </div>
                <div class="pt-3 border-t border-sand/30 text-[10px] text-leaf-green font-bold uppercase tracking-wider">
                    Model: Micro-SaaS Subscription
                </div>
            </div>

            <!-- 04 FIELD SERVICE -->
            <div class="p-6 bg-white border border-sand/40 rounded-3xl space-y-4 hover-lift shadow-sm flex flex-col justify-between">
                <div class="space-y-3">
                    <span class="w-8 h-8 rounded-full bg-forest text-primary-cream text-xs font-bold font-mono inline-flex items-center justify-center">04</span>
                    <h3 class="font-extrabold text-base text-forest font-display">FIELD SERVICE</h3>
                    <div class="p-2.5 bg-primary-cream/40 rounded-xl text-[10px] font-bold uppercase tracking-wider text-forest">
                        Soil Analysis &bull; Installation &bull; Training
                    </div>
                    <p class="text-xs text-charcoal/75 leading-relaxed">
                        Layanan pengujian tanah cepat dengan Terra, kalibrasi sensor di lahan, instalasi pipa irigasi presisi, serta pelatihan teknis berkala bagi kelompok tani.
                    </p>
                </div>
                <div class="pt-3 border-t border-sand/30 text-[10px] text-leaf-green font-bold uppercase tracking-wider">
                    Model: Professional Field Services
                </div>
            </div>
        </div>

        <!-- FUTURE REVENUE STREAM -->
        <div class="mt-8 max-w-4xl mx-auto p-6 rounded-3xl bg-primary-cream/40 border border-sand/50 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="space-y-1">
                <div class="inline-flex items-center space-x-2">
                    <span class="px-2.5 py-0.5 rounded-full bg-sand/80 text-charcoal text-[9px] font-bold uppercase font-mono">FUTURE DEVELOPMENT</span>
                    <span class="text-xs font-bold text-forest">DATA &amp; ECOSYSTEM SERVICES</span>
                </div>
                <p class="text-xs text-charcoal/70">
                    Alternative credit scoring untuk perbankan inklusif pertanian, validasi data jejak karbon tanah, dan verifikasi ESG.
                </p>
            </div>
            <div>
                <span class="px-3 py-1 bg-white border border-sand rounded-full text-[10px] font-bold text-forest font-mono">
                    STATUS: FUTURE / R&amp;D
                </span>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: IMPACT (PEOPLE, PLANET, GOVERNANCE) -->
<section id="impact" class="py-24 bg-white border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Kerangka Dampak &bull; Impact Pillars</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">
                Pertanian lebih cerdas tanpa meninggalkan manusia dan lingkungan.
            </h2>
            <p class="text-sm text-charcoal/75">
                Pengembangan teknologi kami dipandu oleh tiga pilar keberlanjutan dengan status metrik yang transparan.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <!-- 01 PEOPLE -->
            <div class="p-8 rounded-3xl bg-bg-base border border-sand/40 space-y-6 hover-lift flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="px-3 py-1 rounded-full bg-forest text-primary-cream text-[9px] font-bold uppercase tracking-wider font-mono">PILAR 01</span>
                    <h3 class="font-extrabold text-xl text-forest font-display">PEOPLE</h3>
                    <ul class="space-y-2 text-xs text-charcoal/80">
                        <li class="flex items-start space-x-2">
                            <span class="text-leaf-green font-bold">&bull;</span>
                            <span><strong>Inklusi Petani:</strong> Akses teknologi tanpa prasyarat ponsel mahal via WhatsApp.</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <span class="text-leaf-green font-bold">&bull;</span>
                            <span><strong>Perempuan &amp; Pemuda Tani:</strong> Pelatihan regenerasi agritech bagi generasi muda desa.</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <span class="text-leaf-green font-bold">&bull;</span>
                            <span><strong>Teknologi Terjangkau:</strong> Menghilangkan hambatan biaya belanja modal.</span>
                        </li>
                    </ul>
                </div>
                <div class="pt-3 border-t border-sand/30">
                    <span class="text-[9px] font-bold text-leaf-green uppercase tracking-wider block">Status Metrik:</span>
                    <span class="text-[10px] text-forest font-semibold">OBSERVED &bull; Dialog &amp; FGD di 12+ kegiatan</span>
                </div>
            </div>

            <!-- 02 PLANET -->
            <div class="p-8 rounded-3xl bg-bg-base border border-sand/40 space-y-6 hover-lift flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="px-3 py-1 rounded-full bg-forest text-primary-cream text-[9px] font-bold uppercase tracking-wider font-mono">PILAR 02</span>
                    <h3 class="font-extrabold text-xl text-forest font-display">PLANET</h3>
                    <ul class="space-y-2 text-xs text-charcoal/80">
                        <li class="flex items-start space-x-2">
                            <span class="text-leaf-green font-bold">&bull;</span>
                            <span><strong>Efisiensi Air:</strong> Pengurangan pemborosan penyiraman hingga 28% di lahan uji coba.</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <span class="text-leaf-green font-bold">&bull;</span>
                            <span><strong>Pemulihan Tanah:</strong> Mencegah penurunan pH tanah akibat pemupukan berlebih.</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <span class="text-leaf-green font-bold">&bull;</span>
                            <span><strong>Irigasi Bertenaga Surya:</strong> Mengurangi polusi dan konsumsi genset diesel pedesaan.</span>
                        </li>
                    </ul>
                </div>
                <div class="pt-3 border-t border-sand/30">
                    <span class="text-[9px] font-bold text-amber-800 uppercase tracking-wider block">Status Metrik:</span>
                    <span class="text-[10px] text-amber-800 font-semibold">OBSERVED &bull; Terpantau pada sistem irigasi uji coba</span>
                </div>
            </div>

            <!-- 03 GOVERNANCE -->
            <div class="p-8 rounded-3xl bg-bg-base border border-sand/40 space-y-6 hover-lift flex flex-col justify-between">
                <div class="space-y-4">
                    <span class="px-3 py-1 rounded-full bg-forest text-primary-cream text-[9px] font-bold uppercase tracking-wider font-mono">PILAR 03</span>
                    <h3 class="font-extrabold text-xl text-forest font-display">GOVERNANCE</h3>
                    <ul class="space-y-2 text-xs text-charcoal/80">
                        <li class="flex items-start space-x-2">
                            <span class="text-leaf-green font-bold">&bull;</span>
                            <span><strong>Kekayaan Intelektual (HAKI):</strong> Terdaftar resmi 2 Hak Cipta Program Komputer (EC002026124181 &amp; EC002026184233) di DJKI Kementerian Hukum RI.</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <span class="text-leaf-green font-bold">&bull;</span>
                            <span><strong>Etika Data Tanah:</strong> Tata kelola data petani yang aman, terenkripsi, dan menjaga privasi kepemilikan.</span>
                        </li>
                        <li class="flex items-start space-x-2">
                            <span class="text-leaf-green font-bold">&bull;</span>
                            <span><strong>Kemitraan Transparan:</strong> Menghubungkan petani dan pembeli tanpa pemotongan informasi harga rahasia.</span>
                        </li>
                    </ul>
                </div>
                <div class="pt-3 border-t border-sand/30">
                    <span class="text-[9px] font-bold text-forest uppercase tracking-wider block">Status Metrik:</span>
                    <span class="text-[10px] text-forest font-semibold">VERIFIED &bull; Terverifikasi sertifikat &amp; tata kelola</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: ENVIRONMENTAL POSITIONING & VISION (FROM DATABASE: settings) -->
<section id="vision" class="py-24 bg-bg-base border-b border-sand/35">
    <div class="max-w-5xl mx-auto px-6 space-y-16">
        
        <!-- Environmental Positioning -->
        <div class="p-8 sm:p-12 rounded-3xl bg-primary-cream/40 border border-sand/50 space-y-6 text-center shadow-sm">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Komitmen Lingkungan &bull; Environmental Positioning</span>
            <blockquote class="text-xl sm:text-2xl font-bold text-forest font-display leading-relaxed max-w-3xl mx-auto">
                &ldquo;Lahan pertanian tidak hanya menghadapi masalah produksi.<br class="hidden sm:inline">
                Ia juga menghadapi tekanan perubahan penggunaan lahan, degradasi tanah, dan perubahan iklim.&rdquo;
            </blockquote>
            <p class="text-sm text-charcoal/80 max-w-2xl mx-auto leading-relaxed">
                AGRONEX ingin membantu menjaga produktivitas lahan yang masih tersedia melalui keputusan berbasis data.
            </p>
            <div class="pt-4 border-t border-sand/40 max-w-xl mx-auto">
                <p class="text-xs text-charcoal/60 leading-relaxed italic">
                    &ldquo;Teknologi kami tidak menggantikan kebijakan tata ruang atau konservasi. Kami berkontribusi pada pengelolaan lahan yang lebih terukur, efisien, dan bertanggung jawab.&rdquo;
                </p>
            </div>
        </div>

        <!-- Vision -->
        <div class="text-center space-y-4 max-w-3xl mx-auto">
            <span class="text-xs font-bold uppercase tracking-widest text-forest">Visi Jangka Panjang &bull; Vision</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">
                {{ trans_db($settings['vision_headline'] ?? 'Menjaga tanah hari ini untuk menjaga pangan esok hari.') }}
            </h2>
            <p class="text-base text-charcoal/85 leading-relaxed font-light">
                {{ trans_db($settings['vision_body'] ?? 'Kami membayangkan pertanian Indonesia yang lebih terukur, lebih inklusif, dan lebih tangguh terhadap perubahan iklim — tanpa kehilangan hubungan manusia dengan tanah.') }}
            </p>
        </div>

    </div>
</section>

<!-- SECTION: ROADMAP -->
<section id="roadmap" class="py-24 bg-white border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Peta Jalan &bull; Roadmap 2026&ndash;2029+</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">
                Peta Jalan Strategis AGRONEX
            </h2>
            <p class="text-sm text-charcoal/75">
                Tahapan bertahap dari validasi teknologi di Jawa Barat hingga platform kecerdasan iklim regional.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
            <!-- 2026 VALIDATE (CURRENT) -->
            <div class="p-6 rounded-3xl bg-forest/5 border-2 border-forest/30 space-y-4 shadow-sm flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-extrabold text-forest font-display">2026</span>
                        <span class="px-2.5 py-0.5 rounded-full bg-forest text-primary-cream text-[9px] font-bold uppercase tracking-wider">CURRENT</span>
                    </div>
                    <h3 class="font-extrabold text-sm text-forest font-display">VALIDATE</h3>
                    <ul class="space-y-2 text-xs text-charcoal/80">
                        <li class="flex items-start space-x-1.5">&bull; <span>IoT V2 Prototype Deployment</span></li>
                        <li class="flex items-start space-x-1.5">&bull; <span>Field Testing di Sentra Hortikultura</span></li>
                        <li class="flex items-start space-x-1.5">&bull; <span>Uji Coba Smart Irrigation Pompa Surya</span></li>
                        <li class="flex items-start space-x-1.5">&bull; <span>Pengumpulan Data Baseline Lahan</span></li>
                    </ul>
                </div>
                <div class="pt-3 border-t border-sand/30 text-[10px] text-forest font-bold uppercase tracking-wider">
                    Fase: Validasi Empiris Lapangan
                </div>
            </div>

            <!-- 2027 COMMERCIALIZE (TARGET) -->
            <div class="p-6 rounded-3xl bg-white border border-sand/40 space-y-4 shadow-sm hover-lift flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-extrabold text-forest font-display">2027</span>
                        <span class="px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[9px] font-bold uppercase tracking-wider">TARGET</span>
                    </div>
                    <h3 class="font-extrabold text-sm text-forest font-display">COMMERCIALIZE</h3>
                    <ul class="space-y-2 text-xs text-charcoal/80">
                        <li class="flex items-start space-x-1.5">&bull; <span>Equipment Leasing &amp; Rental</span></li>
                        <li class="flex items-start space-x-1.5">&bull; <span>Peluncuran WhatsApp Advisory SaaS</span></li>
                        <li class="flex items-start space-x-1.5">&bull; <span>10+ Klaster Hortikultura Jawa Barat</span></li>
                        <li class="flex items-start space-x-1.5">&bull; <span>10.000+ Active Farmers &mdash; TARGET</span></li>
                    </ul>
                </div>
                <div class="pt-3 border-t border-sand/30 text-[10px] text-amber-800 font-bold uppercase tracking-wider">
                    Fase: Komersialisasi &amp; Adopsi Klaster
                </div>
            </div>

            <!-- 2028 EXPAND (TARGET) -->
            <div class="p-6 rounded-3xl bg-white border border-sand/40 space-y-4 shadow-sm hover-lift flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-extrabold text-forest font-display">2028</span>
                        <span class="px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800 text-[9px] font-bold uppercase tracking-wider">TARGET</span>
                    </div>
                    <h3 class="font-extrabold text-sm text-forest font-display">EXPAND</h3>
                    <ul class="space-y-2 text-xs text-charcoal/80">
                        <li class="flex items-start space-x-1.5">&bull; <span>Ekspansi Luar Jawa: Sumatra &amp; Sulawesi</span></li>
                        <li class="flex items-start space-x-1.5">&bull; <span>Integrasi Ekosistem Fintech &amp; Pembiayaan</span></li>
                        <li class="flex items-start space-x-1.5">&bull; <span>Kemitraan BUMN Pangan &amp; Retail Modern</span></li>
                        <li class="flex items-start space-x-1.5">&bull; <span>50.000+ Active Farmers &mdash; TARGET</span></li>
                    </ul>
                </div>
                <div class="pt-3 border-t border-sand/30 text-[10px] text-amber-800 font-bold uppercase tracking-wider">
                    Fase: Ekspansi Antar-Pulau
                </div>
            </div>

            <!-- 2029+ CLIMATE INTELLIGENCE (ROADMAP TARGET) -->
            <div class="p-6 rounded-3xl bg-white border border-sand/40 space-y-4 shadow-sm hover-lift flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-extrabold text-forest font-display">2029+</span>
                        <span class="px-2.5 py-0.5 rounded-full bg-sand/60 text-charcoal text-[9px] font-bold uppercase tracking-wider">ROADMAP</span>
                    </div>
                    <h3 class="font-extrabold text-sm text-forest font-display">CLIMATE INTELLIGENCE</h3>
                    <ul class="space-y-2 text-xs text-charcoal/80">
                        <li class="flex items-start space-x-1.5">&bull; <span>Carbon Tracking &amp; Soil ESG Index</span></li>
                        <li class="flex items-start space-x-1.5">&bull; <span>Ekosistem Pertanian Tropis Asia Tenggara</span></li>
                        <li class="flex items-start space-x-1.5">&bull; <span>National Agricultural Data Platform</span></li>
                        <li class="flex items-start space-x-1.5">&bull; <span>Sertifikasi Kredit Karbon &mdash; ROADMAP</span></li>
                    </ul>
                </div>
                <div class="pt-3 border-t border-sand/30 text-[10px] text-charcoal/60 font-bold uppercase tracking-wider">
                    Fase: Platform Data Iklim Nasional
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: HAKI (FROM DATABASE: haki) -->
<section id="haki" class="py-24 bg-bg-base border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Kekayaan Intelektual &bull; Intellectual Property</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">Kekayaan Intelektual Terdaftar Resmi</h2>
            <p class="text-sm text-charcoal/70">
                Pencatatan hak cipta program komputer resmi yang diterbitkan oleh Direktorat Jenderal Kekayaan Intelektual (DJKI), Kementerian Hukum Republik Indonesia.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
            @foreach($haki as $hakiItem)
            <div class="bg-white border border-sand/40 rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between">
                <div class="space-y-5">
                    <div class="flex items-center justify-between gap-2 flex-wrap">
                        <span class="px-2.5 py-1 rounded-full bg-forest text-primary-cream text-[9px] font-bold uppercase tracking-wider font-mono">
                            {{ $hakiItem->type }}
                        </span>
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-leaf-green/10 text-leaf-green border border-leaf-green/20">
                            Terdaftar Resmi DJKI
                        </span>
                    </div>

                    <h3 class="text-lg sm:text-xl font-bold text-forest font-display leading-snug">
                        {{ $hakiItem->title }}
                    </h3>

                    <!-- Detail Data Table -->
                    <div class="grid grid-cols-2 gap-3.5 pt-3 border-t border-sand/30 text-xs">
                        <div>
                            <span class="font-bold text-charcoal/50 uppercase tracking-wider text-[9px] block">No. Permohonan:</span>
                            <span class="font-mono font-bold text-forest text-xs">{{ $hakiItem->registration_number }}</span>
                        </div>
                        <div>
                            <span class="font-bold text-charcoal/50 uppercase tracking-wider text-[9px] block">No. Pencatatan:</span>
                            <span class="font-mono font-bold text-charcoal text-xs">{{ $hakiItem->record_number ?? '-' }}</span>
                        </div>
                        <div>
                            <span class="font-bold text-charcoal/50 uppercase tracking-wider text-[9px] block">Tanggal Permohonan:</span>
                            <span class="font-semibold text-charcoal text-[11px]">{{ $hakiItem->registration_date ? date('d F Y', strtotime($hakiItem->registration_date)) : '-' }}</span>
                        </div>
                        <div>
                            <span class="font-bold text-charcoal/50 uppercase tracking-wider text-[9px] block">Pertama Diumumkan:</span>
                            <span class="font-semibold text-charcoal text-[11px]">{{ $hakiItem->first_announced_date ? $hakiItem->first_announced_date . ' (' . $hakiItem->first_announced_place . ')' : '-' }}</span>
                        </div>
                        <div class="col-span-2">
                            <span class="font-bold text-charcoal/50 uppercase tracking-wider text-[9px] block">Pencipta &amp; Pemegang Hak:</span>
                            <span class="font-semibold text-forest text-[11px]">{{ $hakiItem->creator_name ?? 'TRI FEBRIANSAH' }}</span>
                        </div>
                        @if($hakiItem->protection_period)
                        <div class="col-span-2">
                            <span class="font-bold text-charcoal/50 uppercase tracking-wider text-[9px] block">Masa Pelindungan:</span>
                            <span class="text-charcoal/70 text-[11px]">{{ $hakiItem->protection_period }}</span>
                        </div>
                        @endif
                    </div>

                    @if($hakiItem->description)
                    <div class="bg-primary-cream/30 border border-sand/30 p-3.5 rounded-2xl">
                        <p class="text-[11px] text-charcoal/70 leading-relaxed">
                            {{ $hakiItem->description }}
                        </p>
                    </div>
                    @endif
                </div>

                <!-- Certificate Preview Box -->
                <div class="pt-4 border-t border-sand/30">
                    <div 
                        class="w-full h-56 rounded-2xl overflow-hidden border border-sand/60 relative group cursor-pointer bg-primary-cream/20 flex items-center justify-center"
                        onclick="openHakiModal('{{ asset($hakiItem->document_path ?? 'images/haki.png') }}', '{{ addslashes($hakiItem->title) }}', '{{ $hakiItem->registration_number }}', '{{ $hakiItem->record_number }}')"
                    >
                        <img 
                            src="{{ asset($hakiItem->document_path ?? 'images/haki.png') }}" 
                            class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500" 
                            alt="{{ $hakiItem->title }}"
                        >
                        <div class="absolute inset-0 bg-forest/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center p-4">
                            <span class="px-4 py-2 bg-white text-forest text-xs font-bold rounded-full shadow-lg">
                                Buka Sertifikat Asli
                            </span>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center justify-between text-[11px]">
                        <span class="font-mono text-charcoal/60">{{ $hakiItem->registration_number }}</span>
                        <button 
                            type="button"
                            onclick="openHakiModal('{{ asset($hakiItem->document_path ?? 'images/haki.png') }}', '{{ addslashes($hakiItem->title) }}', '{{ $hakiItem->registration_number }}', '{{ $hakiItem->record_number }}')"
                            class="font-bold text-forest hover:text-leaf-green transition-colors flex items-center space-x-1"
                        >
                            <span>Perbesar Dokumen</span>
                            <span>&rarr;</span>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- HAKI Full Screen Preview Modal -->
    <div id="haki-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-forest/50 backdrop-blur-sm" onclick="closeHakiModal()"></div>
        <div class="relative bg-white border border-sand rounded-3xl max-w-2xl w-full p-5 overflow-hidden shadow-2xl z-10 flex flex-col items-center">
            <div class="w-full flex justify-between items-start pb-3 border-b border-sand/40 mb-3">
                <div class="pr-4 space-y-1">
                    <span id="haki-modal-reg" class="text-[10px] font-bold text-leaf-green uppercase tracking-wider block font-mono"></span>
                    <h4 id="haki-modal-title" class="text-sm font-bold text-forest font-display leading-tight line-clamp-2"></h4>
                </div>
                <button onclick="closeHakiModal()" class="text-charcoal hover:text-leaf-green p-1.5 rounded-full hover:bg-sand/30 transition-colors focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="w-full max-h-[75vh] overflow-y-auto rounded-2xl border border-sand/60 bg-sand/10 p-2">
                <img id="haki-modal-img" src="{{ asset('images/haki.png') }}" class="w-full h-auto object-contain mx-auto rounded shadow-sm" alt="HAKI Official Certificate">
            </div>
        </div>
    </div>
</section>

<script>
    function openHakiModal(imgUrl, title, regNum, recordNum) {
        const modal = document.getElementById('haki-modal');
        const modalImg = document.getElementById('haki-modal-img');
        const modalTitle = document.getElementById('haki-modal-title');
        const modalReg = document.getElementById('haki-modal-reg');
        if (modal && modalImg) {
            modalImg.src = imgUrl;
            if (modalTitle) modalTitle.textContent = title;
            if (modalReg) modalReg.textContent = 'No. Permohonan: ' + regNum + (recordNum ? ' • No. Pencatatan: ' + recordNum : '');
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }
    }

    function closeHakiModal() {
        const modal = document.getElementById('haki-modal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    }
</script>

<!-- SECTION: TEAM (FROM DATABASE: team) -->
<section id="team" class="py-24 bg-white border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Tim Pengembang Resmi &bull; Team</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">Tim AGRONEX NUSANTARA</h2>
            <p class="text-sm text-charcoal/70">
                Kombinasi keahlian kepemimpinan agritech, operasional lapangan, arsitektur software cerdas, dampak sosial, rekayasa perangkat keras IoT, riset pertanian, keuangan, dan penetrasi pasar komersial.
            </p>
        </div>

        <!-- Official Team Members Grid (Dynamic from Database) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
            @foreach($team as $member)
            @php
                $translatedMember = clone $member;
                $translatedMember->name = trans_db($member->name);
                $translatedMember->role = trans_db($member->role);
                $translatedMember->bio = trans_db($member->bio);
                $translatedMember->skills = trans_db($member->skills);
                $translatedMember->contributions = trans_db($member->contributions);
            @endphp
            <div 
                onclick="openTeamModal({{ json_encode($translatedMember) }})"
                class="bg-bg-base border border-sand/40 p-6 rounded-3xl text-center space-y-4 hover-lift shadow-sm cursor-pointer group flex flex-col justify-between"
            >
                <div class="space-y-3">
                    <div class="w-24 h-24 rounded-full overflow-hidden mx-auto border-3 border-primary-cream shadow-sm relative bg-primary-cream/60 flex items-center justify-center">
                        @if($member->photo_path)
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" src="{{ $member->photo_path }}" alt="{{ $translatedMember->name }}">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-forest text-primary-cream font-bold font-display text-lg">
                                {{ substr($translatedMember->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <h4 class="font-extrabold text-sm text-forest font-display group-hover:text-leaf-green transition-colors">{{ $translatedMember->name }}</h4>
                        <span class="inline-block mt-1 px-2.5 py-0.5 rounded-full bg-forest text-primary-cream text-[9px] font-bold uppercase tracking-wider font-mono">
                            {{ $translatedMember->role }}
                        </span>
                    </div>
                    <p class="text-[11px] text-charcoal/70 line-clamp-2 leading-relaxed">
                        {{ $translatedMember->bio }}
                    </p>
                </div>
                
                <div class="pt-3 border-t border-sand/30">
                    <span class="text-[10px] text-leaf-green font-bold group-hover:underline">Biografi &amp; Peran &rarr;</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Team Profile Popup Details Modal -->
    <div id="team-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-forest/20 backdrop-blur-md" onclick="closeTeamModal()"></div>
        <div class="relative bg-white border border-sand rounded-3xl w-full max-w-lg p-6 sm:p-8 max-h-[90vh] overflow-y-auto shadow-2xl z-10 space-y-5">
            <div class="flex items-center justify-between border-b border-sand/55 pb-4">
                <div class="flex items-center space-x-4">
                    <div class="w-14 h-14 rounded-full border-2 border-primary-cream overflow-hidden shadow-sm bg-forest text-primary-cream flex items-center justify-center font-bold text-lg font-display">
                        <img id="team-modal-photo" src="" alt="photo" class="w-full h-full object-cover hidden">
                        <span id="team-modal-fallback" class="font-bold">A</span>
                    </div>
                    <div>
                        <h4 id="team-modal-name" class="font-extrabold text-base text-forest font-display">Member Name</h4>
                        <span id="team-modal-role" class="text-xs text-leaf-green font-bold uppercase tracking-wider block">Role</span>
                    </div>
                </div>
                <button onclick="closeTeamModal()" class="text-charcoal hover:text-leaf-green transition-colors focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="space-y-4 text-xs">
                <div>
                    <span class="font-bold text-forest uppercase tracking-wider text-[9px] block">Profil &amp; Tanggung Jawab:</span>
                    <p id="team-modal-bio" class="text-charcoal/80 mt-1 leading-relaxed whitespace-pre-line"></p>
                </div>
                <div>
                    <span class="font-bold text-forest uppercase tracking-wider text-[9px] block">Bidang Keahlian:</span>
                    <div id="team-modal-skills" class="flex flex-wrap gap-1.5 mt-1.5"></div>
                </div>
                <div>
                    <span class="font-bold text-forest uppercase tracking-wider text-[9px] block">Kontribusi di AGRONEX NUSANTARA:</span>
                    <p id="team-modal-contributions" class="text-charcoal/80 mt-1 leading-relaxed"></p>
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-sand/40">
                <a id="team-modal-linkedin" href="#" target="_blank" class="px-4 py-2 bg-forest hover:bg-forest-dark text-[10px] text-primary-cream font-semibold rounded-full transition-colors flex items-center space-x-1.5">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.779-1.75-1.75s.784-1.75 1.75-1.75 1.75.779 1.75 1.75-.784 1.75-1.75 1.75zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    <span>LinkedIn</span>
                </a>
                <a id="team-modal-email" href="#" class="text-[10px] text-forest hover:underline font-bold">Kontak Email</a>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: PARTNERS (FROM DATABASE: partners) -->
<section id="partners" class="py-24 bg-bg-base border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Mitra Ekosistem &bull; Partners</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">Mitra Ekosistem</h2>
            <p class="text-sm text-charcoal/70">
                Membangun ekosistem pertanian cerdas bersama mitra induk teknologi, komunitas pemberdayaan, dan kelompok tani di lapangan.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
            @foreach($partners as $partner)
            <button 
                onclick="openPartnerModal({{ json_encode($partner) }})"
                class="bg-white border border-sand/40 hover:border-leaf-green p-6 sm:p-8 rounded-3xl flex flex-col items-center justify-center space-y-3 hover-lift group cursor-pointer focus:outline-none text-center shadow-xs"
            >
                <div class="w-16 h-16 rounded-full bg-primary-cream/50 border border-sand flex items-center justify-center p-2.5 group-hover:scale-105 transition-transform overflow-hidden shadow-inner">
                    <img class="w-full h-full object-contain" src="{{ $partner->logo_path }}" alt="{{ $partner->name }}">
                </div>
                <h4 class="text-xs font-extrabold text-forest font-display group-hover:text-leaf-green leading-snug">{{ $partner->name }}</h4>
                <span class="text-[8px] bg-forest/5 text-forest px-2.5 py-0.5 rounded-full uppercase tracking-wider font-bold">
                    {{ $partner->type }}
                </span>
                <span class="text-[9px] text-leaf-green font-semibold pt-1">Lihat Rekam Kolaborasi &rarr;</span>
            </button>
            @endforeach
        </div>
    </div>

    <!-- Partner Details Popup Modal -->
    <div id="partner-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-forest/20 backdrop-blur-md" onclick="closePartnerModal()"></div>
        <div class="relative bg-white border border-sand rounded-3xl w-full max-w-lg p-6 sm:p-8 max-h-[90vh] overflow-y-auto shadow-2xl z-10 space-y-5">
            <div class="flex items-center justify-between border-b border-sand/55 pb-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full border border-sand flex items-center justify-center p-1.5 bg-white overflow-hidden shadow-sm">
                        <img id="partner-modal-logo" src="" alt="logo" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h4 id="partner-modal-name" class="font-extrabold text-base text-forest font-display">Partner Name</h4>
                        <span id="partner-modal-type" class="text-[8px] uppercase tracking-wider text-forest font-bold px-2 py-0.5 rounded bg-forest/5">Type</span>
                    </div>
                </div>
                <button onclick="closePartnerModal()" class="text-charcoal hover:text-leaf-green transition-colors focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <div class="space-y-4 text-xs">
                <div>
                    <span class="font-bold text-forest uppercase tracking-wider text-[9px] block">Cerita Kolaborasi:</span>
                    <p id="partner-modal-story" class="text-charcoal/80 mt-1 leading-relaxed"></p>
                </div>
                <div class="grid grid-cols-2 gap-4 border-t border-sand/30 pt-4">
                    <div>
                        <span class="font-bold text-leaf-green uppercase tracking-wider text-[9px] block">Tujuan &amp; Sasaran:</span>
                        <p id="partner-modal-goal" class="text-charcoal/85 mt-1"></p>
                    </div>
                    <div>
                        <span class="font-bold text-leaf-green uppercase tracking-wider text-[9px] block">Program Kolaborasi:</span>
                        <p id="partner-modal-program" class="text-charcoal/85 mt-1"></p>
                    </div>
                    <div>
                        <span class="font-bold text-leaf-green uppercase tracking-wider text-[9px] block">Hasil Langsung:</span>
                        <p id="partner-modal-results" class="text-charcoal/85 mt-1"></p>
                    </div>
                    <div>
                        <span class="font-bold text-leaf-green uppercase tracking-wider text-[9px] block">Dampak Lapangan:</span>
                        <p id="partner-modal-impact" class="text-charcoal/85 mt-1"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION: KNOWLEDGE HUB (FROM DATABASE: knowledge) -->
<section id="knowledge" class="py-24 bg-white border-b border-sand/35">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 space-y-4 md:space-y-0">
            <div class="space-y-3">
                <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Dokumentasi Riset &bull; Knowledge Hub</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">Pusat Pengetahuan Lapangan</h2>
                <p class="text-sm text-charcoal/70 max-w-xl">
                    Studi lapangan terdokumentasi mengenai riset tanah, validasi pasar, pengembangan teknologi, dan wawasan pertanian.
                </p>
            </div>
            <div>
                <a href="{{ route('knowledge') }}" class="px-6 py-3 bg-white border border-sand hover:border-leaf-green text-xs font-bold text-forest rounded-full transition-colors inline-block">
                    Lihat Seluruh Publikasi &rarr;
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($knowledge->take(3) as $article)
            <div class="bg-primary-cream/15 border border-sand/40 p-8 rounded-3xl shadow-sm hover-lift flex flex-col justify-between group">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="px-2.5 py-1 text-[9px] font-bold uppercase tracking-wider bg-forest text-primary-cream rounded-full font-mono">{{ $article->category }}</span>
                        <div class="flex items-center space-x-1.5 text-charcoal/50 text-[10px] font-semibold">
                            <span>{{ $article->published_at ? $article->published_at->format('M d, Y') : '' }}</span>
                        </div>
                    </div>
                    <h4 class="font-extrabold text-lg text-forest font-display leading-snug group-hover:text-leaf-green transition-colors">
                        <a href="{{ route('knowledge.detail', $article->slug) }}">{{ trans_db($article->title) }}</a>
                    </h4>
                    <p class="text-xs text-charcoal/70 line-clamp-3 leading-relaxed">{{ trans_db($article->content) }}</p>
                </div>
                <div class="pt-6 border-t border-sand/30 mt-6 flex items-center justify-between">
                    <div class="text-[10px] text-charcoal/60">
                        Penulis: <span class="font-bold text-forest">{{ $article->author }}</span>
                    </div>
                    <a href="{{ route('knowledge.detail', $article->slug) }}" class="inline-flex items-center text-xs font-bold text-leaf-green hover:underline">
                        Baca Selengkapnya &rarr;
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- SECTION: FINAL HOMEPAGE STATEMENT & CONTACT (FROM DATABASE: settings) -->
<section id="contact" class="py-24 bg-bg-base">
    <div class="max-w-7xl mx-auto px-6 space-y-20">
        
        <!-- Statement Box -->
        <div class="bg-forest rounded-[36px] p-8 sm:p-14 text-center text-primary-cream space-y-6 shadow-xl relative overflow-hidden">
            <div class="space-y-2">
                <span class="px-3.5 py-1 rounded-full bg-white/10 text-fresh-lime text-[10px] font-bold uppercase tracking-widest font-mono">
                    AGRONEX NUSANTARA
                </span>
                <blockquote class="text-2xl sm:text-3xl lg:text-4xl font-extrabold font-display leading-tight max-w-3xl mx-auto mt-3">
                    &ldquo;A future where every agricultural decision is no longer a guess, but powered by what is actually happening in the field.&rdquo;
                </blockquote>
                <p class="text-xs text-primary-cream/80 italic">
                    &ldquo;From Field Signals to Smarter Agricultural Decisions.&rdquo;
                </p>
            </div>

            <p class="text-xs text-primary-cream/75 max-w-xl mx-auto leading-relaxed">
                Kami tidak hanya membuat pertanian lebih pintar. Kami membangun teknologi yang membantu menjaga tanah, air, dan kehidupan petani.
            </p>

            <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
                <a href="#products" class="px-8 py-3.5 bg-leaf-green hover:bg-fresh-lime text-forest font-bold text-xs uppercase tracking-wider rounded-full shadow transition-all duration-300 transform hover:-translate-y-0.5">
                    Explore AGRONEX
                </a>
                <a href="#contact-form" class="px-8 py-3.5 bg-transparent border border-primary-cream/40 text-primary-cream hover:bg-white/10 font-bold text-xs uppercase tracking-wider rounded-full transition-all duration-300">
                    Partner With Us
                </a>
            </div>
        </div>

        <!-- Contact details and form -->
        <div id="contact-form" class="grid grid-cols-1 lg:grid-cols-12 gap-12 pt-8">
            <!-- Contact details -->
            <div class="lg:col-span-5 space-y-8">
                <div class="space-y-4">
                    <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Hubungi Kami &bull; Get in Touch</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">Mari Bermitra dengan AGRONEX</h2>
                    <p class="text-sm text-charcoal/80 leading-relaxed">
                        Tertarik bekerja sama dalam deployment perangkat di lahan kelompok tani, program CSR pertanian, kemitraan teknologi, atau penelitian lapangan?
                    </p>
                </div>

                <div class="space-y-4">
                    <!-- Email -->
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 rounded-xl bg-forest/5 flex items-center justify-center text-forest">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <span class="text-[9px] font-bold text-charcoal/50 uppercase tracking-widest block">Alamat Email Resmi</span>
                            <a href="mailto:{{ $settings['contact_email'] ?? 'yotainovasinusantara@gmail.com' }}" class="text-sm font-semibold text-forest hover:text-leaf-green">
                                {{ $settings['contact_email'] ?? 'yotainovasinusantara@gmail.com' }}
                            </a>
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 rounded-xl bg-forest/5 flex items-center justify-center text-forest">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <span class="text-[9px] font-bold text-charcoal/50 uppercase tracking-widest block">WhatsApp Resmi Lapangan</span>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['contact_whatsapp'] ?? '6285862319524') }}" class="text-sm font-semibold text-forest hover:text-leaf-green" target="_blank">
                                {{ $settings['contact_whatsapp'] ?? '0858-6231-9524' }}
                            </a>
                        </div>
                    </div>

                    <!-- Instagram -->
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 rounded-xl bg-forest/5 flex items-center justify-center text-forest">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="2"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zM17.5 6.5h.01" stroke-width="2"/></svg>
                        </div>
                        <div>
                            <span class="text-[9px] font-bold text-charcoal/50 uppercase tracking-widest block">Instagram Resmi</span>
                            <a href="{{ $settings['contact_instagram'] ?? 'https://www.instagram.com/agronex_nusantara' }}" class="text-sm font-semibold text-forest hover:text-leaf-green" target="_blank">
                                @agronex_nusantara
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="lg:col-span-7 bg-white border border-sand/40 p-8 rounded-3xl shadow-sm">
                @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-leaf-green/10 border border-leaf-green/30 text-xs font-semibold text-leaf-green">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label for="name" class="text-[10px] font-bold uppercase tracking-wider text-forest">Nama Lengkap</label>
                            <input type="text" name="name" id="name" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green text-xs bg-bg-base" placeholder="Nama Anda / Perwakilan Lembaga">
                        </div>
                        <div class="space-y-1.5">
                            <label for="email" class="text-[10px] font-bold uppercase tracking-wider text-forest">Alamat Email</label>
                            <input type="email" name="email" id="email" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green text-xs bg-bg-base" placeholder="email@instansi.com">
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label for="subject" class="text-[10px] font-bold uppercase tracking-wider text-forest">Kategori Kepentingan</label>
                        <input type="text" name="subject" id="subject" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green text-xs bg-bg-base" placeholder="Kemitraan Lahan / Demo Produk / Program CSR">
                    </div>

                    <div class="space-y-1.5">
                        <label for="message" class="text-[10px] font-bold uppercase tracking-wider text-forest">Pesan &amp; Kebutuhan Kolaborasi</label>
                        <textarea name="message" id="message" rows="4" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green text-xs bg-bg-base leading-relaxed" placeholder="Tuliskan detail rencana kebutuhan Anda..."></textarea>
                    </div>

                    <button type="submit" class="w-full py-4 bg-forest hover:bg-forest-dark font-bold text-xs uppercase tracking-wider text-primary-cream rounded-full shadow transition-colors">
                        Kirim Pesan Kolaborasi
                    </button>
                </form>
            </div>
        </div>

    </div>
</section>

<!-- PRODUCT SPECIFICATION MODAL -->
<div id="product-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-forest/30 backdrop-blur-md" onclick="closeProductModal()"></div>
    <div class="relative bg-white border border-sand rounded-3xl w-full max-w-3xl overflow-hidden shadow-2xl z-10 flex flex-col md:flex-row max-h-[90vh]">
        <!-- Left: Image -->
        <div class="md:w-5/12 h-56 md:h-auto bg-primary-cream/30 overflow-hidden relative border-r border-sand/30">
            <img id="modal-product-image" class="w-full h-full object-cover" src="" alt="product">
            <div class="absolute inset-0 bg-gradient-to-t from-forest/80 via-transparent to-transparent p-6 flex flex-col justify-end">
                <span class="text-[9px] font-bold text-fresh-lime uppercase tracking-wider font-mono">AGRONEX HARDWARE CATALOG</span>
                <h4 id="modal-product-name-left" class="text-lg font-bold text-white font-display mt-0.5 leading-snug">Product Name</h4>
            </div>
        </div>
        <!-- Right: Specs -->
        <div class="md:w-7/12 p-6 sm:p-8 overflow-y-auto space-y-6 flex flex-col justify-between">
            <div class="space-y-5">
                <div class="flex items-center justify-between border-b border-sand/55 pb-3">
                    <span class="text-[10px] font-extrabold text-leaf-green tracking-widest uppercase">Spesifikasi Lapangan</span>
                    <button onclick="closeProductModal()" class="text-charcoal hover:text-leaf-green transition-colors focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                
                <div>
                    <h3 id="modal-product-name" class="text-2xl font-extrabold text-forest font-display leading-tight">Product</h3>
                    <p id="modal-product-description" class="text-xs text-charcoal/70 mt-1 leading-relaxed"></p>
                </div>

                <div>
                    <h4 class="text-[10px] font-bold uppercase tracking-wider text-forest">Deskripsi &amp; Konfigurasi:</h4>
                    <p id="modal-product-detail" class="text-xs text-charcoal/80 mt-1.5 leading-relaxed whitespace-pre-line"></p>
                </div>

                <div>
                    <h4 class="text-[10px] font-bold uppercase tracking-wider text-forest">Fitur Utama:</h4>
                    <ul id="modal-product-features" class="mt-2 space-y-1.5 text-xs text-charcoal/80"></ul>
                </div>
            </div>

            <div class="pt-4 border-t border-sand/40">
                <button onclick="closeProductModal()" class="w-full py-3 bg-forest hover:bg-forest-dark text-primary-cream text-xs font-bold rounded-xl transition-colors">
                    Tutup Spesifikasi
                </button>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS: Interactive Elements, Modals, Canvas Particles, Live Counters, Leaflet Map -->
<script>
    // 1. Canvas Dynamic Field Telemetry Particles in Hero
    const canvas = document.getElementById('hero-canvas');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        let width = canvas.width = window.innerWidth;
        let height = canvas.height = canvas.parentElement.clientHeight;

        window.addEventListener('resize', () => {
            width = canvas.width = window.innerWidth;
            height = canvas.height = canvas.parentElement.clientHeight;
        });

        const particles = [];
        const numParticles = 24;

        for (let i = 0; i < numParticles; i++) {
            particles.push({
                x: Math.random() * width,
                y: Math.random() * height,
                vx: (Math.random() - 0.5) * 0.4,
                vy: (Math.random() - 0.5) * 0.4,
                radius: Math.random() * 2 + 1,
                alpha: Math.random() * 0.35 + 0.1
            });
        }

        function drawParticles() {
            ctx.clearRect(0, 0, width, height);

            particles.forEach((p, idx) => {
                p.x += p.vx;
                p.y += p.vy;

                if (p.x < 0) p.x = width;
                if (p.x > width) p.x = 0;
                if (p.y < 0) p.y = height;
                if (p.y > height) p.y = 0;

                ctx.beginPath();
                ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(107, 158, 75, ${p.alpha})`;
                ctx.fill();

                for (let j = idx + 1; j < particles.length; j++) {
                    const p2 = particles[j];
                    const dist = Math.hypot(p.x - p2.x, p.y - p2.y);
                    if (dist < 130) {
                        ctx.beginPath();
                        ctx.moveTo(p.x, p.y);
                        ctx.lineTo(p2.x, p2.y);
                        ctx.strokeStyle = `rgba(47, 93, 80, ${0.08 * (1 - dist / 130)})`;
                        ctx.lineWidth = 0.75;
                        ctx.stroke();
                    }
                }
            });

            requestAnimationFrame(drawParticles);
        }
        drawParticles();
    }

    // 2. Live Counters Animation
    const counters = document.querySelectorAll('.live-counter');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const targetVal = parseInt(el.getAttribute('data-target'), 10) || 0;
                const originalText = el.innerText;
                let start = 0;
                const duration = 1200;
                const startTime = performance.now();

                function animateCounter(now) {
                    const elapsed = now - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    const current = Math.floor(progress * targetVal);
                    
                    if (originalText.includes('+')) {
                        el.innerText = current + '+';
                    } else if (originalText.includes('%')) {
                        el.innerText = current + '%';
                    } else if (originalText.includes('m')) {
                        el.innerText = current + 'm';
                    } else {
                        el.innerText = current;
                    }

                    if (progress < 1) {
                        requestAnimationFrame(animateCounter);
                    } else {
                        el.innerText = originalText;
                    }
                }
                requestAnimationFrame(animateCounter);
                counterObserver.unobserve(el);
            }
        });
    }, { threshold: 0.5 });
    counters.forEach(c => counterObserver.observe(c));

    // 3. Product Modal Logic
    const productModal = document.getElementById('product-modal');
    const pName = document.getElementById('modal-product-name');
    const pDesc = document.getElementById('modal-product-description');
    const pDetail = document.getElementById('modal-product-detail');
    const pFeatures = document.getElementById('modal-product-features');
    const pImage = document.getElementById('modal-product-image');

    function openProductModal(prod) {
        if (!productModal) return;
        pName.innerText = prod.name;
        pDesc.innerText = prod.description;
        document.getElementById('modal-product-name-left').innerText = prod.name;
        pImage.src = prod.image_path || '';
        pDetail.innerText = prod.detail_content || prod.description;

        pFeatures.innerHTML = '';
        if (prod.features) {
            const list = prod.features.split('\n');
            list.forEach(item => {
                if (item.trim()) {
                    const li = document.createElement('li');
                    li.className = 'flex items-start space-x-2';
                    li.innerHTML = `
                        <svg class="w-3.5 h-3.5 text-leaf-green mt-0.5 shrink-0" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>${item.trim()}</span>
                    `;
                    pFeatures.appendChild(li);
                }
            });
        }
        productModal.classList.remove('hidden');
    }

    function closeProductModal() {
        if (!productModal) return;
        productModal.classList.add('hidden');
    }

    // 4. Partner Modal Logic
    const partnerModal = document.getElementById('partner-modal');
    const partLogo = document.getElementById('partner-modal-logo');
    const partName = document.getElementById('partner-modal-name');
    const partType = document.getElementById('partner-modal-type');
    const partStory = document.getElementById('partner-modal-story');
    const partGoal = document.getElementById('partner-modal-goal');
    const partProgram = document.getElementById('partner-modal-program');
    const partResults = document.getElementById('partner-modal-results');
    const partImpact = document.getElementById('partner-modal-impact');

    function openPartnerModal(partner) {
        if (!partnerModal) return;
        partLogo.src = partner.logo_path;
        partName.innerText = partner.name;
        partType.innerText = partner.type;
        partStory.innerText = partner.collaboration_story || 'Detail kolaborasi dalam proses.';
        partGoal.innerText = partner.goal || 'Penguatan kapasitas ekosistem';
        partProgram.innerText = partner.program || 'Program kemitraan lapangan';
        partResults.innerText = partner.results || 'Data kalibrasi dan validasi';
        partImpact.innerText = partner.impact || 'Pemberdayaan berkelanjutan';

        partnerModal.classList.remove('hidden');
    }

    function closePartnerModal() {
        if (!partnerModal) return;
        partnerModal.classList.add('hidden');
    }

    // 5. Team Profile Modal Logic
    const teamModal = document.getElementById('team-modal');
    const teamPhoto = document.getElementById('team-modal-photo');
    const teamFallback = document.getElementById('team-modal-fallback');
    const teamName = document.getElementById('team-modal-name');
    const teamRole = document.getElementById('team-modal-role');
    const teamBio = document.getElementById('team-modal-bio');
    const teamSkills = document.getElementById('team-modal-skills');
    const teamContributions = document.getElementById('team-modal-contributions');
    const teamLinkedin = document.getElementById('team-modal-linkedin');
    const teamEmail = document.getElementById('team-modal-email');

    function openTeamModal(member) {
        if (!teamModal) return;
        if (member.photo_path) {
            teamPhoto.src = member.photo_path;
            teamPhoto.classList.remove('hidden');
            teamFallback.classList.add('hidden');
        } else {
            teamPhoto.classList.add('hidden');
            teamFallback.innerText = member.name.charAt(0);
            teamFallback.classList.remove('hidden');
        }

        teamName.innerText = member.name;
        teamRole.innerText = member.role;
        teamBio.innerText = member.bio || 'Biografi dalam proses pemutakhiran.';
        teamContributions.innerText = member.contributions || 'Kontribusi strategis dalam pengembangan ekosistem AGRONEX.';
        
        teamSkills.innerHTML = '';
        if (member.skills) {
            member.skills.split(',').forEach(skill => {
                const badge = document.createElement('span');
                badge.className = 'px-2.5 py-0.5 text-[9px] bg-primary-cream border border-sand rounded text-forest font-semibold';
                badge.innerText = skill.trim();
                teamSkills.appendChild(badge);
            });
        }

        teamLinkedin.href = member.linkedin_url || '#';
        teamEmail.href = member.email ? 'mailto:' + member.email : '#';
        teamEmail.innerText = member.email || 'Email resmi terhubung';

        teamModal.classList.remove('hidden');
    }

    function closeTeamModal() {
        if (!teamModal) return;
        teamModal.classList.add('hidden');
    }

    // 6. HAKI Modal Logic
    const hakiModal = document.getElementById('haki-modal');
    function openHakiModal() {
        if (hakiModal) hakiModal.classList.remove('hidden');
    }
    function closeHakiModal() {
        if (hakiModal) hakiModal.classList.add('hidden');
    }

    // 7. Interactive Leaflet Map for Real Placement Points (from Database: mapMarkers)
    document.addEventListener('DOMContentLoaded', () => {
        const mapContainer = document.getElementById('public-map');
        if (mapContainer && typeof L !== 'undefined') {
            const map = L.map('public-map', {
                center: [-7.0500, 107.7500],
                zoom: 9,
                scrollWheelZoom: false
            });

            // High-resolution, reliable CartoDB Voyager layer (No 403 blocks, optimized for modern agritech display)
            const voyagerLayer = L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions" target="_blank">CARTO</a>',
                subdomains: 'abcd',
                maxZoom: 20
            });

            // Satellite imagery layer for real agricultural fields (Esri World Imagery)
            const satelliteLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, GIS User Community',
                maxZoom: 19
            });

            // Add default layer
            voyagerLayer.addTo(map);

            // Layer selector control
            const baseMaps = {
                "Peta Lapangan Presisi": voyagerLayer,
                "Citra Satelit Lahan": satelliteLayer
            };
            L.control.layers(baseMaps, null, { position: 'topright' }).addTo(map);

            const points = [
                @foreach($mapMarkers as $marker)
                {
                    name: {!! json_encode(trans_db($marker->title)) !!},
                    lat: {{ $marker->latitude }},
                    lng: {{ $marker->longitude }},
                    category: {!! json_encode($marker->marker_type) !!},
                    desc: @php
                        $desc = '';
                        if ($marker->details) {
                            $details = is_string($marker->details) ? json_decode($marker->details, true) : $marker->details;
                            if (is_array($details)) {
                                $parts = [];
                                foreach ($details as $d) {
                                    $parts[] = '<strong>' . htmlspecialchars($d['key_id'] ?? '') . ':</strong> ' . htmlspecialchars($d['value'] ?? '');
                                }
                                $desc = implode('<br>', $parts);
                            }
                        }
                    @endphp {!! json_encode($desc ?: $marker->marker_type) !!}
                },
                @endforeach
            ];

            const markersGroup = L.featureGroup();

            points.forEach(pt => {
                const isPilot = pt.category && pt.category.includes('Pilot Project');
                const isWater = pt.category && pt.category.includes('Air');

                const marker = L.circleMarker([pt.lat, pt.lng], {
                    radius: isPilot ? 11 : 8,
                    fillColor: isPilot ? "#143823" : (isWater ? "#0284c7" : "#2F5D50"),
                    color: isPilot ? "#84cc16" : (isWater ? "#38bdf8" : "#6B9E4B"),
                    weight: isPilot ? 3 : 2,
                    opacity: 1,
                    fillOpacity: 0.9
                });

                marker.bindPopup(`
                    <div style="font-family: 'Inter', sans-serif; padding: 6px 4px; min-width: 220px; max-width: 280px;">
                        <div style="display: flex; align-items: center; gap: 6px; margin-bottom: 6px;">
                            <span style="font-size: 8.5px; font-weight: 700; color: #143823; text-transform: uppercase; background: #e8f5e9; padding: 2px 7px; border-radius: 9999px; letter-spacing: 0.5px;">${pt.category}</span>
                        </div>
                        <h4 style="font-size: 13.5px; font-weight: 700; color: #143823; margin: 0 0 6px 0; line-height: 1.3;">${pt.name}</h4>
                        <div style="font-size: 11px; color: #4B5563; line-height: 1.5; border-top: 1px solid #E5E7EB; padding-top: 6px;">
                            ${pt.desc}
                        </div>
                    </div>
                `);

                markersGroup.addLayer(marker);
            });

            markersGroup.addTo(map);

            if (points.length > 0) {
                map.fitBounds(markersGroup.getBounds().pad(0.12));
            }
        }
    });
</script>
@endsection
