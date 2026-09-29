@extends('layouts.public')

@section('content')
<section class="py-24 bg-gradient-to-b from-primary-cream/40 to-bg-base">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Header -->
        <div class="max-w-3xl mx-auto text-center space-y-6 mb-20">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Sustainability Focus</span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-forest font-display tracking-tight">ESG & Impact Dashboard</h1>
            <p class="text-sm md:text-base text-charcoal/70 leading-relaxed max-w-xl mx-auto">
                Real-time measurements tracking our environmental footprints, social community improvements, and governance indicators.
            </p>
            <div class="pt-4 flex justify-center space-x-4">
                <a href="#" class="px-6 py-3 bg-forest hover:bg-forest-dark text-xs font-bold text-primary-cream rounded-full shadow flex items-center">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Download Full ESG Report (PDF)
                </a>
                <a href="#" class="px-6 py-3 bg-white border border-sand hover:bg-primary-cream text-xs font-bold text-forest rounded-full shadow-sm flex items-center">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Download Impact Report
                </a>
            </div>
        </div>

        <!-- Metric Categories grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Environmental column -->
            <div class="space-y-6">
                <div class="flex items-center space-x-3 pb-2 border-b border-sand">
                    <div class="w-8 h-8 rounded-lg bg-leaf-green/10 flex items-center justify-center text-leaf-green">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m0-12.728l.707.707m12.728 12.728l.707.707M12 8a4 4 0 100 8 4 4 0 000-8z"/></svg>
                    </div>
                    <h3 class="font-extrabold text-lg text-forest font-display uppercase tracking-wider">Environmental</h3>
                </div>

                <div class="space-y-4">
                    @foreach($environmental as $metric)
                    <div class="bg-white border border-sand/45 p-6 rounded-2xl shadow-sm space-y-3 hover-lift">
                        <div class="flex items-baseline justify-between">
                            <span class="text-xs font-semibold text-charcoal/70">{{ trans_db($metric->metric_name) }}</span>
                            <span class="text-lg font-bold text-forest font-display">{{ $metric->value }} <span class="text-xs font-normal text-charcoal/50">{{ $metric->unit }}</span></span>
                        </div>
                        <p class="text-[11px] text-charcoal/60 leading-relaxed">{{ trans_db($metric->description) }}</p>
                        
                        <!-- Visual indicator bar -->
                        <div class="w-full h-1.5 rounded-full bg-primary-cream overflow-hidden">
                            <div class="h-full bg-leaf-green rounded-full" style="width: 82%;"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Social column -->
            <div class="space-y-6">
                <div class="flex items-center space-x-3 pb-2 border-b border-sand">
                    <div class="w-8 h-8 rounded-lg bg-leaf-green/10 flex items-center justify-center text-leaf-green">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h3 class="font-extrabold text-lg text-forest font-display uppercase tracking-wider">Social</h3>
                </div>

                <div class="space-y-4">
                    @foreach($social as $metric)
                    <div class="bg-white border border-sand/45 p-6 rounded-2xl shadow-sm space-y-3 hover-lift">
                        <div class="flex items-baseline justify-between">
                            <span class="text-xs font-semibold text-charcoal/70">{{ trans_db($metric->metric_name) }}</span>
                            <span class="text-lg font-bold text-forest font-display">{{ $metric->value }} <span class="text-xs font-normal text-charcoal/50">{{ $metric->unit }}</span></span>
                        </div>
                        <p class="text-[11px] text-charcoal/60 leading-relaxed">{{ trans_db($metric->description) }}</p>
                        
                        <!-- Visual indicator bar -->
                        <div class="w-full h-1.5 rounded-full bg-primary-cream overflow-hidden">
                            <div class="h-full bg-fresh-lime rounded-full" style="width: 75%;"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Governance column -->
            <div class="space-y-6">
                <div class="flex items-center space-x-3 pb-2 border-b border-sand">
                    <div class="w-8 h-8 rounded-lg bg-leaf-green/10 flex items-center justify-center text-leaf-green">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="font-extrabold text-lg text-forest font-display uppercase tracking-wider">Governance</h3>
                </div>

                <div class="space-y-4">
                    @foreach($governance as $metric)
                    <div class="bg-white border border-sand/45 p-6 rounded-2xl shadow-sm space-y-3 hover-lift">
                        <div class="flex items-baseline justify-between">
                            <span class="text-xs font-semibold text-charcoal/70">{{ trans_db($metric->metric_name) }}</span>
                            <span class="text-lg font-bold text-forest font-display">{{ $metric->value }} <span class="text-xs font-normal text-charcoal/50">{{ $metric->unit }}</span></span>
                        </div>
                        <p class="text-[11px] text-charcoal/60 leading-relaxed">{{ trans_db($metric->description) }}</p>
                        
                        <!-- Visual indicator bar -->
                        <div class="w-full h-1.5 rounded-full bg-primary-cream overflow-hidden">
                            <div class="h-full bg-forest rounded-full" style="width: 100%;"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Interactive chart visual mockup using beautiful pure SVG shapes -->
        <div class="mt-20 bg-white border border-sand/40 p-8 rounded-3xl shadow-sm">
            <h3 class="font-extrabold text-xl text-forest font-display mb-6">12-Month Water Saving Projections (Liters)</h3>
            <div class="w-full aspect-[21/9] bg-primary-cream/20 rounded-2xl relative p-6 flex flex-col justify-between overflow-hidden">
                <!-- SVG path representing a beautiful smooth wave trend chart -->
                <svg class="absolute bottom-0 left-0 w-full h-[65%] text-leaf-green/20" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <path d="M 0 100 L 0 50 Q 15 35 30 55 T 60 25 T 90 40 T 100 15 L 100 100 Z" fill="currentColor"></path>
                    <path d="M 0 50 Q 15 35 30 55 T 60 25 T 90 40 T 100 15" fill="none" stroke="var(--color-leaf-green)" stroke-width="1.5"></path>
                </svg>
                <div class="flex justify-between text-[10px] text-charcoal/40 font-mono relative z-10">
                    <span>1,200k L</span>
                    <span>900k L</span>
                    <span>600k L</span>
                    <span>300k L</span>
                </div>
                <div class="flex justify-between text-[10px] text-charcoal/50 uppercase font-semibold relative z-10 pt-4 border-t border-sand/30">
                    <span>Q3 2025</span>
                    <span>Q4 2025</span>
                    <span>Q1 2026</span>
                    <span>Today</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
