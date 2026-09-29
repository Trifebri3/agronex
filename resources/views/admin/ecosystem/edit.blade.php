@extends('layouts.admin')

@section('content')
@php
    $rawSubtitle = $item->getRawOriginal('subtitle') ?? $item->subtitle;
    $decodedSubtitle = json_decode($rawSubtitle, true) ?? [];
    $subtitleId = $decodedSubtitle['id'] ?? $rawSubtitle;
    $subtitleEn = $decodedSubtitle['en'] ?? $rawSubtitle;

    $rawDesc = $item->getRawOriginal('description') ?? $item->description;
    $decodedDesc = json_decode($rawDesc, true) ?? [];
    $descId = $decodedDesc['id'] ?? $rawDesc;
    $descEn = $decodedDesc['en'] ?? $rawDesc;

    $rawUseCase = $item->getRawOriginal('use_case') ?? $item->use_case;
    $decodedUseCase = json_decode($rawUseCase, true) ?? [];
    $useCaseId = $decodedUseCase['id'] ?? $rawUseCase;
    $useCaseEn = $decodedUseCase['en'] ?? $rawUseCase;
@endphp

<div class="space-y-6 max-w-3xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Edit Ecosystem Node: {{ $item->name }}</h1>
        <p class="text-xs text-charcoal/50 mt-1">Modify details that appear in the interactive public drawer.</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm">
        <form action="{{ route('admin.ecosystem.update', $item->id) }}" method="POST" class="space-y-6 text-xs">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Subsystem Name</label>
                    <input type="text" name="name" value="{{ $item->name }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Subtitle (Indonesian)</label>
                    <input type="text" name="subtitle_id" value="{{ $subtitleId }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Subtitle (English)</label>
                    <input type="text" name="subtitle_en" value="{{ $subtitleEn }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Description (Indonesian)</label>
                    <textarea name="description_id" rows="4" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $descId }}</textarea>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Description (English)</label>
                    <textarea name="description_en" rows="4" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $descEn }}</textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Real-world Use Case (Indonesian)</label>
                    <textarea name="use_case_id" rows="2" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $useCaseId }}</textarea>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Real-world Use Case (English)</label>
                    <textarea name="use_case_en" rows="2" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $useCaseEn }}</textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Deployment Status</label>
                    <select name="status" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="Live" {{ $item->status === 'Live' ? 'selected' : '' }}>Live</option>
                        <option value="Beta" {{ $item->status === 'Beta' ? 'selected' : '' }}>Beta</option>
                        <option value="Coming Soon" {{ $item->status === 'Coming Soon' ? 'selected' : '' }}>Coming Soon</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Demo URL</label>
                    <input type="text" name="demo_url" value="{{ $item->demo_url }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Target Portal URL</label>
                    <input type="text" name="target_url" value="{{ $item->target_url }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Features List (One feature per line)</label>
                <textarea name="features" rows="4" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono leading-relaxed">@if(is_array($item->features)){{ implode("\n", $item->features) }}@endif</textarea>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('admin.ecosystem') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
