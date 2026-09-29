@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Katalog Produk &amp; Hardware</h1>
            <p class="text-xs text-charcoal/50 mt-1">Kelola harga satuan, harga coret, skema sewa bulanan, dan stok yang tampil di web publik.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="px-5 py-2.5 bg-forest hover:bg-forest-dark font-bold text-xs text-primary-cream rounded-full transition-colors shadow">
            + Tambah Produk Baru
        </a>
    </div>

    <!-- Table of products -->
    <div class="bg-white border border-sand/40 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto text-xs">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-primary-cream/20 text-forest font-bold uppercase tracking-wider border-b border-sand">
                        <th class="py-4 px-6">Foto</th>
                        <th class="py-4 px-6">Nama Produk &amp; SKU</th>
                        <th class="py-4 px-6">Harga Satuan</th>
                        <th class="py-4 px-6">Skema Sewa</th>
                        <th class="py-4 px-6">Status / Badge</th>
                        <th class="py-4 px-6">Rating</th>
                        <th class="py-4 px-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-sand/35">
                    @foreach($products as $product)
                    @php
                        $priceDisplay = $product->price ? 'Rp ' . number_format($product->price, 0, ',', '.') : '-';
                        $origPriceDisplay = $product->original_price ? 'Rp ' . number_format($product->original_price, 0, ',', '.') : null;
                        $subDisplay = $product->subscription_price ? 'Rp ' . number_format($product->subscription_price, 0, ',', '.') . '/bln' : '-';
                    @endphp
                    <tr class="hover:bg-primary-cream/5 transition-colors">
                        <td class="py-4 px-6">
                            <div class="w-12 h-12 rounded-xl overflow-hidden border border-sand/50 bg-primary-cream/30 flex items-center justify-center">
                                @if($product->image_path)
                                    <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-[9px] font-bold text-forest">AGX</span>
                                @endif
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-bold text-forest font-display text-sm">{{ trans_db($product->name) }}</div>
                            <div class="flex items-center space-x-2 text-[10px] text-charcoal/50 font-mono mt-0.5">
                                <span>SKU: {{ $product->sku ?? 'AGX-' . strtoupper(substr($product->slug, 0, 4)) }}</span>
                                <span>&bull;</span>
                                <span>slug: {{ $product->slug }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            @if($origPriceDisplay)
                                <div class="text-[10px] text-charcoal/40 line-through">{{ $origPriceDisplay }}</div>
                            @endif
                            <div class="font-black text-forest font-mono text-sm">{{ $priceDisplay }}</div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-bold text-leaf-green font-mono">{{ $subDisplay }}</div>
                        </td>
                        <td class="py-4 px-6 space-y-1">
                            <span class="inline-block px-2 py-0.5 rounded-full text-[9px] font-semibold bg-leaf-green/10 text-leaf-green">
                                {{ $product->stock_status === 'in_stock' ? 'Ready Stock' : ($product->stock_status ?? 'Ready Stock') }}
                            </span>
                            @if($product->badge)
                                <div class="text-[9px] text-charcoal/60 font-semibold truncate max-w-[150px]">{{ $product->badge }}</div>
                            @endif
                        </td>
                        <td class="py-4 px-6 font-mono text-[11px]">
                            <span class="font-bold text-forest">{{ $product->rating ?? '4.9' }}</span>
                            <span class="text-charcoal/40">({{ $product->reviews_count ?? 40 }})</span>
                        </td>
                        <td class="py-4 px-6 text-right space-x-2">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="px-3 py-1.5 bg-leaf-green/10 text-leaf-green hover:bg-leaf-green hover:text-white rounded-lg font-bold transition-all inline-block">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus produk ini?');">
                                @csrf
                                <button type="submit" class="text-red-600 hover:underline font-bold px-2 py-1">Hapus</button>
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
