@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Intellectual Property & HAKI</h1>
            <p class="text-xs text-charcoal/50 mt-1">Manage Patent, Copyright, and Trademark registries.</p>
        </div>
        <a href="{{ route('admin.haki.create') }}" class="px-5 py-2.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full transition-colors shadow">
            Add IP Registry
        </a>
    </div>

    <!-- Table of Haki items -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                    <th class="py-4 px-6">Innovation Registry Title</th>
                    <th class="py-4 px-6">Type</th>
                    <th class="py-4 px-6">Number</th>
                    <th class="py-4 px-6">Status</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sand/35">
                @foreach($haki as $item)
                <tr class="hover:bg-primary-cream/5 transition-colors">
                    <td class="py-4 px-6 font-bold text-forest font-display">{{ $item->title }}</td>
                    <td class="py-4 px-6">{{ $item->type }}</td>
                    <td class="py-4 px-6 font-mono text-[10px]">{{ $item->registration_number }}</td>
                    <td class="py-4 px-6">
                        <span class="px-2 py-0.5 rounded-full text-[9px] font-semibold bg-leaf-green/10 text-leaf-green">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-right space-x-2">
                        <a href="{{ route('admin.haki.edit', $item->id) }}" class="text-leaf-green hover:underline font-bold">Edit</a>
                        <form action="{{ route('admin.haki.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this registry item?');">
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
