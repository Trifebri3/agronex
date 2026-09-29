@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Recognition & Credibility Records</h1>
            <p class="text-xs text-charcoal/50 mt-1">Manage awards, intellectual property (IP), strategic partnerships, publications, and milestones linked to team profiles.</p>
        </div>
        <a href="{{ route('admin.recognitions.create') }}" class="px-5 py-2.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full transition-colors shadow">
            Add Recognition Record
        </a>
    </div>

    <!-- Table of Recognitions -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                    <th class="py-4 px-6">Category</th>
                    <th class="py-4 px-6">Title (ID)</th>
                    <th class="py-4 px-6">Year</th>
                    <th class="py-4 px-6">Linked Team Member</th>
                    <th class="py-4 px-6">Status</th>
                    <th class="py-4 px-6 font-mono">Order</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sand/35">
                @foreach($recognitions as $rec)
                @php
                    $titleDec = json_decode($rec->title, true) ?? [];
                    $titleText = $titleDec['id'] ?? $rec->title;
                @endphp
                <tr class="hover:bg-primary-cream/5 transition-colors">
                    <td class="py-4 px-6">
                        <span class="px-2.5 py-1 text-[9px] font-bold rounded-full bg-forest/5 text-forest uppercase font-mono">
                            {{ $rec->category }}
                        </span>
                    </td>
                    <td class="py-4 px-6 font-bold text-forest font-display">{{ $titleText }}</td>
                    <td class="py-4 px-6 font-mono">{{ $rec->year }}</td>
                    <td class="py-4 px-6">
                        @if($rec->teamMember)
                        <div class="flex items-center space-x-2">
                            <img src="{{ $rec->teamMember->photo_path }}" class="w-6 h-6 rounded-full object-cover border border-sand/50" alt="">
                            <span class="font-medium text-charcoal">{{ $rec->teamMember->name }}</span>
                        </div>
                        @else
                        <span class="text-charcoal/40 italic">General (No Link)</span>
                        @endif
                    </td>
                    <td class="py-4 px-6">
                        @if($rec->is_published)
                        <span class="px-2 py-0.5 rounded-full text-[9px] font-semibold bg-leaf-green/10 text-leaf-green">Published</span>
                        @else
                        <span class="px-2 py-0.5 rounded-full text-[9px] font-semibold bg-red-100 text-red-700">Hidden</span>
                        @endif
                    </td>
                    <td class="py-4 px-6 font-mono font-bold">{{ $rec->order_num }}</td>
                    <td class="py-4 px-6 text-right space-x-2">
                        <a href="{{ route('admin.recognitions.edit', $rec->id) }}" class="text-leaf-green hover:underline font-bold">Edit</a>
                        <form action="{{ route('admin.recognitions.destroy', $rec->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this recognition record?');">
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
