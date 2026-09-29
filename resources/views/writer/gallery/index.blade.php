@extends('layouts.writer')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Gallery Media Assets</h1>
            <p class="text-xs text-charcoal/50 mt-1">Upload field snapshots, drone scans, or before-and-after soil logs.</p>
        </div>
        <a href="{{ route('writer.gallery.create') }}" class="px-5 py-2.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full transition-colors shadow">
            Upload Media
        </a>
    </div>

    <!-- Gallery table listing -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                    <th class="py-4 px-6">Media Preview</th>
                    <th class="py-4 px-6">Title</th>
                    <th class="py-4 px-6">Type</th>
                    <th class="py-4 px-6">Category Filter</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sand/35">
                @foreach($items as $item)
                <tr class="hover:bg-primary-cream/5 transition-colors">
                    <td class="py-4 px-6">
                        <div class="w-10 h-10 rounded overflow-hidden border bg-primary-cream">
                            <img src="{{ $item->media_path }}" class="w-full h-full object-cover" alt="prev">
                        </div>
                    </td>
                    <td class="py-4 px-6 font-bold text-forest font-display">{{ trans_db($item->title) }}</td>
                    <td class="py-4 px-6">{{ $item->type }}</td>
                    <td class="py-4 px-6">
                        <span class="px-2 py-0.5 rounded text-[9px] bg-forest/5 text-forest font-semibold uppercase tracking-wider">
                            {{ $item->category }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-right">
                        <form action="{{ route('writer.gallery.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this media?');">
                            @csrf
                            <button type="submit" class="text-red-600 hover:underline font-bold">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
