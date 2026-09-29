@extends('layouts.writer')

@section('content')
<div class="space-y-6 max-w-xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Upload Gallery Media</h1>
        <p class="text-xs text-charcoal/50 mt-1">Publish snapshots or side-by-side comparative images.</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm text-xs">
        <form action="{{ route('writer.gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Media Title (Indonesian)</label>
                    <input type="text" name="title_id" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Uji coba sensor Pak Jajang">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Media Title (English)</label>
                    <input type="text" name="title_en" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Pak Jajang testing sensor">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Media Type</label>
                    <select name="type" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="photo">Photo / Picture</option>
                        <option value="video">Video Link</option>
                        <option value="drone">Drone Scan</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Gallery Category filter</label>
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="community">Community Work</option>
                        <option value="technology">Smart Technology</option>
                        <option value="events">Events & FDI</option>
                        <option value="before_after">Before & After Soil</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Upload Primary Media File (Compressed)</label>
                    <input type="file" name="media_file" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Or Primary Media Path / URL</label>
                    <input type="text" name="media_path" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="https://images.unsplash.com/...">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Upload Secondary Media File (Optional)</label>
                    <input type="file" name="secondary_media_file" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Or Secondary Media Path / URL</label>
                    <input type="text" name="secondary_media_path" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="https://images.unsplash.com/...">
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('writer.gallery') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Upload Media</button>
            </div>
        </form>
    </div>
</div>
@endsection
