@extends('layouts.admin')

@section('content')
<div class="space-y-6 max-w-4xl">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-forest font-display">Tambah Produk Baru</h1>
            <p class="text-xs text-charcoal/50 mt-1">Publikasikan perangkat IoT pertanian baru beserta harga, skema sewa, dan kelengkapannya.</p>
        </div>
        <a href="{{ route('admin.products') }}" class="px-4 py-2 bg-white border border-sand hover:bg-primary-cream/40 text-forest text-xs font-bold rounded-xl transition-colors">
            &larr; Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white border border-sand/40 p-8 rounded-2xl shadow-sm">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 text-xs">
            @csrf
            
            <!-- SECTION 1: IDENTITAS PRODUK -->
            <div class="border-b border-sand/40 pb-6 space-y-4">
                <h3 class="font-extrabold text-forest uppercase tracking-wider text-xs flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-leaf-green"></span>
                    <span>1. Identitas &amp; Badge Produk</span>
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Nama Produk</label>
                        <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-semibold" placeholder="Contoh: SoilSense v2">
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Slug (URL)</label>
                        <input type="text" name="slug" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono" placeholder="soilsense-v2">
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">SKU / Kode Unit</label>
                        <input type="text" name="sku" placeholder="AGX-SL26" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono uppercase">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Badge Label (Pojok Kiri Foto)</label>
                        <input type="text" name="badge" placeholder="Contoh: EFISIENSI AIR • HEMAT 21% / PORTABLE" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Commercial Hook (Kutipan Penawaran)</label>
                        <input type="text" name="hook" placeholder="Contoh: Cegah busuk akar dan hemat air hingga 35%!" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                    </div>
                </div>
            </div>

            <!-- SECTION 2: HARGA & SKEMA SEWA (KONTROL PENJUALAN) -->
            <div class="border-b border-sand/40 pb-6 space-y-4">
                <h3 class="font-extrabold text-forest uppercase tracking-wider text-xs flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-leaf-green"></span>
                    <span>2. Kontrol Harga &amp; Skema Pembayaran</span>
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Harga Jual Satuan (Rp)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3 text-charcoal/50 font-bold">Rp</span>
                            <input type="number" name="price" placeholder="780000" class="w-full pl-12 pr-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-forest font-black font-mono text-sm">
                        </div>
                        <span class="text-[10px] text-charcoal/50">Harga beli putus per unit yang tampil di web.</span>
                    </div>

                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Harga Coret / Normal (Rp)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3 text-charcoal/50 font-bold">Rp</span>
                            <input type="number" name="original_price" placeholder="1250000" class="w-full pl-12 pr-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-bold font-mono text-sm">
                        </div>
                        <span class="text-[10px] text-charcoal/50">Harga sebelum diskon (opsional, untuk efek diskon).</span>
                    </div>

                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Skema Sewa (Rp / Bulan)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-3 text-charcoal/50 font-bold">Rp</span>
                            <input type="number" name="subscription_price" placeholder="45000" class="w-full pl-12 pr-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-leaf-green font-black font-mono text-sm">
                        </div>
                        <span class="text-[10px] text-charcoal/50">Tarif sewa bulanan gotong-royong petani.</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-2">
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Status Stok</label>
                        <select name="stock_status" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-semibold">
                            <option value="in_stock" selected>Ready Stock</option>
                            <option value="pre_order">Pre-Order</option>
                            <option value="limited">Stok Terbatas</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Rating Bintang (1.0 - 5.0)</label>
                        <input type="number" step="0.1" name="rating" value="4.9" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                    </div>

                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Jumlah Ulasan Petani</label>
                        <input type="number" name="reviews_count" value="40" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono">
                    </div>
                </div>

                <div class="space-y-2 pt-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Informasi Garansi Resmi</label>
                    <input type="text" name="warranty_info" value="Garansi Resmi 12 Bulan Ganti Baru + Free Pendampingan" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                </div>
            </div>

            <!-- SECTION 3: FOTO & KELENGKAPAN PAKET -->
            <div class="border-b border-sand/40 pb-6 space-y-4">
                <h3 class="font-extrabold text-forest uppercase tracking-wider text-xs flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-leaf-green"></span>
                    <span>3. Foto &amp; Kelengkapan Paket (Isi Kotak)</span>
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Upload Foto Produk (Compressed to WebP)</label>
                        <input type="file" name="image_file" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal">
                    </div>
                    <div class="space-y-2">
                        <label class="font-bold text-forest uppercase tracking-wider block">Atau Path / URL Gambar</label>
                        <input type="text" name="image_path" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono text-[11px]" placeholder="images/produk-anda.jpg">
                    </div>
                </div>

                <div class="space-y-2 pt-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Kelengkapan Paket / Isi Kotak (Tulis 1 Item per Baris)</label>
                    <textarea name="package_includes" rows="5" placeholder="1x Unit Sensor SoilSense Probe&#10;1x Modul Telemetri IoT 4G&#10;1x Kartu SIM IoT Aktif 1 Tahun&#10;1x Buku Panduan & SOP Lapangan" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono leading-relaxed"></textarea>
                    <span class="text-[10px] text-charcoal/50">Item-item ini akan otomatis muncul sebagai checklist di modal rincian produk saat petani klik Detail.</span>
                </div>
            </div>

            <!-- SECTION 4: KONTEN DESKRIPSI & SPESIFIKASI TEKNIS -->
            <div class="space-y-4">
                <h3 class="font-extrabold text-forest uppercase tracking-wider text-xs flex items-center space-x-2">
                    <span class="w-2 h-2 rounded-full bg-leaf-green"></span>
                    <span>4. Deskripsi &amp; Spesifikasi Detail</span>
                </h3>

                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Deskripsi Singkat (Tampil di Kartu Katalog)</label>
                    <textarea name="description" rows="2" required class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Deskripsi ringkas perangkat..."></textarea>
                </div>

                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Fitur Perangkat Lapangan (1 Fitur per Baris)</label>
                    <textarea name="features" rows="4" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal font-mono leading-relaxed" placeholder="Probe pH & NPK Multi-depth&#10;Baterai LiFePO4 Mandiri&#10;Sinyal 4G NB-IoT"></textarea>
                </div>

                <div class="space-y-2">
                    <label class="font-bold text-forest uppercase tracking-wider block">Spesifikasi Lengkap / Penjelasan Tambahan Lapangan</label>
                    <textarea name="detail_content" rows="4" class="w-full px-4 py-3 rounded-xl border border-sand focus:outline-none focus:border-leaf-green bg-bg-base text-charcoal leading-relaxed" placeholder="Lembar data komprehensif perangkat..."></textarea>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-6 border-t border-sand/40">
                <a href="{{ route('admin.products') }}" class="px-6 py-3 bg-white border border-sand text-forest font-semibold rounded-full hover:bg-primary-cream transition-colors">Batal</a>
                <button type="submit" class="px-8 py-3 bg-forest hover:bg-forest-dark text-primary-cream font-bold rounded-full transition-colors shadow-md">Publikasikan Produk</button>
            </div>
        </form>
    </div>
</div>
@endsection
