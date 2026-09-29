<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\TeamMember;
use App\Models\Partner;
use App\Models\HakiItem;
use App\Models\ImpactStat;
use App\Models\Setting;
use App\Models\Challenge;
use App\Models\Activity;
use App\Models\FieldStory;
use App\Models\MapMarker;
use App\Models\KnowledgeItem;

class AgronexOfficialSeeder extends Seeder
{
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();

        // 1. Settings
        $settings = [
            'brand_name' => 'AGRONEX NUSANTARA',
            'main_positioning' => 'From Field Signals to Smarter, Climate-Resilient Agriculture.',
            'supporting_positioning' => 'Ekosistem Agritech Berbasis Dampak untuk Indonesia.',
            'core_idea' => 'AGRONEX membantu petani dan mitra pertanian mengambil keputusan yang lebih tepat dengan menghubungkan data nyata dari lahan, AI, informasi pasar, dan pendampingan lapangan.',
            'hero_headline' => json_encode([
                'id' => 'Keputusan pertanian dimulai dari apa yang terjadi di lahan.',
                'en' => 'Agricultural decisions begin from what happens in the field.'
            ]),
            'hero_subheadline' => json_encode([
                'id' => 'AGRONEX menghubungkan data tanah, air, iklim, dan pasar dengan AI untuk membantu petani mengambil keputusan yang lebih tepat — dari lahan hingga pasar.',
                'en' => 'AGRONEX connects soil, water, climate, and market data with AI to help farmers make smarter decisions — from field to market.'
            ]),
            'hero_cta_explore' => json_encode([
                'id' => 'Jelajahi Produk',
                'en' => 'Explore Products'
            ]),
            'hero_cta_demo' => json_encode([
                'id' => 'Lihat Validasi Lapangan',
                'en' => 'View Field Validation'
            ]),
            'core_principle' => json_encode([
                'id' => 'Teknologi rumit di belakang. Keputusan sederhana di depan.',
                'en' => 'Complex technology behind. Simple decisions ahead.'
            ]),
            'vision_headline' => json_encode([
                'id' => 'Menjaga tanah hari ini untuk menjaga pangan esok hari.',
                'en' => 'Preserving soil today to sustain food tomorrow.'
            ]),
            'vision_body' => json_encode([
                'id' => 'Kami membayangkan pertanian Indonesia yang lebih terukur, lebih inklusif, dan lebih tangguh terhadap perubahan iklim — tanpa kehilangan hubungan manusia dengan tanah.',
                'en' => 'We envision an Indonesian agriculture that is more measurable, more inclusive, and more resilient to climate change — without losing human connection to the land.'
            ]),
            'contact_email' => 'yotainovasinusantara@gmail.com',
            'contact_whatsapp' => '085862319524',
            'contact_linkedin' => 'linkedin.com/company/agronex',
            'contact_instagram' => 'https://www.instagram.com/agronex_nusantara?igsh=ZmdpZDV4aGN1ZTZl',
            'commercial_bundles' => json_encode([
                [
                    'id' => 'solar-field-bundle',
                    'name' => 'Paket Tani Mandiri Portable (Include Panel Surya)',
                    'badge' => 'BUNDLING PANEL SURYA • BEST SELLER',
                    'tagline' => '100% Mandiri Energi di Tengah Sawah & Portabel Siap Tancap Tanpa Kabel Listrik PLN.',
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
            ]),
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 2. Challenges - Exactly 3 Major Problems
        Challenge::truncate();
        $challenges = [
            [
                'title' => json_encode([
                    'id' => 'KEPUTUSAN TANPA DATA',
                    'en' => 'DECISIONS WITHOUT DATA'
                ]),
                'slug' => 'keputusan-tanpa-data',
                'description' => json_encode([
                    'id' => 'Petani sering mengambil keputusan budidaya berdasarkan pengalaman, kebiasaan, dan trial-error ketika data kondisi lahan tidak tersedia.',
                    'en' => 'Farmers frequently make cultivation choices relying on legacy routines, habits, and guesswork when real field telemetry is unavailable.'
                ]),
                'icon' => '/konten/pangalengan.png'
            ],
            [
                'title' => json_encode([
                    'id' => 'TANAH, AIR & IKLIM BERUBAH',
                    'en' => 'CHANGING SOIL, WATER & CLIMATE'
                ]),
                'slug' => 'tanah-air-iklim-berubah',
                'description' => json_encode([
                    'id' => 'Kondisi tanah, kelembapan, cuaca, dan kebutuhan tanaman terus berubah. Tanpa pengukuran, risiko keputusan yang tidak tepat meningkat.',
                    'en' => 'Soil metrics, moisture curves, micro-weather, and plant demands change constantly. Without measurements, risks of faulty decisions rise.'
                ]),
                'icon' => '/konten/garut.png'
            ],
            [
                'title' => json_encode([
                    'id' => 'HASIL PANEN BERTEMU PASAR YANG TIDAK PASTI',
                    'en' => 'HARVEST MEETS UNCERTAIN MARKETS'
                ]),
                'slug' => 'pasar-yang-tidak-pasti',
                'description' => json_encode([
                    'id' => 'Harga, distribusi, dan akses pembeli memengaruhi pendapatan petani. Tanpa informasi pasar yang transparan, posisi tawar petani tetap lemah.',
                    'en' => 'Price volatility, distribution bottlenecks, and limited buyer access hurt farmer earnings. Lacking transparent market info leaves farmers vulnerable.'
                ]),
                'icon' => '/konten/fotogarut.png'
            ]
        ];

        foreach ($challenges as $ch) {
            Challenge::create($ch);
        }

        // 3. Products - Inklusif, Terjangkau, Portable & Komplit
        Product::truncate();
        $products = [
            [
                'name' => json_encode([
                    'id' => 'SoilSense',
                    'en' => 'SoilSense'
                ]),
                'slug' => 'soilsense',
                'sku' => 'AGX-SL26',
                'badge' => 'PORTABLE & INKLUSIF • HEMAT 30%',
                'price' => 780000,
                'original_price' => 1250000,
                'subscription_price' => 45000,
                'rating' => 4.9,
                'reviews_count' => 52,
                'stock_status' => 'in_stock',
                'stock_count' => 25,
                'warranty_info' => 'Garansi Resmi 12 Bulan Ganti Baru + Free Pendampingan',
                'hook' => json_encode([
                    'id' => 'Alat ukur tanah portable mandiri energi! Stop buang jutaan rupiah untuk pupuk kimia yang salah takaran. Pantau pH, NPK, dan kelembapan tanah kapan saja langsung dari HP Anda. Balik modal dalam 1 siklus panen!',
                    'en' => 'Portable solar-ready soil sensor! Stop wasting millions on misplaced fertilizer doses. Track pH, NPK, and soil moisture in real-time on your phone. ROI in a single harvest cycle!'
                ]),
                'package_includes' => json_encode([
                    '1x Unit SoilSense Portable IoT Transmitter IP67 Weatherproof',
                    '1x Multi-Parameter Soil Probe Stainless Steel 316 (Anti-Karat)',
                    '1x Baterai Lithium Rechargeable (Daya Tahan 30 Hari)',
                    '1x Kartu SIM IoT Telkomsel Kuota 1 Tahun Aktif',
                    'Akses Aplikasi Mobile Agronex Android & Cloud Dashboard',
                    'Sertifikat Kalibrasi Tanah Tropis Resmi'
                ]),
                'description' => json_encode([
                    'id' => 'Perangkat telemetri portable untuk membaca kondisi tanah seperti pH, NPK, kelembapan, dan parameter kesuburan secara praktis.',
                    'en' => 'Portable device to read soil conditions including pH, NPK, moisture, and fertility parameters based on sensor configuration.'
                ]),
                'features' => json_encode([
                    'id' => "Kategori: FIELD SENSING & PORTABLE\nPenggunaan: pH, NPK, kelembapan tanah\nTujuan: Memahami kondisi tanah sebelum mengambil keputusan budidaya\nKelebihan: 100% Portable, ringan, plug & play\nStatus: READY STOCK / COMMERCIALLY AVAILABLE",
                    'en' => "Category: FIELD SENSING & PORTABLE\nUsage: pH, NPK, soil moisture\nPurpose: Understand soil condition before cultivation decisions\nStatus: READY STOCK / COMMERCIALLY AVAILABLE"
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.12.jpeg',
                'detail_content' => json_encode([
                    'id' => "SoilSense membaca parameter kondisi tanah secara presisi langsung di zona perakaran tanaman. Dengan mengetahui nilai pH tanah aktual serta konsentrasi nitrogen (N), fosfor (P), dan kalium (K), petani dapat mengalibrasi pemupukan secara tepat dosis dan tidak lagi bergantung pada perkiraan semata.\n\n• Kategori: FIELD SENSING & PORTABLE\n• Penggunaan: pH, NPK, soil moisture\n• Tujuan: Memahami kondisi tanah sebelum mengambil keputusan budidaya\n• Kelebihan: Portable, ringan, mudah dipindah antar petak\n• Status: READY STOCK / COMMERCIALLY AVAILABLE",
                    'en' => "SoilSense reads accurate soil parameters directly in the crop root zone. By tracking pH and NPK concentrations, farmers can dose fertilizers accurately based on real telemetry.\n\n• Category: FIELD SENSING & PORTABLE\n• Usage: pH, NPK, soil moisture\n• Purpose: Understand soil conditions before making cultivation decisions\n• Status: READY STOCK / COMMERCIALLY AVAILABLE"
                ])
            ],
            [
                'name' => json_encode([
                    'id' => 'WaterSense',
                    'en' => 'WaterSense'
                ]),
                'slug' => 'watersense',
                'sku' => 'AGX-WT26',
                'badge' => 'EFISIENSI AIR • HEMAT 35%',
                'price' => 690000,
                'original_price' => 1100000,
                'subscription_price' => 39000,
                'rating' => 4.8,
                'reviews_count' => 39,
                'stock_status' => 'in_stock',
                'stock_count' => 28,
                'warranty_info' => 'Garansi Resmi 12 Bulan Ganti Baru',
                'hook' => json_encode([
                    'id' => 'Cegah busuk akar dan hemat air hingga 35%! Siram hanya saat tanaman Anda benar-benar membutuhkan air berdasarkan data volumetrik akurat.',
                    'en' => 'Prevent root rot and conserve up to 35% irrigation water! Water your crops only when they genuinely require hydration.'
                ]),
                'package_includes' => json_encode([
                    '1x Unit WaterSense Portable Telemetry Controller IP67',
                    '1x Volumetric Water Content (VWC) Soil Moisture Probe',
                    '1x Digital Flow Meter Interface Connector',
                    '1x Baterai Lithium Daya Tahan Tinggi',
                    '1x Kartu SIM IoT Aktif 1 Tahun',
                    'Aplikasi Pengatur Jadwal & Alert Irigasi Otomatis via WhatsApp'
                ]),
                'description' => json_encode([
                    'id' => 'Monitoring kondisi kelembapan volumetrik tanah dan kualitas air untuk membantu keputusan pengairan presisi.',
                    'en' => 'Monitoring soil moisture and water quality parameters to assist irrigation decisions.'
                ]),
                'features' => json_encode([
                    'id' => "Kategori: FIELD SENSING\nParameter: Volumetrik air tanah, kualitas air irigasi\nTujuan: Mengurangi penyiraman berlebih & mencegah pembusukan akar\nStatus: READY STOCK / COMMERCIALLY AVAILABLE",
                    'en' => "Category: FIELD SENSING\nParameters: Volumetric soil water content, irrigation water metrics\nPurpose: Reduce estimation-based watering\nStatus: READY STOCK / COMMERCIALLY AVAILABLE"
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.19.jpeg',
                'detail_content' => json_encode([
                    'id' => "WaterSense dirancang untuk membantu efisiensi penggunaan air lahan secara signifikan. Sensor mengukur kelembapan volumetrik tanah secara berkala sehingga jadwal penyiraman hanya diaktifkan saat tanaman benar-benar membutuhkan air, mencegah stres air maupun kejenuhan air berlebih.\n\n• Kategori: FIELD SENSING\n• Penggunaan: Monitoring kelembapan tanah & debit air\n• Tujuan: Mengurangi penyiraman berdasarkan perkiraan\n• Status: READY STOCK / COMMERCIALLY AVAILABLE",
                    'en' => "WaterSense is engineered to optimize water usage. Regular moisture tracking ensures irrigation activates only when crops genuinely need hydration.\n\n• Category: FIELD SENSING\n• Usage: Soil moisture & water flow monitoring\n• Purpose: Reduce guess-based watering\n• Status: READY STOCK / COMMERCIALLY AVAILABLE"
                ])
            ],
            [
                'name' => json_encode([
                    'id' => 'EnviroSense',
                    'en' => 'EnviroSense'
                ]),
                'slug' => 'envirosense',
                'sku' => 'AGX-EV26',
                'badge' => 'EARLY WARNING • IKLIM MIKRO',
                'price' => 850000,
                'original_price' => 1350000,
                'subscription_price' => 49000,
                'rating' => 4.9,
                'reviews_count' => 34,
                'stock_status' => 'in_stock',
                'stock_count' => 18,
                'warranty_info' => 'Garansi Resmi 12 Bulan Ganti Baru',
                'hook' => json_encode([
                    'id' => 'Deteksi dini ancaman serangan jamur & hama akibat kelembapan ekstrem sebelum merusak seluruh tanaman Anda. Notifikasi otomatis ke WhatsApp!',
                    'en' => 'Detect fungus and pest outbreaks driven by extreme microclimate shifts before they destroy your crop canopy. Instant WhatsApp alerts!'
                ]),
                'package_includes' => json_encode([
                    '1x EnviroSense Microclimate Weather Node IP66',
                    '1x Sensor Suhu & Kelembaban Relatif (RH) High-Precision',
                    '1x Sensor Intensitas Radiasi Matahari (Lux/PAR)',
                    '1x Bracket Mounting Portable Tiang Kanopi Lahan',
                    'Modul Komunikasi Seluler + Antena Penguat Sinyal',
                    'Mesin Notifikasi Peringatan Dini Otomatis via WhatsApp'
                ]),
                'description' => json_encode([
                    'id' => 'Monitoring kondisi lingkungan dan iklim mikro di sekitar kanopi tanaman untuk pencegahan dini hama dan penyakit.',
                    'en' => 'Monitoring environmental conditions and microclimate surrounding the crop.'
                ]),
                'features' => json_encode([
                    'id' => "Kategori: FIELD SENSING\nParameter: Suhu udara, kelembapan relatif, sinyal cuaca mikro\nTujuan: Memahami kondisi lingkungan yang memengaruhi tanaman & early warning penyakit\nStatus: READY STOCK / COMMERCIALLY AVAILABLE",
                    'en' => "Category: FIELD SENSING\nParameters: Ambient temperature, relative humidity, micro-weather signals\nPurpose: Understand environmental factors affecting crops\nStatus: READY STOCK / COMMERCIALLY AVAILABLE"
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.16.jpeg',
                'detail_content' => json_encode([
                    'id' => "EnviroSense membaca dinamika iklim mikro di area kanopi tanaman seperti fluktuasi suhu udara, kelembapan sekitar, dan intensitas radiasi matahari. Data ini menjadi peringatan dini bagi potensi serangan hama atau penyakit yang dipicu oleh kelembapan udara tinggi.\n\n• Kategori: FIELD SENSING\n• Parameter: Temperature, humidity, weather-related environmental signals\n• Tujuan: Memahami kondisi lingkungan yang memengaruhi tanaman\n• Status: READY STOCK / COMMERCIALLY AVAILABLE",
                    'en' => "EnviroSense tracks canopy microclimate variables including air temperatures, ambient humidity, and solar radiation. Provides early warning signals for humidity-related crop diseases.\n\n• Category: FIELD SENSING\n• Parameters: Temperature, humidity, weather signals\n• Purpose: Understand crop environment dynamics\n• Status: READY STOCK / COMMERCIALLY AVAILABLE"
                ])
            ],
            [
                'name' => json_encode([
                    'id' => 'HydroSense (Smart Hidroponik Komplit)',
                    'en' => 'HydroSense (Smart Hydroponics Kit)'
                ]),
                'slug' => 'hydrosense',
                'sku' => 'AGX-HY26',
                'badge' => 'SMART HIDROPONIK • AUTOMATION KIT',
                'price' => 1050000,
                'original_price' => 1650000,
                'subscription_price' => 65000,
                'rating' => 4.9,
                'reviews_count' => 28,
                'stock_status' => 'in_stock',
                'stock_count' => 16,
                'warranty_info' => 'Garansi Resmi 12 Bulan Tukar Baru',
                'hook' => json_encode([
                    'id' => 'Paket komplit otomasi & monitoring hidroponik modern! Pantau EC/TDS nutrisi, pH air, dan suhu larutan 24 jam nonstop. Dilengkapi otomasi pompa dosing nutrisi otomatis tanpa khawatir bibit mati!',
                    'en' => 'Complete automation & monitoring kit for modern hydroponics! Track nutrient EC/TDS, water pH, and temperature 24/7 with automatic dosing pump control.'
                ]),
                'package_includes' => json_encode([
                    '1x HydroMaster Smart Controller Box dengan Layar Digital OLED',
                    '1x Industrial Grade Submersible EC/TDS Nutrient Probe',
                    '1x High-Accuracy Glass/Gel pH Sensor Probe',
                    '1x Sensor Suhu Air Waterproof Stainless Steel',
                    '2x Pompa Peristaltik Dosing Otomatis (Nutrisi A & B)',
                    'Konektivitas WiFi + Bluetooth & Cloud App Dashboard',
                    'Buku Panduan Setting Dosis Nutrisi Komoditas Sayur'
                ]),
                'description' => json_encode([
                    'id' => 'Perangkat monitoring dan otomasi nutrisi hidroponik terintegrasi (EC/TDS, pH, suhu air, dan kontrol pompa dosing otomatis).',
                    'en' => 'Integrated hydroponics nutrient monitoring and automation kit (EC/TDS, pH, water temp, and automated dosing pumps).'
                ]),
                'features' => json_encode([
                    'id' => "Kategori: SMART HIDROPONIK\nParameter: EC/TDS Nutrisi, pH Larutan, Suhu Air, Level Tandon\nOtomasi: 2x Pompa Dosing Nutrisi A/B Otomatis\nTujuan: Memaksimalkan laju tumbuh & efisiensi larutan nutrisi hidroponik\nStatus: READY STOCK / COMMERCIALLY AVAILABLE",
                    'en' => "Category: SMART HYDROPONICS\nParameters: EC/TDS, pH, water temperature, tank levels\nAutomation: 2x auto dosing pumps\nStatus: READY STOCK / COMMERCIALLY AVAILABLE"
                ]),
                'image_path' => '/images/hydrosense.jpg',
                'detail_content' => json_encode([
                    'id' => "HydroSense dirancang khusus untuk instalasi hidroponik indoor, greenhouse, NFT, DFT, dan Dutch Bucket. Memadukan sensor EC/TDS industri dan sensor pH dengan aktuator pompa dosing peristaltik otonom. Saat konsentrasi nutrisi berkurang atau pH bergeser dari ambang optimal komoditas, sistem otomatis menginjeksi nutrisi dan mengoreksi pH secara presisi tanpa perlu pengecekan manual yang memakan waktu.\n\n• Kategori: SMART HIDROPONIK\n• Parameter: EC, TDS (ppm), pH, Water Temp\n• Otomasi: Dosing Pump A&B terintegrasi\n• Garansi: 12 Bulan Ganti Baru",
                    'en' => "HydroSense is engineered for greenhouse, NFT, and DFT hydroponic operations. Combines industrial EC and pH probes with automated peristaltic dosing pumps."
                ])
            ],
            [
                'name' => json_encode([
                    'id' => 'AgroCore Central CPU (Smart Gateway)',
                    'en' => 'AgroCore Central CPU (Smart Gateway)'
                ]),
                'slug' => 'agrocore-cpu',
                'sku' => 'AGX-CPU26',
                'badge' => 'CPU CERDAS • MULTI-SENSOR GATEWAY',
                'price' => 1150000,
                'original_price' => 1850000,
                'subscription_price' => 75000,
                'rating' => 5.0,
                'reviews_count' => 31,
                'stock_status' => 'in_stock',
                'stock_count' => 14,
                'warranty_info' => 'Garansi Resmi 12 Bulan Tukar Baru',
                'hook' => json_encode([
                    'id' => 'Otak sentral cerdas untuk integrasikan semua alat, sensor, dan pompa di kebun Anda! Mendukung 4G LTE, LoRa, WiFi, RS485 Modbus, dan relay pompa. Bekerja otonom bahkan saat internet offline!',
                    'en' => 'Central intelligent IoT CPU to integrate all field sensors, telemetry modules, and solenoid irrigation pumps! Operates autonomously even during network outages.'
                ]),
                'package_includes' => json_encode([
                    '1x AgroCore Industrial Dual-Core Edge Controller (Agri-Edge Pro)',
                    '1x Enclosure Box Outdoor IP66 Weatherproof Clear-Cover',
                    'Dual Antena High-Gain (4G/LTE + LoRa Long Range)',
                    '4x Terminal Port Analog (ADC) & 4x Digital Input',
                    '1x Bus RS485 Modbus RTU (Hubungkan hingga 16 sensor sekaligus)',
                    '4x Relay Output 240VAC/10A untuk Pompa Air & Solenoid Valve',
                    'Dual Power: DC Solar 12V/24V + AC Adaptor Backup',
                    'Protokol Terbuka MQTT & REST API'
                ]),
                'description' => json_encode([
                    'id' => 'CPU sentral dan gateway cerdas berstandar industri untuk mengintegrasikan puluhan sensor, aktuator pompa irigasi, dan telemetri nirkabel.',
                    'en' => 'Industrial smart central CPU and edge gateway to integrate multiple field sensors, actuators, and wireless telemetries.'
                ]),
                'features' => json_encode([
                    'id' => "Kategori: CPU & CONTROLLER CERDAS\nKonektivitas: 4G LTE, LoRa, WiFi, RS485 Modbus, ADC\nOutput: 4x Relay Aktuator Pompa/Valve 240VAC 10A\nKelebihan: Bekerja otonom tanpa internet (Edge Offline Logic)\nStatus: READY STOCK / COMMERCIALLY AVAILABLE",
                    'en' => "Category: CENTRAL CPU & CONTROLLER\nConnectivity: 4G LTE, LoRa, WiFi, RS485 Modbus\nOutput: 4x Relay actuators\nStatus: READY STOCK / COMMERCIALLY AVAILABLE"
                ]),
                'image_path' => '/images/agrocore_cpu.jpg',
                'detail_content' => json_encode([
                    'id' => "AgroCore Central CPU adalah otak komputasi lapangan mandiri yang menghubungkan seluruh ekosistem pertanian cerdas. Dengan terminal RS485 Modbus, terminal analog ADC, dan relay beban tinggi, CPU ini mampu membaca sensor tanah, air, cuaca, serta langsung memerintahkan pompa air menyala saat ambang batas tanah kering tercapai secara otonom. Mendukung LoRa jarak jauh hingga 5 km dan 4G LTE untuk sinkronisasi ke cloud platform AGRONEX.\n\n• Kategori: CENTRAL CPU & CONTROLLER\n• Port: RS485, 4x ADC, 4x Digital, 4x Relay Out\n• Daya: Solar DC 12-24V / AC 220V\n• Garansi: 12 Bulan Tukar Baru",
                    'en' => "AgroCore Central CPU is an edge computing field controller that bridges wireless sensor nodes and actuator pumps autonomously."
                ])
            ],
            [
                'name' => json_encode([
                    'id' => 'AgroSolar Portable Station (Include Panel Surya)',
                    'en' => 'AgroSolar Portable Station (Solar Kit Bundle)'
                ]),
                'slug' => 'agrosolar-bundle',
                'sku' => 'AGX-SLR26',
                'badge' => 'BUNDLING KOMPLIT • INCLUDE PANEL SURYA',
                'price' => 1350000,
                'original_price' => 2100000,
                'subscription_price' => 85000,
                'rating' => 5.0,
                'reviews_count' => 47,
                'stock_status' => 'in_stock',
                'stock_count' => 20,
                'warranty_info' => 'Garansi Resmi 12 Bulan Tukar Baru',
                'hook' => json_encode([
                    'id' => '100% PORTABLE & MANDIRI ENERGI! Bundling paket komplit SoilSense + Panel Surya Monocrystalline + Tripod Lapangan Ringan. Pasang di tengah sawah mana saja tanpa repot tarik kabel PLN atau bensin genset!',
                    'en' => '100% PORTABLE & SOLAR POWERED! Complete bundle includes SoilSense sensor + monocrystalline solar panel + lightweight field tripod. Zero wiring needed!'
                ]),
                'package_includes' => json_encode([
                    '1x Unit SoilSense IoT Telemetry Controller IP67 Weatherproof',
                    '1x Panel Surya Monocrystalline 15W High-Efficiency',
                    '1x Tripod Aluminium Lapangan Portable (Ringan, Kokoh & Knock-down)',
                    '1x Built-in Baterai LiFePO4 (Daya cadangan 30 hari tanpa sinar)',
                    '1x Stainless Steel Multi-Parameter Soil Probe (pH, NPK, Moisture)',
                    '1x Kartu SIM IoT Telkomsel Kuota 1 Tahun Aktif',
                    '1x Tas Jinjing Lapangan Portable Anti-Air',
                    'Aplikasi Mobile Monitoring Petani 24/7'
                ]),
                'description' => json_encode([
                    'id' => 'Stasiun telemetri lahan portable mandiri energi lengkap dengan panel surya dan tripod lapangan, siap pasang di tengah sawah terbuka.',
                    'en' => 'Portable solar-powered agricultural telemetry station with solar panel and field tripod, ready for open farm deployment.'
                ]),
                'features' => json_encode([
                    'id' => "Kategori: BUNDLING MANDIRI ENERGI\nFitur: 100% Portable, Knock-down Tripod, Include Solar Panel 15W\nParameter: pH, NPK, Kelembapan Tanah, Telemetri Realtime\nDaya Tahan: 30 hari tanpa sinar matahari (Baterai LiFePO4)\nStatus: READY STOCK / COMMERCIALLY AVAILABLE",
                    'en' => "Category: SOLAR POWERED BUNDLE\nFeatures: 100% Portable, tripod, monocrystalline solar panel 15W\nStatus: READY STOCK / COMMERCIALLY AVAILABLE"
                ]),
                'image_path' => '/images/solar_bundle.jpg',
                'detail_content' => json_encode([
                    'id' => "Paket AgroSolar Portable Station menjawab kendala terbesar petani di lahan terbuka: ketiadaan sumber listrik PLN. Dilengkapi panel surya monocrystalline efisiensi tinggi dan tripod aluminium knock-down yang sangat ringan, paket ini memungkinkan petani memindahkan alat antar petak sawah dengan mudah. Tidak butuh genset bensin, ramah lingkungan, dan hemat biaya operasional harian 100%.\n\n• Kategori: BUNDLING MANDIRI ENERGI\n• Termasuk: Panel Surya 15W + Tripod Lapangan + Sensor SoilSense\n• Portabilitas: Ringan & knock-down, mudah dipindahkan\n• Garansi: 12 Bulan Ganti Baru",
                    'en' => "AgroSolar Portable Station eliminates the need for grid power in open fields with a 15W solar panel and lightweight field tripod."
                ])
            ],
            [
                'name' => json_encode([
                    'id' => 'Terra (Handheld Soil Scanner)',
                    'en' => 'Terra (Handheld Soil Scanner)'
                ]),
                'slug' => 'terra',
                'sku' => 'AGX-TR26',
                'badge' => 'SOIL SCANNER • PORTABLE & CEPAT',
                'price' => 2150000,
                'original_price' => 3200000,
                'subscription_price' => 120000,
                'rating' => 5.0,
                'reviews_count' => 21,
                'stock_status' => 'in_stock',
                'stock_count' => 11,
                'warranty_info' => 'Garansi VIP 18 Bulan Tukar Baru',
                'hook' => json_encode([
                    'id' => 'Uji kesuburan tanah 1 petak dalam 3 menit langsung di tempat tanpa tunggu hasil lab berminggu-minggu. Portabel, mudah dibawa keliling petak sawah oleh penyuluh dan kelompok tani!',
                    'en' => 'Test soil fertility for an entire plot in 3 minutes on-site without waiting weeks for lab results. Essential for agronomists and farmer groups!'
                ]),
                'package_includes' => json_encode([
                    '1x Terra Handheld Soil Diagnostic Scanner',
                    '1x Sensor Multi-Spektral Optik & Konduktivitas',
                    '1x Hardcase Pelindung Portabel Heavy-Duty (Tahan Benturan)',
                    'Konektivitas Bluetooth Cepat ke Android/iOS',
                    'Database Kalibrasi Multi-Tanah (Andosol, Latosol, Grumosol)',
                    'Buku Panduan Diagnostik & Kartu Garansi VIP'
                ]),
                'description' => json_encode([
                    'id' => 'Perangkat soil scanning handheld portable untuk memperoleh gambaran kesuburan tanah secara cepat dan praktis di lapangan.',
                    'en' => 'Portable handheld soil scanning device designed to obtain a rapid soil condition overview in the field.'
                ]),
                'features' => json_encode([
                    'id' => "Kategori: SOIL INTELLIGENCE & PORTABLE\nParameter: Profil pemindaian cepat karakteristik tanah dalam 3 menit\nTujuan: Mempercepat pengumpulan data kondisi lahan & keputusan pupuk\nStatus: READY STOCK / COMMERCIALLY AVAILABLE",
                    'en' => "Category: SOIL INTELLIGENCE & PORTABLE\nParameters: Rapid diagnostic soil profiling in 3 minutes\nStatus: READY STOCK / COMMERCIALLY AVAILABLE"
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.12 (1).jpeg',
                'detail_content' => json_encode([
                    'id' => "Terra merupakan instrumen soil scanner portabel untuk pengujian cepat di lapangan. Memungkinkan petugas lapangan dan kelompok tani memetakan variabilitas tanah antarsektor dalam hitungan menit tanpa harus menunggu hasil laboratorium berminggu-minggu.\n\n• Kategori: SOIL INTELLIGENCE & PORTABLE\n• Penggunaan: Pemindaian cepat profil tanah\n• Tujuan: Mempercepat pengumpulan data kondisi lahan\n• Status: READY STOCK / COMMERCIALLY AVAILABLE",
                    'en' => "Terra is a portable soil scanning instrument for rapid field diagnostics. Enables field teams and farmers to survey soil heterogeneity in minutes."
                ])
            ],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }

        // 4. Team - 9 Key Leadership & Operations Members
        TeamMember::truncate();
        $team = [
            [
                'name' => json_encode(['id' => 'Tri Febriansah', 'en' => 'Tri Febriansah']),
                'role' => json_encode(['id' => 'CEO', 'en' => 'CEO']),
                'category' => 'Executive',
                'photo_path' => '/storage/uploads/team/img_6a68059581d308.23776729.webp',
                'linkedin_url' => 'https://www.linkedin.com/in/tri-febriansah/',
                'email' => 'trifebriansah321@gmail.com',
                'bio' => json_encode([
                    'id' => 'Chief Executive Officer AGRONEX NUSANTARA. Bertanggung jawab atas arah strategis perusahaan, pengembangan ekosistem kemitraan, dan perancangan arsitektur sistem cerdas. Finalis Generasi Bakti BCA 2026 dan Pemuda Pelopor Jawa Barat Bidang Inovasi Teknologi 2025.',
                    'en' => 'Chief Executive Officer of AGRONEX NUSANTARA. Responsible for overall strategic vision, ecosystem partnerships, and intelligent system architectures. BCA Generasi Bakti Finalist 2026 and West Java Youth Pioneer in Technological Innovation 2025.'
                ]),
                'skills' => 'Executive Leadership, Strategic Planning, Agritech Architecture, Stakeholder Management, Product Strategy',
                'contributions' => json_encode([
                    'id' => 'Memimpin riset kebutuhan petani di berbagai sentra hortikultura Jawa Barat serta merumuskan arsitektur ekosistem cerdas AGRONEX NUSANTARA.',
                    'en' => 'Led farmer need research across West Java horticulture clusters and designed the AGRONEX NUSANTARA smart ecosystem architecture.'
                ]),
                'order_num' => 1
            ],
            [
                'name' => json_encode(['id' => 'Rifki Ilhami Fauzi', 'en' => 'Rifki Ilhami Fauzi']),
                'role' => json_encode(['id' => 'COO', 'en' => 'COO']),
                'category' => 'Operations',
                'photo_path' => '/storage/uploads/team/img_6abc06c332ab42.47506760.webp',
                'linkedin_url' => 'https://www.linkedin.com/in/rifki-ilhami-fauzi/',
                'email' => 'rifki.ilhami@agronex.id',
                'bio' => json_encode([
                    'id' => 'Chief Operating Officer AGRONEX NUSANTARA. Memimpin efisiensi operasional lapangan, koordinasi penempatan perangkat, hubungan mitra koperasi dan Gapoktan, serta tata kelola proyek lapangan end-to-end.',
                    'en' => 'Chief Operating Officer of AGRONEX NUSANTARA. Directs field operations, device deployment logistics, cooperative partnerships, and end-to-end field project management.'
                ]),
                'skills' => 'Field Operations, Supply Chain Logistics, Project Management, Operational Governance, Community Coordination',
                'contributions' => json_encode([
                    'id' => 'Mengkoordinasikan survei rantai pasok hortikultura dan supervisi implementasi alat di desa-desa binaan Jawa Barat.',
                    'en' => 'Coordinated horticulture supply chain surveys and supervised field deployments across assisted villages in West Java.'
                ]),
                'order_num' => 2
            ],
            [
                'name' => json_encode(['id' => 'Shandy Muhammad Yusuf', 'en' => 'Shandy Muhammad Yusuf']),
                'role' => json_encode(['id' => 'CTO', 'en' => 'CTO']),
                'category' => 'Technology',
                'photo_path' => '/storage/uploads/team/img_6abc06d9ecfa83.76270631.webp',
                'linkedin_url' => 'https://www.linkedin.com/in/shandy-muhammad-yusuf/',
                'email' => 'shandy.yusuf@agronex.id',
                'bio' => json_encode([
                    'id' => 'Chief Technology Officer AGRONEX NUSANTARA. Bertanggung jawab atas pengembangan arsitektur teknologi software & platform, kecerdasan buatan (AgroPredict Engine), transmisi data telemetri, dan integrasi API.',
                    'en' => 'Chief Technology Officer of AGRONEX NUSANTARA. Responsible for software & platform architecture, AI algorithms (AgroPredict Engine), wireless telemetry pipelines, and API integrations.'
                ]),
                'skills' => 'Software Engineering, AI & Machine Learning, Data Analytics, Cloud Infrastructure, Telemetry Pipelines',
                'contributions' => json_encode([
                    'id' => 'Merancang engine algoritma prediksi harga komoditas pangan dan arsitektur analitik data spasial platform.',
                    'en' => 'Designed the commodity price prediction engine algorithms and spatial data analytics pipelines.'
                ]),
                'order_num' => 3
            ],
            [
                'name' => json_encode(['id' => 'Eva Salsabila', 'en' => 'Eva Salsabila']),
                'role' => json_encode(['id' => 'Social Impact & Community Lead', 'en' => 'Social Impact & Community Lead']),
                'category' => 'Community',
                'photo_path' => '/storage/uploads/team/img_6abc06912680e5.91509090.webp',
                'linkedin_url' => 'https://www.linkedin.com/in/eva-salsabila/',
                'email' => 'eva.salsabila@agronex.id',
                'bio' => json_encode([
                    'id' => 'Social Impact & Community Lead AGRONEX NUSANTARA. Mengawal misi dampak sosial, inklusi perempuan dan generasi muda tani, pendampingan adopsi teknologi ramah pengguna, serta evaluasi dampak kesejahteraan keluarga petani.',
                    'en' => 'Social Impact & Community Lead at AGRONEX NUSANTARA. Drives social impact initiatives, youth and women farmer inclusion, user-friendly technology adoption, and farming family welfare assessments.'
                ]),
                'skills' => 'Social Impact Assessment, Community Engagement, Gender Inclusion, Qualitative Field Research, Farmer Facilitation',
                'contributions' => json_encode([
                    'id' => 'Memfasilitasi dialog mendalam bersama kelompok tani wanita dan petani muda dalam memetakan kendala sosial adopsi teknologi.',
                    'en' => 'Facilitated in-depth dialogues with women and youth farming groups to map social barriers in technology adoption.'
                ]),
                'order_num' => 4
            ],
            [
                'name' => json_encode(['id' => 'Raka Alpiansyah', 'en' => 'Raka Alpiansyah']),
                'role' => json_encode(['id' => 'Engineering Lead', 'en' => 'Engineering Lead']),
                'category' => 'Engineering',
                'photo_path' => '/storage/uploads/team/img_6abc06e32ab691.11884727.webp',
                'linkedin_url' => 'https://www.linkedin.com/in/raka-alpiansyah/',
                'email' => 'raka.alpiansyah@agronex.id',
                'bio' => json_encode([
                    'id' => 'Engineering Lead AGRONEX NUSANTARA. Bertanggung jawab atas rekayasa perangkat keras IoT, keandalan modul daya panel surya, kalibrasi sensor tanah di lingkungan luar ruangan, dan otomasi aktuator irigasi.',
                    'en' => 'Engineering Lead at AGRONEX NUSANTARA. Oversees IoT hardware engineering, solar module power reliability, outdoor sensor calibrations, and irrigation actuator automation.'
                ]),
                'skills' => 'Embedded Systems, IoT Hardware Prototyping, Solar Microgrids, Sensor Calibration, Irrigation Actuation',
                'contributions' => json_encode([
                    'id' => 'Memimpin perancangan sirkuit perangkat keras IoT hemat daya dan pengujian ketahanan cuaca di lahan terbuka.',
                    'en' => 'Led low-power IoT hardware circuit design and weather durability testing in open agricultural fields.'
                ]),
                'order_num' => 5
            ],
            [
                'name' => json_encode(['id' => 'Ariyanti Yusup', 'en' => 'Ariyanti Yusup']),
                'role' => json_encode(['id' => 'Business & Marketing Lead', 'en' => 'Business & Marketing Lead']),
                'category' => 'Business & Marketing',
                'photo_path' => '/storage/uploads/team/img_6abc0f89ae6b04.90121307.webp',
                'linkedin_url' => 'https://www.linkedin.com/in/ariyanti-yusup/',
                'email' => 'ariyanti.yusup@agronex.id',
                'bio' => json_encode([
                    'id' => 'Business & Marketing Lead AGRONEX NUSANTARA. Memimpin strategi penetrasi pasar komersial agritech, pemasaran produk telemetri, kemitraan strategis B2B & B2G, serta edukasi program bundling dan kemitraan kelompok tani di berbagai daerah nusantara.',
                    'en' => 'Business & Marketing Lead at AGRONEX NUSANTARA. Directs agritech commercial market penetration, product marketing, strategic B2B & B2G partnerships, and farming cooperative adoption programs nationwide.'
                ]),
                'skills' => 'Business Development, Agribusiness Marketing, Brand Strategy, B2B Partnerships, Farmer Outreach',
                'contributions' => json_encode([
                    'id' => 'Mengembangkan strategi kemitraan komersial agritech terjangkau dan perluasan adopsi alat telemetri ke kelompok tani serta dinas terkait.',
                    'en' => 'Developed commercial partnership strategies for affordable agritech and expanded telemetry adoption among farming groups.'
                ]),
                'order_num' => 6
            ],
            [
                'name' => json_encode(['id' => 'Salma Widiarti', 'en' => 'Salma Widiarti']),
                'role' => json_encode(['id' => 'Agriculture & Field Operations', 'en' => 'Agriculture & Field Operations']),
                'category' => 'Operations',
                'photo_path' => '/storage/uploads/team/img_6abc0fc1c093f0.67688864.webp',
                'linkedin_url' => 'https://www.linkedin.com/in/salma-widiarti/',
                'email' => 'salma.widiarti@agronex.id',
                'bio' => json_encode([
                    'id' => 'Agriculture & Field Operations AGRONEX NUSANTARA. Bertanggung jawab atas operasional agronomi lapangan, pendampingan petani langsung di petak lahan, standardisasi SOP budidaya presisi, serta pengujian respon tanah dan tanaman terhadap sensor IoT.',
                    'en' => 'Agriculture & Field Operations at AGRONEX NUSANTARA. Oversees field agronomy operations, direct farmer on-site assistance, precision cultivation SOP standardization, and crop-soil sensor telemetry response tests.'
                ]),
                'skills' => 'Agronomy, Field Operations, Crop Health Monitoring, Precision Farming SOP, Soil Data Collection',
                'contributions' => json_encode([
                    'id' => 'Menyusun SOP agronomi budidaya presisi berbasis telemetri dan memandu implementasi langsung di lahan petani hortikultura.',
                    'en' => 'Authored precision agronomy SOPs based on sensor telemetry and guided hands-on implementation in horticulture fields.'
                ]),
                'order_num' => 7
            ],
            [
                'name' => json_encode(['id' => 'Muhamad Ridho Fauzan', 'en' => 'Muhamad Ridho Fauzan']),
                'role' => json_encode(['id' => 'CFO', 'en' => 'CFO']),
                'category' => 'Executive',
                'photo_path' => null,
                'linkedin_url' => 'https://www.linkedin.com/in/muhamad-ridho-fauzan/',
                'email' => 'ridho.fauzan@agronex.id',
                'bio' => json_encode([
                    'id' => 'Chief Financial Officer AGRONEX NUSANTARA. Mengelola perencanaan keuangan perusahaan, efisiensi struktur biaya produksi perangkat keras, skema pembiayaan inklusif sewa gotong-royong petani, serta akuntabilitas finansial.',
                    'en' => 'Chief Financial Officer of AGRONEX NUSANTARA. Directs financial planning, hardware production cost optimization, inclusive farmer rental financing schemes, and financial governance.'
                ]),
                'skills' => 'Financial Modeling, Cost Optimization, Agritech Financing, Budgeting, Investment Analysis',
                'contributions' => json_encode([
                    'id' => 'Merumuskan struktur harga inklusif dan model sewa gotong-royong bulanan yang terjangkau bagi petani kecil.',
                    'en' => 'Structured the inclusive pricing and monthly shared rental models accessible for smallholder farmers.'
                ]),
                'order_num' => 8
            ],
            [
                'name' => json_encode(['id' => 'Syekoh Sultonah', 'en' => 'Syekoh Sultonah']),
                'role' => json_encode(['id' => 'Head of Agricultural R&D', 'en' => 'Head of Agricultural R&D']),
                'category' => 'Research',
                'photo_path' => null,
                'linkedin_url' => 'https://www.linkedin.com/in/syekoh-sultonah/',
                'email' => 'syekoh.sultonah@agronex.id',
                'bio' => json_encode([
                    'id' => 'Head of Agricultural R&D AGRONEX NUSANTARA. Memimpin riset dan penelitian ilmiah pertanian presisi untuk eksplorasi dan pengembangan semua potensi komoditas pertanian nusantara, kalibrasi formulasi nutrisi tanah, serta integrasi data biosains tanaman.',
                    'en' => 'Head of Agricultural R&D at AGRONEX NUSANTARA. Leads precision agriculture scientific research to unlock the full potential of Indonesian agricultural commodities, soil nutrient formulations, and plant bioscience data integration.'
                ]),
                'skills' => 'Agricultural R&D, Crop Science, Soil Chemistry Research, Nutrient Formulation, Agricultural Innovation',
                'contributions' => json_encode([
                    'id' => 'Memimpin riset ilmiah karakteristik tanah vulkanis Jawa Barat dan kalibrasi ambang batas nutrisi NPK untuk tanaman hortikultura.',
                    'en' => 'Led scientific research on West Java volcanic soil characteristics and NPK nutrient threshold calibrations for horticulture crops.'
                ]),
                'order_num' => 9
            ],
        ];

        foreach ($team as $member) {
            TeamMember::create($member);
        }

        // 5. HAKI - Explicitly registered (DJKI Kemenkumham RI)
        HakiItem::truncate();
        HakiItem::create([
            'title' => 'AGRONEX: Platform Cerdas Pertanian Berbasis Artificial Intelligence, Internet of Things, dan Augmented Reality',
            'type' => 'Program Komputer',
            'registration_number' => 'EC002026124181',
            'record_number' => '001376609',
            'status' => 'Registered',
            'registration_date' => '2026-07-24',
            'first_announced_date' => '31 Juli 2025',
            'first_announced_place' => 'Kab. Bandung',
            'creator_name' => 'TRI FEBRIANSAH dan SHANDY MUHAMMAD YUSUF',
            'holder_name' => 'TRI FEBRIANSAH dan SHANDY MUHAMMAD YUSUF',
            'address' => 'Bumi Jati Mekar Residence Blok C 26RT 002 RW 011, MALAKASARI, BALEENDAH, KAB. BANDUNG, JAWA BARAT, Indonesia, 40375',
            'citizenship' => 'Indonesia',
            'protection_period' => 'Berlaku selama 50 (lima puluh) tahun sejak Ciptaan tersebut pertama kali dilakukan Pengumuman',
            'document_path' => 'images/haki.png',
            'description' => 'Melindungi arsitektur sistem perangkat lunak, algoritma prediktif harga pangan, antarmuka pemrosesan telemetri IoT tanah, dan simulasi augmented reality tanaman.'
        ]);

        HakiItem::create([
            'title' => 'Sistem IOT dan Kecerdasan Buatan Untuk Monitoring dan Pengelolaan Air Terintegrasi',
            'type' => 'Program Komputer',
            'registration_number' => 'EC002026184233',
            'record_number' => '001510305',
            'status' => 'Registered',
            'registration_date' => '2026-09-27',
            'first_announced_date' => '12 Februari 2025',
            'first_announced_place' => 'Kab. Bandung',
            'creator_name' => 'TRI FEBRIANSAH',
            'holder_name' => 'TRI FEBRIANSAH',
            'address' => 'Perum Jatimekar Residence blok C 26, Malakasari, Baleendah, Kab.Bandung, 40375, Baleendah, Kab. Bandung, Jawa Barat, 40375',
            'citizenship' => 'Indonesia',
            'protection_period' => 'Berlaku selama 50 (lima puluh) tahun sejak Ciptaan tersebut pertama kali dilakukan Pengumuman',
            'document_path' => 'images/hakiiotair.png',
            'description' => 'Melindungi perangkat lunak sistem pemantauan telemetri irigasi presisi, sensor kualitas dan debit air cerdas, serta algoritma kecerdasan buatan untuk pengelolaan air pertanian terintegrasi.'
        ]);


        // 6. Partners - Documented only
        Partner::truncate();
        $partners = [
            [
                'name' => 'PT Yota Inovasi Nusantara',
                'logo_path' => 'https://yotainovasi.id/yin.png',
                'type' => 'ECOSYSTEM PARTNER',
                'collaboration_story' => json_encode([
                    'id' => 'Mitra induk riset teknologi elektronika nirkabel, sensor presisi, dan infrastruktur cloud server.',
                    'en' => 'Parent technology research partner facilitating edge computing and hardware supply chains.'
                ]),
                'goal' => 'Riset perangkat keras berdaya rendah & infrastruktur server cloud.',
                'program' => 'Edge Agri-intelligence Research & Infrastructure.',
                'results' => 'Pengembangan modul daya surya hemat energi untuk sensor IoT.',
                'impact' => 'Sistem telemetri lapangan mandiri energi terbarukan.'
            ],
            [
                'name' => 'YOTA Adiwidya Center',
                'logo_path' => 'https://siyota.org/image/logo.png',
                'type' => 'COMMUNITY PARTNER',
                'collaboration_story' => json_encode([
                    'id' => 'Mitra pengembangan kapasitas sosial petani, edukasi koperasi digital, dan penguatan organisasi kelompok binaan.',
                    'en' => 'Partner for social capacity building, cooperative training, and local rural development plans.'
                ]),
                'goal' => 'Pemberdayaan sosial petani & literasi digital kelompok tani.',
                'program' => 'Digital Rural Leaders Initiative.',
                'results' => 'Edukasi dan pelatihan adopsi teknologi bagi petani dan pemuda tani.',
                'impact' => 'Tingkat adopsi dan partisipasi komunitas yang berkelanjutan.'
            ],
            [
                'name' => 'Koperasi Lembang Agri',
                'logo_path' => 'https://images.unsplash.com/photo-1595974482597-4b8da8879bc5?auto=format&fit=crop&w=200&q=80',
                'type' => 'FIELD PARTNER',
                'collaboration_story' => json_encode([
                    'id' => 'Mitra validasi lapangan pada komoditas sayuran hortikultura untuk menguji performa sensor tanah dan parameter iklim mikro.',
                    'en' => 'Field validation partner in horticultural vegetables testing soil sensor telemetry and microclimate parameters.'
                ]),
                'goal' => 'Validasi lapangan telemetri sensor tanah dan efisiensi air lahan sayuran.',
                'program' => 'Smart Farming Hortikultura Pilot.',
                'results' => 'Data kalibrasi sensor pH dan kelembapan di dataran tinggi.',
                'impact' => 'Validasi akurasi data sensor pada budidaya sayuran.'
            ],
            [
                'name' => 'Pemerintah Desa Karyamukti, Garut',
                'logo_path' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Coat_of_arms_of_Indonesia.svg',
                'type' => 'FIELD PARTNER',
                'collaboration_story' => json_encode([
                    'id' => 'Kolaborasi inisiatif smart farming, greenhouse cerdas, dan pemetaan tantangan rantai pasok bersama kelompok tani desa.',
                    'en' => 'Collaboration on smart farming initiatives, smart greenhouse prototyping, and supply chain mapping.'
                ]),
                'goal' => 'Uji coba prototipe smart greenhouse dan pemetaan rantai pasok.',
                'program' => 'Program Inisiasi Smart Farming Desa Karyamukti.',
                'results' => 'Pengujian greenhouse cerdas dan perangkat monitoring lahan.',
                'impact' => 'Dasar pemetaan rantai pasok komoditas desa.'
            ],
            [
                'name' => 'Gabungan Kelompok Tani Cisewu',
                'logo_path' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Coat_of_arms_of_Indonesia.svg',
                'type' => 'COMMUNITY PARTNER',
                'collaboration_story' => json_encode([
                    'id' => 'Mitra dialog awal dan riset empati mengenai tantangan riil budidaya padi, serangan hama, dan fluktuasi harga hasil panen.',
                    'en' => 'Early dialogue partner for empathy research on paddy farming, pest challenges, and harvest price volatility.'
                ]),
                'goal' => 'Riset empati dan identifikasi tantangan riil petani di lahan agraris.',
                'program' => 'Riset Empati Lapangan Cisewu.',
                'results' => 'Peta 12 masalah utama petani dari lahan hingga pasar.',
                'impact' => 'Fondasi lahirnya gagasan ekosistem AGRONEX.'
            ],
        ];

        foreach ($partners as $part) {
            Partner::create($part);
        }

        // 7. Activities - Exactly the 7 Documented Field Activities
        Activity::truncate();
        $activities = [
            [
                'title' => json_encode([
                    'id' => 'Validasi Permasalahan Petani Hortikultura',
                    'en' => 'Validation of Horticultural Farming Challenges'
                ]),
                'category' => 'Research & Validation',
                'activity_date' => '2026-05-08',
                'location' => 'Ciamis, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Wawancara dan observasi langsung bersama petani hortikultura untuk mengidentifikasi tantangan utama dalam akses informasi harga, biaya produksi, serta kendala distribusi dari lahan ke pasar.',
                    'en' => 'Interviews and direct observations with horticulture farmers identifying challenges in price information access, production overheads, and logistics.'
                ]),
                'photo_path' => '/galeri/WhatsApp Image 2026-07-24 at 22.17.34.jpeg',
                'tags' => 'May 2026, Ciamis, Riset Lapangan'
            ],
            [
                'title' => json_encode([
                    'id' => 'Validasi Smart Farming dan IoT',
                    'en' => 'Smart Farming and IoT Solution Validation'
                ]),
                'category' => 'Technology Validation',
                'activity_date' => '2026-05-10',
                'location' => 'Pangalengan, Kabupaten Bandung',
                'description' => json_encode([
                    'id' => 'Diskusi dan demonstrasi konsep Smart Farming berbasis IoT di sentra hortikultura Pangalengan. Memvalidasi kebutuhan pemantauan kelembapan tanah real-time dan otomasi pompa air.',
                    'en' => 'Focus discussions and IoT concept demonstrations in the Pangalengan horticulture center, validating real-time soil moisture monitoring and pump automation.'
                ]),
                'photo_path' => '/konten/pangalengan.png',
                'tags' => 'May 2026, Pangalengan, Smart Farming, IoT'
            ],
            [
                'title' => json_encode([
                    'id' => 'Observasi Harga dan Rantai Pasok',
                    'en' => 'Price and Supply Chain Observation'
                ]),
                'category' => 'Market Observation',
                'activity_date' => '2026-05-12',
                'location' => 'Tasikmalaya, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Pemetaan alur distribusi komoditas hortikultura dari tingkat petani hingga pedagang pasar tradisional untuk mengukur disparitas harga jual dan biaya logistik.',
                    'en' => 'Mapping horticulture distribution pipelines from farm gates to traditional markets to measure retail-wholesale margins and freight overheads.'
                ]),
                'photo_path' => '/galeri/WhatsApp Image 2026-07-24 at 22.17.33.jpeg',
                'tags' => 'May 2026, Tasikmalaya, Rantai Pasok, Pasar'
            ],
            [
                'title' => json_encode([
                    'id' => 'Validasi Kebutuhan Petani Hortikultura',
                    'en' => 'Horticultural Farmer Needs Validation'
                ]),
                'category' => 'Needs Assessment',
                'activity_date' => '2026-05-15',
                'location' => 'Garut, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Observasi langsung di Kp. Kiaragoong mengenai ketergantungan modal kerja, degradasi keasaman tanah, dan desakan penjualan hasil panen pasca masa panen raya.',
                    'en' => 'Field survey in Kp. Kiaragoong focusing on seasonal working capital dependencies, soil acidity degradation, and harvest selling pressures.'
                ]),
                'photo_path' => '/konten/garut.png',
                'tags' => 'May 2026, Garut, Validasi Kebutuhan'
            ],
            [
                'title' => json_encode([
                    'id' => 'Demonstrasi Hardware IoT',
                    'en' => 'IoT Hardware Demonstration & Testing'
                ]),
                'category' => 'Hardware Prototyping',
                'activity_date' => '2026-06-22',
                'location' => 'Ciamis, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Pengembangan dan demonstrasi lapangan prototipe hardware IoT pengukur pH, NPK, dan kelembapan tanah yang terintegrasi dengan modul pompa air otomatis.',
                    'en' => 'Field deployment and live demo of IoT hardware prototype measuring pH, NPK, and soil moisture connected to automated solar pump actuators.'
                ]),
                'photo_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.12.jpeg',
                'tags' => 'June 2026, Ciamis, Hardware IoT, Demo'
            ],
            [
                'title' => json_encode([
                    'id' => 'Uji Konsep AgroPredict',
                    'en' => 'AgroPredict Concept Validation & Testing'
                ]),
                'category' => 'Intelligence Testing',
                'activity_date' => '2026-06-25',
                'location' => 'Tasikmalaya, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Presentasi konsep dashboard AgroPredict kepada kelompok tani dan pemangku kepentingan untuk menyempurnakan fitur prediksi harga komoditas dan business matching.',
                    'en' => 'Presentation and testing of the AgroPredict dashboard concept with farmers and stakeholders to refine price forecasting algorithms and matching logic.'
                ]),
                'photo_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.16.jpeg',
                'tags' => 'June 2026, Tasikmalaya, AgroPredict, Uji Konsep'
            ],
            [
                'title' => json_encode([
                    'id' => 'Observasi Harga Komoditas',
                    'en' => 'Commodity Price Observation'
                ]),
                'category' => 'Market Intelligence',
                'activity_date' => '2026-08-10',
                'location' => 'Pasar Pancasila, Tasikmalaya',
                'description' => json_encode([
                    'id' => 'Pengamatan lapangan harga komoditas cabai, bawang, dan sayuran di Pasar Pancasila untuk mengkalibrasi akurasi data harga pada AgroPredict Engine.',
                    'en' => 'Field price telemetry gathering at Pasar Pancasila for chili, shallots, and vegetables to calibrate the AgroPredict Engine market models.'
                ]),
                'photo_path' => '/galeri/WhatsApp Image 2026-07-24 at 22.18.53 (4).jpeg',
                'tags' => 'August 2026, Pasar Pancasila, Tasikmalaya, Harga'
            ],
        ];

        foreach ($activities as $act) {
            Activity::create($act);
        }

        // 8. Field Stories - Documented Ibu Karminah
        FieldStory::truncate();
        FieldStory::create([
            'title' => json_encode([
                'id' => 'Validasi Kebutuhan Pengguna: Suara Ibu Karminah dari Kiaragoong',
                'en' => 'User Need Validation: Voice of Ibu Karminah from Kiaragoong'
            ]),
            'slug' => 'validasi-kebutuhan-kiaragoong',
            'village_name' => 'Kp. Kiaragoong, Kabupaten Garut, Jawa Barat',
            'story' => json_encode([
                'id' => "Dalam kegiatan validasi lapangan di Kp. Kiaragoong, Kabupaten Garut, tim AGRONEX berdiskusi dengan Ibu Karminah yang sehari-hari mengelola lahan padi dan sayuran. Beliau menyampaikan bahwa salah satu tantangan terbesar yang dihadapi petani adalah ketidakpastian harga hasil panen. Pada saat panen raya, harga sering turun drastis sehingga petani terpaksa menjual hasil panen dengan harga rendah karena membutuhkan dana cepat untuk membeli pupuk, benih, dan kebutuhan produksi berikutnya.\n\nMenurut Ibu Karminah, petani membutuhkan akses informasi yang lebih baik terkait harga pasar, perkiraan kondisi cuaca, serta peluang pemasaran hasil panen agar dapat mengambil keputusan yang lebih tepat. Masukan dari Ibu Karminah menjadi salah satu dasar penting dalam pengembangan ekosistem AGRONEX dan AgroPredict Engine.",
                'en' => "During field validation in Kp. Kiaragoong, Garut, the AGRONEX team interviewed Ibu Karminah, who cultivates rice and vegetables. She explained that at harvest peaks, prices plunge and farmers must sell cheap because input funds cannot wait. Farmer insights from Ibu Karminah form the core foundation for AGRONEX and the AgroPredict Engine."
            ]),
            'photo_path' => '/konten/fotogarut.png',
            'video_url' => '',
            'validation_data' => json_encode([
                'id' => 'Masukan diintegrasikan ke dalam AgroPredict Engine untuk intelijen harga pasar dan business matching offtaker.',
                'en' => 'Inputs integrated into the AgroPredict Engine for price intelligence and corporate matching.'
            ]),
            'observations' => json_encode([
                'id' => 'Petani terpaksa melepas panen murah akibat desakan modal kerja tanpa adanya alternatif informasi pasar.',
                'en' => 'Farmers forced into low price realizations due to seasonal working capital gaps.'
            ]),
            'interview_quotes' => json_encode([
                [
                    'author' => 'Ibu Karminah, Petani Padi dan Sayuran Garut',
                    'quote' => 'Kadang hasil panen harus dijual murah karena kebutuhan pupuk dan biaya produksi tidak bisa menunggu harga membaik.'
                ]
            ]),
            'problems' => json_encode([
                'id' => 'Petani dapat terpaksa menjual hasil panen dengan harga rendah karena kebutuhan biaya produksi tidak dapat menunggu.',
                'en' => 'Farmers may be forced to sell harvests at rock-bottom prices because immediate input production dues cannot wait.'
            ]),
            'solutions' => json_encode([
                'id' => 'AgroPredict Engine dikembangkan dengan market intelligence and business matching untuk mendukung keputusan distribusi dan kepastian harga.',
                'en' => 'AgroPredict Engine delivers market intelligence and business matching to support logistics timing and fair pricing.'
            ]),
            'lessons' => json_encode([
                'id' => 'Petani membutuhkan informasi harga, cuaca, dan peluang pasar secara sederhana dan mudah diakses.',
                'en' => 'Farmers require actionable price trends, weather forecasts, and direct market opportunities delivered simply.'
            ]),
            'views_count' => 340
        ]);

        // 9. Map Markers - 5 Verified Field Points
        MapMarker::truncate();
        $markers = [
            [
                'title' => json_encode([
                    'id' => 'Validasi Lahan Kp. Kiaragoong, Garut',
                    'en' => 'Field Validation Kp. Kiaragoong, Garut'
                ]),
                'marker_type' => 'Field Research & Needs Assessment',
                'latitude' => '-7.2167',
                'longitude' => '107.9000',
                'details' => json_encode([
                    ['key_id' => 'Fokus Kegiatan', 'value' => 'Wawancara Ibu Karminah & pemetaan informasi harga'],
                    ['key_id' => 'Komoditas', 'value' => 'Padi & Sayuran Hortikultura'],
                    ['key_id' => 'Hasil Validasi', 'value' => 'Dasar perumusan modul AgroPredict']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Validasi Smart Farming Pangalengan',
                    'en' => 'Smart Farming Validation Pangalengan'
                ]),
                'marker_type' => 'Smart Farming & IoT Validation',
                'latitude' => '-7.1700',
                'longitude' => '107.5600',
                'details' => json_encode([
                    ['key_id' => 'Fokus Kegiatan', 'value' => 'Monitoring kondisi lahan & telemetri sensor'],
                    ['key_id' => 'Komoditas', 'value' => 'Kentang & Sayuran Dataran Tinggi'],
                    ['key_id' => 'Hasil Validasi', 'value' => 'Kebutuhan otomasi irigasi terukur']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Demonstrasi Hardware IoT Ciamis',
                    'en' => 'Hardware IoT Demonstration Ciamis'
                ]),
                'marker_type' => 'Hardware Demo & Sensor Arrays',
                'latitude' => '-7.3275',
                'longitude' => '108.3533',
                'details' => json_encode([
                    ['key_id' => 'Fokus Kegiatan', 'value' => 'Uji pembacaan sensor pH, NPK, dan kelembapan'],
                    ['key_id' => 'Integrasi', 'value' => 'Pompa irigasi otomatis & aktuator'],
                    ['key_id' => 'Status', 'value' => 'Prototype hardware teruji di lahan terbuka']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Uji Konsep AgroPredict Tasikmalaya',
                    'en' => 'AgroPredict Testing Tasikmalaya'
                ]),
                'marker_type' => 'AgroPredict Market Intelligence',
                'latitude' => '-7.3274',
                'longitude' => '108.2207',
                'details' => json_encode([
                    ['key_id' => 'Fokus Kegiatan', 'value' => 'Observasi harga di Pasar Pancasila & Cikurubuk'],
                    ['key_id' => 'Rantai Pasok', 'value' => 'Pemetaan alur petani ke pedagang pasar'],
                    ['key_id' => 'Engine', 'value' => 'Kalibrasi algoritma prediksi harga AgroPredict']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Greenhouse Cerdas Desa Karyamukti, Garut',
                    'en' => 'Smart Greenhouse Karyamukti, Garut'
                ]),
                'marker_type' => 'IoT Field Calibration',
                'latitude' => '-7.3800',
                'longitude' => '107.8200',
                'details' => json_encode([
                    ['key_id' => 'Mitra', 'value' => 'Pemerintah Desa Karyamukti & Poktan'],
                    ['key_id' => 'Fasilitas', 'value' => 'Prototipe greenhouse cerdas terintegrasi'],
                    ['key_id' => 'Tujuan', 'value' => 'Pengujian efisiensi air lahan dan mikroklimat']
                ])
            ],
        ];

        foreach ($markers as $m) {
            MapMarker::create($m);
        }

        // 10. Knowledge Items - Restructured 4 Core Pillars
        KnowledgeItem::truncate();
        $knowledge = [
            [
                'title' => json_encode([
                    'id' => 'Mengapa Kami Membangun AGRONEX: Dari Lahan Menuju Keputusan Pertanian Berbasis Data',
                    'en' => 'Why We Built AGRONEX: From Field Signals to Data-Backed Decisions'
                ]),
                'slug' => 'mengapa-kami-membangun-agronex',
                'category' => 'FIELD RESEARCH',
                'content' => json_encode([
                    'id' => "Bagi kami, pertanian adalah kehidupan. Kami lahir dan tumbuh di lingkungan keluarga petani. Dari sektor inilah keluarga kami memperoleh penghidupan. Namun di balik peran penting tersebut, petani justru menjadi pihak yang paling sering menghadapi ketidakpastian. Dalam berbagai kegiatan validasi lapangan di Garut, Bandung, dan Ciamis, kami menemukan bahwa masalah mendasar adalah minimnya data untuk mengambil keputusan. AGRONEX lahir untuk menjembatani sinyal dari lahan menuju keputusan yang tepat.",
                    'en' => "For us, agriculture is life. Born and raised in farming families, we observed that farmers constantly battle uncertainty. Field research across West Java revealed that the core issue is lack of field data for decisions. AGRONEX was founded to turn raw field signals into smarter agricultural actions."
                ]),
                'author' => 'Tri Febriansah',
                'published_at' => '2026-06-02',
                'views_count' => 450
            ],
            [
                'title' => json_encode([
                    'id' => 'Belajar dari Garut & Tasikmalaya: Mengurai Ketidakpastian Harga Pasca Panen Raya',
                    'en' => 'Lessons from Garut & Tasikmalaya: Navigating Harvest Price Volatility'
                ]),
                'slug' => 'belajar-dari-garut-dan-tasikmalaya',
                'category' => 'MARKET VALIDATION',
                'content' => json_encode([
                    'id' => "Kunjungan ke Kp. Kiaragoong Garut dan Pasar Pancasila Tasikmalaya membuktikan bahwa masalah pertanian tidak berhenti saat panen berhasil. Ketiadaan transparansi informasi harga dan desakan kebutuhan modal kerja membuat petani kerap melepas hasil bumi di bawah nilai wajar. Inilah latar belakang hadirnya modul AgroPredict Engine.",
                    'en' => "Field observations in Kiaragoong and Pasar Pancasila confirmed that farming challenges persist after harvest. Without market price transparency and under working capital pressure, farmers accept low prices. This drove our AgroPredict Engine development."
                ]),
                'author' => 'Rifki Ilhami Fauzi',
                'published_at' => '2026-06-15',
                'views_count' => 380
            ],
            [
                'title' => json_encode([
                    'id' => 'Belajar dari Pangalengan: Ketika Tantangan Pertanian Tidak Hanya Tentang Menanam',
                    'en' => 'Learning from Pangalengan: When Agriculture Is More Than Planting'
                ]),
                'slug' => 'belajar-dari-pangalengan',
                'category' => 'AGRICULTURAL INSIGHTS',
                'content' => json_encode([
                    'id' => "Di kawasan dataran tinggi Pangalengan, kami mengamati bagaimana kelembapan tanah, perubahan iklim mikro, dan pola irigasi sangat menentukan produktivitas kentang dan sayuran. Petani membutuhkan teknologi yang sederhana di depan tanpa perlu membaca grafik rumit.",
                    'en' => "In highland Pangalengan, soil moisture, canopy microclimate, and irrigation schedules dictate crop vitality. Farmers demand simple actionable alerts without being forced to decode complex engineering graphs."
                ]),
                'author' => 'Eva Salsabila',
                'published_at' => '2026-05-20',
                'views_count' => 310
            ],
            [
                'title' => json_encode([
                    'id' => 'Rekayasa Perangkat Keras IoT & Modul Daya Surya untuk Lahan Terbuka',
                    'en' => 'Engineering Low-Power IoT & Solar Modules in Open Agricultural Fields'
                ]),
                'slug' => 'rekayasa-perangkat-keras-iot',
                'category' => 'TECHNOLOGY DEVELOPMENT',
                'content' => json_encode([
                    'id' => "Merancang perangkat sensor untuk lahan terbuka Indonesia menuntut ketahanan cuaca tinggi, konsumsi daya ultra-rendah, serta kalibrasi sensor NPK dan pH tanah yang tahan korosi. Pengujian prototipe SoilSense dan WaterSense di Ciamis membuktikan keandalan sistem tanpa genset.",
                    'en' => "Engineering outdoor sensor pods for Indonesian agriculture requires weatherproofing, low-power microcontrollers, and durable NPK/pH probes. Field trials in Ciamis validated reliable autonomous operations."
                ]),
                'author' => 'Raka Alpiansyah',
                'published_at' => '2026-06-28',
                'views_count' => 290
            ],
        ];

        foreach ($knowledge as $kn) {
            KnowledgeItem::create($kn);
        }

        // 11. Impact Stats - Verified Current vs Target Clearly Labeled
        ImpactStat::truncate();
        $impacts = [
            ['value' => '3+', 'label' => json_encode(['id' => 'Petani Terdampingi Awal', 'en' => 'Early Assisted Farmers']), 'icon' => 'users', 'order_num' => 1],
            ['value' => '12+', 'label' => json_encode(['id' => 'Kegiatan Komunitas & Diskusi', 'en' => 'Community Activities & FGDs']), 'icon' => 'calendar', 'order_num' => 2],
            ['value' => '2+', 'label' => json_encode(['id' => 'Desa Observasi Lapangan', 'en' => 'Assisted Field Villages']), 'icon' => 'home', 'order_num' => 3],
            ['value' => '2m', 'label' => json_encode(['id' => 'Plot Observasi Mandiri', 'en' => 'Managed Observation Plots']), 'icon' => 'globe', 'order_num' => 4],
            ['value' => '28%', 'label' => json_encode(['id' => 'Efisiensi Irigasi Teramati', 'en' => 'Observed Water Efficiency']), 'icon' => 'droplet', 'order_num' => 5],
        ];

        foreach ($impacts as $stat) {
            ImpactStat::create($stat);
        }

        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
    }
}
