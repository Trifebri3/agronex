@extends('layouts.public')

@section('content')
<!-- Custom CSS for Evolution page -->
<style>
    .bg-warm-cream {
        background-color: #FCFBF8;
    }
    
    .timeline-container::-webkit-scrollbar {
        height: 6px;
    }
    .timeline-container::-webkit-scrollbar-track {
        background: rgba(47, 93, 80, 0.05);
        border-radius: 10px;
    }
    .timeline-container::-webkit-scrollbar-thumb {
        background: rgba(47, 93, 80, 0.2);
        border-radius: 10px;
    }
    .timeline-container::-webkit-scrollbar-thumb:hover {
        background: rgba(47, 93, 80, 0.4);
    }
</style>

<div class="bg-warm-cream min-h-screen pt-32 pb-24 text-charcoal">
    <!-- Header Hero -->
    <div class="max-w-7xl mx-auto px-6 mb-16 text-center space-y-4">
        <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">
            {{ app()->getLocale() === 'en' ? 'Evolution of AGRONEX' : 'Evolusi AGRONEX' }}
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-forest font-display leading-tight">
            {{ app()->getLocale() === 'en' ? 'Evolution of AGRONEX' : 'Perjalanan Evolusi AGRONEX' }}
        </h1>
        <p class="text-base md:text-lg text-charcoal/70 max-w-2xl mx-auto font-sans font-light leading-relaxed">
            {{ app()->getLocale() === 'en' 
                ? 'Every innovation starts with listening, evolves through learning, and grows through execution.' 
                : 'Setiap inovasi berawal dari mendengarkan, berkembang melalui pembelajaran, dan tumbuh melalui eksekusi nyata.' }}
        </p>
    </div>

    <!-- Interactive Horizontal Timeline Scroll Section -->
    <div class="w-full overflow-hidden mb-28">
        <div class="max-w-7xl mx-auto px-6 mb-3 flex items-center justify-between text-xs text-charcoal/50 font-display">
            <span>{{ app()->getLocale() === 'en' ? 'Scroll horizontally to explore' : 'Geser horizontal untuk menjelajah' }} &rarr;</span>
            <span>{{ app()->getLocale() === 'en' ? 'Click milestone for details' : 'Klik milestone untuk melihat detail' }}</span>
        </div>
        
        <div class="timeline-container overflow-x-auto flex space-x-6 py-6 px-6 md:px-12 max-w-full select-none cursor-grab active:cursor-grabbing">
            @foreach($milestones as $m)
            @php
                $titleDec = json_decode($m->title, true) ?? [];
                $subtitleDec = json_decode($m->subtitle, true) ?? [];
                $descDec = json_decode($m->description, true) ?? [];
                
                $titleText = $titleDec[app()->getLocale()] ?? $titleDec['id'] ?? '';
                $subtitleText = $subtitleDec[app()->getLocale()] ?? $subtitleDec['id'] ?? '';
                $descText = $descDec[app()->getLocale()] ?? $descDec['id'] ?? '';
            @endphp
            <div 
                onclick="openMilestoneModal({{ json_encode($m) }})"
                class="w-[280px] sm:w-[340px] flex-shrink-0 bg-white border border-sand/40 p-6 rounded-3xl shadow-sm hover-lift flex flex-col justify-between space-y-6 transition-all duration-300"
            >
                <div class="space-y-4">
                    <!-- Status & Year badge -->
                    <div class="flex items-center justify-between">
                        <span class="px-2 py-0.5 text-[8px] font-bold rounded-full uppercase tracking-wider font-mono
                            @if($m->status === 'Live') bg-leaf-green/10 text-leaf-green
                            @elseif($m->status === 'Pilot') bg-yellow-100 text-yellow-800
                            @elseif($m->status === 'Prototype') bg-blue-100 text-blue-800
                            @else bg-gray-100 text-gray-700
                            @endif"
                        >
                            {{ $m->status }}
                        </span>
                        <span class="text-sm font-bold text-leaf-green font-mono uppercase">{{ $m->year }}</span>
                    </div>

                    <div class="space-y-1">
                        <h4 class="text-base font-bold text-forest font-display leading-tight">{{ $titleText }}</h4>
                        @if($subtitleText)
                        <p class="text-[10px] text-charcoal/50 font-medium font-sans italic leading-tight">{{ $subtitleText }}</p>
                        @endif
                    </div>

                    <p class="text-xs text-charcoal/70 leading-relaxed font-sans font-light line-clamp-4">
                        {{ $descText }}
                    </p>
                </div>

                <!-- Footer tags on card -->
                <div class="pt-4 border-t border-sand/30 space-y-3">
                    @if($m->technologies && is_array($m->technologies))
                    <div class="flex flex-wrap gap-1">
                        @foreach(array_slice($m->technologies, 0, 3) as $tech)
                        <span class="text-[8px] font-semibold bg-primary-cream/40 text-forest px-2 py-0.5 rounded-full font-mono">
                            {{ $tech }}
                        </span>
                        @endforeach
                        @if(count($m->technologies) > 3)
                        <span class="text-[8px] text-charcoal/40 font-mono font-bold">+{{ count($m->technologies) - 3 }}</span>
                        @endif
                    </div>
                    @endif

                    <div class="flex justify-end">
                        <span class="text-[10px] font-bold text-leaf-green group-hover:underline flex items-center space-x-0.5 font-display">
                            <span>{{ app()->getLocale() === 'en' ? 'Explore details' : 'Lihat Detail' }}</span>
                            <span>&rarr;</span>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- SECTION: WHAT WE LEARNED (Beautiful Statistic Cards) -->
    <section class="py-24 max-w-7xl mx-auto px-6 border-t border-sand/30">
        <div class="text-center space-y-4 mb-16">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green font-display">
                {{ app()->getLocale() === 'en' ? 'Empirical Knowledge' : 'Pengetahuan Empiris' }}
            </span>
            <h2 class="text-3xl font-extrabold text-forest font-display">
                {{ app()->getLocale() === 'en' ? 'What We Learned' : 'Apa Yang Kami Pelajari' }}
            </h2>
            <p class="text-xs md:text-sm text-charcoal/60 max-w-md mx-auto leading-relaxed">
                {{ app()->getLocale() === 'en'
                    ? 'Instead of only showing achievements, we document the metrics that shaped our conviction.'
                    : 'Alih-alih sekadar memajang pencapaian, kami mencatat indikator yang membentuk keyakinan solusi kami.' }}
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 font-sans">
            <!-- Card 1 -->
            <div class="bg-white border border-sand/40 p-6 rounded-3xl shadow-sm hover-lift space-y-3">
                <span class="text-2xl font-bold text-forest font-display">120+</span>
                <h4 class="text-xs font-bold uppercase tracking-wider text-leaf-green font-display">{{ app()->getLocale() === 'en' ? 'Field Discussions' : 'Diskusi Lapangan' }}</h4>
                <p class="text-xs text-charcoal/60 leading-relaxed font-light">
                    {{ app()->getLocale() === 'en'
                        ? 'Countless hours spent listening to local growers in Garut, Bandung, and Pangalengan.'
                        : 'Jam-jam berharga berdiskusi langsung di saung persawahan Garut, Bandung, dan Pangalengan.' }}
                </p>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-white border border-sand/40 p-6 rounded-3xl shadow-sm hover-lift space-y-3">
                <span class="text-2xl font-bold text-forest font-display">4</span>
                <h4 class="text-xs font-bold uppercase tracking-wider text-leaf-green font-display">{{ app()->getLocale() === 'en' ? 'Research Iterations' : 'Iterasi Riset Utama' }}</h4>
                <p class="text-xs text-charcoal/60 leading-relaxed font-light">
                    {{ app()->getLocale() === 'en'
                        ? 'Constant refactoring from distribution logistics to embedded systems telemetry.'
                        : 'Penyempurnaan arsitektur produk dari sistem logistik distribusi hingga telemetri nirkabel IoT.' }}
                </p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white border border-sand/40 p-6 rounded-3xl shadow-sm hover-lift space-y-3">
                <span class="text-2xl font-bold text-forest font-display">6</span>
                <h4 class="text-xs font-bold uppercase tracking-wider text-leaf-green font-display">{{ app()->getLocale() === 'en' ? 'Prototype Versions' : 'Versi Prototipe' }}</h4>
                <p class="text-xs text-charcoal/60 leading-relaxed font-light">
                    {{ app()->getLocale() === 'en'
                        ? 'From initial PasokPasti web mockups to HUMARSA solar greenhouse robots.'
                        : 'Eksperimen purwarupa fisik dari mockup web PasokPasti hingga robot greenhouse cerdas HUMARSA.' }}
                </p>
            </div>

            <!-- Card 4 -->
            <div class="bg-white border border-sand/40 p-6 rounded-3xl shadow-sm hover-lift space-y-3">
                <span class="text-2xl font-bold text-forest font-display">10+</span>
                <h4 class="text-xs font-bold uppercase tracking-wider text-leaf-green font-display">{{ app()->getLocale() === 'en' ? 'Farmer Communities' : 'Kelompok Tani' }}</h4>
                <p class="text-xs text-charcoal/60 leading-relaxed font-light">
                    {{ app()->getLocale() === 'en'
                        ? 'Garut, Cisewu, and Lembang farming cooperatives directly engaged in testing.'
                        : 'Kelompok tani dan gabungan petani Garut, Cisewu, dan Lembang yang terlibat uji coba.' }}
                </p>
            </div>

            <!-- Card 5 -->
            <div class="bg-white border border-sand/40 p-6 rounded-3xl shadow-sm hover-lift space-y-3">
                <span class="text-2xl font-bold text-forest font-display">300+</span>
                <h4 class="text-xs font-bold uppercase tracking-wider text-leaf-green font-display">{{ app()->getLocale() === 'en' ? 'Technology Experiments' : 'Pengujian Sensor' }}</h4>
                <p class="text-xs text-charcoal/60 leading-relaxed font-light">
                    {{ app()->getLocale() === 'en'
                        ? 'Calibration cycles testing soil telemetry NPK nodes under weather changes.'
                        : 'Pengujian kalibrasi sensor NPK, pH tanah, dan pembacaan kelembapan pada berbagai siklus cuaca.' }}
                </p>
            </div>

            <!-- Card 6 -->
            <div class="bg-white border border-sand/40 p-6 rounded-3xl shadow-sm hover-lift space-y-3">
                <span class="text-2xl font-bold text-forest font-display">5+</span>
                <h4 class="text-xs font-bold uppercase tracking-wider text-leaf-green font-display">{{ app()->getLocale() === 'en' ? 'Partner Organizations' : 'Kemitraan Institusi' }}</h4>
                <p class="text-xs text-charcoal/60 leading-relaxed font-light">
                    {{ app()->getLocale() === 'en'
                        ? 'Collaboration with academic researchers and startup ecosystems.'
                        : 'Kolaborasi dengan akademisi perguruan tinggi serta inkubator teknologi.' }}
                </p>
            </div>

            <!-- Card 7 -->
            <div class="bg-white border border-sand/40 p-6 rounded-3xl shadow-sm hover-lift space-y-3">
                <span class="text-2xl font-bold text-forest font-display">2</span>
                <h4 class="text-xs font-bold uppercase tracking-wider text-leaf-green font-display">{{ app()->getLocale() === 'en' ? 'Innovation Programs' : 'Program Inovasi' }}</h4>
                <p class="text-xs text-charcoal/60 leading-relaxed font-light">
                    {{ app()->getLocale() === 'en'
                        ? 'Generasi Bakti BCA and regional tech pioneer cohorts validation.'
                        : 'Validasi kurasi melalui keikutsertaan program inkubasi nasional dan daerah.' }}
                </p>
            </div>

            <!-- Card 8 -->
            <div class="bg-white border border-sand/40 p-6 rounded-3xl shadow-sm hover-lift space-y-3">
                <span class="text-2xl font-bold text-forest font-display">1</span>
                <h4 class="text-xs font-bold uppercase tracking-wider text-leaf-green font-display">{{ app()->getLocale() === 'en' ? 'Intellectual Property' : 'Kekayaan Intelektual' }}</h4>
                <p class="text-xs text-charcoal/60 leading-relaxed font-light">
                    {{ app()->getLocale() === 'en'
                        ? 'Official software copyrights registered to safeguard neural architectures.'
                        : 'Hak cipta perangkat lunak resmi terdaftar untuk mengamankan hak kepemilikan kode algoritma.' }}
                </p>
            </div>
        </div>
    </section>

    <!-- SECTION: FINAL HIGHLIGHT QUOTE -->
    <section class="py-20 bg-primary-cream/20 text-center relative overflow-hidden border-t border-b border-sand/30">
        <div class="absolute inset-0 opacity-5 pointer-events-none">
            <img src="{{ asset('images/motif.png') }}" class="w-full h-full object-cover scale-110" alt="">
        </div>
        <div class="max-w-3xl mx-auto px-6 relative z-10 space-y-6">
            <svg class="w-10 h-10 mx-auto text-leaf-green/30" fill="currentColor" viewBox="0 0 24 24">
                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
            </svg>
            <p class="text-xl md:text-2xl font-display font-bold text-forest leading-relaxed italic">
                {{ app()->getLocale() === 'en'
                    ? '"AGRONEX was not created in a single moment. It is the result of continuous learning, countless field conversations, and the belief that meaningful technology must grow together with farmers."'
                    : '"AGRONEX tidak tercipta dalam semalam. Ini adalah hasil pembelajaran berkelanjutan, ratusan diskusi di pematang sawah, dan keyakinan bahwa teknologi yang bermakna harus tumbuh bersama para petani."' }}
            </p>
            <span class="text-[10px] font-bold uppercase tracking-widest text-leaf-green font-display block font-mono">tri febriansah, team lead</span>
        </div>
    </section>
</div>

<!-- COMPONENT: INTERACTIVE MILESTONE DETAIL MODAL -->
<div id="milestone-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-6 bg-forest/30 backdrop-blur-sm">
    <div class="bg-white w-full max-w-2xl rounded-3xl overflow-hidden shadow-2xl border border-sand/40 max-h-[85vh] flex flex-col transform scale-95 opacity-0 transition-all duration-300 ease-in-out" id="modal-container">
        
        <!-- Modal Header -->
        <div class="p-6 border-b border-sand/30 flex items-center justify-between bg-primary-cream/15 flex-shrink-0">
            <div>
                <span id="modal-status" class="text-[8px] font-bold px-2 py-0.5 bg-leaf-green/10 text-leaf-green rounded-full uppercase tracking-wider font-mono">Research</span>
                <span id="modal-year" class="text-xs font-mono font-bold text-leaf-green ml-2">2024</span>
                <h3 id="modal-title" class="text-lg font-bold text-forest font-display mt-1 leading-tight">Milestone Title</h3>
            </div>
            <button onclick="closeMilestoneModal()" class="p-2 text-charcoal/50 hover:text-leaf-green transition-colors focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Modal Body (Scrollable) -->
        <div class="p-6 space-y-6 overflow-y-auto flex-1 text-xs md:text-sm">
            
            <!-- Cover / Documentation Image -->
            <div class="space-y-1 flex-shrink-0">
                <span class="font-bold text-forest text-[9px] uppercase tracking-wider block font-display">{{ app()->getLocale() === 'en' ? 'Primary Documentation' : 'Dokumentasi Utama' }}</span>
                <div class="h-48 md:h-64 rounded-2xl overflow-hidden border border-sand/40 bg-bg-base">
                    <img id="modal-cover-img" class="w-full h-full object-cover" src="" alt="Cover Image">
                </div>
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <h4 class="font-bold text-forest text-[9px] uppercase tracking-wider font-display">{{ app()->getLocale() === 'en' ? 'About this Milestone' : 'Tentang Fase Ini' }}</h4>
                <p id="modal-desc" class="text-charcoal/80 leading-relaxed font-sans font-light">
                    Detailed text copy...
                </p>
            </div>

            <!-- Lessons Learned (Apple/Stripe callout) -->
            <div class="p-4 bg-primary-cream/30 border-l-4 border-leaf-green rounded-r-2xl space-y-1">
                <span class="font-bold text-forest text-[9px] uppercase tracking-wider block font-display">{{ app()->getLocale() === 'en' ? 'Lessons Learned' : 'Pembelajaran Penting' }}</span>
                <p id="modal-lessons" class="text-charcoal/80 font-sans leading-relaxed font-light italic">
                    What we learned during this milestone...
                </p>
            </div>

            <!-- Impact and Achievements Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                <div class="space-y-1.5">
                    <span class="font-bold text-forest text-[9px] uppercase tracking-wider block font-display">{{ app()->getLocale() === 'en' ? 'Impact / Validation' : 'Dampak / Hasil Uji' }}</span>
                    <p id="modal-impact" class="text-charcoal/70 leading-relaxed font-light font-sans bg-bg-base/40 p-3 rounded-xl border border-sand/30"></p>
                </div>
                <div class="space-y-1.5">
                    <span class="font-bold text-forest text-[9px] uppercase tracking-wider block font-display">{{ app()->getLocale() === 'en' ? 'Key Achievement' : 'Pencapaian Kunci' }}</span>
                    <p id="modal-achievements" class="text-charcoal/70 leading-relaxed font-light font-sans bg-bg-base/40 p-3 rounded-xl border border-sand/30"></p>
                </div>
            </div>

            <!-- Technologies and locations tags -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-sand/30 font-display">
                <div class="space-y-1">
                    <span class="text-[8px] uppercase tracking-wider text-charcoal/40 font-bold block">{{ app()->getLocale() === 'en' ? 'Technologies Used' : 'Teknologi yang Digunakan' }}</span>
                    <div id="modal-tech-list" class="flex flex-wrap gap-1 pt-1"></div>
                </div>
                <div class="space-y-1">
                    <span class="text-[8px] uppercase tracking-wider text-charcoal/40 font-bold block">{{ app()->getLocale() === 'en' ? 'Locations Validated' : 'Lokasi Validasi' }}</span>
                    <div id="modal-locations-list" class="flex flex-wrap gap-1 pt-1"></div>
                </div>
                <div class="space-y-1">
                    <span class="text-[8px] uppercase tracking-wider text-charcoal/40 font-bold block">{{ app()->getLocale() === 'en' ? 'Related Product' : 'Produk Terkait' }}</span>
                    <span id="modal-product" class="text-xs font-semibold text-forest block pt-1">AGRONEX Grid</span>
                </div>
            </div>

            <!-- Video / Document download attachments -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-sand/30" id="modal-attachments-row">
                <div id="modal-video-box" class="space-y-1.5">
                    <span class="font-bold text-forest text-[9px] uppercase tracking-wider block font-display">{{ app()->getLocale() === 'en' ? 'Video Demonstration' : 'Demonstrasi Video' }}</span>
                    <a id="modal-video-link" href="#" target="_blank" class="px-4 py-2 border border-sand hover:bg-primary-cream/40 rounded-xl flex items-center justify-between text-xs font-semibold text-charcoal">
                        <span>{{ app()->getLocale() === 'en' ? 'Watch Clip' : 'Tonton Video' }}</span>
                        <span>&rarr;</span>
                    </a>
                </div>
                <div id="modal-doc-box" class="space-y-1.5">
                    <span class="font-bold text-forest text-[9px] uppercase tracking-wider block font-display">{{ app()->getLocale() === 'en' ? 'Documentation / PDF' : 'Dokumen / PDF' }}</span>
                    <a id="modal-doc-link" href="#" target="_blank" class="px-4 py-2 border border-sand hover:bg-primary-cream/40 rounded-xl flex items-center justify-between text-xs font-semibold text-charcoal">
                        <span>{{ app()->getLocale() === 'en' ? 'Download File' : 'Unduh Dokumen' }}</span>
                        <span>&darr;</span>
                    </a>
                </div>
            </div>

            <!-- Expanded Gallery Photos -->
            <div class="space-y-2 pt-2" id="modal-gallery-box">
                <h4 class="font-bold text-forest text-[9px] uppercase tracking-wider font-display">{{ app()->getLocale() === 'en' ? 'Gallery & CAD Files' : 'Galeri & Desain CAD' }}</h4>
                <div id="modal-gallery-grid" class="grid grid-cols-2 sm:grid-cols-4 gap-2"></div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Drag-to-scroll horizontal container functionality
        const slider = document.querySelector('.timeline-container');
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener('mouseleave', () => {
            isDown = false;
        });
        slider.addEventListener('mouseup', () => {
            isDown = false;
        });
        slider.addEventListener('mousemove', (e) => {
            if(!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 2; // scroll speed multiplier
            slider.scrollLeft = scrollLeft - walk;
        });
    });

    const currentLocale = "{{ app()->getLocale() }}";

    function openMilestoneModal(data) {
        const modal = document.getElementById("milestone-modal");
        const container = document.getElementById("modal-container");

        // Parse Title, Subtitle, Description, Lessons, Impact & Achievements translation strings
        let titleObj = {}, subtitleObj = {}, descObj = {}, lessonsObj = {}, impactObj = {}, achievementsObj = {};
        try { titleObj = JSON.parse(data.title); } catch(e) { titleObj = { id: data.title, en: data.title }; }
        try { subtitleObj = JSON.parse(data.subtitle); } catch(e) { subtitleObj = { id: data.subtitle, en: data.subtitle }; }
        try { descObj = JSON.parse(data.description); } catch(e) { descObj = { id: data.description, en: data.description }; }
        try { lessonsObj = JSON.parse(data.lessons_learned); } catch(e) { lessonsObj = { id: data.lessons_learned, en: data.lessons_learned }; }
        try { impactObj = JSON.parse(data.impact); } catch(e) { impactObj = { id: data.impact, en: data.impact }; }
        try { achievementsObj = JSON.parse(data.achievements); } catch(e) { achievementsObj = { id: data.achievements, en: data.achievements }; }

        const titleText = titleObj[currentLocale] || titleObj['id'] || 'Milestone';
        const descText = descObj[currentLocale] || descObj['id'] || '';
        const lessonsText = lessonsObj[currentLocale] || lessonsObj['id'] || '';
        const impactText = impactObj[currentLocale] || impactObj['id'] || '';
        const achievementsText = achievementsObj[currentLocale] || achievementsObj['id'] || '';

        // Fill primary texts
        document.getElementById("modal-title").innerText = titleText;
        document.getElementById("modal-year").innerText = data.year;
        document.getElementById("modal-status").innerText = data.status;
        document.getElementById("modal-desc").innerText = descText;
        document.getElementById("modal-lessons").innerText = lessonsText || 'No specific lessons documented.';
        document.getElementById("modal-impact").innerText = impactText || 'N/A';
        document.getElementById("modal-achievements").innerText = achievementsText || 'N/A';
        document.getElementById("modal-product").innerText = data.related_product || 'AGRONEX Platform';

        // Status Badge Style updates
        const statusEl = document.getElementById("modal-status");
        statusEl.className = "text-[8px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider font-mono";
        if (data.status === 'Live') statusEl.classList.add("bg-leaf-green/10", "text-leaf-green");
        else if (data.status === 'Pilot') statusEl.classList.add("bg-yellow-100", "text-yellow-800");
        else if (data.status === 'Prototype') statusEl.classList.add("bg-blue-100", "text-blue-800");
        else statusEl.classList.add("bg-gray-100", "text-gray-700");

        // Primary cover image
        const coverImg = document.getElementById("modal-cover-img");
        coverImg.src = data.image_path ? data.image_path : '/konten/fotoutama.JPG';

        // Tech tag lists
        const techList = document.getElementById("modal-tech-list");
        techList.innerHTML = '';
        if (data.technologies && Array.isArray(data.technologies)) {
            data.technologies.forEach(t => {
                const tag = document.createElement("span");
                tag.className = "text-[8px] bg-primary-cream/40 text-forest px-2.5 py-0.5 rounded-full font-mono font-semibold";
                tag.innerText = t;
                techList.appendChild(tag);
            });
        }

        // Locations tag list
        const locList = document.getElementById("modal-locations-list");
        locList.innerHTML = '';
        if (data.locations && Array.isArray(data.locations)) {
            data.locations.forEach(l => {
                const tag = document.createElement("span");
                tag.className = "text-[8px] bg-sand/20 text-charcoal/80 px-2.5 py-0.5 rounded-full font-sans font-medium";
                tag.innerText = l;
                locList.appendChild(tag);
            });
        }

        // Gallery Grid rendering
        const galleryBox = document.getElementById("modal-gallery-box");
        const galleryGrid = document.getElementById("modal-gallery-grid");
        galleryGrid.innerHTML = '';
        if (data.gallery && Array.isArray(data.gallery) && data.gallery.length > 0) {
            data.gallery.forEach(pic => {
                const img = document.createElement("img");
                img.src = pic;
                img.className = "w-full h-16 object-cover rounded-xl border border-sand/40 hover-lift cursor-pointer shadow-sm";
                img.onclick = () => { coverImg.src = pic; };
                galleryGrid.appendChild(img);
            });
            galleryBox.style.display = 'block';
        } else {
            galleryBox.style.display = 'none';
        }

        // Attachments showing/hiding
        const videoBox = document.getElementById("modal-video-box");
        const videoLink = document.getElementById("modal-video-link");
        if (data.video_path) {
            videoLink.href = data.video_path;
            videoBox.style.display = 'block';
        } else {
            videoBox.style.display = 'none';
        }

        const docBox = document.getElementById("modal-doc-box");
        const docLink = document.getElementById("modal-doc-link");
        if (data.document_path) {
            docLink.href = data.document_path;
            docBox.style.display = 'block';
        } else {
            docBox.style.display = 'none';
        }

        const attachmentsRow = document.getElementById("modal-attachments-row");
        if (!data.video_path && !data.document_path) {
            attachmentsRow.style.display = 'none';
        } else {
            attachmentsRow.style.display = 'grid';
        }

        // Show Modal
        modal.classList.remove("hidden");
        setTimeout(() => {
            container.classList.remove("scale-95", "opacity-0");
            container.classList.add("scale-100", "opacity-100");
        }, 50);
    }

    function closeMilestoneModal() {
        const modal = document.getElementById("milestone-modal");
        const container = document.getElementById("modal-container");

        container.classList.remove("scale-100", "opacity-100");
        container.classList.add("scale-95", "opacity-0");

        setTimeout(() => {
            modal.classList.add("hidden");
        }, 200);
    }
</script>
@endsection
