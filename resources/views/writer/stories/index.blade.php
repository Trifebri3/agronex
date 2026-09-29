@extends('layouts.writer')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Field Chronicles (Suara Lapangan)</h1>
            <p class="text-xs text-charcoal/50 mt-1">Publish National Geographic style field diaries, photos, and interviews.</p>
        </div>
        <a href="{{ route('writer.stories.create') }}" class="px-5 py-2.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full transition-colors shadow">
            Write Field Story
        </a>
    </div>

    <!-- Table of stories -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                    <th class="py-4 px-6">Chronicle Title</th>
                    <th class="py-4 px-6">Village Location</th>
                    <th class="py-4 px-6">Observation Data validation</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sand/35">
                @foreach($stories as $story)
                <tr class="hover:bg-primary-cream/5 transition-colors">
                    <td class="py-4 px-6 font-bold text-forest font-display">{{ trans_db($story->title) }}</td>
                    <td class="py-4 px-6 text-leaf-green font-semibold">{{ trans_db($story->village_name) }}</td>
                    <td class="py-4 px-6 text-charcoal/70 leading-relaxed">{{ Str::limit(trans_db($story->validation_data), 70) }}</td>
                    <td class="py-4 px-6 text-right space-x-2">
                        <a href="{{ route('writer.stories.edit', $story->id) }}" class="text-leaf-green hover:underline font-bold">Edit</a>
                        <form action="{{ route('writer.stories.destroy', $story->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this chronicle?');">
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
