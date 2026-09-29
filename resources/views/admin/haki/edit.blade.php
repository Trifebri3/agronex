@extends('layouts.admin')

@section('content')
<div class="space-y-6 max-w-xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Edit Intellectual Property Filing</h1>
        <p class="text-xs text-charcoal/50 mt-1">Modify registry attributes for: {{ $item->title }}</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm text-xs">
        <form action="{{ route('admin.haki.update', $item->id) }}" method="POST" class="space-y-6">
            @csrf
            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Registry Title</label>
                <input type="text" name="title" value="{{ $item->title }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">IP Category Type</label>
                    <select name="type" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                        <option value="Patent" {{ $item->type === 'Patent' ? 'selected' : '' }}>Patent</option>
                        <option value="Copyright" {{ $item->type === 'Copyright' ? 'selected' : '' }}>Copyright</option>
                        <option value="Trademark" {{ $item->type === 'Trademark' ? 'selected' : '' }}>Trademark</option>
                        <option value="Industrial Design" {{ $item->type === 'Industrial Design' ? 'selected' : '' }}>Industrial Design</option>
                        <option value="Software Registration" {{ $item->type === 'Software Registration' ? 'selected' : '' }}>Software Registration</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Registry Number</label>
                    <input type="text" name="registration_number" value="{{ $item->registration_number }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Status</label>
                    <input type="text" name="status" value="{{ $item->status }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Registration Date</label>
                    <input type="date" name="registration_date" value="{{ $item->registration_date ? $item->registration_date->format('Y-m-d') : '' }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Document URL / Path (Optional)</label>
                <input type="text" name="document_path" value="{{ $item->document_path }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('admin.haki') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
