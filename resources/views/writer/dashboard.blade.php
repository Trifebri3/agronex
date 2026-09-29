@extends('layouts.writer')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Field Control Workspace</h1>
        <p class="text-xs text-charcoal/50 mt-1">Review active chronicles, upload media clips, and catalog research papers.</p>
    </div>

    <!-- Stat cards -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
        <div class="bg-white border border-sand/40 p-6 rounded-2xl shadow-sm space-y-2">
            <span class="text-[10px] uppercase tracking-wider text-charcoal/40 font-bold">Field Stories</span>
            <div class="text-3xl font-extrabold text-forest font-display">{{ $storiesCount }}</div>
        </div>

        <div class="bg-white border border-sand/40 p-6 rounded-2xl shadow-sm space-y-2">
            <span class="text-[10px] uppercase tracking-wider text-charcoal/40 font-bold">Activities Logged</span>
            <div class="text-3xl font-extrabold text-forest font-display">{{ $activitiesCount }}</div>
        </div>

        <div class="bg-white border border-sand/40 p-6 rounded-2xl shadow-sm space-y-2">
            <span class="text-[10px] uppercase tracking-wider text-charcoal/40 font-bold">Media Uploads</span>
            <div class="text-3xl font-extrabold text-forest font-display">{{ $galleryCount }}</div>
        </div>

        <div class="bg-white border border-sand/40 p-6 rounded-2xl shadow-sm space-y-2">
            <span class="text-[10px] uppercase tracking-wider text-charcoal/40 font-bold">Knowledge Files</span>
            <div class="text-3xl font-extrabold text-forest font-display">{{ $knowledgeCount }}</div>
        </div>

        <div class="bg-white border border-sand/40 p-6 rounded-2xl shadow-sm space-y-2">
            <span class="text-[10px] uppercase tracking-wider text-charcoal/40 font-bold">Newsroom Posts</span>
            <div class="text-3xl font-extrabold text-forest font-display">{{ $newsCount }}</div>
        </div>
    </div>

    <!-- Recent work summary -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Recent field stories -->
        <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
            <div class="p-5 border-b border-sand/40 bg-primary-cream/20">
                <h3 class="font-extrabold text-forest font-display text-xs">Active Field Chronicles</h3>
            </div>
            @if($recentStories->isEmpty())
            <div class="p-6 text-center text-charcoal/40">No chronicles written yet.</div>
            @else
            <div class="divide-y divide-sand/35">
                @foreach($recentStories as $story)
                <div class="p-5 flex justify-between items-center hover:bg-primary-cream/5">
                    <div>
                        <h4 class="font-bold text-forest">{{ trans_db($story->title) }}</h4>
                        <span class="text-[10px] text-leaf-green mt-0.5 block">{{ trans_db($story->village_name) }}</span>
                    </div>
                    <a href="{{ route('writer.stories.edit', $story->id) }}" class="text-leaf-green font-bold">Edit Details</a>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Recent documented activities -->
        <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
            <div class="p-5 border-b border-sand/40 bg-primary-cream/20">
                <h3 class="font-extrabold text-forest font-display text-xs">Recently Logged Activities</h3>
            </div>
            @if($recentActivities->isEmpty())
            <div class="p-6 text-center text-charcoal/40">No activities logged yet.</div>
            @else
            <div class="divide-y divide-sand/35">
                @foreach($recentActivities as $act)
                <div class="p-5 flex justify-between items-center hover:bg-primary-cream/5">
                    <div>
                        <h4 class="font-bold text-forest">{{ trans_db($act->title) }}</h4>
                        <span class="text-[10px] text-charcoal/50 mt-0.5 block">{{ trans_db($act->category) }} &bull; {{ trans_db($act->location) }}</span>
                    </div>
                    <a href="{{ route('writer.activities.edit', $act->id) }}" class="text-leaf-green font-bold">Edit Details</a>
                </div>
                @endforeach
            </div>
            @endif
        </div>

    </div>
</div>
@endsection
