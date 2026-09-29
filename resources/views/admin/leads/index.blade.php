@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Inquiries & Leads</h1>
        <p class="text-xs text-charcoal/50 mt-1">Review contact form submissions and investor access requests.</p>
    </div>

    <!-- Table of leads -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                    <th class="py-4 px-6">Name / Company</th>
                    <th class="py-4 px-6">Contact Channels</th>
                    <th class="py-4 px-6">Subject focus</th>
                    <th class="py-4 px-6">Message details</th>
                    <th class="py-4 px-6">Type</th>
                    <th class="py-4 px-6">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sand/35">
                @foreach($leads as $lead)
                <tr class="hover:bg-primary-cream/5 transition-colors">
                    <td class="py-4 px-6 font-bold text-forest font-display">
                        <div>{{ $lead->name }}</div>
                        @if($lead->company)
                        <div class="text-[10px] text-charcoal/50 font-normal mt-0.5">{{ $lead->company }}</div>
                        @endif
                    </td>
                    <td class="py-4 px-6">
                        <div><a href="mailto:{{ $lead->email }}" class="hover:underline text-leaf-green font-semibold">{{ $lead->email }}</a></div>
                        @if($lead->phone)
                        <div class="text-[10px] text-charcoal/50 mt-0.5">{{ $lead->phone }}</div>
                        @endif
                    </td>
                    <td class="py-4 px-6 font-medium text-forest">{{ $lead->subject }}</td>
                    <td class="py-4 px-6 text-charcoal/70 max-w-xs truncate" title="{{ $lead->message }}">{{ $lead->message }}</td>
                    <td class="py-4 px-6">
                        <span class="px-2 py-0.5 rounded text-[8px] font-bold uppercase tracking-wider 
                            @if($lead->type === 'investor_request') bg-leaf-green text-white 
                            @else bg-forest/10 text-forest 
                            @endif"
                        >
                            {{ str_replace('_', ' ', $lead->type) }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-charcoal/40 text-[10px]">{{ $lead->created_at->format('M d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
