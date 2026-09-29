@extends('layouts.writer')

@section('content')
@php
    $rawTitle = $item->getRawOriginal('title') ?? $item->title;
    $decodedTitle = json_decode($rawTitle, true) ?? [];
    $titleId = $decodedTitle['id'] ?? $rawTitle;
    $titleEn = $decodedTitle['en'] ?? $rawTitle;

    $rawContent = $item->getRawOriginal('content') ?? $item->content;
    $decodedContent = json_decode($rawContent, true) ?? [];
    $contentId = $decodedContent['id'] ?? $rawContent;
    $contentEn = $decodedContent['en'] ?? $rawContent;
@endphp

<div class="space-y-6 max-w-xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Edit Newsroom Item</h1>
        <p class="text-xs text-charcoal/50 mt-1">Modify parameters for: {{ trans_db($item->title) }}</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm text-xs">
        <form action="{{ route('writer.news.update', $item->id) }}" method="POST" class="space-y-5">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">News Title (Indonesian)</label>
                    <input type="text" name="title_id" value="{{ $titleId }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">News Title (English)</label>
                    <input type="text" name="title_en" value="{{ $titleEn }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Category</label>
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="Press Release" {{ $item->category === 'Press Release' ? 'selected' : '' }}>Press Release</option>
                        <option value="Media Coverage" {{ $item->category === 'Media Coverage' ? 'selected' : '' }}>Media Coverage</option>
                        <option value="Award" {{ $item->category === 'Award' ? 'selected' : '' }}>Award</option>
                        <option value="Interview" {{ $item->category === 'Interview' ? 'selected' : '' }}>Interview</option>
                        <option value="Publication" {{ $item->category === 'Publication' ? 'selected' : '' }}>Publication</option>
                        <option value="Podcast" {{ $item->category === 'Podcast' ? 'selected' : '' }}>Podcast</option>
                        <option value="Newsletter" {{ $item->category === 'Newsletter' ? 'selected' : '' }}>Newsletter</option>
                    </select>
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Media Source</label>
                    <input type="text" name="source" value="{{ $item->source }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Publish Date</label>
                    <input type="date" name="publish_date" value="{{ $item->publish_date ? $item->publish_date->format('Y-m-d') : '' }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="font-bold text-forest uppercase tracking-wider block">News URL / Coverage link (Optional)</label>
                <input type="text" name="link_url" value="{{ $item->link_url }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">News Details / Content (Indonesian)</label>
                    <textarea name="content_id" rows="5" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $contentId }}</textarea>
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">News Details / Content (English)</label>
                    <textarea name="content_en" rows="5" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $contentEn }}</textarea>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('writer.news') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
