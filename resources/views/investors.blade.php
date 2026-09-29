@extends('layouts.public')

@section('content')
<section class="py-24 bg-gradient-to-b from-primary-cream/40 to-bg-base min-h-screen">
    <div class="max-w-7xl mx-auto px-6">
        
        @if(!$hasAccess)
        <!-- GATED ACCESS ENTRY FORM -->
        <div class="max-w-2xl mx-auto bg-white border border-sand/40 p-8 md:p-12 rounded-3xl shadow-2xl space-y-8 relative overflow-hidden">
            <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-leaf-green via-fresh-lime to-forest"></div>
            
            <div class="text-center space-y-3">
                <span class="text-[10px] font-bold uppercase tracking-widest text-leaf-green">{{ app()->getLocale() === 'en' ? 'Private Offering' : 'Penawaran Privat' }}</span>
                <h1 class="text-3xl font-extrabold text-forest font-display">{{ app()->getLocale() === 'en' ? 'Investor Relations & Data Room' : 'Hubungan Investor & Data Room' }}</h1>
                <p class="text-xs text-charcoal/70 max-w-sm mx-auto leading-relaxed">
                    {{ app()->getLocale() === 'en' ? 'Gain verified access to our Pitch Deck, Cap Table, legal registrations, financial projection charts, and regional growth roadmap.' : 'Dapatkan akses terverifikasi ke Pitch Deck, Cap Table, legalitas hukum, proyeksi finansial, dan rencana pertumbuhan wilayah kami.' }}
                </p>
            </div>

            <form action="{{ route('investors.request') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label for="name" class="text-[10px] font-bold uppercase tracking-wider text-forest">{{ app()->getLocale() === 'en' ? 'Full Name' : 'Nama Lengkap' }}</label>
                        <input type="text" name="name" id="name" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green text-xs bg-bg-base" placeholder="Dr. Aditya">
                    </div>
                    <div class="space-y-1.5">
                        <label for="email" class="text-[10px] font-bold uppercase tracking-wider text-forest">{{ app()->getLocale() === 'en' ? 'Institutional Email' : 'Email Institusi' }}</label>
                        <input type="email" name="email" id="email" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green text-xs bg-bg-base" placeholder="aditya@venture.com">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label for="company" class="text-[10px] font-bold uppercase tracking-wider text-forest">{{ app()->getLocale() === 'en' ? 'Venture / Company Name' : 'Nama Perusahaan / Venture' }}</label>
                        <input type="text" name="company" id="company" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green text-xs bg-bg-base" placeholder="Yota Capital">
                    </div>
                    <div class="space-y-1.5">
                        <label for="phone" class="text-[10px] font-bold uppercase tracking-wider text-forest">{{ app()->getLocale() === 'en' ? 'Phone Number' : 'Nomor Telepon' }}</label>
                        <input type="text" name="phone" id="phone" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green text-xs bg-bg-base" placeholder="+6281...">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label for="message" class="text-[10px] font-bold uppercase tracking-wider text-forest">{{ app()->getLocale() === 'en' ? 'Investment Objectives / Notes' : 'Tujuan Investasi / Catatan Tambahan' }}</label>
                    <textarea name="message" id="message" rows="4" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green text-xs bg-bg-base leading-relaxed" placeholder="{{ app()->getLocale() === 'en' ? 'Type your request focus here...' : 'Tuliskan fokus permintaan akses Anda di sini...' }}"></textarea>
                </div>

                <button type="submit" class="w-full py-4 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full shadow transition-all duration-300 transform hover:-translate-y-0.5">
                    {{ app()->getLocale() === 'en' ? 'Request Data Room Entry Token' : 'Minta Token Akses Data Room' }}
                </button>
            </form>
        </div>
        
        @else
        <!-- ACTIVE INVESTOR DASHBOARD -->
        <div class="space-y-12">
            <!-- Header banner -->
            <div class="bg-forest rounded-3xl p-8 md:p-12 text-primary-cream relative overflow-hidden flex flex-col md:flex-row justify-between items-center gap-8 shadow-xl">
                <div class="space-y-4 max-w-xl">
                    <div class="inline-block px-3 py-1 rounded-full bg-white/10 border border-white/20 text-[10px] uppercase font-bold tracking-widest text-fresh-lime">
                        {{ app()->getLocale() === 'en' ? 'Access Verified:' : 'Akses Terverifikasi:' }} {{ session('investor_name') }}
                    </div>
                    <h1 class="text-3xl md:text-5xl font-extrabold font-display leading-tight">AGRONEX Investment Portal</h1>
                    <p class="text-sm text-primary-cream/80 font-light leading-relaxed">
                        {{ app()->getLocale() === 'en' ? 'Welcome to the secure Data Room. Here you can inspect legal filings, traction indicators, and financial records.' : 'Selamat datang di Data Room yang aman. Di sini Anda dapat memeriksa berkas hukum, indikator traksi, dan catatan keuangan.' }}
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ $settings['investor_pitch_deck'] ?? '#' }}" class="px-6 py-3 bg-white hover:bg-primary-cream text-xs font-bold text-forest rounded-full shadow flex items-center transition-colors">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        {{ app()->getLocale() === 'en' ? 'Download Pitch Deck (PDF)' : 'Unduh Pitch Deck (PDF)' }}
                    </a>
                    <a href="#schedule" class="px-6 py-3 bg-leaf-green hover:bg-forest-dark text-xs font-bold text-white rounded-full shadow flex items-center transition-colors">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        {{ app()->getLocale() === 'en' ? 'Schedule Meeting' : 'Jadwalkan Rapat' }}
                    </a>
                </div>
            </div>

            <!-- Market Size & Business Model cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white border border-sand/40 p-8 rounded-3xl shadow-sm space-y-4 hover-lift">
                    <h3 class="font-bold text-forest uppercase tracking-widest text-xs font-display">01 / {{ app()->getLocale() === 'en' ? 'Market Size' : 'Ukuran Pasar' }}</h3>
                    <p class="text-sm text-charcoal/80 leading-relaxed font-light">
                        {{ trans_db($settings['investor_market_size'] ?? '$25 Billion addressable local farming market by 2030.') }}
                    </p>
                </div>

                <div class="bg-white border border-sand/40 p-8 rounded-3xl shadow-sm space-y-4 hover-lift">
                    <h3 class="font-bold text-forest uppercase tracking-widest text-xs font-display">02 / {{ app()->getLocale() === 'en' ? 'Business Model' : 'Model Bisnis' }}</h3>
                    <p class="text-sm text-charcoal/80 leading-relaxed font-light">
                        {{ trans_db($settings['investor_business_model'] ?? 'Device Leasing + Subscription SaaS + Direct B2B Supply Chain margin.') }}
                    </p>
                </div>

                <div class="bg-white border border-sand/40 p-8 rounded-3xl shadow-sm space-y-4 hover-lift">
                    <h3 class="font-bold text-forest uppercase tracking-widest text-xs font-display">03 / {{ app()->getLocale() === 'en' ? 'Investment Ask' : 'Kebutuhan Investasi' }}</h3>
                    <p class="text-sm text-charcoal/80 leading-relaxed font-light">
                        {{ app()->getLocale() === 'en' ? 'Seeking $1.5M Seed Round to expand manufacturing capability of AgroIoT Pod v2 to 10,000 units.' : 'Mencari Putaran Pendanaan Seed sebesar $1.5M untuk memperluas kapasitas manufaktur AgroIoT Pod v2 hingga 10,000 unit.' }}
                    </p>
                </div>
            </div>

            <!-- Data Room File Registry -->
            <div class="bg-white border border-sand/40 rounded-3xl overflow-hidden shadow-sm">
                <div class="p-6 border-b border-sand bg-primary-cream/25">
                    <h3 class="font-extrabold text-forest font-display text-lg">{{ app()->getLocale() === 'en' ? 'Secure Document Registry' : 'Registri Dokumen Aman' }}</h3>
                    <p class="text-xs text-charcoal/60 mt-0.5">{{ app()->getLocale() === 'en' ? 'Encrypted repositories, audited periodically.' : 'Repositori terenkripsi, diaudit secara berkala.' }}</p>
                </div>
                <div class="divide-y divide-sand/35 text-xs">
                    
                    <div class="p-6 flex items-center justify-between hover:bg-primary-cream/10">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-lg bg-forest/5 flex items-center justify-center text-forest">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-forest font-display">{{ app()->getLocale() === 'en' ? 'AGRONEX Financial Projections 2026-2030' : 'Proyeksi Keuangan AGRONEX 2026-2030' }}</h4>
                                <span class="text-[9px] text-charcoal/50">Excel Spreadsheet (.xlsx) - 2.4 MB</span>
                            </div>
                        </div>
                        <a href="#" class="px-4 py-2 bg-forest/5 hover:bg-forest text-forest hover:text-white rounded-full font-bold text-[10px] transition-colors">{{ app()->getLocale() === 'en' ? 'Download' : 'Unduh' }}</a>
                    </div>

                    <div class="p-6 flex items-center justify-between hover:bg-primary-cream/10">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-lg bg-forest/5 flex items-center justify-center text-forest">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-forest font-display">{{ app()->getLocale() === 'en' ? 'Shareholder Cap Table & Voting structures' : 'Cap Table Pemegang Saham & Struktur Voting' }}</h4>
                                <span class="text-[9px] text-charcoal/50">PDF Document - 820 KB</span>
                            </div>
                        </div>
                        <a href="#" class="px-4 py-2 bg-forest/5 hover:bg-forest text-forest hover:text-white rounded-full font-bold text-[10px] transition-colors">{{ app()->getLocale() === 'en' ? 'Download' : 'Unduh' }}</a>
                    </div>

                    <div class="p-6 flex items-center justify-between hover:bg-primary-cream/10">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-lg bg-forest/5 flex items-center justify-center text-forest">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-forest font-display">{{ app()->getLocale() === 'en' ? 'Corporate Articles of Incorporation & IP transfer agreements' : 'Anggaran Dasar Perusahaan & Perjanjian Transfer HAKI' }}</h4>
                                <span class="text-[9px] text-charcoal/50">ZIP Archive - 14.5 MB</span>
                            </div>
                        </div>
                        <a href="#" class="px-4 py-2 bg-forest/5 hover:bg-forest text-forest hover:text-white rounded-full font-bold text-[10px] transition-colors">{{ app()->getLocale() === 'en' ? 'Download' : 'Unduh' }}</a>
                    </div>

                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
