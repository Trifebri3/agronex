@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Ecosystem Subsystems</h1>
            <p class="text-xs text-charcoal/50 mt-1">Manage interactive nodes that orbit the AGRONEX Mother Brand center.</p>
        </div>
    </div>

    <!-- Table of ecosystem items -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto text-xs">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                        <th class="py-4 px-6">Subsystem Name</th>
                        <th class="py-4 px-6">Subtitle / Role</th>
                        <th class="py-4 px-6">Status Badge</th>
                        <th class="py-4 px-6">Demo Link</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-sand/35">
                    @foreach($items as $item)
                    <tr class="hover:bg-primary-cream/5 transition-colors">
                        <td class="py-4 px-6 font-bold text-forest font-display">{{ trans_db($item->name) }}</td>
                        <td class="py-4 px-6">{{ trans_db($item->subtitle) }}</td>
                        <td class="py-4 px-6">
                            <span class="px-2.5 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider 
                                @if($item->status === 'Live') bg-leaf-green text-white 
                                @elseif($item->status === 'Beta') bg-fresh-lime text-forest 
                                @else bg-forest/20 text-forest 
                                @endif"
                            >
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="py-4 px-6 font-mono text-[10px]">{{ $item->demo_url ?? 'N/A' }}</td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <a href="{{ route('admin.ecosystem.edit', $item->id) }}" class="text-leaf-green hover:underline font-bold">Edit Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
