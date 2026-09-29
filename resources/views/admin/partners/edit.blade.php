@extends('layouts.admin')

@section('content')
@php
    $rawProgram = $partner->getRawOriginal('program') ?? $partner->program;
    $decodedProgram = json_decode($rawProgram, true) ?? [];
    $programId = $decodedProgram['id'] ?? $rawProgram;
    $programEn = $decodedProgram['en'] ?? $rawProgram;

    $rawStory = $partner->getRawOriginal('collaboration_story') ?? $partner->collaboration_story;
    $decodedStory = json_decode($rawStory, true) ?? [];
    $storyId = $decodedStory['id'] ?? $rawStory;
    $storyEn = $decodedStory['en'] ?? $rawStory;

    $rawGoal = $partner->getRawOriginal('goal') ?? $partner->goal;
    $decodedGoal = json_decode($rawGoal, true) ?? [];
    $goalId = $decodedGoal['id'] ?? $rawGoal;
    $goalEn = $decodedGoal['en'] ?? $rawGoal;

    $rawResults = $partner->getRawOriginal('results') ?? $partner->results;
    $decodedResults = json_decode($rawResults, true) ?? [];
    $resultsId = $decodedResults['id'] ?? $rawResults;
    $resultsEn = $decodedResults['en'] ?? $rawResults;

    $rawImpact = $partner->getRawOriginal('impact') ?? $partner->impact;
    $decodedImpact = json_decode($rawImpact, true) ?? [];
    $impactId = $decodedImpact['id'] ?? $rawImpact;
    $impactEn = $decodedImpact['en'] ?? $rawImpact;
@endphp

<div class="space-y-6 max-w-2xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Edit Partner Collaboration: {{ $partner->name }}</h1>
        <p class="text-xs text-charcoal/50 mt-1">Modify story metrics and programs details showing in the popup modal.</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm text-xs">
        <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Partner Name</label>
                    <input type="text" name="name" value="{{ $partner->name }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Upload Logo File (WebP)</label>
                        <input type="file" name="logo_file" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Or Logo URL / Path</label>
                        <input type="text" name="logo_path" value="{{ $partner->logo_path }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Partner Type Category</label>
                    <select name="type" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="Government" {{ $partner->type === 'Government' ? 'selected' : '' }}>Government</option>
                        <option value="University" {{ $partner->type === 'University' ? 'selected' : '' }}>University</option>
                        <option value="NGO" {{ $partner->type === 'NGO' ? 'selected' : '' }}>NGO</option>
                        <option value="CSR" {{ $partner->type === 'CSR' ? 'selected' : '' }}>CSR</option>
                        <option value="Startup" {{ $partner->type === 'Startup' ? 'selected' : '' }}>Startup</option>
                        <option value="Investor" {{ $partner->type === 'Investor' ? 'selected' : '' }}>Investor</option>
                        <option value="Community" {{ $partner->type === 'Community' ? 'selected' : '' }}>Community</option>
                        <option value="International Organization" {{ $partner->type === 'International Organization' ? 'selected' : '' }}>International Organization</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Program (Indonesian)</label>
                    <input type="text" name="program_id" value="{{ $programId }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Program (English)</label>
                    <input type="text" name="program_en" value="{{ $programEn }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Collaboration Story (Indonesian)</label>
                    <textarea name="collaboration_story_id" rows="4" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $storyId }}</textarea>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Collaboration Story (English)</label>
                    <textarea name="collaboration_story_en" rows="4" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $storyEn }}</textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Goal / Objective (Indonesian)</label>
                    <input type="text" name="goal_id" value="{{ $goalId }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Goal / Objective (English)</label>
                    <input type="text" name="goal_en" value="{{ $goalEn }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Direct Results (Indonesian)</label>
                    <input type="text" name="results_id" value="{{ $resultsId }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Direct Results (English)</label>
                    <input type="text" name="results_en" value="{{ $resultsEn }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Impact Created (Indonesian)</label>
                    <input type="text" name="impact_id" value="{{ $impactId }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Impact Created (English)</label>
                    <input type="text" name="impact_en" value="{{ $impactEn }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('admin.partners') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
