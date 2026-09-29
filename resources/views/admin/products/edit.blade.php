@extends('layouts.admin')

@section('content')
<div class="space-y-6 max-w-2xl">
    <div>
        <h1 class="text-2xl font-extrabold text-forest font-display">Edit Product Specification: {{ $product->name }}</h1>
        <p class="text-xs text-charcoal/50 mt-1">Modify details in the dynamic specs modal.</p>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 text-xs">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Product Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Product Slug</label>
                    <input type="text" name="slug" value="{{ $product->slug }}" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Upload New Image File (Compressed to WebP)</label>
                    <input type="file" name="image_file" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Current Image Path / URL</label>
                    <input type="text" name="image_path" value="{{ $product->image_path }}" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                </div>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Short Card Summary</label>
                <textarea name="description" rows="2" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $product->description }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Detailed Specs Content</label>
                <textarea name="detail_content" rows="4" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed">{{ $product->detail_content }}</textarea>
            </div>

            <div class="space-y-2">
                <label class="font-bold text-forest uppercase tracking-wider block">Hardware Features list (One spec per line)</label>
                <textarea name="features" rows="4" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono leading-relaxed">{{ $product->features }}</textarea>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-sand/40">
                <a href="{{ route('admin.products') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-semibold rounded-full transition-colors shadow">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
