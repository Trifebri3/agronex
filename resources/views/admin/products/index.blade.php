@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Apple-style Products</h1>
            <p class="text-xs text-charcoal/50 mt-1">Manage physical hardware pod modules and gateways.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="px-5 py-2.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full transition-colors shadow">
            Add Product Node
        </a>
    </div>

    <!-- Table of products -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto text-xs">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                        <th class="py-4 px-6">Hardware Name</th>
                        <th class="py-4 px-6">Slug</th>
                        <th class="py-4 px-6">Short Description</th>
                        <th class="py-4 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-sand/35">
                    @foreach($products as $product)
                    <tr class="hover:bg-primary-cream/5 transition-colors">
                        <td class="py-4 px-6 font-bold text-forest font-display">{{ trans_db($product->name) }}</td>
                        <td class="py-4 px-6 font-mono text-[10px]">{{ $product->slug }}</td>
                        <td class="py-4 px-6 text-charcoal/70 leading-relaxed">{{ Str::limit(trans_db($product->description), 80) }}</td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-leaf-green hover:underline font-bold">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
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
</div>
@endsection
