@extends('layouts.admin')

@section('content')
<div class="space-y-6 max-w-2xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Edit Milestone Record</h1>
        <p class="text-xs text-charcoal/50 mt-1">Modify milestone year, status tags, tech stacks, field notes, and attachments.</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm">
        <form action="{{ route('admin.milestones.update', $milestone->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 text-xs">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Year / Phase</label>
                    <input type="text" name="year" value="{{ $milestone->year }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="e.g. Origin, 2024, 2025">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Status</label>
                    <select name="status" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="Research" {{ $milestone->status === 'Research' ? 'selected' : '' }}>Research</option>
                        <option value="Prototype" {{ $milestone->status === 'Prototype' ? 'selected' : '' }}>Prototype</option>
                        <option value="Pilot" {{ $milestone->status === 'Pilot' ? 'selected' : '' }}>Pilot</option>
                        <option value="Live" {{ $milestone->status === 'Live' ? 'selected' : '' }}>Live</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Order Number</label>
                    <input type="number" name="order_num" value="{{ $milestone->order_num }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="e.g. 1, 2">
                </div>
            </div>

            @php
                $titleDec = json_decode($milestone->title, true) ?? [];
                $subtitleDec = json_decode($milestone->subtitle, true) ?? [];
                $descDec = json_decode($milestone->description, true) ?? [];
                $lessonsDec = json_decode($milestone->lessons_learned, true) ?? [];
                $impactDec = json_decode($milestone->impact, true) ?? [];
                $achieveDec = json_decode($milestone->achievements, true) ?? [];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Title (Indonesian)</label>
                    <input type="text" name="title_id" value="{{ $titleDec['id'] ?? '' }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Judul bahasa Indonesia">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Title (English)</label>
                    <input type="text" name="title_en" value="{{ $titleDec['en'] ?? '' }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="English Title">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Subtitle (Indonesian)</label>
                    <input type="text" name="subtitle_id" value="{{ $subtitleDec['id'] ?? '' }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="Sub-judul bahasa Indonesia">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Subtitle (English)</label>
                    <input type="text" name="subtitle_en" value="{{ $subtitleDec['en'] ?? '' }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="English Subtitle">
                </div>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Description (Indonesian)</label>
                <textarea name="description_id" rows="3" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Penjelasan lengkap...">${{ $descDec['id'] ?? '' }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Description (English)</label>
                <textarea name="description_en" rows="3" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Complete description details...">{{ $descDec['en'] ?? '' }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Locations (Comma separated)</label>
                    <input type="text" name="locations" value="{{ $milestone->locations && is_array($milestone->locations) ? implode(', ', $milestone->locations) : '' }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="e.g. Garut, Bandung, Lembang">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Technologies Used (Comma separated)</label>
                    <input type="text" name="technologies" value="{{ $milestone->technologies && is_array($milestone->technologies) ? implode(', ', $milestone->technologies) : '' }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal" placeholder="e.g. Soil Sensors, NPK Telemetry">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Lessons Learned (Indonesian)</label>
                    <textarea name="lessons_learned_id" rows="2" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Pembelajaran penting...">{{ $lessonsDec['id'] ?? '' }}</textarea>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Lessons Learned (English)</label>
                    <textarea name="lessons_learned_en" rows="2" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Key lessons learned...">{{ $lessonsDec['en'] ?? '' }}</textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Impact / Results (Indonesian)</label>
                    <textarea name="impact_id" rows="2" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Dampak / Hasil...">{{ $impactDec['id'] ?? '' }}</textarea>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Impact / Results (English)</label>
                    <textarea name="impact_en" rows="2" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Impact / Validation metrics...">{{ $impactDec['en'] ?? '' }}</textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Achievements (Indonesian)</label>
                    <textarea name="achievements_id" rows="2" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Pencapaian terkait...">{{ $achieveDec['id'] ?? '' }}</textarea>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Achievements (English)</label>
                    <textarea name="achievements_en" rows="2" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Achievements listed...">{{ $achieveDec['en'] ?? '' }}</textarea>
                </div>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Related AGRONEX Product (Optional)</label>
                <input type="text" name="related_product" value="{{ $milestone->related_product }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-sans" placeholder="e.g. AgroPredict, IoT Portable">
            </div>

            <!-- Upload files or provide paths -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-sand/30">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Upload New Primary Photo / Mockup</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Or Photo path URL</label>
                    <input type="text" name="image_path" value="{{ $milestone->image_path }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="/images/journey/...">
                </div>
            </div>

            @if($milestone->image_path)
            <div class="space-y-1">
                <span class="font-bold text-forest uppercase tracking-wider block">Current Primary Photo Preview</span>
                <img src="{{ $milestone->image_path }}" class="w-32 h-20 rounded object-cover border border-sand" alt="">
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-sand/30">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Upload Video File (Optional)</label>
                    <input type="file" name="video_file" accept="video/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest tracking-wider block font-mono">Or Video Path URL</label>
                    <input type="text" name="video_path" value="{{ $milestone->video_path }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="https://youtube.com/...">
                </div>
            </div>

            @if($milestone->video_path)
            <div class="space-y-1 font-mono text-[10px] text-charcoal/60">
                Current Video: {{ $milestone->video_path }}
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-sand/30">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Upload Document File (Optional)</label>
                    <input type="file" name="document_file" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest tracking-wider block font-mono">Or Document Path URL</label>
                    <input type="text" name="document_path" value="{{ $milestone->document_path }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="/storage/docs/...">
                </div>
            </div>

            @if($milestone->document_path)
            <div class="space-y-1 font-mono text-[10px] text-charcoal/60">
                Current Document: {{ $milestone->document_path }}
            </div>
            @endif

            <div class="space-y-2 pt-4 border-t border-sand/30">
                <label class="font-bold text-forest uppercase tracking-wider block">Upload More Gallery Images (Select multiple)</label>
                <input type="file" name="gallery_files[]" multiple accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                <p class="text-[10px] text-charcoal/40">Select multiple pictures to append to the expanded details modal grid.</p>
            </div>

            @if($milestone->gallery && is_array($milestone->gallery))
            <div class="space-y-2 pt-2">
                <span class="font-bold text-forest uppercase tracking-wider block">Current Gallery Photos</span>
                <div class="grid grid-cols-4 gap-2">
                    @foreach($milestone->gallery as $pic)
                    <img src="{{ $pic }}" class="w-full h-12 object-cover rounded border border-sand" alt="">
                    @endforeach
                </div>
            </div>
            @endif

            <div class="flex items-center space-x-2 pt-2 border-t border-sand/30">
                <input type="checkbox" name="is_published" value="1" {{ $milestone->is_published ? 'checked' : '' }} class="rounded border-sand text-leaf-green focus:ring-leaf-green">
                <label class="font-bold text-forest uppercase tracking-wider">Publish Immediately</label>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('admin.milestones') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
