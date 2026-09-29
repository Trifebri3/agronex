@extends('layouts.writer')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Knowledge Center Articles</h1>
            <p class="text-xs text-charcoal/50 mt-1">Publish research papers, policy briefs, case studies, or insights.</p>
        </div>
        <a href="{{ route('writer.knowledge.create') }}" class="px-5 py-2.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full transition-colors shadow">
            Add Article
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden text-xs">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                    <th class="py-4 px-6">Article Title</th>
                    <th class="py-4 px-6">Category</th>
                    <th class="py-4 px-6">Author</th>
                    <th class="py-4 px-6">Publish Date</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sand/35">
                @foreach($items as $item)
                <tr class="hover:bg-primary-cream/5 transition-colors">
                    <td class="py-4 px-6 font-bold text-forest font-display">{{ trans_db($item->title) }}</td>
                    <td class="py-4 px-6 text-charcoal/70 uppercase text-[9px] font-semibold">{{ $item->category }}</td>
                    <td class="py-4 px-6 font-medium text-forest">{{ $item->author }}</td>
                    <td class="py-4 px-6 font-mono text-[10px]">{{ $item->published_at ? $item->published_at->format('M d, Y') : 'N/A' }}</td>
                    <td class="py-4 px-6 text-right space-x-2">
                        <a href="{{ route('writer.knowledge.edit', $item->id) }}" class="text-leaf-green hover:underline font-bold">Edit</a>
                        <form action="{{ route('writer.knowledge.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this article?');">
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
