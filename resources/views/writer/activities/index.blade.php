@extends('layouts.writer')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Documented Activities (Timeline)</h1>
            <p class="text-xs text-charcoal/50 mt-1">Manage verifiable traces of workshops, pilot deployments, and research trials.</p>
        </div>
        <a href="{{ route('writer.activities.create') }}" class="px-5 py-2.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full transition-colors shadow">
            Log Activity
        </a>
    </div>

    <!-- Table of activities -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                    <th class="py-4 px-6">Activity Title</th>
                    <th class="py-4 px-6">Category</th>
                    <th class="py-4 px-6">Location</th>
                    <th class="py-4 px-6">Activity Date</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sand/35">
                @foreach($activities as $activity)
                <tr class="hover:bg-primary-cream/5 transition-colors">
                    <td class="py-4 px-6 font-bold text-forest font-display">{{ trans_db($activity->title) }}</td>
                    <td class="py-4 px-6 font-semibold text-charcoal/60 uppercase text-[9px]">{{ trans_db($activity->category) }}</td>
                    <td class="py-4 px-6">{{ trans_db($activity->location) }}</td>
                    <td class="py-4 px-6 font-mono text-[10px]">{{ $activity->activity_date->format('M d, Y') }}</td>
                    <td class="py-4 px-6 text-right space-x-2">
                        <a href="{{ route('writer.activities.edit', $activity->id) }}" class="text-leaf-green hover:underline font-bold">Edit</a>
                        <form action="{{ route('writer.activities.destroy', $activity->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this timeline activity?');">
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
