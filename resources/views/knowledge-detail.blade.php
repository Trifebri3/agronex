@extends('layouts.public')

@section('content')
<section class="py-24 bg-gradient-to-b from-primary-cream/40 to-bg-base min-h-screen">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Back Button & Breadcrumbs -->
        <div class="mb-10 flex flex-wrap items-center space-x-2 text-xs text-charcoal/60">
            <a href="{{ route('home') }}" class="hover:text-leaf-green transition-colors font-medium">Home</a>
            <span>/</span>
            <a href="{{ route('knowledge') }}" class="hover:text-leaf-green transition-colors font-medium">Knowledge Center</a>
            <span>/</span>
            <span class="text-charcoal font-semibold truncate max-w-[200px] md:max-w-sm">{{ trans_db($item->title) }}</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- LEFT COLUMN: Main Article -->
            <article class="lg:col-span-8 bg-white border border-sand/40 p-8 md:p-12 rounded-3xl shadow-sm space-y-8">
                
                <!-- Category and Meta info -->
                <div class="space-y-4">
                    <span class="px-3 py-1.5 rounded-full bg-forest/5 text-forest text-[11px] uppercase font-bold tracking-wider inline-block">
                        {{ $item->category }}
                    </span>
                    
                    <h1 class="text-3xl md:text-4xl font-extrabold text-forest font-display leading-tight tracking-tight">
                        {{ trans_db($item->title) }}
                    </h1>
                    
                    <div class="flex flex-wrap items-center text-charcoal/60 text-xs gap-y-2 gap-x-4 pt-2 border-b border-sand/30 pb-6 font-medium">
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-4 h-4 text-leaf-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span>{{ $item->author }}</span>
                        </div>
                        <span>•</span>
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-4 h-4 text-leaf-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>{{ $item->published_at ? $item->published_at->format('M d, Y') : 'Preprint' }}</span>
                        </div>
                        <span>•</span>
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-4 h-4 text-leaf-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            <span>{{ $item->views_count ?? 0 }} {{ app()->getLocale() === 'en' ? 'readers' : 'pembaca' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Main Text Content -->
                <div class="prose max-w-none text-charcoal/90 leading-relaxed text-sm md:text-base space-y-6">
                    @foreach(explode("\n", trans_db($item->content)) as $paragraph)
                        @if(trim($paragraph))
                            <p class="leading-relaxed font-light text-justify md:text-left">{{ trim($paragraph) }}</p>
                        @endif
                    @endforeach
                </div>

                <!-- Bottom PDF Download Box (Optional) -->
                @if($item->file_path && $item->file_path !== '#')
                <div class="mt-12 bg-primary-cream/20 border border-sand/40 p-6 rounded-2xl flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="space-y-1 text-center sm:text-left">
                        <h4 class="font-bold text-forest text-sm">{{ app()->getLocale() === 'en' ? 'Download PDF Version' : 'Unduh Versi PDF' }}</h4>
                        <p class="text-xs text-charcoal/60">{{ app()->getLocale() === 'en' ? 'Keep a copy of this research for offline reading.' : 'Simpan salinan riset ini untuk dibaca secara luring.' }}</p>
                    </div>
                    <a href="{{ $item->file_path }}" target="_blank" class="px-5 py-2.5 bg-forest hover:bg-forest-dark text-primary-cream font-bold text-xs rounded-xl flex items-center shadow-sm transition-colors whitespace-nowrap">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        {{ app()->getLocale() === 'en' ? 'Download PDF' : 'Unduh PDF' }}
                    </a>
                </div>
                @endif
            </article>

            <!-- RIGHT COLUMN: Sidebar -->
            <div class="lg:col-span-4 space-y-8">
                
                <!-- Quick Actions & Share -->
                <div class="bg-white border border-sand/40 p-8 rounded-3xl shadow-sm space-y-6">
                    <h3 class="font-extrabold text-base text-forest font-display tracking-tight border-b border-sand/30 pb-3">
                        {{ app()->getLocale() === 'en' ? 'Actions & Share' : 'Aksi & Bagikan' }}
                    </h3>
                    
                    @if($item->file_path && $item->file_path !== '#')
                    <a href="{{ $item->file_path }}" target="_blank" class="w-full py-3 bg-forest hover:bg-forest-dark text-primary-cream font-bold text-xs rounded-xl flex items-center justify-center shadow transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        {{ app()->getLocale() === 'en' ? 'Download Document' : 'Unduh Dokumen' }}
                    </a>
                    @endif

                    <div class="space-y-3">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-charcoal/50 block">
                            {{ app()->getLocale() === 'en' ? 'Share this article:' : 'Bagikan artikel ini:' }}
                        </span>
                        
                        <div class="flex items-center gap-2">
                            <!-- WhatsApp -->
                            <a href="https://api.whatsapp.com/send?text={{ urlencode(trans_db($item->title) . ' - ' . url()->current()) }}" target="_blank" class="flex items-center justify-center p-3 border border-sand hover:bg-primary-cream/30 hover:border-leaf-green text-charcoal/70 hover:text-leaf-green rounded-xl transition-all flex-1" title="Share via WhatsApp">
                                <svg class="w-4 h-4 fill-current mr-2" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.513 2.262 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.5-5.739-1.451L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.37 9.864-9.799.002-2.63-1.023-5.101-2.885-6.965C16.528 1.977 14.07 1.01 11.999 1.01c-5.439 0-9.866 4.372-9.87 9.802 0 1.688.451 3.336 1.306 4.783L2.422 20.11l4.225-1.109z"/></svg>
                                <span class="text-xs font-semibold">WA</span>
                            </a>
                            
                            <!-- X / Twitter -->
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode(trans_db($item->title)) }}&url={{ urlencode(url()->current()) }}" target="_blank" class="flex items-center justify-center p-3 border border-sand hover:bg-primary-cream/30 hover:border-leaf-green text-charcoal/70 hover:text-leaf-green rounded-xl transition-all flex-1" title="Share on X">
                                <svg class="w-4 h-4 fill-current mr-2" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                <span class="text-xs font-semibold">X</span>
                            </a>

                            <!-- LinkedIn -->
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" class="flex items-center justify-center p-3 border border-sand hover:bg-primary-cream/30 hover:border-leaf-green text-charcoal/70 hover:text-leaf-green rounded-xl transition-all flex-1" title="Share on LinkedIn">
                                <svg class="w-4 h-4 fill-current mr-2" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.779-1.75-1.75s.784-1.75 1.75-1.75 1.75.779 1.75 1.75-.784 1.75-1.75 1.75zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                <span class="text-xs font-semibold">LN</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Read Next / Related Articles -->
                @if($related->isNotEmpty())
                <div class="bg-white border border-sand/40 p-8 rounded-3xl shadow-sm space-y-6">
                    <h3 class="font-extrabold text-base text-forest font-display tracking-tight border-b border-sand/30 pb-3">
                        {{ app()->getLocale() === 'en' ? 'Read Next' : 'Rekomendasi Artikel' }}
                    </h3>
                    
                    <div class="space-y-6">
                        @foreach($related as $rel)
                        <div class="space-y-2 group">
                            <span class="px-2 py-0.5 rounded bg-forest/5 text-forest text-[9px] uppercase font-bold tracking-wider">
                                {{ $rel->category }}
                            </span>
                            <h4 class="font-bold text-sm text-forest font-display leading-snug group-hover:text-leaf-green transition-colors">
                                <a href="{{ route('knowledge.detail', $rel->slug) }}">{{ trans_db($rel->title) }}</a>
                            </h4>
                            <p class="text-xs text-charcoal/60 line-clamp-2 leading-relaxed">
                                {{ trans_db($rel->content) }}
                            </p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>
@endsection
