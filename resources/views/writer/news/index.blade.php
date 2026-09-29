@extends('layouts.writer')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Newsroom Releases & Coverage</h1>
            <p class="text-xs text-charcoal/50 mt-1">Publish press releases, media clippings, and cooperative podcast alerts.</p>
        </div>
        <a href="{{ route('writer.news.create') }}" class="px-5 py-2.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full transition-colors shadow">
            Publish News
        </a>
    </div>

    <!-- Table of news -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                    <th class="py-4 px-6">News Title</th>
                    <th class="py-4 px-6">Category</th>
                    <th class="py-4 px-6">Source / Media</th>
                    <th class="py-4 px-6">Publish Date</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sand/35">
                @foreach($items as $item)
                <tr class="hover:bg-primary-cream/5 transition-colors">
                    <td class="py-4 px-6 font-bold text-forest font-display">{{ trans_db($item->title) }}</td>
                    <td class="py-4 px-6 text-charcoal/70 uppercase text-[9px] font-semibold">{{ $item->category }}</td>
                    <td class="py-4 px-6">{{ $item->source ?? 'Agronex Media' }}</td>
                    <td class="py-4 px-6 font-mono text-[10px]">{{ $item->publish_date ? $item->publish_date->format('M d, Y') : 'N/A' }}</td>
                    <td class="py-4 px-6 text-right space-x-2">
                        <a href="{{ route('writer.news.edit', $item->id) }}" class="text-leaf-green hover:underline font-bold">Edit</a>
                        <form action="{{ route('writer.news.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this news release?');">
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
