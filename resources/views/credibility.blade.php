@extends('layouts.public')

@section('content')
<!-- Custom Styles for Credibility Page -->
<style>
    .bg-warm-cream {
        background-color: #FCFBF8;
    }
    
    .tab-btn.active {
        background-color: #2F5D50;
        color: #FCFBF8;
        border-color: #2F5D50;
    }

    /* Trust ticker animations */
    @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .trust-ticker-container {
        display: flex;
        overflow: hidden;
        user-select: none;
        position: relative;
    }
    .trust-ticker-track {
        display: flex;
        width: max-content;
        animation: scroll 30s linear infinite;
    }
    .trust-ticker-track:hover {
        animation-play-state: paused;
    }

    .scroll-reveal-item {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }
    
    .scroll-reveal-item.active {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<div class="bg-warm-cream min-h-screen pt-32 pb-24 text-charcoal">
    <!-- Header Hero -->
    <div class="max-w-7xl mx-auto px-6 mb-16 text-center space-y-4">
        <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">
            {{ app()->getLocale() === 'en' ? 'Evidence of Execution' : 'Bukti Kerja Nyata' }}
        </span>
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-forest font-display leading-tight">
            {{ app()->getLocale() === 'en' ? 'Recognition & Credibility' : 'Pengakuan & Kredibilitas' }}
        </h1>
        <p class="text-base md:text-lg text-charcoal/70 max-w-2xl mx-auto font-sans font-light leading-relaxed">
            {{ app()->getLocale() === 'en' 
                ? 'Building trust through innovation, collaboration, intellectual property, and recognized contributions to agriculture and technology.' 
                : 'Membangun kepercayaan melalui inovasi berkelanjutan, kolaborasi strategis, kepemilikan intelektual, dan kontribusi nyata pada pertanian dan teknologi.' }}
        </p>
    </div>

    <!-- Main Layout Grid -->
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        
        <!-- Left Side: Founder & CEO Profile Card -->
        <div class="lg:col-span-4 lg:sticky lg:top-28 space-y-6">
            @if($ceo)
            <div class="bg-white border border-sand/40 p-6 rounded-3xl shadow-md space-y-6 hover-lift relative overflow-hidden">
                <!-- Visual warm accent -->
                <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-sand to-leaf-green"></div>
                
                <div class="relative w-full aspect-square rounded-2xl overflow-hidden border border-sand/30 shadow-inner bg-primary-cream/20">
                    <img src="{{ $ceo->photo_path }}" class="w-full h-full object-cover" alt="{{ $ceo->name }}">
                </div>
                
                <div class="space-y-2">
                    <span class="text-[10px] font-bold text-leaf-green uppercase tracking-widest block font-display">Founder & CEO</span>
                    <h3 class="text-xl font-bold text-forest font-display">{{ $ceo->name }}</h3>
                    <p class="text-xs text-charcoal/60 font-mono">{{ trans_db($ceo->role) }}</p>
                </div>
                
                <p class="text-xs md:text-sm text-charcoal/70 font-light font-sans leading-relaxed">
                    {{ app()->getLocale() === 'en'
                        ? 'Leading AGRONEX with a vision to build an inclusive smart agriculture ecosystem through technology, field research, and collaboration.'
                        : 'Memimpin AGRONEX dengan visi membangun ekosistem pertanian cerdas yang inklusif melalui pemanfaatan teknologi, riset lapangan, dan kolaborasi multipihak.' }}
                </p>

                <div class="pt-2 flex items-center space-x-3 text-xs font-display">
                    @if($ceo->linkedin_url)
                    <a href="{{ $ceo->linkedin_url }}" target="_blank" class="px-5 py-2.5 bg-forest hover:bg-forest-dark text-primary-cream font-bold rounded-full transition-colors inline-block shadow-sm">
                        {{ app()->getLocale() === 'en' ? 'View Profile' : 'Lihat Profil' }}
                    </a>
                    @endif
                    <a href="{{ route('journey') }}" class="px-5 py-2.5 bg-sand/30 hover:bg-sand/50 text-forest font-bold rounded-full transition-colors inline-block border border-sand/40">
                        {{ app()->getLocale() === 'en' ? 'Leadership Journey' : 'Perjalanan Kepemimpinan' }}
                    </a>
                </div>
            </div>
            @endif
        </div>

        <!-- Right Side: Categories Tabs & Dynamic Grid -->
        <div class="lg:col-span-8 space-y-8">
            <!-- Filter Categories Navigation (Scroller on Mobile) -->
            <div class="flex items-center space-x-2 overflow-x-auto pb-3 font-display border-b border-sand/30 scrollbar-thin">
                <button onclick="filterCategory('all')" id="tab-all" class="tab-btn active px-4 py-2 rounded-full text-xs font-bold border border-sand bg-white text-forest hover:bg-primary-cream/40 transition-all whitespace-nowrap">
                    {{ app()->getLocale() === 'en' ? 'All Recognitions' : 'Semua Pengakuan' }}
                </button>
                @php
                    $categories = [
                        'Awards' => ['id' => 'Penghargaan', 'en' => 'Awards'],
                        'National Recognition' => ['id' => 'Tingkat Nasional', 'en' => 'National Recognition'],
                        'Strategic Partnerships' => ['id' => 'Kemitraan', 'en' => 'Strategic Partnerships'],
                        'Intellectual Property' => ['id' => 'Hak Kekayaan Intelektual', 'en' => 'Intellectual Property'],
                        'Publications' => ['id' => 'Publikasi Ilmiah', 'en' => 'Publications'],
                        'Government Programs' => ['id' => 'Program Pemerintah', 'en' => 'Gov Programs'],
                    ];
                @endphp
                @foreach($categories as $key => $labels)
                <button onclick="filterCategory('{{ $key }}')" id="tab-{{ $key }}" class="tab-btn px-4 py-2 rounded-full text-xs font-bold border border-sand bg-white text-forest hover:bg-primary-cream/40 transition-all whitespace-nowrap">
                    {{ app()->getLocale() === 'en' ? $labels['en'] : $labels['id'] }}
                </button>
                @endforeach
            </div>

            <!-- Recognition Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="recognition-grid">
                @foreach($recognitions as $rec)
                @php
                    $titleDec = json_decode($rec->title, true) ?? [];
                    $orgDec = json_decode($rec->organization, true) ?? [];
                    $descDec = json_decode($rec->description, true) ?? [];
                    
                    $titleText = $titleDec[app()->getLocale()] ?? $titleDec['id'] ?? '';
                    $orgText = is_array($orgDec) ? ($orgDec[app()->getLocale()] ?? $orgDec['id'] ?? '') : $orgDec;
                    $descText = $descDec[app()->getLocale()] ?? $descDec['id'] ?? '';
                @endphp
                <div 
                    data-category="{{ $rec->category }}"
                    class="rec-card bg-white border border-sand/40 rounded-3xl p-6 shadow-sm hover-lift flex flex-col justify-between space-y-4"
                >
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            @if($rec->award_logo_path)
                            <img src="{{ $rec->award_logo_path }}" class="h-8 w-auto object-contain max-w-[80px]" alt="{{ $orgText }}">
                            @else
                            <div class="w-8 h-8 rounded bg-forest/5 flex items-center justify-center text-forest font-bold font-display text-xs">
                                AN
                            </div>
                            @endif
                            <span class="text-[10px] font-bold px-2.5 py-1 bg-primary-cream/50 text-forest rounded-full font-mono uppercase">
                                {{ $rec->year }}
                            </span>
                        </div>
                        
                        <div class="space-y-1">
                            <h4 class="text-base font-bold text-forest font-display leading-tight">{{ $titleText }}</h4>
                            <p class="text-[11px] text-charcoal/50 font-medium font-sans">{{ $orgText }}</p>
                        </div>
                        
                        <p class="text-xs text-charcoal/70 line-clamp-3 leading-relaxed font-sans font-light">
                            {{ $descText }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-sand/30 flex items-center justify-between">
                        <!-- Linked Team Member info -->
                        @if($rec->teamMember)
                        <div class="flex items-center space-x-2">
                            <img src="{{ $rec->teamMember->photo_path }}" class="w-6 h-6 rounded-full object-cover border border-sand" alt="">
                            <span class="text-[10px] text-charcoal/50 font-medium font-display">{{ $rec->teamMember->name }}</span>
                        </div>
                        @else
                        <div></div>
                        @endif

                        <button 
                            onclick="openCredibilityModal({{ json_encode($rec) }})"
                            class="text-[11px] font-bold text-leaf-green hover:underline focus:outline-none font-display flex items-center space-x-1"
                        >
                            <span>{{ app()->getLocale() === 'en' ? 'Learn More' : 'Selengkapnya' }}</span>
                            <span>&rarr;</span>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- SECTION: LOGO WALL -->


    <!-- SECTION: MILESTONE TIMELINE -->
    <section class="py-24 max-w-4xl mx-auto px-6">
        <div class="text-center space-y-4 mb-20">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green font-display">
                {{ app()->getLocale() === 'en' ? 'Our History' : 'Rekam Jejak Kami' }}
            </span>
            <h2 class="text-3xl font-extrabold text-forest font-display">
                {{ app()->getLocale() === 'en' ? 'Recognition Timeline' : 'Garasi Penghargaan & Milestones' }}
            </h2>
        </div>

        <div class="space-y-12 relative border-l border-sand/60 pl-8 ml-4">
            @foreach($recognitions->sortBy('year') as $index => $rec)
            @php
                $titleDec = json_decode($rec->title, true) ?? [];
                $descDec = json_decode($rec->description, true) ?? [];
                $titleText = $titleDec[app()->getLocale()] ?? $titleDec['id'] ?? '';
                $descText = $descDec[app()->getLocale()] ?? $descDec['id'] ?? '';
            @endphp
            <div class="relative space-y-2 group scroll-reveal-item">
                <!-- Timeline Dot Indicator -->
                <div class="absolute -left-[41px] top-1.5 w-6 h-6 rounded-full border-4 border-white bg-sand/65 group-hover:bg-leaf-green transition-colors duration-300"></div>
                
                <span class="text-xs font-mono font-bold text-leaf-green">{{ $rec->year }}</span>
                <h4 class="text-lg font-bold text-forest font-display leading-tight">{{ $titleText }}</h4>
                <p class="text-xs text-charcoal/70 leading-relaxed font-sans max-w-2xl font-light">{{ $descText }}</p>
                
                @if($rec->doc_path)
                <div class="pt-2">
                    <img src="{{ $rec->doc_path }}" class="w-48 h-28 object-cover rounded-xl border border-sand/40 hover-lift shadow-sm" alt="">
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </section>

    <!-- SECTION: HIGHLIGHTED QUOTE -->
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
                    ? '"Recognition is not our destination. It is a reminder to continue building solutions that create real impact for farmers."'
                    : '"Penghargaan bukanlah akhir dari perjalanan kami. Ini adalah pengingat untuk terus membangun solusi nyata yang berdampak langsung pada kesejahteraan petani."' }}
            </p>
            <span class="text-[10px] font-bold uppercase tracking-widest text-leaf-green font-display block font-mono">tri febriansah, team lead</span>
        </div>
    </section>
</div>

<!-- COMPONENT: INTERACTIVE DETAIL MODAL -->
<div id="credibility-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-6 bg-forest/30 backdrop-blur-sm">
    <div class="bg-white w-full max-w-2xl rounded-3xl overflow-hidden shadow-2xl border border-sand/40 max-h-[85vh] flex flex-col transform scale-95 opacity-0 transition-all duration-300 ease-in-out" id="modal-container">
        
        <!-- Modal Header -->
        <div class="p-6 border-b border-sand/30 flex items-center justify-between bg-primary-cream/15 flex-shrink-0">
            <div>
                <span id="modal-badge" class="text-[9px] font-bold px-2 py-0.5 bg-leaf-green/10 text-leaf-green rounded-full uppercase tracking-wider font-mono">Award</span>
                <h3 id="modal-title" class="text-lg font-bold text-forest font-display mt-1 leading-tight">Recognition Title</h3>
            </div>
            <button onclick="closeCredibilityModal()" class="p-2 text-charcoal/50 hover:text-leaf-green transition-colors focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Modal Body (Scrollable) -->
        <div class="p-6 space-y-6 overflow-y-auto flex-1 text-xs md:text-sm">
            
            <!-- Images Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 flex-shrink-0">
                <div class="space-y-1">
                    <span class="font-bold text-forest text-[10px] uppercase tracking-wider block font-display">{{ app()->getLocale() === 'en' ? 'Documentation Photo' : 'Foto Dokumentasi' }}</span>
                    <div class="h-40 rounded-xl overflow-hidden border border-sand bg-bg-base">
                        <img id="modal-doc-img" class="w-full h-full object-cover" src="" alt="Documentation">
                    </div>
                </div>
                <div class="space-y-1">
                    <span class="font-bold text-forest text-[10px] uppercase tracking-wider block font-display">{{ app()->getLocale() === 'en' ? 'Certificate' : 'Piagam / Sertifikat' }}</span>
                    <div class="h-40 rounded-xl overflow-hidden border border-sand bg-bg-base">
                        <img id="modal-cert-img" class="w-full h-full object-cover" src="" alt="Certificate">
                    </div>
                </div>
            </div>

            <!-- Narrative / Story -->
            <div class="space-y-2">
                <h4 class="font-bold text-forest text-[10px] uppercase tracking-wider font-display">{{ app()->getLocale() === 'en' ? 'The Story Behind' : 'Kisah Di Balik Pengakuan' }}</h4>
                <p id="modal-story" class="text-charcoal/80 leading-relaxed font-sans font-light">
                    The background story of this achievement...
                </p>
            </div>

            <!-- Meta details grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4 border-t border-sand/30 font-display">
                <div class="space-y-0.5">
                    <span class="text-[9px] uppercase tracking-wider text-charcoal/40 font-bold block">{{ app()->getLocale() === 'en' ? 'Related Project' : 'Proyek Terkait' }}</span>
                    <span id="modal-project" class="text-xs font-semibold text-forest">AGRONEX Core</span>
                </div>
                <div class="space-y-0.5">
                    <span class="text-[9px] uppercase tracking-wider text-charcoal/40 font-bold block">{{ app()->getLocale() === 'en' ? 'Initiated/Led By' : 'Diinisiasi Oleh' }}</span>
                    <div class="flex items-center space-x-1.5 mt-0.5">
                        <img id="modal-member-avatar" src="" class="w-4 h-4 rounded-full object-cover border border-sand hidden" alt="">
                        <span id="modal-member-name" class="text-xs font-semibold text-forest">Founder & Team</span>
                    </div>
                </div>
                <div id="modal-media-container" class="space-y-0.5">
                    <span class="text-[9px] uppercase tracking-wider text-charcoal/40 font-bold block">{{ app()->getLocale() === 'en' ? 'Media & Verification' : 'Media & Verifikasi' }}</span>
                    <a id="modal-media-link" href="#" target="_blank" class="text-xs font-bold text-leaf-green hover:underline flex items-center space-x-0.5">
                        <span>{{ app()->getLocale() === 'en' ? 'Open Media link' : 'Buka Tautan Media' }}</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Control and Category Filters Script -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Scroll reveal timeline triggers
        const revealItems = document.querySelectorAll(".scroll-reveal-item");
        const scrollObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("active");
                }
            });
        }, {
            threshold: 0.1
        });
        revealItems.forEach(item => scrollObserver.observe(item));
    });

    // Category Tabs filter
    function filterCategory(cat) {
        // Toggle tab highlights
        document.querySelectorAll(".tab-btn").forEach(btn => {
            btn.classList.remove("active");
        });
        const activeTab = document.getElementById("tab-" + cat);
        if (activeTab) {
            activeTab.classList.add("active");
        }

        // Filter cards
        const cards = document.querySelectorAll(".rec-card");
        cards.forEach(card => {
            const cardCat = card.getAttribute("data-category");
            if (cat === 'all' || cardCat === cat) {
                card.style.display = 'flex';
                // Trigger quick visual fade in
                card.style.opacity = '0';
                setTimeout(() => { card.style.opacity = '1'; }, 50);
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Modal helpers
    const currentLocale = "{{ app()->getLocale() }}";
    
    function openCredibilityModal(data) {
        const modal = document.getElementById("credibility-modal");
        const container = document.getElementById("modal-container");
        
        // Parse Title, Story & Description translation strings
        let titleObj = {};
        let storyObj = {};
        try { titleObj = JSON.parse(data.title); } catch(e) { titleObj = { id: data.title, en: data.title }; }
        try { storyObj = JSON.parse(data.story); } catch(e) { storyObj = { id: data.story, en: data.story }; }

        const titleText = titleObj[currentLocale] || titleObj['id'] || 'Recognition';
        const storyText = storyObj[currentLocale] || storyObj['id'] || 'No story provided.';

        // Populate elements
        document.getElementById("modal-title").innerText = titleText;
        document.getElementById("modal-badge").innerText = data.category;
        document.getElementById("modal-story").innerText = storyText;
        document.getElementById("modal-project").innerText = data.related_project || 'AGRONEX Platform';

        // Images paths prefill
        const docImg = document.getElementById("modal-doc-img");
        const certImg = document.getElementById("modal-cert-img");
        
        docImg.src = data.doc_path ? data.doc_path : 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=800&q=80';
        certImg.src = data.certificate_path ? data.certificate_path : 'https://images.unsplash.com/photo-1589330694653-ded6df53f7ec?auto=format&fit=crop&w=800&q=80';

        // Media links prefill
        const mediaContainer = document.getElementById("modal-media-container");
        const mediaLink = document.getElementById("modal-media-link");
        if (data.media_coverage) {
            mediaLink.href = data.media_coverage;
            mediaContainer.style.display = 'block';
        } else {
            mediaContainer.style.display = 'none';
        }

        // Linked team member details
        const memberAvatar = document.getElementById("modal-member-avatar");
        const memberName = document.getElementById("modal-member-name");
        if (data.team_member) {
            memberAvatar.src = data.team_member.photo_path;
            memberAvatar.style.display = 'block';
            memberName.innerText = data.team_member.name;
        } else {
            memberAvatar.style.display = 'none';
            memberName.innerText = "{{ app()->getLocale() === 'en' ? 'AGRONEX Team' : 'Tim AGRONEX' }}";
        }

        // Show Modal
        modal.classList.remove("hidden");
        // Fade & Scale transition triggers
        setTimeout(() => {
            container.classList.remove("scale-95", "opacity-0");
            container.classList.add("scale-100", "opacity-100");
        }, 50);
    }

    function closeCredibilityModal() {
        const modal = document.getElementById("credibility-modal");
        const container = document.getElementById("modal-container");
        
        container.classList.remove("scale-100", "opacity-100");
        container.classList.add("scale-95", "opacity-0");
        
        setTimeout(() => {
            modal.classList.add("hidden");
        }, 200);
    }
</script>
@endsection
