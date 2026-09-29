@extends('layouts.writer')

@section('content')
@php
    $rawTitle = $activity->getRawOriginal('title') ?? $activity->title;
    $decodedTitle = json_decode($rawTitle, true) ?? [];
    $titleId = $decodedTitle['id'] ?? $rawTitle;
    $titleEn = $decodedTitle['en'] ?? $rawTitle;

    $rawDesc = $activity->getRawOriginal('description') ?? $activity->description;
    $decodedDesc = json_decode($rawDesc, true) ?? [];
    $descId = $decodedDesc['id'] ?? $rawDesc;
    $descEn = $decodedDesc['en'] ?? $rawDesc;
@endphp

<div class="space-y-6 max-w-xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Edit Documented Activity</h1>
        <p class="text-xs text-charcoal/50 mt-1">Modify timeline parameters for: {{ trans_db($activity->title) }}</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm text-xs">
        <form action="{{ route('writer.activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Activity Title (Indonesian)</label>
                    <input type="text" name="title_id" value="{{ $titleId }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Activity Title (English)</label>
                    <input type="text" name="title_en" value="{{ $titleEn }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Category</label>
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="Workshop" {{ $activity->category === 'Workshop' ? 'selected' : '' }}>Workshop</option>
                        <option value="FGD" {{ $activity->category === 'FGD' ? 'selected' : '' }}>FGD</option>
                        <option value="Training" {{ $activity->category === 'Training' ? 'selected' : '' }}>Training</option>
                        <option value="Pilot Project" {{ $activity->category === 'Pilot Project' ? 'selected' : '' }}>Pilot Project</option>
                        <option value="Research" {{ $activity->category === 'Research' ? 'selected' : '' }}>Research</option>
                        <option value="Community Meeting" {{ $activity->category === 'Community Meeting' ? 'selected' : '' }}>Community Meeting</option>
                        <option value="Hackathon" {{ $activity->category === 'Hackathon' ? 'selected' : '' }}>Hackathon</option>
                        <option value="Expo" {{ $activity->category === 'Expo' ? 'selected' : '' }}>Expo</option>
                        <option value="Festival" {{ $activity->category === 'Festival' ? 'selected' : '' }}>Festival</option>
                    </select>
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Activity Date</label>
                    <input type="date" name="activity_date" value="{{ $activity->activity_date ? $activity->activity_date->format('Y-m-d') : '' }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div class="space-y-1.5 md:col-span-1">
                    <label class="font-bold text-forest uppercase tracking-wider block">Location</label>
                    <input type="text" name="location" value="{{ $activity->location }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-1.5 md:col-span-1">
                    <label class="font-bold text-forest uppercase tracking-wider block">Upload New Photo File (Compressed)</label>
                    <input type="file" name="photo_file" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-1.5 md:col-span-1">
                    <label class="font-bold text-forest uppercase tracking-wider block">Current Photo Path / URL</label>
                    <input type="text" name="photo_path" value="{{ $activity->photo_path }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="font-bold text-forest uppercase tracking-wider block">Video Embed URL (Optional)</label>
                <input type="text" name="video_url" value="{{ $activity->video_url }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
            </div>

            <div class="space-y-1.5">
                <label class="font-bold text-forest uppercase tracking-wider block">Tags (Comma separated)</label>
                <input type="text" name="tags" value="{{ $activity->tags }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Activity Description (Indonesian)</label>
                    <textarea name="description_id" rows="4" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $descId }}</textarea>
                </div>
                <div class="space-y-1.5">
                    <label class="font-bold text-forest uppercase tracking-wider block">Activity Description (English)</label>
                    <textarea name="description_en" rows="4" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $descEn }}</textarea>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('writer.activities') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
