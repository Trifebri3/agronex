@extends('layouts.admin')

@section('content')
<div class="space-y-6 max-w-2xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Add Journey Step</h1>
        <p class="text-xs text-charcoal/50 mt-1">Create a new storytelling chapter or field observation for the dynamic public timeline.</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm">
        <form action="{{ route('admin.journey.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 text-xs">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Chapter Tag</label>
                    <input type="text" name="chapter_tag" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="e.g. Chapter 01, Field Study">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Year / Label</label>
                    <input type="text" name="year_label" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="e.g. 2024, Garut, West Java">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Order Number</label>
                    <input type="number" name="order_num" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="e.g. 1, 2, 3">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Title (Indonesian)</label>
                    <input type="text" name="title_id" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Judul Bahasa Indonesia">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Title (English)</label>
                    <input type="text" name="title_en" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Judul Bahasa Inggris">
                </div>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Content (Indonesian)</label>
                <textarea name="content_id" rows="4" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Cerita dalam Bahasa Indonesia..."></textarea>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Content (English)</label>
                <textarea name="content_en" rows="4" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Story in English..."></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Upload Image File (WebP recommended)</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Or Image URL / Key</label>
                    <input type="text" name="image_path" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="e.g. /images/journey/discussing_farmers.png or multiple_humarsa">
                </div>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Features / Solution Tags (One per line, optional)</label>
                <textarea name="features" rows="4" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono leading-relaxed" placeholder="Digital Supply Chain&#10;AI Harvest Prediction"></textarea>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('admin.journey') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Publish Journey Step</button>
            </div>
        </form>
    </div>
</div>
@endsection
