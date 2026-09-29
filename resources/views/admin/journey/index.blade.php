@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Our Journey Steps</h1>
            <p class="text-xs text-charcoal/50 mt-1">Manage the storytelling timeline chapters displayed on the "Our Journey" public page.</p>
        </div>
        <a href="{{ route('admin.journey.create') }}" class="px-5 py-2.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full transition-colors shadow">
            Add Journey Step
        </a>
    </div>

    <!-- Table of Journey Chapters -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                    <th class="py-4 px-6">Image</th>
                    <th class="py-4 px-6">Tag</th>
                    <th class="py-4 px-6">Year / Label</th>
                    <th class="py-4 px-6">Title (ID)</th>
                    <th class="py-4 px-6">Title (EN)</th>
                    <th class="py-4 px-6">Order</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sand/35">
                @foreach($chapters as $ch)
                <tr class="hover:bg-primary-cream/5 transition-colors">
                    <td class="py-4 px-6">
                        @if($ch->image_path && $ch->image_path !== 'multiple_humarsa' && $ch->image_path !== 'ecosystem_connect_text')
                            <img src="{{ asset($ch->image_path) }}" class="w-12 h-8 rounded object-cover border border-sand/40" alt="img">
                        @elseif($ch->image_path === 'multiple_humarsa')
                            <span class="text-[9px] text-forest/70 font-semibold bg-forest/5 px-2 py-0.5 rounded">Humarsa Collage</span>
                        @elseif($ch->image_path === 'ecosystem_connect_text')
                            <span class="text-[9px] text-forest/70 font-semibold bg-forest/5 px-2 py-0.5 rounded">Ecosystem Node</span>
                        @else
                            <span class="text-charcoal/30">None</span>
                        @endif
                    </td>
                    <td class="py-4 px-6 font-bold text-forest font-display">{{ $ch->chapter_tag }}</td>
                    <td class="py-4 px-6 font-mono">{{ $ch->year_label }}</td>
                    <td class="py-4 px-6">{{ json_decode($ch->title, true)['id'] ?? '' }}</td>
                    <td class="py-4 px-6">{{ json_decode($ch->title, true)['en'] ?? '' }}</td>
                    <td class="py-4 px-6 font-mono font-bold">{{ $ch->order_num }}</td>
                    <td class="py-4 px-6 text-right space-x-2">
                        <a href="{{ route('admin.journey.edit', $ch->id) }}" class="text-leaf-green hover:underline font-bold">Edit</a>
                        <form action="{{ route('admin.journey.destroy', $ch->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this journey step?');">
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
