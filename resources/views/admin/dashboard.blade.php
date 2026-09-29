@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Dashboard Analytics</h1>
        <p class="text-xs text-charcoal/50 mt-1">Platform overview metrics and incoming inquiries.</p>
    </div>

    <!-- Stat cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white border border-sand/40 p-6 rounded-2xl shadow-sm space-y-2">
            <span class="text-[10px] uppercase tracking-wider text-charcoal/40 font-bold">Total Inquiries / Leads</span>
            <div class="text-3xl font-extrabold text-forest font-display">{{ $leadsCount }}</div>
        </div>

        <div class="bg-white border border-sand/40 p-6 rounded-2xl shadow-sm space-y-2">
            <span class="text-[10px] uppercase tracking-wider text-charcoal/40 font-bold">Ecosystem Orbit Nodes</span>
            <div class="text-3xl font-extrabold text-forest font-display">{{ $ecosystemCount }}</div>
        </div>

        <div class="bg-white border border-sand/40 p-6 rounded-2xl shadow-sm space-y-2">
            <span class="text-[10px] uppercase tracking-wider text-charcoal/40 font-bold">Apple-Style Hardware</span>
            <div class="text-3xl font-extrabold text-forest font-display">{{ $productCount }}</div>
        </div>

        <div class="bg-white border border-sand/40 p-6 rounded-2xl shadow-sm space-y-2">
            <span class="text-[10px] uppercase tracking-wider text-charcoal/40 font-bold">Registered Users</span>
            <div class="text-3xl font-extrabold text-forest font-display">{{ $usersCount }}</div>
        </div>
    </div>

    <!-- Recent inquiries list -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden">
        <div class="p-6 border-b border-sand/40 bg-primary-cream/20">
            <h3 class="font-extrabold text-forest font-display text-sm">Recent Investor & Contact Inquiries</h3>
        </div>
        
        @if($recentLeads->isEmpty())
        <div class="p-12 text-center text-xs text-charcoal/50">
            No inquiries received yet.
        </div>
        @else
        <div class="divide-y divide-sand/35 text-xs">
            @foreach($recentLeads as $lead)
            <div class="p-6 hover:bg-primary-cream/5 flex items-center justify-between">
                <div class="space-y-1">
                    <div class="flex items-center space-x-2">
                        <span class="font-bold text-forest font-display">{{ $lead->name }}</span>
                        @if($lead->company)
                        <span class="text-charcoal/50">({{ $lead->company }})</span>
                        @endif
                        <span class="px-2 py-0.5 rounded text-[8px] font-bold uppercase tracking-wider 
                            @if($lead->type === 'investor_request') bg-leaf-green text-white 
                            @else bg-forest/10 text-forest 
                            @endif"
                        >
                            {{ str_replace('_', ' ', $lead->type) }}
                        </span>
                    </div>
                    <p class="text-charcoal/80">Subject: <span class="font-semibold text-forest">{{ $lead->subject }}</span></p>
                    <p class="text-[11px] text-charcoal/60 italic">"{{ $lead->message }}"</p>
                </div>
                <div class="text-right">
                    <span class="text-[9px] text-charcoal/40 block">{{ $lead->created_at->diffForHumans() }}</span>
                    <a href="mailto:{{ $lead->email }}" class="text-[10px] font-bold text-leaf-green hover:underline block mt-1">Reply Email</a>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection
