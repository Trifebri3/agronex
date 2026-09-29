@extends('layouts.admin')

@section('content')
@php
    $getBilingual = function($key) use ($settings) {
        $val = $settings[$key] ?? '';
        $decoded = json_decode($val, true);
        return [
            'id' => $decoded['id'] ?? $val,
            'en' => $decoded['en'] ?? $val
        ];
    };

    $getLabel = function($stat) {
        $raw = $stat->getRawOriginal('label') ?? $stat->label;
        $decoded = json_decode($raw, true);
        return [
            'id' => $decoded['id'] ?? $raw,
            'en' => $decoded['en'] ?? $raw
        ];
    };
@endphp

<div class="space-y-12">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Homepage & Platform Settings</h1>
        <p class="text-xs text-charcoal/50 mt-1">Manage dynamic text arrays, active statistics, and investor dashboard metrics.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Global texts form -->
        <div class="lg:col-span-8 bg-white border border-sand/40 p-8 rounded-2xl shadow-sm space-y-6">
            <h3 class="font-extrabold text-forest font-display text-sm border-b border-sand/40 pb-3">Global Branding & Text Settings</h3>
            
            <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6 text-xs">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Hero Headline (Indonesian)</label>
                        <input type="text" name="hero_headline_id" value="{{ $getBilingual('hero_headline')['id'] }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal/80">
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Hero Headline (English)</label>
                        <input type="text" name="hero_headline_en" value="{{ $getBilingual('hero_headline')['en'] }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal/80">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Hero Subheadline (Indonesian)</label>
                        <textarea name="hero_subheadline_id" rows="3" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal/80 leading-relaxed">{{ $getBilingual('hero_subheadline')['id'] }}</textarea>
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Hero Subheadline (English)</label>
                        <textarea name="hero_subheadline_en" rows="3" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal/80 leading-relaxed">{{ $getBilingual('hero_subheadline')['en'] }}</textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Who We Are Quote (Indonesian)</label>
                        <input type="text" name="who_quote_id" value="{{ $getBilingual('who_quote')['id'] }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal/80">
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Who We Are Quote (English)</label>
                        <input type="text" name="who_quote_en" value="{{ $getBilingual('who_quote')['en'] }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal/80">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Contact Email</label>
                    <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? '' }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal/80">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Platform Vision (Indonesian)</label>
                        <textarea name="who_vision_id" rows="2" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal/80">{{ $getBilingual('who_vision')['id'] }}</textarea>
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Platform Vision (English)</label>
                        <textarea name="who_vision_en" rows="2" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal/80">{{ $getBilingual('who_vision')['en'] }}</textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Platform Mission (Indonesian)</label>
                        <textarea name="who_mission_id" rows="2" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal/80">{{ $getBilingual('who_mission')['id'] }}</textarea>
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Platform Mission (English)</label>
                        <textarea name="who_mission_en" rows="2" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal/80">{{ $getBilingual('who_mission')['en'] }}</textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Platform Values (Indonesian)</label>
                        <textarea name="who_values_id" rows="2" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal/80">{{ $getBilingual('who_values')['id'] }}</textarea>
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Platform Values (English)</label>
                        <textarea name="who_values_en" rows="2" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal/80">{{ $getBilingual('who_values')['en'] }}</textarea>
                    </div>
                </div>

                <button type="submit" class="w-full py-3.5 bg-forest hover:bg-forest-dark text-primary-cream font-bold rounded-full shadow transition-all">
                    Update Global Settings Node
                </button>
            </form>
        </div>

        <!-- Sidebar panel fields -->
        <div class="lg:col-span-4 space-y-8">
            
            <!-- Dynamic stats counters form -->
            <div class="bg-white border border-sand/40 p-6 rounded-2xl shadow-sm space-y-4">
                <h3 class="font-extrabold text-forest font-display text-xs border-b border-sand/40 pb-2">Live Counter Values</h3>
                
                <form action="{{ route('admin.settings.impacts.update') }}" method="POST" class="space-y-4 text-[10px]">
                    @csrf
                    @foreach($impacts as $stat)
                    @php
                        $lbl = $getLabel($stat);
                    @endphp
                    <div class="space-y-1.5 border-b border-sand/30 pb-3 last:border-b-0 last:pb-0">
                        <span class="font-semibold text-charcoal/50 block">{{ trans_db($stat->label) }}</span>
                        <div class="space-y-1">
                            <input type="text" name="impacts[{{ $stat->id }}][value]" value="{{ $stat->value }}" placeholder="Value (e.g. 4.200+)" class="w-full px-2.5 py-1.5 rounded-lg border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal text-xs font-mono text-center">
                            <input type="text" name="impacts[{{ $stat->id }}][label_id]" value="{{ $lbl['id'] }}" placeholder="Label (Indonesian)" class="w-full px-2.5 py-1.5 rounded-lg border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal text-xs">
                            <input type="text" name="impacts[{{ $stat->id }}][label_en]" value="{{ $lbl['en'] }}" placeholder="Label (English)" class="w-full px-2.5 py-1.5 rounded-lg border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal text-xs">
                        </div>
                    </div>
                    @endforeach
                    <button type="submit" class="w-full py-2 bg-leaf-green hover:bg-forest text-white font-bold rounded-lg shadow-sm text-xs transition-colors">
                        Save Counter Metrics
                    </button>
                </form>
            </div>

            <!-- ESG metrics targets values -->
            <div class="bg-white border border-sand/40 p-6 rounded-2xl shadow-sm space-y-4">
                <h3 class="font-extrabold text-forest font-display text-xs border-b border-sand/40 pb-2">ESG Metrics Overview</h3>
                
                <form action="{{ route('admin.settings.esg.update') }}" method="POST" class="space-y-4 text-[10px]">
                    @csrf
                    @foreach($esg as $metric)
                    <div class="space-y-1">
                        <span class="font-semibold text-charcoal/50">{{ $metric->metric_name }} ({{ strtoupper($metric->category) }})</span>
                        <div class="flex gap-2">
                            <input type="text" name="esg[{{ $metric->id }}][value]" value="{{ $metric->value }}" class="w-24 px-2 py-1.5 rounded-lg border border-sand bg-bg-base text-charcoal text-xs font-semibold">
                            <input type="text" name="esg[{{ $metric->id }}][description]" value="{{ $metric->description }}" placeholder="Details" class="flex-1 px-2.5 py-1.5 rounded-lg border border-sand bg-bg-base text-charcoal text-xs">
                        </div>
                    </div>
                    @endforeach
                    <button type="submit" class="w-full py-2 bg-leaf-green hover:bg-forest text-white font-bold rounded-lg shadow-sm text-xs transition-colors">
                        Save ESG Target Metrics
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>
@endsection
