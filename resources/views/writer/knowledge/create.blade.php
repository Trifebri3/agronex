@extends('layouts.writer')

@section('content')
<div class="space-y-6 max-w-2xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Add Knowledge Article</h1>
        <p class="text-xs text-charcoal/50 mt-1">Publish research logs or case studies to the resource center.</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm text-xs">
        <form action="{{ route('writer.knowledge.store') }}" method="POST" class="space-y-5">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Article Title (Indonesian)</label>
                    <input type="text" name="title_id" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Judul Artikel">
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Article Title (English)</label>
                    <input type="text" name="title_en" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Article Title">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="font-bold text-forest uppercase tracking-wider block">Article Slug</label>
                <input type="text" name="slug" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="decentralized-iot-canopies">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Category</label>
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="Article">Article</option>
                        <option value="Journal">Journal</option>
                        <option value="Insight">Insight</option>
                        <option value="Research">Research</option>
                        <option value="Policy Brief">Policy Brief</option>
                        <option value="Whitepaper">Whitepaper</option>
                        <option value="Case Study">Case Study</option>
                    </select>
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Principal Author</label>
                    <input type="text" name="author" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Sarah Amalia, M.Sc.">
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Publish Date</label>
                    <input type="date" name="published_at" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="font-bold text-forest uppercase tracking-wider block">Document URL / Path</label>
                <input type="text" name="file_path" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="/downloads/research_...">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Content Summary (Indonesian)</label>
                    <textarea name="content_id" rows="6" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Tulis ringkasan riset di sini..."></textarea>
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Content Summary (English)</label>
                    <textarea name="content_en" rows="6" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Type or paste outline summary findings here..."></textarea>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('writer.knowledge') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Publish Article</button>
            </div>
        </form>
    </div>
</div>
@endsection
