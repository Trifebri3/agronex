@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Evolution of AGRONEX Milestones</h1>
            <p class="text-xs text-charcoal/50 mt-1">Manage the chronological iterations, validations, and achievements that show how AGRONEX evolved over time.</p>
        </div>
        <a href="{{ route('admin.milestones.create') }}" class="px-5 py-2.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full transition-colors shadow">
            Add Milestone
        </a>
    </div>

    <!-- Milestones Table List -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                    <th class="py-4 px-6">Status</th>
                    <th class="py-4 px-6">Year</th>
                    <th class="py-4 px-6">Title (ID)</th>
                    <th class="py-4 px-6">Locations</th>
                    <th class="py-4 px-6 font-mono">Order</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sand/35">
                @foreach($milestones as $m)
                @php
                    $titleDec = json_decode($m->title, true) ?? [];
                    $titleText = $titleDec['id'] ?? $m->title;
                @endphp
                <tr class="hover:bg-primary-cream/5 transition-colors">
                    <td class="py-4 px-6">
                        <span class="px-2.5 py-1 text-[9px] font-bold rounded-full uppercase font-mono
                            @if($m->status === 'Live') bg-leaf-green/10 text-leaf-green
                            @elseif($m->status === 'Pilot') bg-yellow-100 text-yellow-800
                            @elseif($m->status === 'Prototype') bg-blue-100 text-blue-800
                            @else bg-gray-100 text-gray-700
                            @endif"
                        >
                            {{ $m->status }}
                        </span>
                    </td>
                    <td class="py-4 px-6 font-bold text-forest font-mono">{{ $m->year }}</td>
                    <td class="py-4 px-6 font-bold text-forest font-display">{{ $titleText }}</td>
                    <td class="py-4 px-6 font-sans">
                        @if($m->locations && is_array($m->locations))
                            {{ implode(', ', $m->locations) }}
                        @else
                            -
                        @endif
                    </td>
                    <td class="py-4 px-6 font-mono font-bold">{{ $m->order_num }}</td>
                    <td class="py-4 px-6 text-right space-x-2">
                        <a href="{{ route('admin.milestones.edit', $m->id) }}" class="text-leaf-green hover:underline font-bold">Edit</a>
                        <form action="{{ route('admin.milestones.destroy', $m->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this milestone record?');">
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
