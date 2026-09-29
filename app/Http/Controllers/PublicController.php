<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\EcosystemItem;
use App\Models\Challenge;
use App\Models\Technology;
use App\Models\Product;
use App\Models\ImpactStat;
use App\Models\EsgMetric;
use App\Models\FieldStory;
use App\Models\Activity;
use App\Models\GalleryItem;
use App\Models\KnowledgeItem;
use App\Models\NewsroomItem;
use App\Models\HakiItem;
use App\Models\Partner;
use App\Models\TeamMember;
use App\Models\Career;
use App\Models\Lead;
use App\Models\MapMarker;
use App\Models\Recognition;
use App\Models\Milestone;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $settings = Setting::pluck('value', 'key')->all();
        $ecosystem = EcosystemItem::all();
        $challenges = Challenge::all();
        $technologies = Technology::all();
        $products = Product::all();
        $impacts = ImpactStat::orderBy('order_num')->get();
        $stories = FieldStory::latest()->get();
        $activities = Activity::orderBy('activity_date', 'desc')->get();
        
        // Scan public/galeri directory dynamically
        $galleryPath = public_path('galeri');
        $gallery = [];
        if (is_dir($galleryPath)) {
            $files = array_diff(scandir($galleryPath), ['.', '..']);
            foreach ($files as $file) {
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'bmp'])) {
                    $type = 'photo';
                    $category = 'community';
                    if (str_starts_with(strtolower($file), 'dji')) {
                        $type = 'drone';
                        $category = 'technology';
                    } elseif (str_contains(strtolower($file), 'before') || str_contains(strtolower($file), 'after')) {
                        $category = 'before_after';
                    } else {
                        $hash = crc32($file);
                        $cats = ['community', 'technology', 'events'];
                        $category = $cats[abs($hash) % 3];
                    }
                    
                    $gallery[] = (object)[
                        'title' => str_replace(['_', '-'], ' ', pathinfo($file, PATHINFO_FILENAME)),
                        'type' => $type,
                        'category' => $category,
                        'media_path' => asset('galeri/' . $file),
                        'secondary_media_path' => null
                    ];
                } elseif (in_array($ext, ['mov', 'mp4', 'webm'])) {
                    $gallery[] = (object)[
                        'title' => str_replace(['_', '-'], ' ', pathinfo($file, PATHINFO_FILENAME)),
                        'type' => 'video',
                        'category' => 'events',
                        'media_path' => asset('galeri/' . $file),
                        'secondary_media_path' => null
                    ];
                }
            }
        }

        if (empty($gallery)) {
            $gallery = GalleryItem::latest()->get();
        }

        $haki = HakiItem::orderBy('registration_date', 'desc')->get();
        $partners = Partner::all();
        $team = TeamMember::orderBy('order_num')->get();
        $careers = Career::where('status', 'open')->get();
        $newsroom = NewsroomItem::orderBy('publish_date', 'desc')->get();
        $knowledge = KnowledgeItem::orderBy('published_at', 'desc')->get();
        $mapMarkers = MapMarker::all();

        return view('welcome', compact(
            'settings', 'ecosystem', 'challenges', 'technologies', 'products',
            'impacts', 'stories', 'activities', 'gallery', 'haki', 'partners',
            'team', 'careers', 'newsroom', 'knowledge', 'mapMarkers'
        ));
    }

    public function esg()
    {
        $settings = Setting::pluck('value', 'key')->all();
        $environmental = EsgMetric::where('category', 'environmental')->get();
        $social = EsgMetric::where('category', 'social')->get();
        $governance = EsgMetric::where('category', 'governance')->get();

        return view('esg', compact('settings', 'environmental', 'social', 'governance'));
    }

    public function knowledge(Request $request)
    {
        $settings = Setting::pluck('value', 'key')->all();
        $query = $request->input('q');
        $category = $request->input('category');

        $itemsQuery = KnowledgeItem::query();

        if ($query) {
            $itemsQuery->where(function($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%")
                  ->orWhere('author', 'like', "%{$query}%");
            });
        }

        if ($category) {
            $itemsQuery->where('category', $category);
        }

        $items = $itemsQuery->orderBy('published_at', 'desc')->get();
        $categories = KnowledgeItem::select('category')->distinct()->pluck('category');

        return view('knowledge', compact('settings', 'items', 'categories', 'query', 'category'));
    }

    public function knowledgeDetail($slug)
    {
        $settings = Setting::pluck('value', 'key')->all();
        $item = KnowledgeItem::where('slug', $slug)->firstOrFail();
        $item->increment('views_count');

        $related = KnowledgeItem::where('id', '!=', $item->id)
            ->latest()
            ->take(3)
            ->get();

        return view('knowledge-detail', compact('settings', 'item', 'related'));
    }

    public function investors(Request $request)
    {
        $settings = Setting::pluck('value', 'key')->all();
        $hasAccess = session()->has('investor_access');

        return view('investors', compact('settings', 'hasAccess'));
    }

    public function journey()
    {
        $settings = Setting::pluck('value', 'key')->all();
        $milestones = Milestone::where('is_published', true)->orderBy('order_num')->get();
        return view('journey', compact('settings', 'milestones'));
    }

    public function requestInvestorAccess(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'company' => 'required|string|max:150',
            'message' => 'nullable|string',
        ]);

        Lead::create([
            'type' => 'investor_request',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'subject' => 'Investor Data Room Access Request',
            'message' => $request->message,
            'status' => 'approved', // Auto-approve for demo convenience
        ]);

        session()->put('investor_access', true);
        session()->put('investor_name', $request->name);

        return redirect()->route('investors')->with('success', 'Access granted to the Investor Data Room!');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'required|string|max:200',
            'message' => 'required|string',
        ]);

        Lead::create([
            'type' => 'contact',
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Thank you! Your message has been sent successfully. We will contact you soon.');
    }

    public function credibility()
    {
        $settings = Setting::pluck('value', 'key')->all();
        $recognitions = Recognition::with('teamMember')
            ->where('is_published', true)
            ->orderBy('order_num')
            ->get();
        
        $ceo = TeamMember::where('name', 'Like', '%Tri Febriansah%')->first();
        if (!$ceo) {
            $ceo = TeamMember::first();
        }

        return view('credibility', compact('settings', 'recognitions', 'ceo'));
    }

    public function products()
    {
        $settings = Setting::pluck('value', 'key')->all();
        $products = Product::all();
        
        // Curated Commercial Packages / Bundles (Inklusif, Portable & Solar Powered)
        $bundles = [
            [
                'id' => 'solar-portable-kit',
                'name' => 'Paket Tani Mandiri Portable (Include Panel Surya)',
                'badge' => '100% PORTABLE • INCLUDE PANEL SURYA',
                'tagline' => 'Stasiun telemetri mandiri energi lengkap dengan panel surya 15W + tripod lapangan knock-down + sensor SoilSense.',
                'price' => 1350000,
                'original_price' => 2100000,
                'discount' => 'HEMAT 35%',
                'items' => [
                    '1x SoilSense Telemetry Unit IP67 Weatherproof',
                    '1x Panel Surya Monocrystalline 15W Efisiensi Tinggi',
                    '1x Tripod Aluminium Lapangan Portable Ringan (Knock-Down)',
                    '1x Baterai LiFePO4 Built-in (Tahan 30 Hari Tanpa Sinar)',
                    '1x Multi-Parameter Soil Probe Stainless Steel 316 (pH, NPK, Lembap)',
                    'Gratis 1 Tahun SIM IoT Telkomsel & Cloud Dashboard Mobile',
                    'Garansi Resmi 12 Bulan Tukar Baru'
                ],
                'recommended' => true,
                'roi_text' => 'Estimasi Balik Modal: 1 Musim Panen (Penghematan Pupuk ~Rp 1,5 Juta/Musim)'
            ],
            [
                'id' => 'hydro-smart-kit',
                'name' => 'Paket Smart Hidroponik Komplit (All-in-One)',
                'badge' => 'SMART HIDROPONIK • AUTOMATION',
                'tagline' => 'Sistem monitoring nutrisi EC/TDS & pH air plus 2 unit pompa dosing otomatis untuk greenhouse & instalasi hidroponik.',
                'price' => 1650000,
                'original_price' => 2450000,
                'discount' => 'HEMAT 32%',
                'items' => [
                    '1x HydroMaster Smart Controller Box dengan Layar Digital OLED',
                    '1x Industrial Submersible EC/TDS Nutrient Probe',
                    '1x High-Accuracy Glass/Gel pH Sensor Probe',
                    '1x Sensor Suhu Air Waterproof Stainless Steel',
                    '2x Pompa Peristaltik Dosing Otomatis Nutrisi A & B',
                    'Modul WiFi & Bluetooth + Integrasi AgroPredict Cloud',
                    'Garansi Resmi 12 Bulan Tukar Baru'
                ],
                'recommended' => false,
                'roi_text' => 'Meningkatkan Hasil Panen Hidroponik 30% & Cegah Bibit Mati Akibat Over-Nutrisi'
            ],
            [
                'id' => 'enterprise-kit',
                'name' => 'Skema Sewa Gotong Royong Poktan & Inklusif',
                'badge' => 'INKLUSIF • TANPA MODAL AWAL',
                'tagline' => 'Skema sewa gotong royong sangat terjangkau khusus Petani Kecil, Kelompok Tani (Poktan), dan Koperasi.',
                'price' => 45000,
                'price_subtext' => '/ unit / bulan',
                'original_price' => null,
                'discount' => 'SKEMA SEWA GOTONG ROYONG',
                'items' => [
                    'Biaya Sewa Sangat Terjangkau Rp 45.000 / Bulan Tanpa DP',
                    'Unit Bebas Ditukar Baru Jika Mengalami Kendala (All-Risk)',
                    'Sudah Termasuk Modul Daya Portable Mandiri & SIM IoT',
                    'Pendampingan Petugas Lapangan & Rekomendasi Dosis Pupuk',
                    'Akses Dashboard Monitoring Kelompok & Info Harga Pasar',
                    'Bebas Putus Sewa Kapan Saja Selesai Musim Panen'
                ],
                'recommended' => false,
                'roi_text' => 'Sangat Ringan: Biaya Sewa Tertutup Cukup dari Hasil 2 Kg Panen Cabai/Bawang!'
            ]
        ];

        return view('products', compact('settings', 'products', 'bundles'));
    }

    public function orderProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:150',
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required|string|max:30',
            'quantity' => 'nullable|integer|min:1',
            'delivery_address' => 'nullable|string|max:300',
            'notes' => 'nullable|string',
        ]);

        Lead::create([
            'type' => 'product_order',
            'name' => $request->customer_name,
            'phone' => $request->customer_phone,
            'email' => $request->customer_email ?? 'order@customer.agronex.id',
            'subject' => 'Pemesanan Produk: ' . $request->product_name . ' (' . ($request->quantity ?? 1) . ' unit)',
            'message' => "Produk: {$request->product_name}\nJumlah: " . ($request->quantity ?? 1) . " unit\nAlamat Kirim: {$request->delivery_address}\nCatatan: {$request->notes}",
            'status' => 'pending',
        ]);

        $waNumber = '6285862319524';
        $message = "Halo Tim Agronex Nusantara,%0A%0ASaya ingin memesan perangkat pertanian presisi:%0A• *Produk:* " . urlencode($request->product_name) . "%0A• *Jumlah:* " . ($request->quantity ?? 1) . " unit%0A• *Nama Pemesan:* " . urlencode($request->customer_name) . "%0A• *No WhatsApp:* " . urlencode($request->customer_phone) . "%0A• *Alamat / Lokasi Lahan:* " . urlencode($request->delivery_address ?? '-') . "%0A• *Catatan Khusus:* " . urlencode($request->notes ?? '-') . "%0A%0AMohon info ketersediaan stok, faktur/invoice resmi, dan jadwal pengiriman. Terima kasih!";

        return redirect("https://wa.me/{$waNumber}?text={$message}");
    }
}
