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

        // 3. Products - Exactly 4 product groups
        Product::truncate();
        $products = [
            [
                'name' => json_encode([
                    'id' => 'SoilSense',
                    'en' => 'SoilSense'
                ]),
                'slug' => 'soilsense',
                'description' => json_encode([
                    'id' => 'Perangkat untuk membaca kondisi tanah seperti pH, NPK, kelembapan, dan parameter terkait sesuai konfigurasi sensor.',
                    'en' => 'Device to read soil conditions including pH, NPK, moisture, and related parameters based on sensor configuration.'
                ]),
                'features' => json_encode([
                    'id' => "Kategori: FIELD SENSING\nPenggunaan: pH, NPK, kelembapan tanah\nTujuan: Memahami kondisi tanah sebelum mengambil keputusan budidaya\nStatus: PROTOTYPE / FIELD TESTING",
                    'en' => "Category: FIELD SENSING\nUsage: pH, NPK, soil moisture\nPurpose: Understand soil condition before cultivation decisions\nStatus: PROTOTYPE / FIELD TESTING"
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.12.jpeg',
                'detail_content' => json_encode([
                    'id' => "SoilSense membaca parameter kondisi tanah secara presisi langsung di zona perakaran tanaman. Dengan mengetahui nilai pH tanah aktual serta konsentrasi nitrogen (N), fosfor (P), dan kalium (K), petani dapat mengalibrasi pemupukan secara tepat dosis dan tidak lagi bergantung pada perkiraan semata.\n\n• Kategori: FIELD SENSING\n• Penggunaan: pH, NPK, soil moisture\n• Tujuan: Memahami kondisi tanah sebelum mengambil keputusan budidaya\n• Status: PROTOTYPE / FIELD TESTING",
                    'en' => "SoilSense reads accurate soil parameters directly in the crop root zone. By tracking pH and NPK concentrations, farmers can dose fertilizers accurately based on real telemetry.\n\n• Category: FIELD SENSING\n• Usage: pH, NPK, soil moisture\n• Purpose: Understand soil conditions before making cultivation decisions\n• Status: PROTOTYPE / FIELD TESTING"
                ])
            ],
            [
                'name' => json_encode([
                    'id' => 'WaterSense',
                    'en' => 'WaterSense'
                ]),
                'slug' => 'watersense',
                'description' => json_encode([
                    'id' => 'Monitoring kondisi kelembapan dan kualitas air untuk membantu keputusan pengairan.',
                    'en' => 'Monitoring soil moisture and water quality parameters to assist irrigation decisions.'
                ]),
                'features' => json_encode([
                    'id' => "Kategori: FIELD SENSING\nParameter: Volumetrik air tanah, kualitas air irigasi\nTujuan: Mengurangi penyiraman berdasarkan perkiraan\nStatus: DEVELOPMENT / FIELD VALIDATION",
                    'en' => "Category: FIELD SENSING\nParameters: Volumetric soil water content, irrigation water metrics\nPurpose: Reduce estimation-based watering\nStatus: DEVELOPMENT / FIELD VALIDATION"
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.19.jpeg',
                'detail_content' => json_encode([
                    'id' => "WaterSense dirancang untuk membantu efisiensi penggunaan air lahan secara signifikan. Sensor mengukur kelembapan volumetrik tanah secara berkala sehingga jadwal penyiraman hanya diaktifkan saat tanaman benar-benar membutuhkan air, mencegah stres air maupun kejenuhan air berlebih.\n\n• Kategori: FIELD SENSING\n• Penggunaan: Monitoring kelembapan tanah & debit air\n• Tujuan: Mengurangi penyiraman berdasarkan perkiraan\n• Status: DEVELOPMENT / FIELD VALIDATION",
                    'en' => "WaterSense is engineered to optimize water usage. Regular moisture tracking ensures irrigation activates only when crops genuinely need hydration.\n\n• Category: FIELD SENSING\n• Usage: Soil moisture & water flow monitoring\n• Purpose: Reduce guess-based watering\n• Status: DEVELOPMENT / FIELD VALIDATION"
                ])
            ],
            [
                'name' => json_encode([
                    'id' => 'EnviroSense',
                    'en' => 'EnviroSense'
                ]),
                'slug' => 'envirosense',
                'description' => json_encode([
                    'id' => 'Monitoring kondisi lingkungan dan iklim mikro di sekitar tanaman.',
                    'en' => 'Monitoring environmental conditions and microclimate surrounding the crop.'
                ]),
                'features' => json_encode([
                    'id' => "Kategori: FIELD SENSING\nParameter: Suhu udara, kelembapan relatif, sinyal cuaca mikro\nTujuan: Memahami kondisi lingkungan yang memengaruhi tanaman\nStatus: DEVELOPMENT / FIELD VALIDATION",
                    'en' => "Category: FIELD SENSING\nParameters: Ambient temperature, relative humidity, micro-weather signals\nPurpose: Understand environmental factors affecting crops\nStatus: DEVELOPMENT / FIELD VALIDATION"
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.16.jpeg',
                'detail_content' => json_encode([
                    'id' => "EnviroSense membaca dinamika iklim mikro di area kanopi tanaman seperti fluktuasi suhu udara, kelembapan sekitar, dan intensitas radiasi matahari. Data ini menjadi peringatan dini bagi potensi serangan hama atau penyakit yang dipicu oleh kelembapan udara tinggi.\n\n• Kategori: FIELD SENSING\n• Parameter: Temperature, humidity, weather-related environmental signals\n• Tujuan: Memahami kondisi lingkungan yang memengaruhi tanaman\n• Status: DEVELOPMENT / FIELD VALIDATION",
                    'en' => "EnviroSense tracks canopy microclimate variables including air temperatures, ambient humidity, and solar radiation. Provides early warning signals for humidity-related crop diseases.\n\n• Category: FIELD SENSING\n• Parameters: Temperature, humidity, weather signals\n• Purpose: Understand crop environment dynamics\n• Status: DEVELOPMENT / FIELD VALIDATION"
                ])
            ],
            [
                'name' => json_encode([
                    'id' => 'Terra',
                    'en' => 'Terra'
                ]),
                'slug' => 'terra',
                'description' => json_encode([
                    'id' => 'Perangkat soil scanning untuk membantu memperoleh gambaran kondisi tanah secara lebih praktis.',
                    'en' => 'Soil scanning device designed to obtain a comprehensive soil condition overview practically.'
                ]),
                'features' => json_encode([
                    'id' => "Kategori: SOIL INTELLIGENCE\nParameter: Profil pemindaian cepat karakteristik tanah\nTujuan: Mempercepat pengumpulan data kondisi lahan\nStatus: PROTOTYPE / DEVELOPMENT",
                    'en' => "Category: SOIL INTELLIGENCE\nParameters: Rapid diagnostic soil profiling\nPurpose: Accelerate land condition data collection\nStatus: PROTOTYPE / DEVELOPMENT"
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.12 (1).jpeg',
                'detail_content' => json_encode([
                    'id' => "Terra merupakan instrumen soil scanner portabel untuk pengujian cepat di lapangan. Memungkinkan petugas lapangan dan kelompok tani memetakan variabilitas tanah antarsektor dalam hitungan menit tanpa harus menunggu hasil laboratorium berminggu-minggu.\n\n• Kategori: SOIL INTELLIGENCE\n• Penggunaan: Pemindaian cepat profil tanah\n• Tujuan: Mempercepat pengumpulan data kondisi lahan\n• Status: PROTOTYPE / DEVELOPMENT",
                    'en' => "Terra is a portable soil scanning instrument for rapid field diagnostics. Enables field teams and farmers to survey soil heterogeneity in minutes.\n\n• Category: SOIL INTELLIGENCE\n• Usage: Fast soil profile scanning\n• Purpose: Speed up land data gathering\n• Status: PROTOTYPE / DEVELOPMENT"
                ])
            ],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }

        // 4. Team - Exactly 5 Pitch Deck Members
        TeamMember::truncate();
        $team = [
            [
                'name' => 'Tri Febriansah',
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
                'name' => 'Rifki Ilhami Fauzi',
                'role' => json_encode(['id' => 'COO', 'en' => 'COO']),
                'category' => 'Operations',
                'photo_path' => '/storage/uploads/team/img_6a680409b98134.07916752.webp',
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
                'name' => 'Shandy Muhammad Yusuf',
                'role' => json_encode(['id' => 'CTO', 'en' => 'CTO']),
                'category' => 'Technology',
                'photo_path' => null,
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
                'name' => 'Eva Salsabila',
                'role' => json_encode(['id' => 'Social Impact & Community Lead', 'en' => 'Social Impact & Community Lead']),
                'category' => 'Community',
                'photo_path' => null,
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
                'name' => 'Raka Alpiansyah',
                'role' => json_encode(['id' => 'Engineering Lead', 'en' => 'Engineering Lead']),
                'category' => 'Engineering',
                'photo_path' => null,
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
        ];

        foreach ($team as $member) {
            TeamMember::create($member);
        }

        // 5. HAKI - Explicitly registered
        HakiItem::truncate();
        HakiItem::create([
            'title' => 'AGRONEX: Platform Cerdas Pertanian Berbasis Artificial Intelligence, Internet of Things, dan Augmented Reality',
            'type' => 'Hak Cipta (Copyright)',
            'registration_number' => 'EC002026124181',
            'status' => 'Registered',
            'registration_date' => '2026-07-24',
            'document_path' => '/images/haki.png'
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
