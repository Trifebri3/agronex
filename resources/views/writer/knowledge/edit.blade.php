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

<div class="space-y-6 max-w-2xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Edit Knowledge Article</h1>
        <p class="text-xs text-charcoal/50 mt-1">Modify attributes for: {{ trans_db($item->title) }}</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm text-xs">
        <form action="{{ route('writer.knowledge.update', $item->id) }}" method="POST" class="space-y-5">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Article Title (Indonesian)</label>
                    <input type="text" name="title_id" value="{{ $titleId }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Article Title (English)</label>
                    <input type="text" name="title_en" value="{{ $titleEn }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="font-bold text-forest uppercase tracking-wider block">Article Slug</label>
                <input type="text" name="slug" value="{{ $item->slug }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Category</label>
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="Article" {{ $item->category === 'Article' ? 'selected' : '' }}>Article</option>
                        <option value="Journal" {{ $item->category === 'Journal' ? 'selected' : '' }}>Journal</option>
                        <option value="Insight" {{ $item->category === 'Insight' ? 'selected' : '' }}>Insight</option>
                        <option value="Research" {{ $item->category === 'Research' ? 'selected' : '' }}>Research</option>
                        <option value="Policy Brief" {{ $item->category === 'Policy Brief' ? 'selected' : '' }}>Policy Brief</option>
                        <option value="Whitepaper" {{ $item->category === 'Whitepaper' ? 'selected' : '' }}>Whitepaper</option>
                        <option value="Case Study" {{ $item->category === 'Case Study' ? 'selected' : '' }}>Case Study</option>
                    </select>
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Principal Author</label>
                    <input type="text" name="author" value="{{ $item->author }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Publish Date</label>
                    <input type="date" name="published_at" value="{{ $item->published_at ? $item->published_at->format('Y-m-d') : '' }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="font-bold text-forest uppercase tracking-wider block">Document URL / Path</label>
                <input type="text" name="file_path" value="{{ $item->file_path }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Content Summary (Indonesian)</label>
                    <textarea name="content_id" rows="6" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $contentId }}</textarea>
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Content Summary (English)</label>
                    <textarea name="content_en" rows="6" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $contentEn }}</textarea>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('writer.knowledge') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
