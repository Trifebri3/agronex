@extends('layouts.writer')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Ecosystem Coordinate Map</h1>
            <p class="text-xs text-charcoal/50 mt-1">Manage field coordinate points, installation pins, and local sensor metrics.</p>
        </div>
        <a href="{{ route('writer.map.create') }}" class="px-5 py-2.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full transition-colors shadow">
            Add Map Marker
        </a>
    </div>

    <!-- Table of markers -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                    <th class="py-4 px-6">Marker Title</th>
                    <th class="py-4 px-6">Type</th>
                    <th class="py-4 px-6">Coordinates (Lat, Lng)</th>
                    <th class="py-4 px-6">Properties Count</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sand/35">
                @foreach($markers as $marker)
                @php
                    $rawTitle = $marker->getRawOriginal('title') ?? $marker->title;
                    $decodedTitle = json_decode($rawTitle, true) ?? [];
                    $titleShow = $decodedTitle[app()->getLocale()] ?? $decodedTitle['id'] ?? $rawTitle;

                    $rawDetails = $marker->getRawOriginal('details') ?? $marker->details;
                    $decodedDetails = json_decode($rawDetails, true) ?? [];
                    $propsCount = is_array($decodedDetails) ? count($decodedDetails) : 0;
                @endphp
                <tr class="hover:bg-primary-cream/5 transition-colors">
                    <td class="py-4 px-6 font-bold text-forest font-display">{{ $titleShow }}</td>
                    <td class="py-4 px-6 font-semibold text-charcoal/60 uppercase text-[9px]">{{ $marker->marker_type }}</td>
                    <td class="py-4 px-6 font-mono text-charcoal/80 text-[10px]">{{ $marker->latitude }}, {{ $marker->longitude }}</td>
                    <td class="py-4 px-6"><span class="px-2 py-0.5 rounded-full bg-forest/5 text-forest font-semibold">{{ $propsCount }} metrics</span></td>
                    <td class="py-4 px-6 text-right space-x-2">
                        <a href="{{ route('writer.map.edit', $marker->id) }}" class="text-leaf-green hover:underline font-bold">Edit</a>
                        <form action="{{ route('writer.map.destroy', $marker->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this marker?');">
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
