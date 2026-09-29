@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Trust Partners & Collaboration Stories</h1>
        <p class="text-xs text-charcoal/50 mt-1">Manage grid logos and the popup details of corporate/institutional partnerships.</p>
    </div>

    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                    <th class="py-4 px-6">Partner Name</th>
                    <th class="py-4 px-6">Category Type</th>
                    <th class="py-4 px-6">Short Collaboration Program</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sand/35">
                @foreach($partners as $partner)
                <tr class="hover:bg-primary-cream/5 transition-colors">
                    <td class="py-4 px-6 font-bold text-forest font-display flex items-center space-x-2">
                        <img src="{{ $partner->logo_path }}" class="w-6 h-6 rounded-full object-contain border bg-white" alt="logo">
                        <span>{{ $partner->name }}</span>
                    </td>
                    <td class="py-4 px-6 font-semibold text-charcoal/60 uppercase text-[9px]">{{ $partner->type }}</td>
                    <td class="py-4 px-6 text-charcoal/70 leading-relaxed">{{ Str::limit(trans_db($partner->program), 70) }}</td>
                    <td class="py-4 px-6 text-right">
                        <a href="{{ route('admin.partners.edit', $partner->id) }}" class="text-leaf-green hover:underline font-bold">Edit Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
