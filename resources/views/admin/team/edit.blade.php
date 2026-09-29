@extends('layouts.admin')

@section('content')
@php
    $rawName = $member->getRawOriginal('name');
    $decodedName = json_decode($rawName, true) ?? [];
    $nameId = $decodedName['id'] ?? $rawName;
    $nameEn = $decodedName['en'] ?? $rawName;

    $rawRole = $member->getRawOriginal('role');
    $decodedRole = json_decode($rawRole, true) ?? [];
    $roleId = $decodedRole['id'] ?? $rawRole;
    $roleEn = $decodedRole['en'] ?? $rawRole;

    $rawBio = $member->getRawOriginal('bio');
    $decodedBio = json_decode($rawBio, true) ?? [];
    $bioId = $decodedBio['id'] ?? $rawBio;
    $bioEn = $decodedBio['en'] ?? $rawBio;

    $rawContributions = $member->getRawOriginal('contributions');
    $decodedContributions = json_decode($rawContributions, true) ?? [];
    $contributionsId = $decodedContributions['id'] ?? $rawContributions;
    $contributionsEn = $decodedContributions['en'] ?? $rawContributions;
@endphp

<div class="space-y-6 max-w-2xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Edit Team Member Profile</h1>
        <p class="text-xs text-charcoal/50 mt-1">Modify properties and bios inside the team database list.</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm text-xs">
        <form action="{{ route('admin.team.update', $member->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Full Name (Indonesian)</label>
                    <input type="text" name="name_id" value="{{ $nameId }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Full Name (English)</label>
                    <input type="text" name="name_en" value="{{ $nameEn }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Role / Designation (Indonesian)</label>
                    <input type="text" name="role_id" value="{{ $roleId }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Role / Designation (English)</label>
                    <input type="text" name="role_en" value="{{ $roleEn }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Category</label>
                    <select name="category" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="CEO" {{ $member->category === 'CEO' ? 'selected' : '' }}>CEO</option>
                        <option value="CTO" {{ $member->category === 'CTO' ? 'selected' : '' }}>CTO</option>
                        <option value="AI Engineer" {{ $member->category === 'AI Engineer' ? 'selected' : '' }}>AI Engineer</option>
                        <option value="Agronomist" {{ $member->category === 'Agronomist' ? 'selected' : '' }}>Agronomist</option>
                        <option value="Research" {{ $member->category === 'Research' ? 'selected' : '' }}>Research</option>
                        <option value="Designer" {{ $member->category === 'Designer' ? 'selected' : '' }}>Designer</option>
                        <option value="Community" {{ $member->category === 'Community' ? 'selected' : '' }}>Community</option>
                        <option value="Advisor" {{ $member->category === 'Advisor' ? 'selected' : '' }}>Advisor</option>
                        <option value="Board" {{ $member->category === 'Board' ? 'selected' : '' }}>Board</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Order Position Number</label>
                    <input type="number" name="order_num" value="{{ $member->order_num }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Email Address (Optional)</label>
                    <input type="email" name="email" value="{{ $member->email }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">LinkedIn Profile URL (Optional)</label>
                    <input type="url" name="linkedin_url" value="{{ $member->linkedin_url }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Upload New Photo File (Compressed to WebP)</label>
                    <input type="file" name="photo_file" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Current Photo Path / URL</label>
                    <input type="text" name="photo_path" value="{{ $member->photo_path }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Bio Summary (Indonesian)</label>
                    <textarea name="bio_id" rows="3" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">{{ $bioId }}</textarea>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Bio Summary (English)</label>
                    <textarea name="bio_en" rows="3" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">{{ $bioEn }}</textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Skills (Comma-separated, e.g. IoT, PHP, Python)</label>
                    <input type="text" name="skills" value="{{ is_array($member->getRawOriginal('skills')) ? json_encode($member->getRawOriginal('skills')) : $member->getRawOriginal('skills') }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Contributions / Project Role (Indonesian)</label>
                    <input type="text" name="contributions_id" value="{{ $contributionsId }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>
            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Contributions / Project Role (English)</label>
                <input type="text" name="contributions_en" value="{{ $contributionsEn }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('admin.team') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
