@extends('layouts.public')

@section('title', 'Katalog Produk & Toko Agritech • AGRONEX NUSANTARA')

@section('content')
<!-- COMMERCIAL HOOK HERO SECTION -->
<section class="relative bg-gradient-to-b from-primary-cream via-primary-cream/50 to-bg-base pt-20 pb-16 border-b border-sand/40 overflow-hidden">
    <!-- Subtle Background Grid Pattern -->
    <div class="absolute inset-0 opacity-5 pointer-events-none bg-[radial-gradient(#1B3B2B_1px,transparent_1px)] [background-size:16px_16px]"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-xs text-charcoal/60 mb-6 font-medium">
            <a href="{{ route('home') }}" class="hover:text-leaf-green transition-colors">Beranda</a>
            <span>&bull;</span>
            <span class="text-forest font-bold">Katalog Resmi &amp; Toko Agritech</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-8 space-y-6">
                <!-- Commercial Hook Eyebrow -->
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-leaf-green/10 border border-leaf-green/20 text-xs font-extrabold text-leaf-green uppercase tracking-wider">
                    <span class="w-1.5 h-1.5 rounded-full bg-leaf-green"></span>
                    <span>Katalog &amp; Penjualan Resmi 2026 &bull; Ready Stock</span>
                </div>

                <!-- Big Hook Headline -->
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-forest font-display tracking-tight leading-[1.12]">
                    Bukan Sekadar Alat IoT.<br>
                    <span class="text-leaf-green">Investasi Presisi yang Balik Modal</span><br>
                    dalam 1 Kali Panen.
                </h1>

                <!-- Commercial Hook Subheadline -->
                <p class="text-base sm:text-lg text-charcoal/80 max-w-2xl leading-relaxed">
                    Tinggalkan pemupukan tebak-tebakan yang memboroskan jutaan rupiah. Sensor presisi AGRONEX membaca kadar NPK, pH, kelembaban, dan iklim mikro secara real-time langsung ke ponsel Anda.
                </p>

                <!-- Value Proposition Trust Bar (No Emojis, Clean Professional Badges) -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-2">
                    <div class="p-3.5 bg-white/80 backdrop-blur rounded-2xl border border-sand/60 shadow-xs">
                        <div class="text-[11px] font-extrabold text-forest uppercase tracking-wider">Garansi 12 Bulan</div>
                        <div class="text-[10px] text-charcoal/60 mt-0.5">Penggantian unit resmi</div>
                    </div>
                    <div class="p-3.5 bg-white/80 backdrop-blur rounded-2xl border border-sand/60 shadow-xs">
                        <div class="text-[11px] font-extrabold text-forest uppercase tracking-wider">Kirim Nusantara</div>
                        <div class="text-[10px] text-charcoal/60 mt-0.5">Kemasan aman &amp; asuransi</div>
                    </div>
                    <div class="p-3.5 bg-white/80 backdrop-blur rounded-2xl border border-sand/60 shadow-xs">
                        <div class="text-[11px] font-extrabold text-forest uppercase tracking-wider">Sistem Plug &amp; Play</div>
                        <div class="text-[10px] text-charcoal/60 mt-0.5">Termasuk kartu SIM IoT</div>
                    </div>
                    <div class="p-3.5 bg-white/80 backdrop-blur rounded-2xl border border-sand/60 shadow-xs">
                        <div class="text-[11px] font-extrabold text-forest uppercase tracking-wider">Kalibrasi Lahan</div>
                        <div class="text-[10px] text-charcoal/60 mt-0.5">Pendampingan agronomi</div>
                    </div>
                </div>

                <!-- Quick Action Buttons -->
                <div class="flex flex-wrap items-center gap-4 pt-2">
                    <a href="#katalog-produk" class="px-7 py-3.5 bg-forest text-primary-cream hover:bg-forest-dark font-extrabold text-xs uppercase tracking-wider rounded-full shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                        Lihat Semua Produk &amp; Promo
                    </a>
                    <a href="#hitung-roi" class="px-7 py-3.5 bg-white border border-sand hover:border-leaf-green text-forest font-extrabold text-xs uppercase tracking-wider rounded-full shadow-xs hover:shadow transition-all duration-300">
                        Hitung Penghematan Pupuk Lahan
                    </a>
                </div>
            </div>

            <!-- Hook Urgency Card Right -->
            <div class="lg:col-span-4">
                <div class="bg-white rounded-3xl p-6 border-2 border-leaf-green/30 shadow-xl relative overflow-hidden space-y-5">
                    <div class="flex items-center justify-between pb-3 border-b border-sand/50">
                        <span class="px-3 py-1 bg-leaf-green text-white text-[10px] font-extrabold uppercase rounded-full tracking-wider">
                            Paket Rekomendasi
                        </span>
                        <span class="text-xs font-bold text-leaf-green">Hemat s/d 30%</span>
                    </div>

                    <div class="space-y-2">
                        <h3 class="font-extrabold text-lg text-forest font-display">Starter Kit Tani Presisi</h3>
                        <p class="text-xs text-charcoal/70 leading-relaxed">
                            Paket bundling pilihan petani hortikultura Garut: 1x SoilSense + 1x WaterSense + Akses Cloud &amp; SIM 1 Tahun.
                        </p>
                    </div>

                    <div class="p-3.5 bg-primary-cream/40 rounded-2xl border border-sand/40 space-y-1">
                        <div class="text-[11px] text-charcoal/50 line-through">Rp 4.550.000</div>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-2xl font-black text-forest font-mono">Rp 3.200.000</span>
                            <span class="text-[10px] font-bold text-leaf-green bg-leaf-green/10 px-2 py-0.5 rounded-full">Hemat Rp 1,35 Jt</span>
                        </div>
                    </div>

                    <ul class="text-xs space-y-2 text-charcoal/80 font-medium">
                        <li class="flex items-center space-x-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-leaf-green flex-shrink-0"></span>
                            <span>Akurasi sensor tanah &amp; kelembapan &gt; 95%</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-leaf-green flex-shrink-0"></span>
                            <span>Termasuk Kartu SIM IoT Telkomsel 1 Tahun</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-leaf-green flex-shrink-0"></span>
                            <span>Akses Aplikasi Ponsel &amp; Notifikasi Lahan</span>
                        </li>
                    </ul>

                    <a 
                        href="https://wa.me/{{ $settings['contact_whatsapp'] ?? '6285862319524' }}?text=Halo%20Agronex%20Nusantara,%20saya%20tertarik%20dengan%20Promo%20Starter%20Kit%20Tani%20Presisi%20(Rp%203.200.000).%20Mohon%20info%20ketersediaan%20stok%20dan%20cara%20pemesanannya." 
                        target="_blank"
                        class="w-full py-3.5 bg-leaf-green hover:bg-leaf-green-dark text-white font-extrabold text-xs uppercase tracking-wider rounded-2xl text-center block shadow-md hover:shadow-lg transition-all"
                    >
                        Pesan Promo via WhatsApp
                    </a>

                    <div class="text-[10px] text-center text-charcoal/50">
                        Terbatas 15 unit untuk kloter produksi Garut bulan ini
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MAIN STOREFRONT SECTION -->
<section id="katalog-produk" class="py-20 bg-bg-base">
    <div class="max-w-7xl mx-auto px-6 space-y-12">
        
        <!-- Header & Category Filter Bar -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-6 border-b border-sand/40">
            <div>
                <span class="text-xs font-extrabold uppercase tracking-widest text-leaf-green">Katalog Perangkat Lapangan Resmi</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display mt-1">Pilihan Produk AGRONEX</h2>
                <p class="text-sm text-charcoal/70 mt-1">Pilih perangkat sesuai parameter lahan yang ingin Anda optimalkan.</p>
            </div>

            <!-- Filter Pills -->
            <div class="flex flex-wrap items-center gap-2">
                <button onclick="filterCategory('all')" id="btn-filter-all" class="category-pill active px-4 py-2 rounded-full text-xs font-bold transition-all bg-forest text-primary-cream">
                    Semua Produk (4)
                </button>
                <button onclick="filterCategory('soil')" id="btn-filter-soil" class="category-pill px-4 py-2 rounded-full text-xs font-bold transition-all bg-white border border-sand hover:border-forest text-charcoal">
                    Sensor Tanah (2)
                </button>
                <button onclick="filterCategory('water-climate')" id="btn-filter-water-climate" class="category-pill px-4 py-2 rounded-full text-xs font-bold transition-all bg-white border border-sand hover:border-forest text-charcoal">
                    Air &amp; Iklim Mikro (2)
                </button>
                <a href="#paket-bundle" class="px-4 py-2 rounded-full text-xs font-bold transition-all bg-leaf-green/10 border border-leaf-green/30 text-leaf-green hover:bg-leaf-green hover:text-white">
                    Paket Bundling
                </a>
            </div>
        </div>

        <!-- PRODUCTS E-COMMERCE GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($products as $product)
            @php
                $translatedName = trans_db($product->name);
                $translatedDesc = trans_db($product->description);
                $translatedHook = trans_db($product->hook ?? 'Investasi alat presisi untuk meningkatkan hasil panen dan efisiensi biaya lahan.');
                $badgeText = $product->badge ?? 'PRODUK UNGGULAN';
                $priceDisplay = $product->price ? number_format($product->price, 0, ',', '.') : 'Hubungi Tim';
                $origPriceDisplay = $product->original_price ? number_format($product->original_price, 0, ',', '.') : null;
                $sku = $product->sku ?? ('AGX-' . strtoupper(substr($product->slug, 0, 4)));
                $rating = $product->rating ?? '4.9';
                $reviews = $product->reviews_count ?? 45;
                $categoryGroup = in_array($product->slug, ['soilsense', 'terra']) ? 'soil' : 'water-climate';

                $packageList = [];
                if ($product->package_includes) {
                    $decodedPkg = json_decode($product->package_includes, true);
                    if (is_array($decodedPkg)) {
                        $packageList = $decodedPkg;
                    }
                }
            @endphp

            <div 
                class="product-card bg-white rounded-3xl border border-sand/50 hover:border-leaf-green shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between overflow-hidden group"
                data-category="{{ $categoryGroup }}"
            >
                <div>
                    <!-- Product Image Container -->
                    <div class="relative w-full aspect-[4/3] bg-primary-cream/30 overflow-hidden border-b border-sand/40">
                        @if($product->image_path)
                            <img src="{{ asset($product->image_path) }}" alt="{{ $translatedName }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-forest/5 text-forest font-bold font-display">
                                AGRONEX {{ $translatedName }}
                            </div>
                        @endif

                        <!-- Badge Top Left -->
                        <div class="absolute top-3 left-3 px-2.5 py-1 bg-forest text-primary-cream text-[9px] font-extrabold uppercase rounded-full shadow-sm">
                            {{ $badgeText }}
                        </div>

                        <!-- Stock Status Top Right -->
                        <div class="absolute top-3 right-3 px-2.5 py-1 bg-white/95 backdrop-blur-sm border border-sand/40 text-[9px] font-bold text-leaf-green rounded-full flex items-center space-x-1.5 shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-leaf-green"></span>
                            <span>Ready Stock</span>
                        </div>
                    </div>

                    <!-- Product Body Content -->
                    <div class="p-6 space-y-4">
                        <!-- Rating & SKU -->
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-charcoal/70 text-[11px] font-semibold">Rating: {{ $rating }}/5 ({{ $reviews }} ulasan)</span>
                            <span class="font-mono text-[10px] text-charcoal/50 uppercase font-semibold">SKU: {{ $sku }}</span>
                        </div>

                        <!-- Product Title -->
                        <div>
                            <h3 class="font-extrabold text-xl text-forest font-display group-hover:text-leaf-green transition-colors">
                                {{ $translatedName }}
                            </h3>
                            <p class="text-xs text-charcoal/70 line-clamp-2 mt-1 leading-relaxed">
                                {{ $translatedDesc }}
                            </p>
                        </div>

                        <!-- Commercial Hook Callout -->
                        <div class="p-3 rounded-2xl bg-primary-cream/40 border border-sand/50 text-[11px] text-forest/90 leading-relaxed font-medium">
                            &ldquo;{{ $translatedHook }}&rdquo;
                        </div>

                        <!-- Key Benefit Badges -->
                        <div class="space-y-1.5 text-xs text-charcoal/75">
                            @if($product->slug === 'soilsense')
                                <div class="flex items-center space-x-2 text-[11px]">
                                    <span class="w-1.5 h-1.5 rounded-full bg-leaf-green flex-shrink-0"></span>
                                    <span>Monitoring pH, NPK, &amp; Kelembapan</span>
                                </div>
                                <div class="flex items-center space-x-2 text-[11px]">
                                    <span class="w-1.5 h-1.5 rounded-full bg-leaf-green flex-shrink-0"></span>
                                    <span>Hemat Pupuk s/d 25%</span>
                                </div>
                            @elseif($product->slug === 'watersense')
                                <div class="flex items-center space-x-2 text-[11px]">
                                    <span class="w-1.5 h-1.5 rounded-full bg-leaf-green flex-shrink-0"></span>
                                    <span>Sensor Volumetrik Air &amp; Debit Irigasi</span>
                                </div>
                                <div class="flex items-center space-x-2 text-[11px]">
                                    <span class="w-1.5 h-1.5 rounded-full bg-leaf-green flex-shrink-0"></span>
                                    <span>Cegah Busuk Akar &amp; Hemat Air 35%</span>
                                </div>
                            @elseif($product->slug === 'envirosense')
                                <div class="flex items-center space-x-2 text-[11px]">
                                    <span class="w-1.5 h-1.5 rounded-full bg-leaf-green flex-shrink-0"></span>
                                    <span>Suhu, Kelembaban RH &amp; Radiasi Sinar</span>
                                </div>
                                <div class="flex items-center space-x-2 text-[11px]">
                                    <span class="w-1.5 h-1.5 rounded-full bg-leaf-green flex-shrink-0"></span>
                                    <span>Deteksi Dini Jamur &amp; Cuaca Ekstrem</span>
                                </div>
                            @elseif($product->slug === 'terra')
                                <div class="flex items-center space-x-2 text-[11px]">
                                    <span class="w-1.5 h-1.5 rounded-full bg-leaf-green flex-shrink-0"></span>
                                    <span>Soil Scanner Portabel Multi-Lahan</span>
                                </div>
                                <div class="flex items-center space-x-2 text-[11px]">
                                    <span class="w-1.5 h-1.5 rounded-full bg-leaf-green flex-shrink-0"></span>
                                    <span>Uji Kesuburan dalam 3 Menit</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Product Footer & Pricing / CTA -->
                <div class="p-6 pt-0 space-y-4">
                    <!-- Pricing Area -->
                    <div class="pt-3 border-t border-sand/40">
                        @if($origPriceDisplay)
                            <div class="text-[11px] text-charcoal/40 line-through">Rp {{ $origPriceDisplay }}</div>
                        @endif
                        <div class="flex items-baseline space-x-1.5">
                            <span class="text-xs text-charcoal/60 font-bold">Rp</span>
                            <span class="text-2xl font-black text-forest font-mono tracking-tight">{{ $priceDisplay }}</span>
                            <span class="text-[11px] text-charcoal/50">/ unit</span>
                        </div>
                        @if($product->subscription_price && $product->subscription_price > 0)
                            <div class="text-[10px] text-leaf-green font-bold mt-0.5">
                                atau sewa mulai Rp {{ number_format($product->subscription_price, 0, ',', '.') }}/bulan
                            </div>
                        @endif
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-2">
                        <!-- Direct WhatsApp Order Button -->
                        <a 
                            href="https://wa.me/{{ $settings['contact_whatsapp'] ?? '6285862319524' }}?text=Halo%20Tim%20Agronex%20Nusantara,%20saya%20ingin%20memesan%20perangkat%20{{ urlencode($translatedName) }}%20(SKU:%20{{ $sku }}).%20Harga:%20Rp%20{{ $priceDisplay }}.%20Mohon%20info%20stok%20dan%20tata%20cara%20pembelian." 
                            target="_blank"
                            class="w-full py-3 bg-leaf-green hover:bg-leaf-green-dark text-white font-extrabold text-xs uppercase tracking-wider rounded-xl text-center block shadow-xs hover:shadow-md transition-all"
                        >
                            Pesan via WhatsApp
                        </a>

                        <!-- Open Detail & Checkout Modal -->
                        <button 
                            type="button"
                            onclick='openCheckoutModal(@json($product), "{{ $translatedName }}", "{{ $translatedDesc }}", "{{ $priceDisplay }}", "{{ $origPriceDisplay }}", "{{ $sku }}", @json($packageList))'
                            class="w-full py-2.5 bg-white border border-sand hover:border-forest text-forest hover:bg-primary-cream/40 font-bold text-xs rounded-xl transition-colors text-center"
                        >
                            Detail &amp; Spesifikasi Lengkap
                        </button>
                    </div>

                    <div class="text-[9px] text-center text-charcoal/50">
                        {{ $product->warranty_info ?? 'Garansi Resmi 12 Bulan Ganti Baru' }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- COMMERCIAL HOOK: ROI & FERTILIZER SAVING CALCULATOR -->
<section id="hitung-roi" class="py-20 bg-primary-cream/40 border-y border-sand/40 relative">
    <div class="max-w-5xl mx-auto px-6 space-y-10">
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <span class="text-xs font-extrabold uppercase tracking-widest text-leaf-green">Kalkulator Penghematan Pupuk &amp; ROI</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">Hitung Balik Modal Lahan Anda</h2>
            <p class="text-sm text-charcoal/75 leading-relaxed">
                Berdasarkan data uji coba lapangan Garut, penggunaan pupuk berlebih tanpa data sensor dapat dihemat 20% - 25% tanpa mengurangi produktivitas panen.
            </p>
        </div>

        <div class="bg-white rounded-3xl p-8 sm:p-10 border border-sand/50 shadow-xl grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
            <!-- Form Inputs -->
            <div class="md:col-span-6 space-y-6">
                <!-- Luas Lahan Slider -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <label class="text-xs font-extrabold text-forest uppercase tracking-wider">Luas Hamparan Lahan:</label>
                        <span id="roi-area-label" class="text-sm font-black text-leaf-green font-mono bg-leaf-green/10 px-2.5 py-0.5 rounded-full">1 Hektar</span>
                    </div>
                    <input 
                        type="range" 
                        id="roi-area-slider" 
                        min="0.5" 
                        max="10" 
                        step="0.5" 
                        value="1" 
                        class="w-full h-2 bg-sand rounded-lg appearance-none cursor-pointer accent-leaf-green"
                        oninput="calculateROI()"
                    >
                    <div class="flex justify-between text-[10px] text-charcoal/50">
                        <span>0.5 Ha</span>
                        <span>5 Ha</span>
                        <span>10 Ha</span>
                    </div>
                </div>

                <!-- Komoditas Selection -->
                <div class="space-y-2">
                    <label class="text-xs font-extrabold text-forest uppercase tracking-wider">Komoditas Tanaman:</label>
                    <select id="roi-crop-select" onchange="calculateROI()" class="w-full px-4 py-3 rounded-xl border border-sand bg-bg-base text-charcoal font-medium text-xs focus:outline-none focus:border-leaf-green">
                        <option value="horti_cabai" selected>Cabai Merah / Rawit (Biaya Pupuk ~Rp 14 Juta/Ha/Musim)</option>
                        <option value="horti_kentang">Kentang Dataran Tinggi (Biaya Pupuk ~Rp 18 Juta/Ha/Musim)</option>
                        <option value="horti_bawang">Bawang Merah (Biaya Pupuk ~Rp 16 Juta/Ha/Musim)</option>
                        <option value="pangan_padi">Padi Sawah (Biaya Pupuk ~Rp 6 Juta/Ha/Musim)</option>
                        <option value="perkebunan_kopi">Kopi Arabika / Robusta (Biaya Pupuk ~Rp 8 Juta/Ha/Tahun)</option>
                    </select>
                </div>

                <!-- Durasi Panen -->
                <div class="p-4 bg-primary-cream/30 rounded-2xl border border-sand/40 text-xs text-charcoal/70 space-y-1">
                    <div class="font-bold text-forest">Catatan Efisiensi Lapangan:</div>
                    <div>Sensor SoilSense &amp; WaterSense memberi tahu kapan tanah jenuh nutrisi sehingga petani tidak memupuk secara buta.</div>
                </div>
            </div>

            <!-- Dynamic Result Card -->
            <div class="md:col-span-6 bg-forest text-primary-cream rounded-2xl p-6 sm:p-8 space-y-6 shadow-md relative overflow-hidden">
                <div class="space-y-1">
                    <span class="text-[10px] font-extrabold uppercase tracking-widest text-leaf-green-light">Estimasi Penghematan Anda</span>
                    <h4 class="text-lg font-bold">Hasil Perhitungan Lapangan:</h4>
                </div>

                <div class="space-y-4">
                    <div class="p-3 bg-white/10 rounded-xl flex items-center justify-between">
                        <span class="text-xs text-primary-cream/80">Biaya Pupuk Normal:</span>
                        <span id="roi-normal-cost" class="font-bold font-mono text-sm">Rp 14.000.000</span>
                    </div>

                    <div class="p-4 bg-leaf-green/20 border border-leaf-green/40 rounded-2xl space-y-1">
                        <span class="text-[11px] font-bold text-leaf-green-light">Uang Pupuk yang Berhasil Anda Hemat:</span>
                        <div id="roi-saving-amount" class="text-3xl font-black text-white font-mono">Rp 3.500.000</div>
                        <span class="text-[10px] text-primary-cream/70 block">per musim panen (penghematan dosis 25%)</span>
                    </div>

                    <div class="p-3 bg-white/10 rounded-xl flex items-center justify-between text-xs">
                        <span>Waktu Balik Modal Alat:</span>
                        <span id="roi-payback-time" class="font-extrabold text-leaf-green-light font-mono text-sm">HANYA 1 MUSIM PANEN</span>
                    </div>
                </div>

                <a 
                    id="roi-whatsapp-cta"
                    href="https://wa.me/{{ $settings['contact_whatsapp'] ?? '6285862319524' }}?text=Halo%20Agronex,%20saya%20sudah%20hitung%20di%20web,%20lahan%20saya%201%20Hektar%20Cabai.%20Saya%20tertarik%20menghemat%20pupuk%20dengan%20SoilSense."
                    target="_blank"
                    class="block w-full py-3.5 bg-leaf-green hover:bg-leaf-green-dark text-white font-extrabold text-xs uppercase tracking-wider rounded-xl text-center shadow-lg transition-all"
                >
                    Konsultasikan Kebutuhan Lahan Anda via WhatsApp &rarr;
                </a>
            </div>
        </div>
    </div>
</section>

<!-- COMMERCIAL BUNDLES / PAKET PENJUALAN -->
<section id="paket-bundle" class="py-24 bg-white border-b border-sand/40">
    <div class="max-w-7xl mx-auto px-6 space-y-16">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <span class="text-xs font-extrabold uppercase tracking-widest text-leaf-green">Solusi Bundling Hemat &bull; Ready To Deploy</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-forest font-display">Paket Penjualan Lengkap</h2>
            <p class="text-sm text-charcoal/70 leading-relaxed">
                Pilih paket bundling siap pakai sesuai skala kepemilikan lahan atau kelompok tani Anda. Sudah termasuk instalasi, kalibrasi tanah, dan dashboard cloud.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($bundles as $b)
            <div class="rounded-3xl border {{ $b['recommended'] ? 'border-2 border-leaf-green shadow-xl bg-primary-cream/15' : 'border-sand/60 bg-white shadow-xs' }} p-8 flex flex-col justify-between space-y-8 relative overflow-hidden">
                @if($b['recommended'])
                    <div class="absolute top-0 right-0 bg-leaf-green text-white text-[9px] font-extrabold uppercase px-4 py-1 rounded-bl-2xl tracking-wider">
                        Paling Direkomendasikan
                    </div>
                @endif

                <div class="space-y-6">
                    <div class="space-y-2">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-leaf-green font-mono">{{ $b['badge'] }}</span>
                        <h3 class="text-2xl font-extrabold text-forest font-display">{{ $b['name'] }}</h3>
                        <p class="text-xs text-charcoal/70 leading-relaxed">{{ $b['tagline'] }}</p>
                    </div>

                    <!-- Pricing -->
                    <div class="p-4 bg-white rounded-2xl border border-sand/50 space-y-1">
                        @if($b['original_price'])
                            <div class="text-[11px] text-charcoal/40 line-through">Rp {{ number_format($b['original_price'], 0, ',', '.') }}</div>
                        @endif
                        <div class="flex items-baseline space-x-1.5">
                            <span class="text-xs text-charcoal/60 font-bold">Rp</span>
                            <span class="text-3xl font-black text-forest font-mono">{{ number_format($b['price'], 0, ',', '.') }}</span>
                            @if(isset($b['price_subtext']))
                                <span class="text-xs text-charcoal/60 font-medium">{{ $b['price_subtext'] }}</span>
                            @endif
                        </div>
                        <div class="text-[10px] font-bold text-leaf-green">{{ $b['discount'] }}</div>
                    </div>

                    <!-- Included items -->
                    <div class="space-y-3">
                        <div class="text-[11px] font-extrabold text-forest uppercase tracking-wider">Termasuk Dalam Paket:</div>
                        <ul class="space-y-2.5 text-xs text-charcoal/80">
                            @foreach($b['items'] as $item)
                            <li class="flex items-start space-x-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-leaf-green flex-shrink-0 mt-1.5"></span>
                                <span>{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="space-y-4 pt-4 border-t border-sand/40">
                    <div class="p-3 bg-primary-cream/40 rounded-xl text-[11px] text-charcoal/80 italic font-medium">
                        {{ $b['roi_text'] }}
                    </div>

                    <a 
                        href="https://wa.me/{{ $settings['contact_whatsapp'] ?? '6285862319524' }}?text=Halo%20Tim%20Agronex,%20saya%20ingin%20memesan%20{{ urlencode($b['name']) }}.%20Mohon%20info%20faktur%20resmi%20dan%20jadwal%20instalasi%20lahan."
                        target="_blank"
                        class="block w-full py-3.5 {{ $b['recommended'] ? 'bg-forest hover:bg-forest-dark text-primary-cream' : 'bg-leaf-green hover:bg-leaf-green-dark text-white' }} font-extrabold text-xs uppercase tracking-wider rounded-xl text-center shadow-md transition-all"
                    >
                        Pesan Paket via WhatsApp
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- TESTIMONIAL & FIELD SOCIAL PROOF -->
<section class="py-20 bg-bg-base border-b border-sand/40">
    <div class="max-w-6xl mx-auto px-6 space-y-12">
        <div class="text-center max-w-2xl mx-auto space-y-2">
            <span class="text-xs font-extrabold uppercase tracking-widest text-leaf-green">Suara Nyata Petani Lapangan</span>
            <h2 class="text-3xl font-extrabold text-forest font-display">Telah Divalidasi di Garut &amp; Jawa Barat</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Ibu Karminah Quote -->
            <div class="p-8 bg-white rounded-3xl border border-sand/50 shadow-md space-y-5">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('konten/fotogarut.png') }}" class="w-14 h-14 rounded-full object-cover border-2 border-leaf-green" alt="Ibu Karminah">
                    <div>
                        <h4 class="font-extrabold text-forest text-base font-display">Ibu Karminah (52 th)</h4>
                        <p class="text-xs text-charcoal/60">Petani Hortikultura &bull; Kp. Kiaragoong, Garut</p>
                    </div>
                </div>
                <blockquote class="text-xs sm:text-sm text-charcoal/80 leading-relaxed italic">
                    &ldquo;Biasanya saya cuma nebak kapan harus kasih pupuk dan nyiram air. Setelah dipasang alat sensor Agronex, saya tahu persis kapan tanah lagi kekurangan air atau keasaman tanah berubah. Tanaman lebih sehat dan modal pupuk jadi jauh lebih hemat.&rdquo;
                </blockquote>
                <div class="text-xs text-charcoal/50 font-semibold">
                    Validasi Lapangan Mei - Agustus 2026
                </div>
            </div>

            <!-- Technical Assurance Card -->
            <div class="p-8 bg-forest text-primary-cream rounded-3xl shadow-lg space-y-5">
                <span class="text-[10px] font-extrabold uppercase tracking-wider text-leaf-green-light">Sertifikasi &amp; Hak Cipta</span>
                <h3 class="text-2xl font-bold font-display leading-tight">Teknologi Terdaftar Resmi HAKI DJKI Kemenkumham RI</h3>
                <p class="text-xs text-primary-cream/80 leading-relaxed font-light">
                    Sistem telemetri IoT tanah, AI monitoring &amp; pengelolaan air, serta platform cerdas AGRONEX terdaftar secara sah di bawah nomor permohonan resmi <strong class="text-white">EC002026124181</strong> dan <strong class="text-white">EC002026184233</strong>. Keaslian perangkat keras, software, dan pemrosesan data terjamin 100%.
                </p>
                <div class="pt-2">
                    <a href="{{ route('home') }}#haki" class="inline-flex items-center space-x-2 text-xs font-bold text-leaf-green-light hover:underline">
                        <span>Lihat Sertifikat HAKI Resmi</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FREQUENTLY ASKED QUESTIONS (FAQ) -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6 space-y-10">
        <div class="text-center space-y-2">
            <span class="text-xs font-extrabold uppercase tracking-widest text-leaf-green">Pertanyaan Umum &bull; FAQ</span>
            <h2 class="text-3xl font-extrabold text-forest font-display">Informasi Pemesanan &amp; Layanan</h2>
        </div>

        <div class="space-y-4">
            <div class="p-6 bg-primary-cream/30 rounded-2xl border border-sand/50 space-y-2">
                <h4 class="font-extrabold text-forest text-sm">Bagaimana jika lahan saya tidak memiliki sinyal WiFi?</h4>
                <p class="text-xs text-charcoal/75 leading-relaxed">
                    Perangkat AGRONEX menggunakan modul seluler 4G NB-IoT dan LoRa berdaya rendah. Unit sudah dilengkapi kartu SIM IoT aktif sehingga data otomatis terkirim langsung ke cloud tanpa membutuhkan router WiFi di kebun.
                </p>
            </div>

            <div class="p-6 bg-primary-cream/30 rounded-2xl border border-sand/50 space-y-2">
                <h4 class="font-extrabold text-forest text-sm">Bagaimana cara pemasangan dan kalibrasi sensor di lahan?</h4>
                <p class="text-xs text-charcoal/75 leading-relaxed">
                    Sangat praktis (Plug-and-Play). Tancapkan probe sensor ke kedalaman zona perakaran (15-30 cm) dan hadapkan solar panel ke arah matahari. Tim kami juga menyediakan buku panduan bergambar, video tutorial, serta layanan pendampingan teknisi.
                </p>
            </div>

            <div class="p-6 bg-primary-cream/30 rounded-2xl border border-sand/50 space-y-2">
                <h4 class="font-extrabold text-forest text-sm">Bagaimana ketentuan garansi alat?</h4>
                <p class="text-xs text-charcoal/75 leading-relaxed">
                    Setiap pembelian unit mendapatkan garansi resmi 12 bulan tukar baru apabila terjadi kerusakan pabrikasi atau sensor error dalam pemakaian wajar di lahan pertanian.
                </p>
            </div>

            <div class="p-6 bg-primary-cream/30 rounded-2xl border border-sand/50 space-y-2">
                <h4 class="font-extrabold text-forest text-sm">Apakah melayani pengadaan untuk Dinas Pertanian, Universitas, atau Perusahaan?</h4>
                <p class="text-xs text-charcoal/75 leading-relaxed">
                    Ya, kami menyediakan faktur pajak resmi, dokumen spesifikasi teknis, sertifikasi HAKI, serta skema uji coba khusus institusi dan koperasi agribisnis.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- INTERACTIVE CHECKOUT & PRODUCT DETAIL MODAL -->
<div id="checkout-modal" class="fixed inset-0 z-50 hidden bg-forest/80 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl border border-sand p-6 sm:p-8 space-y-6 relative animate-in fade-in zoom-in-95 duration-200">
        <!-- Close Button -->
        <button onclick="closeCheckoutModal()" class="absolute top-5 right-5 w-9 h-9 rounded-full bg-sand/40 hover:bg-sand text-charcoal flex items-center justify-center font-bold text-lg transition-colors">
            &times;
        </button>

        <div class="border-b border-sand/40 pb-4">
            <div class="flex items-center space-x-2 text-[10px] font-extrabold text-leaf-green uppercase tracking-wider">
                <span id="modal-sku" class="font-mono">AGX-SL26</span>
                <span>&bull;</span>
                <span id="modal-status">READY STOCK</span>
            </div>
            <h3 id="modal-title" class="text-2xl font-extrabold text-forest font-display mt-1">Detail Produk</h3>
        </div>

        <div class="space-y-4">
            <p id="modal-desc" class="text-xs text-charcoal/80 leading-relaxed"></p>

            <!-- Price and Subtotal -->
            <div class="p-4 bg-primary-cream/40 rounded-2xl border border-sand/50 flex items-center justify-between">
                <div>
                    <div class="text-[10px] text-charcoal/50 uppercase font-bold">Harga Satuan</div>
                    <div class="flex items-baseline space-x-1">
                        <span class="text-xs font-bold text-charcoal">Rp</span>
                        <span id="modal-price" class="text-xl font-black text-forest font-mono">0</span>
                    </div>
                </div>

                <!-- Quantity Counter -->
                <div class="flex items-center space-x-3 bg-white px-3 py-1.5 rounded-xl border border-sand/60">
                    <button type="button" onclick="changeQty(-1)" class="text-base font-bold text-forest hover:text-leaf-green px-2">&minus;</button>
                    <span id="modal-qty" class="text-sm font-black font-mono">1</span>
                    <button type="button" onclick="changeQty(1)" class="text-base font-bold text-forest hover:text-leaf-green px-2">&plus;</button>
                </div>
            </div>

            <!-- What's included in the box -->
            <div class="space-y-2">
                <div class="text-xs font-extrabold text-forest uppercase tracking-wider">Kelengkapan Paket (Isi Kotak):</div>
                <ul id="modal-package-list" class="space-y-1.5 text-xs text-charcoal/80 bg-bg-base p-3.5 rounded-2xl border border-sand/40">
                </ul>
            </div>

            <!-- Quick Checkout Order Form -->
            <form action="{{ route('products.order') }}" method="POST" class="space-y-4 pt-2 border-t border-sand/40">
                @csrf
                <input type="hidden" name="product_name" id="form-product-name">
                <input type="hidden" name="quantity" id="form-product-qty" value="1">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label class="text-[11px] font-bold text-forest">Nama Pemesan *</label>
                        <input type="text" name="customer_name" required placeholder="Contoh: Bpk. Ahmad" class="w-full px-3.5 py-2.5 rounded-xl border border-sand text-xs focus:outline-none focus:border-leaf-green">
                    </div>
                    <div class="space-y-1">
                        <label class="text-[11px] font-bold text-forest">No. WhatsApp *</label>
                        <input type="text" name="customer_phone" required placeholder="Contoh: 08123456789" class="w-full px-3.5 py-2.5 rounded-xl border border-sand text-xs focus:outline-none focus:border-leaf-green font-mono">
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="text-[11px] font-bold text-forest">Alamat Kirim / Lokasi Lahan</label>
                    <input type="text" name="delivery_address" placeholder="Kecamatan, Kabupaten, Provinsi" class="w-full px-3.5 py-2.5 rounded-xl border border-sand text-xs focus:outline-none focus:border-leaf-green">
                </div>

                <div class="space-y-1">
                    <label class="text-[11px] font-bold text-forest">Catatan Tambahan (Opsional)</label>
                    <input type="text" name="notes" placeholder="Misal: Mohon dites dulu sebelum kirim" class="w-full px-3.5 py-2.5 rounded-xl border border-sand text-xs focus:outline-none focus:border-leaf-green">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3.5 bg-leaf-green hover:bg-leaf-green-dark text-white font-extrabold text-xs uppercase tracking-wider rounded-2xl shadow-lg transition-all flex items-center justify-center space-x-2">
                    <span>Lanjutkan Pesanan ke WhatsApp</span>
                    <span>&rarr;</span>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Category Filtering
    function filterCategory(cat) {
        document.querySelectorAll('.category-pill').forEach(btn => {
            btn.classList.remove('bg-forest', 'text-primary-cream');
            btn.classList.add('bg-white', 'text-charcoal');
        });
        
        const activeBtn = document.getElementById('btn-filter-' + cat);
        if (activeBtn) {
            activeBtn.classList.remove('bg-white', 'text-charcoal');
            activeBtn.classList.add('bg-forest', 'text-primary-cream');
        }

        document.querySelectorAll('.product-card').forEach(card => {
            if (cat === 'all' || card.getAttribute('data-category') === cat) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // ROI Calculator Logic
    function calculateROI() {
        const area = parseFloat(document.getElementById('roi-area-slider').value);
        document.getElementById('roi-area-label').innerText = area + ' Hektar';

        const cropType = document.getElementById('roi-crop-select').value;
        let costPerHa = 14000000;
        if (cropType === 'horti_kentang') costPerHa = 18000000;
        if (cropType === 'horti_bawang') costPerHa = 16000000;
        if (cropType === 'pangan_padi') costPerHa = 6000000;
        if (cropType === 'perkebunan_kopi') costPerHa = 8000000;

        const totalCost = area * costPerHa;
        const saving = totalCost * 0.25; // 25% average fertilizer optimization

        document.getElementById('roi-normal-cost').innerText = 'Rp ' + totalCost.toLocaleString('id-ID');
        document.getElementById('roi-saving-amount').innerText = 'Rp ' + saving.toLocaleString('id-ID');

        const cta = document.getElementById('roi-whatsapp-cta');
        cta.href = "https://wa.me/{{ $settings['contact_whatsapp'] ?? '6285862319524' }}?text=Halo%20Agronex,%20saya%20sudah%20hitung%20di%20web,%20lahan%20saya%20" + area + "%20Hektar.%20Saya%20tertarik%20menghemat%20pupuk%20sebesar%20Rp%20" + saving.toLocaleString('id-ID') + "%20dengan%20teknologi%20presisi%20Agronex.";
    }

    // Modal Checkout State
    let currentProduct = null;
    let currentQty = 1;
    let basePriceNum = 0;

    function openCheckoutModal(product, name, desc, priceDisplay, origPriceDisplay, sku, packageList) {
        currentProduct = product;
        currentQty = 1;
        basePriceNum = product.price || 0;

        document.getElementById('modal-title').innerText = name;
        document.getElementById('modal-desc').innerText = desc;
        document.getElementById('modal-sku').innerText = 'SKU: ' + sku;
        document.getElementById('modal-price').innerText = basePriceNum.toLocaleString('id-ID');
        document.getElementById('modal-qty').innerText = '1';
        document.getElementById('form-product-name').value = name;
        document.getElementById('form-product-qty').value = '1';

        const listContainer = document.getElementById('modal-package-list');
        listContainer.innerHTML = '';
        if (packageList && packageList.length > 0) {
            packageList.forEach(item => {
                const li = document.createElement('li');
                li.className = 'flex items-center space-x-2';
                li.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-leaf-green flex-shrink-0"></span><span>' + item + '</span>';
                listContainer.appendChild(li);
            });
        } else {
            const li = document.createElement('li');
            li.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-leaf-green flex-shrink-0"></span><span>Unit Utama + Aksesoris Lengkap + Garansi Resmi 12 Bulan</span>';
            listContainer.appendChild(li);
        }

        document.getElementById('checkout-modal').classList.remove('hidden');
    }

    function closeCheckoutModal() {
        document.getElementById('checkout-modal').classList.add('hidden');
    }

    function changeQty(delta) {
        currentQty = Math.max(1, currentQty + delta);
        document.getElementById('modal-qty').innerText = currentQty;
        document.getElementById('form-product-qty').value = currentQty;
        const total = basePriceNum * currentQty;
        document.getElementById('modal-price').innerText = total.toLocaleString('id-ID');
    }
</script>
@endsection
