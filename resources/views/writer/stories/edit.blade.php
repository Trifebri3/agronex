@extends('layouts.writer')

@section('content')
@php
    $rawTitle = $story->getRawOriginal('title') ?? $story->title;
    $decodedTitle = json_decode($rawTitle, true) ?? [];
    $titleId = $decodedTitle['id'] ?? $rawTitle;
    $titleEn = $decodedTitle['en'] ?? $rawTitle;

    $rawStory = $story->getRawOriginal('story') ?? $story->story;
    $decodedStory = json_decode($rawStory, true) ?? [];
    $storyId = $decodedStory['id'] ?? $rawStory;
    $storyEn = $decodedStory['en'] ?? $rawStory;

    $rawValidation = $story->getRawOriginal('validation_data') ?? $story->validation_data;
    $decodedValidation = json_decode($rawValidation, true) ?? [];
    $validationId = $decodedValidation['id'] ?? $rawValidation;
    $validationEn = $decodedValidation['en'] ?? $rawValidation;

    $rawProblems = $story->getRawOriginal('problems') ?? $story->problems;
    $decodedProblems = json_decode($rawProblems, true) ?? [];
    $problemsId = $decodedProblems['id'] ?? $rawProblems;
    $problemsEn = $decodedProblems['en'] ?? $rawProblems;

    $rawSolutions = $story->getRawOriginal('solutions') ?? $story->solutions;
    $decodedSolutions = json_decode($rawSolutions, true) ?? [];
    $solutionsId = $decodedSolutions['id'] ?? $rawSolutions;
    $solutionsEn = $decodedSolutions['en'] ?? $rawSolutions;

    $rawLessons = $story->getRawOriginal('lessons') ?? $story->lessons;
    $decodedLessons = json_decode($rawLessons, true) ?? [];
    $lessonsId = $decodedLessons['id'] ?? $rawLessons;
    $lessonsEn = $decodedLessons['en'] ?? $rawLessons;
@endphp

<div class="space-y-6 max-w-4xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Edit Field Chronicle: {{ trans_db($story->title) }}</h1>
        <p class="text-xs text-charcoal/50 mt-1">Modify field measurements and interviews details.</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm text-xs">
        <form action="{{ route('writer.stories.update', $story->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Chronicle Title (Indonesian)</label>
                    <input type="text" name="title_id" value="{{ $titleId }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Chronicle Title (English)</label>
                    <input type="text" name="title_en" value="{{ $titleEn }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Chronicle Slug</label>
                    <input type="text" name="slug" value="{{ $story->slug }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Village / Region Name</label>
                    <input type="text" name="village_name" value="{{ $story->village_name }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2 md:col-span-1">
                    <label class="font-bold text-forest uppercase tracking-wider block">Upload New Photo File (Compressed)</label>
                    <input type="file" name="photo_file" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2 md:col-span-1">
                    <label class="font-bold text-forest uppercase tracking-wider block">Current Photo Path / URL</label>
                    <input type="text" name="photo_path" value="{{ $story->photo_path }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
                <div class="space-y-2 md:col-span-1">
                    <label class="font-bold text-forest uppercase tracking-wider block">Video Embed Link (Optional)</label>
                    <input type="text" name="video_url" value="{{ $story->video_url }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">The Journal Story (Indonesian)</label>
                    <textarea name="story_id" rows="8" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $storyId }}</textarea>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">The Journal Story (English)</label>
                    <textarea name="story_en" rows="8" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $storyEn }}</textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-sand/30 pt-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Validation Data Metrics (Indonesian)</label>
                    <input type="text" name="validation_data_id" value="{{ $validationId }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Validation Data Metrics (English)</label>
                    <input type="text" name="validation_data_en" value="{{ $validationEn }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Identified Obstacle (Indonesian)</label>
                    <input type="text" name="problems_id" value="{{ $problemsId }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Identified Obstacle (English)</label>
                    <input type="text" name="problems_en" value="{{ $problemsEn }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Response Solution (Indonesian)</label>
                    <input type="text" name="solutions_id" value="{{ $solutionsId }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Response Solution (English)</label>
                    <input type="text" name="solutions_en" value="{{ $solutionsEn }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Lessons Learned (Indonesian)</label>
                    <input type="text" name="lessons_id" value="{{ $lessonsId }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Lessons Learned (English)</label>
                    <input type="text" name="lessons_en" value="{{ $lessonsEn }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="space-y-2 border-t border-sand/30 pt-6">
                <label class="font-bold text-forest uppercase tracking-wider block">Farmer Interviews Quotes (Format: Name, Age|Quote)</label>
                <textarea name="quotes_raw" rows="3" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono leading-relaxed">{{ $quotes_raw }}</textarea>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('writer.stories') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
