@extends('layouts.public')

@section('content')
<section class="py-24 bg-gradient-to-b from-primary-cream/40 to-bg-base min-h-screen">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Header -->
        <div class="max-w-2xl mx-auto text-center space-y-4 mb-16">
            <span class="text-xs font-bold uppercase tracking-widest text-leaf-green">Resource Catalog</span>
            <h1 class="text-4xl font-extrabold text-forest font-display tracking-tight">Knowledge Center</h1>
            <p class="text-sm text-charcoal/70">
                Explore verified research journals, whitepapers, case studies, and field insight reports compiled by AGRONEX scientists.
            </p>
        </div>

        <!-- Search Bar and Category filters -->
        <div class="bg-white border border-sand/40 p-6 rounded-3xl shadow-sm mb-12 max-w-4xl mx-auto space-y-4">
            <form action="{{ route('knowledge') }}" method="GET" class="flex flex-col md:flex-row gap-3">
                <div class="flex-1 relative">
                    <input type="text" name="q" value="{{ $query }}" placeholder="Search articles, authors, or key findings..." class="w-full pl-10 pr-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green text-xs bg-bg-base">
                    <svg class="absolute left-3.5 top-3.5 w-4 h-4 text-charcoal/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <div class="w-full md:w-48">
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green text-xs bg-bg-base text-charcoal/70">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ $category == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-xs font-semibold text-primary-cream rounded-xl transition-colors">
                    Search Node
                </button>
            </form>
        </div>

        <!-- Grid of articles -->
        @if($items->isEmpty())
        <div class="text-center py-20 bg-white border border-dashed border-sand/65 rounded-3xl max-w-xl mx-auto space-y-4">
            <svg class="w-12 h-12 text-charcoal/30 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <h3 class="font-bold text-forest font-display">No articles found</h3>
            <p class="text-xs text-charcoal/60">Try adjustments in your search query or filters.</p>
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($items as $item)
            <div class="bg-white border border-sand/40 p-8 rounded-3xl shadow-sm hover-lift flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex items-center justify-between text-xs font-semibold">
                        <span class="px-2.5 py-1 rounded-full bg-forest/5 text-forest text-[10px] uppercase font-bold">{{ $item->category }}</span>
                        <div class="flex items-center space-x-1.5 text-charcoal/50 text-[10px]">
                            <span>{{ $item->published_at ? $item->published_at->format('M Y') : 'Preprint' }}</span>
                            <span>•</span>
                            <span>{{ $item->views_count ?? 0 }} {{ app()->getLocale() === 'en' ? 'views' : 'pembaca' }}</span>
                        </div>
                    </div>
                    <h3 class="font-extrabold text-lg text-forest font-display leading-snug hover:text-leaf-green transition-colors">
                        <a href="{{ route('knowledge.detail', $item->slug) }}">{{ trans_db($item->title) }}</a>
                    </h3>
                    <p class="text-xs text-charcoal/80 leading-relaxed font-light line-clamp-4">{{ trans_db($item->content) }}</p>
                    <div class="text-[10px] text-charcoal/50">
                        <span>Author: <span class="font-semibold text-forest">{{ $item->author }}</span></span>
                    </div>
                </div>
                <div class="pt-6 border-t border-sand/30 mt-6 flex justify-between items-center">
                    <div class="flex items-center space-x-2.5">
                        <span class="text-[9px] font-bold uppercase tracking-wider text-charcoal/50">{{ app()->getLocale() === 'en' ? 'Share:' : 'Bagikan:' }}</span>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode(trans_db($item->title) . ' - ' . route('knowledge.detail', $item->slug)) }}" target="_blank" class="text-charcoal/50 hover:text-leaf-green transition-colors" title="Share via WhatsApp">
                            <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.513 2.262 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.5-5.739-1.451L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.37 9.864-9.799.002-2.63-1.023-5.101-2.885-6.965C16.528 1.977 14.07 1.01 11.999 1.01c-5.439 0-9.866 4.372-9.87 9.802 0 1.688.451 3.336 1.306 4.783L2.422 20.11l4.225-1.109z"/></svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode(trans_db($item->title)) }}&url={{ urlencode(route('knowledge.detail', $item->slug)) }}" target="_blank" class="text-charcoal/50 hover:text-leaf-green transition-colors" title="Share on X">
                            <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                    </div>
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('knowledge.detail', $item->slug) }}" class="inline-flex items-center text-xs font-bold text-leaf-green hover:underline">
                            {{ app()->getLocale() === 'en' ? 'Read' : 'Baca' }} &rarr;
                        </a>
                        @if($item->file_path && $item->file_path !== '#')
                        <a href="{{ $item->file_path }}" target="_blank" class="inline-flex items-center text-[10px] font-semibold text-charcoal/45 hover:text-leaf-green transition-colors" title="Download PDF">
                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            <span>PDF</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection
