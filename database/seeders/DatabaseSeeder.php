<?php

namespace Database\Seeders;

use App\Models\User;
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
use App\Models\MapMarker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(JourneyChapterSeeder::class);
        $this->call(RecognitionSeeder::class);
        $this->call(MilestoneSeeder::class);

        // 1. Create Users
        User::create([
            'name' => 'Super Administrator',
            'email' => 'admin@agronex.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Principal Field Writer',
            'email' => 'writer@agronex.com',
            'password' => Hash::make('password123'),
            'role' => 'penulis',
        ]);

        // 2. Settings
        $settings = [
            'hero_headline' => json_encode([
                'id' => 'Membangun Masa Depan Pertanian Presisi',
                'en' => 'Building the Future of Precision Agriculture'
            ]),
            'hero_subheadline' => json_encode([
                'id' => 'Menghubungkan petani, teknologi IoT, kecerdasan buatan (AI), energi terbarukan, dan ekosistem berkelanjutan dalam satu platform cerdas.',
                'en' => 'Connecting farmers, IoT technology, AI, renewable energy, and sustainable ecosystems into one intelligent platform.'
            ]),
            'hero_cta_explore' => json_encode([
                'id' => 'Jelajahi Ekosistem',
                'en' => 'Explore Ecosystem'
            ]),
            'hero_cta_demo' => json_encode([
                'id' => 'Minta Demo',
                'en' => 'Request Demo'
            ]),
            'hero_cta_partner' => json_encode([
                'id' => 'Bermitra dengan Kami',
                'en' => 'Partner With Us'
            ]),
            'hero_cta_profile' => json_encode([
                'id' => 'Unduh Profil Perusahaan',
                'en' => 'Download Company Profile'
            ]),
            
            'who_quote' => json_encode([
                'id' => 'Teknologi hanya bermakna ketika meningkatkan kualitas hidup manusia.',
                'en' => 'Technology is only meaningful when it improves people’s lives.'
            ]),
            'who_vision' => json_encode([
                'id' => 'Menumbuhkan ekosistem pertanian yang tangguh dan berdaya hasil tinggi dengan menjembatani kecerdasan digital mutakhir dengan kearifan lokal pertanian organik.',
                'en' => 'To cultivate a resilient, high-yield agricultural ecosystem by bridging cutting-edge digital intelligence with organic field wisdom.'
            ]),
            'who_mission' => json_encode([
                'id' => 'Memberdayakan komunitas petani pedesaan dengan IoT yang mudah diakses, sistem pengambilan keputusan berbasis AI, serta jaringan kemitraan bisnis berkeadilan.',
                'en' => 'Empower rural farming communities with accessible IoT, AI-guided decision systems, and community-first value networks that restore soil health and raise livelihoods.'
            ]),
            'who_values' => json_encode([
                'id' => 'Utamakan Manusia: Petani adalah jantung teknologi kami. Kesederhanaan: Kompleksitas dibuat intuitif. Keberlanjutan: Pertumbuhan selaras dengan alam.',
                'en' => 'Human First: Farmers are the heart of our tech. Simplicity: Complexity made intuitive. Sustainability: Growth aligned with natural cycles.'
            ]),
            
            'contact_email' => 'yotainovasinusantara@gmail.com',
            'contact_whatsapp' => '085862319524',
            'contact_linkedin' => 'linkedin.com/company/agronex',
            'contact_instagram' => 'https://www.instagram.com/agronex_nusantara?igsh=ZmdpZDV4aGN1ZTZl',
            'contact_github' => 'github.com/agronex-org',
            'contact_maps' => 'https://maps.google.com/?q=Jakarta,Indonesia',
            'investor_market_size' => json_encode([
                'id' => 'Pasar pertanian lokal bernilai $25 Miliar pada tahun 2030.',
                'en' => '$25 Billion addressable local farming market by 2030.'
            ]),
            'investor_business_model' => json_encode([
                'id' => 'Penyewaan Perangkat + Langganan SaaS + Margin Rantai Pasok B2B Langsung.',
                'en' => 'Device Leasing + Subscription SaaS + Direct B2B Supply Chain margin.'
            ]),
            'investor_pitch_deck' => '/downloads/agronex_pitch_deck.pdf',
        ];

        foreach ($settings as $key => $value) {
            Setting::create(['key' => $key, 'value' => $value]);
        }

        // 3. Ecosystem Items
        $ecosystem = [
            [
                'name' => 'AGROPREDICT',
                'slug' => 'agropredict',
                'subtitle' => json_encode([
                    'id' => 'Yield Predictor & Business Matching',
                    'en' => 'Yield Predictor & Business Matching'
                ]),
                'description' => json_encode([
                    'id' => 'Direktori cerdas dan sistem prediksi harga hortikultura yang menghubungkan kelompok tani secara langsung dengan pembeli korporat dan pasar modern.',
                    'en' => 'A smart networking and yield prediction directory linking local farming associations directly with corporate CSR budgets, supply-chain buyers, and green tech providers.'
                ]),
                'use_case' => json_encode([
                    'id' => 'Menghubungkan kelompok tani di Tasikmalaya dengan rantai retail supermarket besar secara transparan.',
                    'en' => 'Connecting a farmer collective in West Java with an organic supermarket chain looking for sustainable kale.'
                ]),
                'image_path' => '/konten/Screenshot 2026-07-27 233232.png',
                'video_url' => '/video/Recording 2026-07-26 224110.mp4',
                'features' => ['Automated RFQs', 'Direct Messaging Hub', 'Verified Farmer Profiles', 'Yield Forecasting'],
                'demo_url' => 'https://demoagropredict.siyota.org/',
                'status' => 'Live',
                'target_url' => 'https://demoagropredict.siyota.org/'
            ],
            [
                'name' => 'PLANT AR',
                'slug' => 'plantar',
                'subtitle' => json_encode([
                    'id' => 'Edukasi Pertanian & Simulasi AR',
                    'en' => 'AR Learning & Simulation'
                ]),
                'description' => json_encode([
                    'id' => 'Aplikasi Augmented Reality interaktif untuk mensimulasikan pertumbuhan tanaman, pemantauan kesehatan daun, dan panduan budidaya presisi.',
                    'en' => 'Augmented Reality training companion that visualizes crop health, soil composition layers, and machine usage tips through simple smartphone lenses.'
                ]),
                'use_case' => json_encode([
                    'id' => 'Membantu petani muda memvisualisasikan gejala defisiensi unsur hara NPK tanah langsung pada model 3D.',
                    'en' => 'Helping junior agronomists identify leaf nitrogen deficiencies without heavy laboratory equipment.'
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.11 (1).jpeg',
                'video_url' => '/video/Recording 2026-07-26 225718.mp4',
                'features' => ['3D Crop Visualizer', 'Step-by-step Maintenance Guides', 'Offline Mode Capability'],
                'demo_url' => 'https://plantar.ihi.my.id/',
                'status' => 'Live',
                'target_url' => 'https://plantar.ihi.my.id/'
            ],
            [
                'name' => 'IOT PORTABLE',
                'slug' => 'iotportable',
                'subtitle' => json_encode([
                    'id' => 'Gateway Smart Farming & Telemetri',
                    'en' => 'Smart Farming & Telemetry Gateway'
                ]),
                'description' => json_encode([
                    'id' => 'Sensor lapangan modular terintegrasi pengukur pH, NPK, kelembapan tanah, suhu udara, serta intensitas cahaya secara nirkabel.',
                    'en' => 'Multi-sensor arrays reading NPK, soil moisture, ambient humidity, temperature, and light indices in real-time, designed to run for 3 years on micro solar nodes.'
                ]),
                'use_case' => json_encode([
                    'id' => 'Mengatur irigasi tetes secara otomatis saat sensor mendeteksi kadar air tanah di bawah ambang batas kritis.',
                    'en' => 'Autonomous drip irrigation triggers when soil moisture levels fall below 35% in chili farms.'
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.12.jpeg',
                'video_url' => '/video/Recording 2026-07-26 225857.mp4',
                'features' => ['Low-power LoRaWAN', 'Solar-backed LiPo Node', 'Shatter-proof IP67 enclosure', '5-Minute Plug & Play setup'],
                'demo_url' => 'https://iotuin.ihi.my.id/',
                'status' => 'Live',
                'target_url' => 'https://iotuin.ihi.my.id/'
            ],
        ];

        foreach ($ecosystem as $item) {
            EcosystemItem::create($item);
        }

        // 4. Challenges
        $challenges = [
            [
                'title' => json_encode(['id' => 'Ketidakpastian Iklim', 'en' => 'Climate Resiliency']),
                'slug' => 'climate',
                'description' => json_encode([
                    'id' => 'Siklus cuaca tidak menentu mengacaukan jadwal tanam, memicu banjir ekstrem atau kekeringan berkepanjangan.',
                    'en' => 'Erratic seasonal cycles disrupt dry/rain timelines, exposing farms to catastrophic water logs or heatwaves.'
                ]),
                'icon' => 'sun'
            ],
            [
                'title' => json_encode(['id' => 'Efisiensi Air Lahan', 'en' => 'Water Stewardship']),
                'slug' => 'water',
                'description' => json_encode([
                    'id' => 'Penyiraman berlebih menguras pasokan air lokal. Monitoring tanah real-time sangat penting untuk mencegah pemborosan.',
                    'en' => 'Over-extraction depletes downstream basins. Precise moisture monitoring is critical to prevent water tables dropping.'
                ]),
                'icon' => 'droplet'
            ],
            [
                'title' => json_encode(['id' => 'Rantai Pasok Kompleks', 'en' => 'Supply Chain Blurs']),
                'slug' => 'supply-chain',
                'description' => json_encode([
                    'id' => 'Tengkulak berlapis menaikkan harga jual hingga 250% tetapi menyisakan keuntungan yang sangat kecil bagi petani.',
                    'en' => 'Multi-tier agent brokers inflate prices by up to 250% while leaving farmers with minimal margins.'
                ]),
                'icon' => 'truck'
            ],
            [
                'title' => json_encode(['id' => 'Rendahnya Pendapatan', 'en' => 'Low Farming Income']),
                'slug' => 'income',
                'description' => json_encode([
                    'id' => 'Ketidakstabilan harga komoditas dan resiko gagal panen menjebak keluarga petani kecil dalam jeratan utang.',
                    'en' => 'Unstable market prices and crop failure push smallholder families into cycle debts with local loan brokers.'
                ]),
                'icon' => 'currency-dollar'
            ],
            [
                'title' => json_encode(['id' => 'Ketahanan Pangan', 'en' => 'Food Security Risk']),
                'slug' => 'food-security',
                'description' => json_encode([
                    'id' => 'Degradasi kesuburan tanah dan alih fungsi lahan hijau mengancam ketersediaan pangan nasional jangka panjang.',
                    'en' => 'Rapid conversion of arable land combined with soil degradation threatens basic grain sufficiency.'
                ]),
                'icon' => 'shield-exclamation'
            ],
            [
                'title' => json_encode(['id' => 'Defisit Energi Pedesaan', 'en' => 'Energy Deficit']),
                'slug' => 'energy',
                'description' => json_encode([
                    'id' => 'Sebagian besar pompa irigasi di daerah terpencil masih menggunakan bahan bakar solar diesel yang mahal dan kotor.',
                    'en' => 'Off-grid rural farms spend heavy portions of income on highly polluting fossil fuel diesel generators.'
                ]),
                'icon' => 'bolt'
            ],
            [
                'title' => json_encode(['id' => 'Akurasi Data Lahan', 'en' => 'Data Blindspots']),
                'slug' => 'data',
                'description' => json_encode([
                    'id' => 'Banyak kebijakan tani didasarkan pada perkiraan makro yang usang daripada data mikroklimat tanah aktual.',
                    'en' => 'Farming policy models are often based on outdated macro estimates instead of hyper-local real-time soil logs.'
                ]),
                'icon' => 'chart-bar'
            ],
        ];

        foreach ($challenges as $challenge) {
            Challenge::create($challenge);
        }

        // 5. Technologies
        $technologies = [
            [
                'name' => json_encode(['id' => 'Diagnostik Edge AI', 'en' => 'Edge AI Diagnostics']),
                'category' => 'Artificial Intelligence',
                'description' => json_encode(['id' => 'Menjalankan model tinyML langsung di perangkat IoT.', 'en' => 'Deploying tinyML models directly on low-power devices.'])
            ],
            [
                'name' => json_encode(['id' => 'Sensor LoRaWAN', 'en' => 'LoRaWAN Sensors']),
                'category' => 'Internet of Things',
                'description' => json_encode(['id' => 'Transmisi metrik tanah jarak jauh hingga 15km.', 'en' => 'Low-cost nodes transmitting soil metrics across 15km.'])
            ],
            [
                'name' => json_encode(['id' => 'Analisis Citra Sentinel', 'en' => 'Sentinel Remote Sensing']),
                'category' => 'Remote Sensing',
                'description' => json_encode(['id' => 'Monitoring klorofil dan lahan dari satelit.', 'en' => 'Automated satellite imagery ingestion to monitor forest canopy.'])
            ],
            [
                'name' => json_encode(['id' => 'Pemetaan GIS Dinamis', 'en' => 'Dynamic GIS Mapping']),
                'category' => 'GIS',
                'description' => json_encode(['id' => 'Visualisasi spasial gradien pH tanah.', 'en' => 'Spatial layout mapping to overlay crop fields.'])
            ],
            [
                'name' => json_encode(['id' => 'Grid Panel Surya Terintegrasi', 'en' => 'Agri-Voltaics Solar Grid']),
                'category' => 'Renewable Energy',
                'description' => json_encode(['id' => 'Sistem energi bersih ramah bayangan tanaman.', 'en' => 'Structural integration of solar modules with dynamic shadows.'])
            ],
        ];

        foreach ($technologies as $tech) {
            Technology::create($tech);
        }

        // 6. Products
        $products = [
            [
                'name' => json_encode([
                    'id' => 'HARDWARE IoT AgroPredic',
                    'en' => 'HARDWARE IoT AgroPredic'
                ]),
                'slug' => 'hardware-iot-agropredic',
                'description' => json_encode([
                    'id' => 'Hardware IoT AgroPredic merupakan perangkat pintar berbasis Internet of Things (IoT) yang dirancang untuk membantu petani melakukan pemantauan dan pengendalian lahan secara real-time.',
                    'en' => 'Hardware IoT AgroPredic is a smart Internet of Things device designed to help farmers perform real-time monitoring and control of agricultural lands.'
                ]),
                'features' => json_encode([
                    'id' => "Kompatibel penuh dengan Dashboard AgroNex Ecosystem v2.0+\nTransmisi aman terenkripsi AES-128 bit\nBersertifikat TKDN Kementerian Perindustrian (Proses)",
                    'en' => "Fully compatible with AgroNex Dashboard Ecosystem v2.0+\nAES-128 bit secure encrypted transmission\nMinistry of Industry TKDN Certified (In Process)"
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.12.jpeg',
                'detail_content' => json_encode([
                    'id' => 'Melalui koneksi internet dan dashboard AgroPredic, petani dapat memantau kondisi lahan dari mana saja menggunakan smartphone maupun komputer. Sistem juga mampu memberikan rekomendasi otomatis berdasarkan data yang dikumpulkan sehingga membantu petani mengambil keputusan yang lebih cepat dan tepat. Selain fungsi monitoring, Hardware IoT AgroPredic dapat diintegrasikan dengan berbagai perangkat aktuator seperti pompa air otomatis, sistem irigasi tetes, sprinkler, valve elektrik, kipas ventilasi, dan perangkat pertanian lainnya.',
                    'en' => 'Through internet connection and the AgroPredic dashboard, farmers can monitor land conditions from anywhere using a smartphone or computer. The system provides automated recommendations based on collected telemetry. It integrates with actuators like solar pumps and dynamic drip irrigations.'
                ]),
            ],
            [
                'name' => json_encode([
                    'id' => 'Platform AgroPredic',
                    'en' => 'AgroPredic Platform'
                ]),
                'slug' => 'agropredic-platform',
                'description' => json_encode([
                    'id' => 'AgroPredic merupakan platform integrator rantai pasok hortikultura berbasis Artificial Intelligence (AI), Geographic Information System (GIS), dan Smart Agriculture yang dirancang untuk efisiensi, transparansi, dan keberlanjutan.',
                    'en' => 'AgroPredic is a horticultural supply chain integrator platform powered by AI, GIS, and smart agriculture tools designed for transparency and sustainability.'
                ]),
                'features' => json_encode([
                    'id' => "Prediksi harga komoditas pangan berbasis AI\nIntegrasi API dengan TPID dan dinas pertanian regional\nAntarmuka dashboard responsif seluler",
                    'en' => "AI-powered commodity price prediction algorithms\nAPI integration with regional agriculture bodies\nMobile responsive dashboard layouts"
                ]),
                'image_path' => '/konten/Screenshot 2026-07-27 233232.png',
                'detail_content' => json_encode([
                    'id' => "Platform ini menyediakan sistem prediksi harga komoditas, pemetaan supply-demand, business matching antar pelaku rantai pasok, dashboard analitik, monitoring inflasi pangan, serta integrasi perangkat IoT untuk pengumpulan data lapangan secara real-time.\n\nFitur Utama:\n• Prediksi Harga Berbasis AI\n• Dashboard Analitik Pemerintah & Koperasi\n• Pemetaan Spasial GIS\n• Sistem WhatsApp Gateway Terintegrasi",
                    'en' => "This cloud platform aggregates price predictive engines, GIS supply mapping directories, and farmer-to-buyer matching hubs.\n\nCore Systems:\n• AI Price Forecasting Modules\n• Government & Cooperative Analytics Boards\n• Spatial GIS Mapping layouts\n• WhatsApp Gateway Integration"
                ]),
            ]
        ];

        foreach ($products as $prod) {
            Product::create($prod);
        }

        // 7. Impact Stats
        $impacts = [
            ['value' => '4,200+', 'label' => json_encode(['id' => 'Petani Terbantu', 'en' => 'Farmers Reached']), 'icon' => 'users', 'order_num' => 1],
            ['value' => '120+', 'label' => json_encode(['id' => 'Kegiatan Komunitas', 'en' => 'Community Activities']), 'icon' => 'calendar', 'order_num' => 2],
            ['value' => '50+', 'label' => json_encode(['id' => 'Desa Dampingan', 'en' => 'Villages Assisted']), 'icon' => 'home', 'order_num' => 3],
            ['value' => '350 Ha', 'label' => json_encode(['id' => 'Lahan Dikelola', 'en' => 'Land Managed']), 'icon' => 'globe', 'order_num' => 4],
            ['value' => '28%', 'label' => json_encode(['id' => 'Efisiensi Irigasi', 'en' => 'Water Efficiency']), 'icon' => 'droplet', 'order_num' => 5],
        ];

        foreach ($impacts as $imp) {
            ImpactStat::create($imp);
        }

        // 8. ESG Metrics
        $esg = [
            [
                'category' => 'environmental', 
                'metric_name' => json_encode(['id' => 'Air Dihemat', 'en' => 'Water Saved']), 
                'value' => '1.2 Juta', 
                'unit' => 'Liter', 
                'description' => json_encode(['id' => 'Dihemat melalui otomatisasi irigasi tetes presisi.', 'en' => 'Saved through smart automated micro-drip irrigation patterns.'])
            ],
            [
                'category' => 'environmental', 
                'metric_name' => json_encode(['id' => 'Energi Terbarukan', 'en' => 'Renewable Energy']), 
                'value' => '45,000', 
                'unit' => 'kWh', 
                'description' => json_encode(['id' => 'Dihasilkan dari sistem agri-voltaic terintegrasi.', 'en' => 'Harvested via agri-voltaic frameworks powering community pumps.'])
            ],
            [
                'category' => 'social', 
                'metric_name' => json_encode(['id' => 'Petani Diberdayakan', 'en' => 'Farmers Empowered']), 
                'value' => '4,200+', 
                'unit' => 'Orang', 
                'description' => json_encode(['id' => 'Mendapatkan pelatihan teknologi pertanian digital.', 'en' => 'Integrated with tech training and global buyer direct matching.'])
            ],
            [
                'category' => 'governance', 
                'metric_name' => json_encode(['id' => 'Integritas Data Lahan', 'en' => 'Data Integrity Rate']), 
                'value' => '100', 
                'unit' => '%', 
                'description' => json_encode(['id' => 'Data log sensor terenkripsi penuh.', 'en' => 'Of soil and financial match records are fully encrypted.'])
            ],
        ];

        foreach ($esg as $metric) {
            EsgMetric::create($metric);
        }

        // 9. Field Stories
        $stories = [
            [
                'title' => json_encode([
                    'id' => 'Catatan dari Desa Cibodas: Bertahan di Bawah Kabut Gunung Gede',
                    'en' => 'Notes from Cibodas: Surviving Under the Fog of Mount Gede'
                ]),
                'slug' => 'catatan-dari-desa-cibodas',
                'village_name' => 'Desa Cibodas, West Java',
                'story' => json_encode([
                    'id' => "Bertani di pegunungan adalah tarian ketidakpastian. Selama beberapa dekade, kelompok tani menanam berdasarkan ingatan saja: 'jika kabut tebal jam 6 pagi, hujan turun tengah hari.' Namun pola iklim merusak ritme tersebut. Ketika kami tiba, pH tanah telah turun menjadi 4.8 karena penggunaan pupuk kimia berlebih.\n\nKami memasang sensor AgroIoT di ladang Pak Jajang. Melihat petani berusia 65 tahun melihat grafik nitrogen tanah di HP adalah momen emosional yang mengajarkan kami empati.",
                    'en' => "Farming in the mountains is a dance with unpredictability. For decades, the local collectives planted by pure memory: 'if the fog is thick by 6 AM, rain will fall by noon.' But climate patterns broke that rhythm. When we first arrived, the soil pH had degraded to 4.8 due to excessive chemical inputs.\n\nWe set up two AgroIoT solar pods in Pak Jajang's field. Watching a 65-year-old farmer view soil nitrogen readings on an entry-level smartphone was a powerful lesson."
                ]),
                'photo_path' => '/konten/fotoutama.JPG',
                'video_url' => 'https://www.instagram.com/reel/Da2Izw_pRz4/embed/',
                'validation_data' => json_encode([
                    'id' => 'pH tanah naik dari 4.8 ke 6.2 dengan aplikasi kompos bio-char terukur.',
                    'en' => 'Soil pH rose from 4.8 to 6.2 using calibrated bio-char compost additions based on real-time sensors.'
                ]),
                'observations' => json_encode([
                    'id' => 'Aliran air lokal tercemar limbah nitrogen berlebih sebelum proyek dijalankan.',
                    'en' => 'Local water channels were heavily loaded with excess nitrogen runoff prior to our deployment.'
                ]),
                'interview_quotes' => [
                    [
                        'author' => 'Pak Jajang, 65', 
                        'quote' => json_encode([
                            'id' => 'Dulu saya beri pupuk setiap hari senin. Sekarang saya hanya siram saat HP saya bilang tanah kering. Hemat banyak uang.',
                            'en' => 'I used to fertilize every Monday. Now I only water when my phone tells me the soil is dry. Saved lots of money.'
                        ])
                    ],
                ],
                'problems' => json_encode([
                    'id' => 'Penggunaan pupuk kimia berlebihan merusak kesuburan tanah alami.',
                    'en' => 'Excessive chemical fertilizer usage leading to acidic, compacted soil layers.'
                ]),
                'solutions' => json_encode([
                    'id' => 'Instalasi sensor IoT NPK real-time dipadukan dengan pupuk organik.',
                    'en' => 'Installed real-time NPK monitoring combined with localized organic bio-char conditioning.'
                ]),
                'lessons' => json_encode([
                    'id' => 'Teknologi harus sederhana. Jangan desain aplikasi rumit, gunakan visual kode warna.',
                    'en' => 'Bridging field experience requires high empathy. Don\'t design complex apps; focus on simple color codes.'
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Suara Air dari Sembalun: Mengakhiri Konflik Pompa Diesel',
                    'en' => 'Voice of Water from Sembalun: Ending Diesel Pump Conflicts'
                ]),
                'slug' => 'suara-air-dari-sembalun',
                'village_name' => 'Sembalun Valley, Lombok',
                'story' => json_encode([
                    'id' => "Air adalah emas di Sembalun. Selama kemarau, konflik sering pecah di stasiun pompa. Bahan bakar diesel generator langka dan mahal, memakan 40% biaya produksi.\n\nKami memasang pompa solar Agri-voltaic pertama. Pompa menyala otomatis berdasarkan sensor kelembapan tanah, mengurangi friksi sosial antartetangga.",
                    'en' => "Water is gold in Sembalun. During dry spells, conflicts often flared at pump stations. Diesel generator fuel was scarce and expensive, consuming 40% of the harvest value.\n\nWe installed our first Agri-voltaic Solar Pump. The pump triggers autonomously based on moisture logs."
                ]),
                'photo_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.19.jpeg',
                'video_url' => 'https://www.instagram.com/reel/DZ0Ij8ShNB2/embed/',
                'validation_data' => json_encode([
                    'id' => 'Nol konsumsi bahan bakar solar selama 6 bulan berturut-turut.',
                    'en' => 'Zero diesel consumption registered on the collective well over 6 consecutive months.'
                ]),
                'observations' => json_encode([
                    'id' => 'Aliran irigasi 22% lebih merata di bawah sistem tata kelola otomatis.',
                    'en' => 'Water flow rates are 22% more consistent under dynamic automated solar cycles.'
                ]),
                'interview_quotes' => [
                    [
                        'author' => 'Pak Wayan, Community Leader', 
                        'quote' => json_encode([
                            'id' => 'Sekarang tidak ada lagi yang bertengkar di malam hari karena rebutan solar pompa.',
                            'en' => 'Now there are no more fights in the middle of the night over fuel allocation.'
                        ])
                    ],
                ],
                'problems' => json_encode([
                    'id' => 'Biaya bahan bakar diesel tinggi dan memicu konflik alokasi air irigasi.',
                    'en' => 'High cost and heavy emissions from diesel pumps, leading to social friction.'
                ]),
                'solutions' => json_encode([
                    'id' => 'Pompa otomatis bertenaga surya terhubung sensor kelembapan.',
                    'en' => 'Solar-powered automated pumps connected to soil moisture feedback.'
                ]),
                'lessons' => json_encode([
                    'id' => 'Struktur tata kelola komunitas sama pentingnya dengan kecanggihan alat.',
                    'en' => 'Community governance structures are just as important as technology.'
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Validasi Kebutuhan Pengguna: Suara Ibu Karminah dari Kiaragoong',
                    'en' => 'User Need Validation: Voice of Ibu Karminah from Kiaragoong'
                ]),
                'slug' => 'validasi-kebutuhan-kiaragoong',
                'village_name' => 'Kp. Kiaragoong, Kabupaten Garut, Jawa Barat',
                'story' => json_encode([
                    'id' => "Dalam kegiatan validasi lapangan di Kp. Kiaragoong, Kabupaten Garut, tim AgroPredic berdiskusi dengan Ibu Karminah yang sehari-hari mengelola lahan padi dan sayuran. Beliau menyampaikan bahwa salah satu tantangan terbesar yang dihadapi petani adalah ketidakpastian harga hasil panen. Pada saat panen raya, harga sering turun drastis sehingga petani terpaksa menjual hasil panen dengan harga rendah karena membutuhkan dana cepat untuk membeli pupuk, benih, dan kebutuhan produksi berikutnya.\n\nMenurut Ibu Karminah, petani membutuhkan akses informasi yang lebih baik terkait harga pasar, perkiraan kondisi cuaca, serta peluang pemasaran hasil panen agar dapat mengambil keputusan yang lebih tepat. Masukan dari Ibu Karminah menjadi salah satu dasar penting dalam pengembangan AgroPredic.",
                    'en' => "During field validation in Kp. Kiaragoong, Garut, the AgroPredic team interviewed Ibu Karminah, a rice and vegetable grower. She explained that price instability at harvest peaks forces farmers to sell cheap to secure immediate funds for fertilizers and seeds. Masukan from Ibu Karminah helps AgroPredic tailor its features."
                ]),
                'photo_path' => '/konten/fotogarut.png',
                'video_url' => '',
                'validation_data' => json_encode([
                    'id' => 'Masukan diserap ke dalam dashboard harga komoditas dan model bisnis business matching AgroPredic.',
                    'en' => 'Validation input integrated into AgroPredict commodity dashboard and logistics business models.'
                ]),
                'observations' => json_encode([
                    'id' => 'Petani terpaksa melepas harga panen karena modal input produksi mendesak.',
                    'en' => 'Farmers forced to accept low prices due to urgent seasonal cash requirements.'
                ]),
                'interview_quotes' => [
                    [
                        'author' => 'Ibu Karminah, Petani Padi dan Sayuran', 
                        'quote' => json_encode([
                            'id' => 'Kadang hasil panen harus dijual murah karena kebutuhan pupuk dan biaya produksi tidak bisa menunggu harga membaik.',
                            'en' => 'Sometimes harvests must be sold cheaply because fertilizer costs and production dues cannot wait for prices to recover.'
                        ])
                    ]
                ],
                'problems' => json_encode([
                    'id' => 'Ketidakpastian harga pasca panen raya dan perubahan iklim mikro.',
                    'en' => 'Uncertain market prices at harvest periods and changing micro-climate patterns.'
                ]),
                'solutions' => json_encode([
                    'id' => 'Penyediaan data prediksi harga dan rantai logistik AgroPredic.',
                    'en' => 'Provision of market price prediction graphs and direct logistics route planning.'
                ]),
                'lessons' => json_encode([
                    'id' => 'Aplikasi harus mendukung integrasi WhatsApp agar petani non-smartphone friendly tetap terhubung.',
                    'en' => 'Applications must support simple WhatsApp integration for farmers without high-end smartphones.'
                ])
            ]
        ];

        foreach ($stories as $story) {
            $story['views_count'] = rand(120, 600);
            FieldStory::create($story);
        }

        // 10. Activities
        $activities = [
            [
                'title' => json_encode([
                    'id' => 'Uji Konsep dan Presentasi Solusi AgroPredic',
                    'en' => 'Concept Testing & Presentation of AgroPredict Solutions'
                ]),
                'category' => 'Field Testing',
                'activity_date' => '2026-06-22',
                'location' => 'Tasikmalaya, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Tim mempresentasikan konsep AgroPredic kepada petani, pedagang, dan pemangku kepentingan terkait. Masukan yang diperoleh digunakan untuk menyempurnakan fitur prediksi harga, business matching, dan optimasi distribusi logistik.',
                    'en' => 'The team presented the AgroPredict core concepts to local farmers, traders, and key stakeholders. Feedback was used to refine the pricing predictions, business matching, and logistics distribution options.'
                ]),
                'photo_path' => 'https://images.unsplash.com/photo-1589923188900-85dae440342b?auto=format&fit=crop&w=800&q=80',
                'video_url' => '',
                'tags' => 'Uji Konsep, Presentasi, AgroPredic, Logistik'
            ],
            [
                'title' => json_encode([
                    'id' => 'Pengembangan dan Demonstrasi Hardware IoT AgroPredic',
                    'en' => 'Development & Live Demo of AgroPredict IoT Hardware'
                ]),
                'category' => 'Field Testing',
                'activity_date' => '2026-06-22',
                'location' => 'Ciamis, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Tim berhasil mengembangkan dan mendemonstrasikan prototipe Hardware IoT AgroPredic yang mampu memantau kondisi lahan secara real-time. Perangkat dirancang untuk terintegrasi dengan sensor pertanian, sistem irigasi, dan pompa otomatis guna mendukung penerapan smart farming berbasis data.',
                    'en' => 'The team successfully developed and demonstrated a prototype of the AgroPredict IoT Hardware, capable of real-time soil and land monitoring. It integrates agricultural sensors, drip irrigation, and solar pumps to enable data-backed smart farming.'
                ]),
                'photo_path' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=800&q=80',
                'video_url' => '/video/Recording 2026-07-26 225857.mp4',
                'tags' => 'Hardware, IoT, Demo, Smart Farming'
            ],
            [
                'title' => json_encode([
                    'id' => 'Validasi Kebutuhan Koperasi dan Gapoktan',
                    'en' => 'Validating Cooperative and Farmer Association Needs'
                ]),
                'category' => 'Research',
                'activity_date' => '2026-05-18',
                'location' => 'Ciamis, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Dilakukan diskusi bersama pengurus koperasi tani dan Gapoktan untuk memvalidasi kebutuhan digitalisasi pencatatan stok, pelaporan masa tanam, serta peluang implementasi sistem matching antara petani dan pembeli.',
                    'en' => 'Conducted Focus Group Discussions with farmer cooperatives and local associations (Gapoktan) to validate requirements for digitized inventory tracking, crop timelines logging, and farmer-to-buyer matching.'
                ]),
                'photo_path' => 'https://images.unsplash.com/photo-1593113598332-cd288d649433?auto=format&fit=crop&w=800&q=80',
                'video_url' => '',
                'tags' => 'Research, Koperasi, Gapoktan, Validasi'
            ],
            [
                'title' => json_encode([
                    'id' => 'Validasi Solusi Smart Farming dan IoT',
                    'en' => 'Smart Farming & IoT Solution Validation'
                ]),
                'category' => 'Research',
                'activity_date' => '2026-05-10',
                'location' => 'Desa Mekarmukti, Pangalengan, Kabupaten Bandung, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Tim AgroPredic melakukan diskusi dan demonstrasi konsep Smart Farming berbasis IoT kepada petani setempat. Validasi berfokus pada kebutuhan monitoring kondisi lahan secara real-time, otomatisasi irigasi, integrasi pompa air, serta pemanfaatan data untuk meningkatkan produktivitas dan efisiensi budidaya pertanian.',
                    'en' => 'The AgroPredict team demonstrated smart farming concept nodes to local growers in Mekarmukti. Validation focused on soil logs telemetry, drip timers, pump controls, and data utilization to raise efficiency.'
                ]),
                'photo_path' => 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=800&q=80',
                'video_url' => '',
                'tags' => 'Research, Smart Farming, IoT, Pangalengan'
            ],
            [
                'title' => json_encode([
                    'id' => 'Validasi Permasalahan Petani Hortikultura',
                    'en' => 'Problem Validation for Horticultural Farmers'
                ]),
                'category' => 'Research',
                'activity_date' => '2026-05-08',
                'location' => 'Sindangkasih, Ciamis, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Tim AgroPredic melakukan wawancara dan observasi langsung bersama petani hortikultura untuk mengidentifikasi tantangan utama dalam pemasaran hasil panen, akses informasi harga, serta kendala distribusi komoditas dari lahan ke pasar.',
                    'en' => 'The team conducted interviews and direct observations with local growers to map marketing difficulties, pricing data gaps, and logistics bottlenecks between farm gates and markets.'
                ]),
                'photo_path' => 'https://images.unsplash.com/photo-1599599810769-bcde5a160d32?auto=format&fit=crop&w=800&q=80',
                'video_url' => '',
                'tags' => 'Research, Wawancara, Petani, Hortikultura'
            ],
            [
                'title' => json_encode([
                    'id' => 'Wawancara Pedagang Pasar Tradisional',
                    'en' => 'Traditional Market Merchant Interviews'
                ]),
                'category' => 'Research',
                'activity_date' => '2026-05-07',
                'location' => 'Pasar Cikurubuk, Tasikmalaya',
                'description' => json_encode([
                    'id' => 'Tim AgroPredic berdiskusi dengan pedagang pasar untuk menggali kebutuhan informasi pasokan, transparansi harga, serta kendala memperoleh komoditas berkualitas dengan harga yang stabil dari daerah produksi.',
                    'en' => 'Interviews at Cikurubuk Traditional Market to assess vendor supply consistency needs, wholesale price transparency, and constraints in sourcing quality produce.'
                ]),
                'photo_path' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=800&q=80',
                'video_url' => '',
                'tags' => 'Research, Pasar, Pedagang, Wawancara'
            ],
            [
                'title' => json_encode([
                    'id' => 'Survei Rantai Pasok dan Distribusi Komoditas',
                    'en' => 'Supply Chain Survey & Commodity Distribution Mapping'
                ]),
                'category' => 'Research',
                'activity_date' => '2026-05-05',
                'location' => 'Tasikmalaya, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Tim melakukan pemetaan alur distribusi komoditas hortikultura dari petani hingga pedagang pasar. Kegiatan ini bertujuan memahami hambatan logistik, biaya distribusi, serta faktor yang menyebabkan ketidakstabilan harga pangan.',
                    'en' => 'The team mapped supply chains of horticultural commodities from farm gate to market vendors. Designed to identify distribution overheads and price fluctuations.'
                ]),
                'photo_path' => 'https://images.unsplash.com/photo-1578575437130-527eed3abbec?auto=format&fit=crop&w=800&q=80',
                'video_url' => '',
                'tags' => 'Research, Rantai Pasok, Logistik'
            ],
            [
                'title' => json_encode([
                    'id' => 'Validasi Rantai Pasok Pertanian Desa Karyamukti',
                    'en' => 'Agricultural Supply Chain Validation in Karyamukti Village'
                ]),
                'category' => 'Research',
                'activity_date' => '2026-05-05',
                'location' => 'Desa Karyamukti, Kabupaten Garut, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Kegiatan validasi dilakukan bersama kelompok tani dan pelaku distribusi lokal untuk memetakan alur rantai pasok komoditas pertanian. Tim mengidentifikasi tantangan terkait keterbatasan akses pasar, fluktuasi harga, serta minimnya data produksi yang dapat digunakan sebagai dasar pengambilan keputusan.',
                    'en' => 'Conducted validation with farmer groups and local logistics operators to map supply chains, highlighting access constraints and production data gaps.'
                ]),
                'photo_path' => 'https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=800&q=80',
                'video_url' => '',
                'tags' => 'Research, Garut, Rantai Pasok, Validasi'
            ],
            [
                'title' => json_encode([
                    'id' => 'Validasi Kebutuhan Petani Hortikultura Kiaragoong',
                    'en' => 'Horticultural Farmer Needs Validation in Kiaragoong'
                ]),
                'category' => 'Research',
                'activity_date' => '2026-05-01',
                'location' => 'Kp. Kiaragoong, Kabupaten Garut, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Tim AgroPredic melakukan observasi dan wawancara langsung dengan petani hortikultura di Kp. Kiaragoong untuk memahami kebutuhan digitalisasi pencatatan budidaya, akses informasi harga pasar, serta tantangan distribusi hasil panen ke pasar dan offtaker. Hasil validasi menunjukkan tingginya kebutuhan akan sistem informasi yang mudah digunakan dan mampu memberikan kepastian pasar.',
                    'en' => 'Conducted field interviews at Kp. Kiaragoong to understand needs for digital cultivation records, market rates access, and distribution channels. The study revealed heavy demand for farmer-friendly dashboards.'
                ]),
                'photo_path' => 'https://images.unsplash.com/photo-1557234195-bd9f290f6e4d?auto=format&fit=crop&w=800&q=80',
                'video_url' => '',
                'tags' => 'Research, Garut, Kiaragoong, Kebutuhan'
            ],
            [
                'title' => json_encode([
                    'id' => 'Pengembangan Hardware IoT sebagai Inisiatif Pendukung',
                    'en' => 'Supporting Initiative: IoT Hardware Prototyping'
                ]),
                'category' => 'Development',
                'activity_date' => '2026-04-27',
                'location' => 'Bandung, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Sebagai hasil dari berbagai kegiatan validasi lapangan bersama petani dan kelompok tani di Ciamis, Garut, dan Bandung, tim AgroPredic menginisiasi pengembangan prototipe Hardware IoT sebagai solusi pendukung ekosistem platform. Inisiatif ini lahir dari kebutuhan petani akan data kondisi lahan yang lebih akurat dan real-time untuk mendukung pengambilan keputusan budidaya. Perangkat yang dikembangkan dirancang untuk melakukan monitoring parameter lingkungan pertanian seperti kelembapan tanah, suhu, dan kondisi cuaca, serta memiliki potensi integrasi dengan sistem irigasi dan pompa otomatis. Meskipun belum menjadi bagian utama dari MVP AgroPredic, pengembangan hardware ini menjadi langkah strategis untuk memperluas kapabilitas platform menuju implementasi Smart Farming berbasis data dan Internet of Things (IoT) di masa mendatang.',
                    'en' => 'Responding to field validation in Ciamis, Garut, and Bandung, the team initiated an IoT Hardware prototype. Designed to track moisture, temperature, and climate variables, this layout enables data-backed farming workflows in future platform versions.'
                ]),
                'photo_path' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=800&q=80',
                'video_url' => '',
                'tags' => 'Development, Hardware, IoT, Prototipe'
            ],
            [
                'title' => json_encode([
                    'id' => 'Pembuatan Sistem Demo AgroPredic',
                    'en' => 'AgroPredict Interactive Demo Release'
                ]),
                'category' => 'Development',
                'activity_date' => '2026-04-27',
                'location' => 'Bandung, Jawa Barat',
                'description' => json_encode([
                    'id' => 'Tim AgroPredic berhasil menyelesaikan pengembangan sistem demo (prototype) sebagai representasi awal platform integrator rantai pasok hortikultura berbasis AI. Demo ini mencakup fitur dashboard pemantauan harga pangan, visualisasi data spasial, business matching antara petani dan pembeli, simulasi prediksi harga komoditas, serta integrasi awal perangkat IoT untuk monitoring kondisi lahan. Pengembangan demo dilakukan sebagai sarana validasi konsep, pengujian pengalaman pengguna, dan persiapan presentasi kepada mitra, investor, serta penyelenggara kompetisi inovasi.',
                    'en' => 'The team completed the first AgroPredict prototype. This release features commodity price predictive dashboards, spatial overlays, business matching channels, and early telemetry integrations.'
                ]),
                'photo_path' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80',
                'video_url' => '',
                'tags' => 'Development, Prototype, Demo, AI'
            ]
        ];

        foreach ($activities as $act) {
            Activity::create($act);
        }

        // 11. Gallery Items
        $gallery = [
            [
                'title' => json_encode(['id' => 'Pemindaian Udara Drone DJI untuk Lahan Hortikultura', 'en' => 'DJI Drone Aerial Scan of Horticultural Farm']),
                'type' => 'drone',
                'category' => 'yield',
                'media_path' => '/galeri/DJI_20260527103830_0482_D.JPG'
            ],
            [
                'title' => json_encode(['id' => 'Analisis Tutupan Hijau Kebun Kentang Garut', 'en' => 'Green Cover Analysis on Garut Potato Farms']),
                'type' => 'drone',
                'category' => 'yield',
                'media_path' => '/galeri/DJI_20260527103906_0489_D.JPG'
            ],
            [
                'title' => json_encode(['id' => 'Pemetaan Kontur Lahan Lereng Pegunungan', 'en' => 'Slope Mountain Contour Mapping']),
                'type' => 'drone',
                'category' => 'technology',
                'media_path' => '/galeri/DJI_20260527103946_0490_D.JPG'
            ],
            [
                'title' => json_encode(['id' => 'Uji Coba Lapangan Pod Sensor v2.1', 'en' => 'Field Testing of Sensor Pod v2.1']),
                'type' => 'photo',
                'category' => 'technology',
                'media_path' => '/galeri/WhatsApp Image 2026-07-24 at 22.18.53 (1).jpeg'
            ],
            [
                'title' => json_encode(['id' => 'Kalibrasi Sensor NPK Tanah', 'en' => 'NPK Soil Sensor Calibration']),
                'type' => 'photo',
                'category' => 'calibration',
                'media_path' => '/galeri/WhatsApp Image 2026-07-24 at 22.18.53.jpeg'
            ],
            [
                'title' => json_encode(['id' => 'Kunjungan Lapangan dan Edukasi Petani', 'en' => 'Field Visit & Farmer Group Education']),
                'type' => 'photo',
                'category' => 'community',
                'media_path' => '/galeri/WhatsApp Image 2026-07-24 at 22.17.34.jpeg'
            ],
            [
                'title' => json_encode(['id' => 'Penyusunan Perangkat IoT di Workshop', 'en' => 'Assembling IoT Devices in Workshop']),
                'type' => 'photo',
                'category' => 'technology',
                'media_path' => '/galeri/WhatsApp Image 2026-07-24 at 22.18.53 (2).jpeg'
            ],
            [
                'title' => json_encode(['id' => 'FGD Bersama Gapoktan Garut', 'en' => 'Focus Group Discussion with Garut Cooperatives']),
                'type' => 'photo',
                'category' => 'community',
                'media_path' => '/galeri/WhatsApp Image 2026-07-24 at 22.17.33.jpeg'
            ],
            [
                'title' => json_encode(['id' => 'Demonstrasi Aplikasi AgroPredic di Lahan Padi', 'en' => 'AgroPredict Live Demonstration in Rice Fields']),
                'type' => 'video',
                'category' => 'technology',
                'media_path' => '/galeri/IMG_5392.MOV'
            ],
            [
                'title' => json_encode(['id' => 'Analisis Perbandingan pH Tanah Sebelum & Sesudah Treatment', 'en' => 'pH Comparison Before & After Treatment']),
                'type' => 'before_after',
                'category' => 'calibration',
                'media_path' => '/galeri/WhatsApp Image 2026-05-29 at 22.05.45.jpeg',
                'secondary_media_path' => '/galeri/WhatsApp Image 2026-05-29 at 22.05.44.jpeg'
            ],
        ];

        foreach ($gallery as $gal) {
            GalleryItem::create($gal);
        }

        // 12. HAKI
        $haki = [
            ['title' => 'AgroIoT Smart Sensor Calibration Module', 'type' => 'Patent', 'registration_number' => 'IDS000003412', 'status' => 'Granted', 'registration_date' => '2025-04-10', 'document_path' => '/documents/haki_pat_3412.pdf'],
            ['title' => 'AgroAI Decision Intelligence Engine v2.1', 'type' => 'Copyright', 'registration_number' => 'EC00202612390', 'status' => 'Registered', 'registration_date' => '2026-01-15', 'document_path' => '/documents/haki_copy_12390.pdf'],
        ];

        foreach ($haki as $hk) {
            HakiItem::create($hk);
        }

        // 13. Partners
        $partners = [
            [
                'name' => 'YOTA Adiwidya Center',
                'logo_path' => 'https://siyota.org/image/logo.png',
                'type' => 'NGO',
                'collaboration_story' => json_encode([
                    'id' => 'Mitra resmi pengembangan kapasitas sosial petani, edukasi koperasi digital, dan organisasi wilayah binaan.',
                    'en' => 'Official partner for social capacity building, cooperative training, and local rural development plans.'
                ]),
                'goal' => 'Enable cooperative-level financial literacy.',
                'program' => 'Digital Rural Leaders Initiative.',
                'results' => 'Empowered 450+ youth field trainers.',
                'impact' => '100% community maintenance retention rate.'
            ],
            [
                'name' => 'Yota Inovasi Nusantara',
                'logo_path' => 'https://yotainovasi.id/yin.png',
                'type' => 'Startup',
                'collaboration_story' => json_encode([
                    'id' => 'Mitra pengembangan riset teknologi elektronika nirkabel, sensor presisi, dan server komputasi awan.',
                    'en' => 'Parent technology research partner facilitating edge computing and hardware supply chains.'
                ]),
                'goal' => 'Establish hardware supply chain systems.',
                'program' => 'Edge Agri-intelligence Research.',
                'results' => 'Designed low-power solar node layouts.',
                'impact' => 'Enabled 3-year autonomous life cycle on IoT nodes.'
            ]
        ];

        foreach ($partners as $part) {
            Partner::create($part);
        }

        // 14. Team Members
        $team = [
            [
                'name' => 'Tri Febriansah',
                'role' => json_encode([
                    'id' => 'Team Lead & Full-Stack Developer',
                    'en' => 'Team Lead & Full-Stack Developer'
                ]),
                'category' => 'Leadership',
                'photo_path' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=400&q=80',
                'linkedin_url' => 'https://linkedin.com/in/trifebriansah',
                'email' => 'tri.febriansah@agropredict.siyota.org',
                'bio' => json_encode([
                    'id' => 'Tri Febriansah merupakan Team Lead sekaligus Full-Stack Developer yang bertanggung jawab atas keseluruhan pengembangan teknis AgroPredic. Ia memimpin proses perancangan arsitektur sistem, analisis kebutuhan pengguna, pengembangan frontend dan backend, integrasi fitur, hingga penyusunan prototipe dan demo aplikasi. Beliau merupakan Ketua Tim UIN Bandung, Finalis Generasi Berbakti 2026 BCA, Pemuda Pelopor Jawa Barat Inovasi Teknologi 2025.',
                    'en' => 'Tri Febriansah is the Team Lead and Full-Stack Developer responsible for the technical development of AgroPredict. He leads systems architecture, database schemas, frontend-backend pipelines, and hardware integration. He is the Team Leader from UIN Bandung, finalist of BCA Generasi Berbakti 2026, and Youth Pioneer of West Java in Tech Innovation 2025.'
                ]),
                'skills' => 'Leadership, Full-Stack Development, Laravel, PHP, JavaScript, MySQL, REST API, System Architecture, UI/UX Design, Product Development, Project Management',
                'contributions' => json_encode([
                    'id' => 'Berpartisipasi aktif dalam perancangan produk dan standarisasi riset komparatif di berbagai lokasi uji coba lapangan, serta secara konsisten melatih kelompok tani di berbagai daerah agar terbiasa mengadopsi platform kecerdasan buatan AgroPredic.',
                    'en' => 'Actively coordinates product research, comparative field studies, and systematically trains local farmers to adopt and handle AI platforms.'
                ]),
                'order_num' => 1
            ],
            [
                'name' => 'Ariyanti Yusup',
                'role' => json_encode([
                    'id' => 'Business & Field Validation Lead',
                    'en' => 'Business & Field Validation Lead'
                ]),
                'category' => 'Partnership & Business',
                'photo_path' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&q=80',
                'linkedin_url' => 'https://linkedin.com/in/ariyantiyusup',
                'email' => 'ariyanti.yusup@agropredict.siyota.org',
                'bio' => json_encode([
                    'id' => 'Ariyanti Yusup berperan sebagai Business & Field Validation Lead yang bertanggung jawab pada aspek bisnis dan validasi lapangan AgroPredic. Tugasnya meliputi identifikasi kebutuhan pengguna, pengumpulan serta analisis data lapangan, validasi permasalahan dan solusi, evaluasi kelayakan implementasi, hingga penyusunan model bisnis dan strategi pengembangan.',
                    'en' => 'Ariyanti Yusup acts as the Business & Field Validation Lead responsible for corporate partnerships and market validation. Her duties encompass stakeholder surveys, user needs assessment, social impact reports, and financial feasibility planning.'
                ]),
                'skills' => 'Business Analysis, Market Validation, Field Research, Data Analysis, Business Strategy, Social Impact Assessment, Stakeholder Engagement, Project Planning, Innovation Management, Public Communication',
                'contributions' => json_encode([
                    'id' => 'Berpartisipasi aktif dalam perancangan produk dan standarisasi riset komparatif di berbagai lokasi uji coba lapangan, serta secara konsisten melatih kelompok tani di berbagai daerah agar terbiasa mengadopsi platform kecerdasan buatan AgroPredic.',
                    'en' => 'Engages in product requirement validations, farmer association focus groups, and coordinates logistics modeling.'
                ]),
                'order_num' => 2
            ]
        ];

        foreach ($team as $tm) {
            TeamMember::create($tm);
        }

        // 15. Careers
        $careers = [
            [
                'title' => json_encode(['id' => 'Insinyur Sistem Tertanam', 'en' => 'Embedded Systems Engineer']), 
                'department' => 'Open Position', 
                'location' => 'Bandung / Hybrid', 
                'description' => json_encode([
                    'id' => 'Membangun dan mengoptimalkan firmware telemetri konsumsi daya rendah untuk perangkat solar node IoT.',
                    'en' => 'We are seeking an engineer to build and optimize low-power firmware setups for our LoRaWAN IoT pods.'
                ]), 
                'requirements' => "Strong experience with C/C++ on STM32 or ESP32 platforms\nGit and clean code practices"
            ],
        ];

        foreach ($careers as $car) {
            Career::create($car);
        }

        // 16. Newsroom Items
        $newsroom = [
            [
                'title' => json_encode([
                    'id' => 'AgroPredic Meraih Penghargaan Dampak Sosial BCA 2026',
                    'en' => 'AgroPredict Secures BCA Social Impact Award 2026'
                ]), 
                'category' => 'Award', 
                'content' => json_encode([
                    'id' => 'Dikenal atas dedikasi membangun ketahanan rantai pasok hortikultura pedesaan Indonesia.',
                    'en' => 'Recognized for pioneering agricultural digital resilience across Indonesian rural zones.'
                ]), 
                'link_url' => '#', 
                'publish_date' => '2026-06-15', 
                'source' => 'Asia Impact Review'
            ],
        ];

        foreach ($newsroom as $news) {
            $news['views_count'] = rand(80, 500);
            NewsroomItem::create($news);
        }

        // 17. Knowledge Items
        $knowledge = [
            [
                'title' => json_encode([
                    'id' => 'Mengapa Kami Membangun AgroPredic: Berawal dari Sawah, Berakhir pada Misi Transformasi Pertanian Berbasis Data',
                    'en' => 'Why We Built AgroPredict: From Paddy Fields to Data-Backed Agricultural Transformation'
                ]),
                'slug' => 'mengapa-kami-membangun-agropredic',
                'category' => 'Smart Farming',
                'content' => json_encode([
                    'id' => "Bagi sebagian orang, pertanian mungkin hanya dipandang sebagai sektor ekonomi. Namun bagi kami, pertanian adalah kehidupan. Kami lahir dan tumbuh di lingkungan keluarga petani. Dari sektor pertanian inilah keluarga kami memperoleh penghidupan, membiayai pendidikan, dan memberikan kesempatan bagi kami untuk terus belajar hingga mampu mengembangkan inovasi yang kami bangun hari ini.\n\nSejak kecil, kami menyaksikan bagaimana petani bekerja tanpa mengenal waktu. Mereka menjadi pihak yang memastikan kebutuhan pangan masyarakat tetap terpenuhi setiap hari. Namun di balik peran penting tersebut, petani justru menjadi kelompok yang paling sering menghadapi ketidakpastian.\n\nDalam berbagai kegiatan validasi lapangan yang kami lakukan di Kabupaten Garut, Kabupaten Bandung, Ciamis, dan wilayah lainnya di Jawa Barat, kami mendengar berbagai permasalahan yang hampir selalu sama. Harga hasil panen yang tidak stabil, cuaca yang semakin sulit diprediksi, keterbatasan akses informasi pasar, hingga kesulitan menentukan waktu tanam yang tepat menjadi tantangan yang terus dihadapi petani.\n\nSalah satu kisah yang paling membekas datang dari Ibu Karminah, seorang petani padi dan sayuran di Kampung Kiaragoong, Kabupaten Garut. Beliau menceritakan bagaimana petani sering kali terpaksa menjual hasil panen dengan harga rendah karena kebutuhan modal untuk membeli pupuk dan biaya produksi berikutnya tidak dapat ditunda. Dalam kondisi seperti ini, petani tidak memiliki cukup informasi untuk menentukan waktu terbaik menjual hasil panen atau mengakses pasar yang lebih menguntungkan.\n\nPermasalahan tersebut menunjukkan bahwa tantangan pertanian saat ini bukan hanya berada pada proses budidaya, tetapi juga pada kurangnya akses terhadap informasi yang dapat mendukung pengambilan keputusan.\n\nAtas dasar itulah AgroPredic lahir.\n\nAgroPredic merupakan platform digital yang dikembangkan untuk membantu petani, kelompok tani, koperasi, distributor, dan pemangku kepentingan lainnya dalam mengambil keputusan berbasis data. Melalui pemanfaatan Artificial Intelligence (AI), analitik data, dan teknologi digital, AgroPredic dirancang untuk memberikan wawasan yang lebih akurat terkait kondisi pertanian dan rantai pasok pangan.\n\nVisi utama AgroPredic adalah membantu menciptakan ekosistem pertanian yang lebih efisien, adaptif, dan berkelanjutan. Kami percaya bahwa teknologi seharusnya tidak hanya menjadi alat digital, tetapi juga menjadi pendamping bagi petani dalam menghadapi berbagai tantangan di lapangan.\n\nNamun selama proses riset dan validasi lapangan, kami menyadari bahwa kebutuhan petani tidak berhenti pada informasi pasar dan prediksi saja.\n\nPetani juga membutuhkan data kondisi lahan yang lebih akurat dan real-time. Oleh karena itu, AgroPredic mulai menginisiasi pengembangan perangkat keras (hardware) berbasis Internet of Things (IoT) sebagai solusi pendukung. Inisiatif ini memungkinkan pengumpulan data lapangan secara langsung melalui sensor yang terhubung dengan platform digital AgroPredic.\n\nDengan kombinasi AI, IoT, analitik data, dan sistem prediktif, AgroPredic diharapkan mampu membantu petani memahami kondisi lahan, mengelola risiko budidaya, serta meningkatkan kualitas pengambilan keputusan sejak awal proses tanam hingga panen.\n\nBagi kami, masa depan pertanian tidak hanya tentang meningkatkan hasil produksi. Masa depan pertanian adalah tentang membangun ekosistem yang mampu mendampingi petani dari proses budidaya hingga pemasaran, dari lahan hingga pasar, dengan dukungan data yang akurat dan teknologi yang mudah diakses.\n\nAgroPredic bukan sekadar platform teknologi pertanian. AgroPredic adalah hasil dari pengalaman hidup, proses validasi lapangan, dan keyakinan bahwa teknologi harus hadir untuk menyelesaikan masalah nyata yang dihadapi petani setiap hari.\n\nKarena pada akhirnya, ketika petani memiliki akses terhadap informasi yang lebih baik dan mampu mengambil keputusan yang lebih tepat, maka produktivitas pertanian akan meningkat, kesejahteraan petani akan tumbuh, dan ketahanan pangan bangsa akan menjadi lebih kuat.",
                    'en' => "For some, agriculture may only be seen as an economic sector. But for us, agriculture is life. We were born and raised in farming families. It is from this agricultural sector that our families earned a living, financed our education, and gave us the opportunity to continue learning until we were able to develop the innovations we build today.\n\nSince childhood, we have watched farmers work tirelessly. They ensure the community's food needs are met every day. Yet, behind this crucial role, farmers are the ones who most often face uncertainty.\n\nIn various field validations in Garut, Bandung, Ciamis, and other regions in West Java, we heard similar challenges: unstable harvest prices, unpredictable weather, limited market info, and difficulties timing crops.\n\nOne story that stood out was from Ibu Karminah in Kiaragoong, Garut. She explained how farmers are forced to sell cheap to secure input funds. They lack insights to time sales or access profitable channels.\n\nThis shows that current agricultural challenges are not just about cultivation, but also about data access gaps for decision making.\n\nThat is why AgroPredict was born.\n\nAgroPredict is a digital platform developed to help farmers, cooperatives, distributors, and stakeholders make data-driven decisions. Powered by AI and data analytics, it provides accurate insights on farming conditions and food supply chains.\n\nOur vision is a more efficient, adaptive, and sustainable agricultural ecosystem. We believe technology should not just be a digital tool, but a companion for farmers in the field.\n\nDuring research, we realized farmers need real-time, accurate soil metrics. Hence, we initiated supporting IoT hardware development. This allows collecting direct field logs through connected sensors.\n\nWith AI, IoT, analytics, and predictive systems, AgroPredict helps farmers understand soil conditions, manage cultivation risks, and improve decisions from planting to harvest.\n\nFor us, the future of agriculture is not just about raising yields. It is about building an ecosystem that supports farmers from seed to market, powered by accessible tech.\n\nAgroPredict is not just a technology platform. It is the result of life experience, field validations, and the belief that technology must solve real problems.\n\nIn the end, when farmers have access to better data and make smarter decisions, productivity rises, livelihoods grow, and food security is strengthened."
                ]),
                'file_path' => '#',
                'author' => 'Tri Febriansah',
                'published_at' => '2026-06-02'
            ],
            [
                'title' => json_encode([
                    'id' => 'Belajar dari Pangalengan: Ketika Tantangan Pertanian Tidak Hanya Tentang Menanam',
                    'en' => 'Learning from Pangalengan: When Agricultural Challenges Go Beyond Planting'
                ]),
                'slug' => 'belajar-dari-pangalengan',
                'category' => 'Sustainability',
                'content' => json_encode([
                    'id' => "Dalam proses pengembangan AgroPredic, kami meyakini bahwa solusi yang baik harus dibangun berdasarkan kebutuhan nyata di lapangan. Karena itu, tim melakukan berbagai kegiatan observasi dan validasi bersama petani di sejumlah wilayah Jawa Barat, termasuk kawasan pertanian Pangalengan yang dikenal sebagai salah satu sentra produksi hortikultura.\n\nKunjungan ini memberikan banyak pelajaran mengenai kompleksitas tantangan yang dihadapi petani setiap hari. Kami menemukan bahwa permasalahan pertanian tidak hanya berkaitan dengan bagaimana menanam tanaman yang baik, tetapi juga mencakup berbagai faktor lain yang saling terhubung dalam satu ekosistem yang kompleks.\n\nSalah satu isu yang paling sering disampaikan adalah ketidakpastian harga hasil panen. Banyak petani yang tidak memiliki akses terhadap informasi pasar yang memadai sehingga sulit menentukan waktu terbaik untuk menjual hasil produksi mereka. Dalam banyak kasus, petani hanya menerima harga yang ditawarkan oleh pembeli atau pengepul tanpa mengetahui kondisi pasar yang lebih luas.\n\nKondisi tersebut menyebabkan posisi tawar petani menjadi lemah. Ketika harga turun atau permintaan berkurang, petani sering kali tidak memiliki alternatif pasar yang dapat dijangkau dengan mudah. Akibatnya, hasil panen dijual dengan harga yang kurang menguntungkan meskipun biaya produksi terus meningkat.\n\nSelain persoalan harga dan distribusi, kami juga menemukan tantangan besar pada aspek pengelolaan lahan. Banyak petani yang belum memiliki akses terhadap informasi mengenai kondisi aktual tanah yang mereka kelola. Penurunan produktivitas lahan sering kali terjadi tanpa diketahui penyebabnya secara pasti, sehingga keputusan budidaya masih banyak didasarkan pada pengalaman dan kebiasaan turun-temurun.\n\nPadahal sebelum menentukan jenis pupuk, pola tanam, maupun strategi budidaya, petani memerlukan informasi yang lebih akurat mengenai kondisi tanah, kelembapan lahan, unsur hara, serta faktor lingkungan lainnya. Tanpa data tersebut, risiko kesalahan pengambilan keputusan menjadi lebih tinggi dan dapat berdampak pada hasil panen.\n\nPermasalahan ini menjadi semakin menantang bagi petani pemula yang belum memiliki pengalaman panjang dalam mengelola lahan. Banyak petani baru memiliki semangat untuk bertani, namun masih menghadapi keterbatasan akses terhadap informasi teknis, pendampingan, maupun teknologi yang dapat membantu mereka memahami kondisi lahan secara lebih baik.\n\nDi sisi lain, kami juga menemukan bahwa sebagian hasil pertanian yang sebenarnya masih layak konsumsi tidak selalu terserap pasar secara optimal. Ketika permintaan menurun atau distribusi terganggu, produk pertanian berisiko dijual dengan harga sangat rendah atau bahkan tidak terserap sekali.\n\nKondisi tersebut menunjukkan bahwa tantangan pertanian tidak dapat diselesaikan hanya dari satu sisi. Produktivitas lahan, kualitas budidaya, akses informasi, transparansi harga, distribusi, dan akses pasar merupakan bagian dari ekosistem yang saling berkaitan.\n\nMelalui berbagai temuan lapangan inilah AgroPredic dikembangkan. Kami ingin membangun platform yang membantu petani memperoleh informasi yang lebih baik, memahami kondisi lahannya secara lebih akurat, memperoleh wawasan berbasis data, serta memperluas akses terhadap pasar dan peluang usaha.\n\nSelain pengembangan platform digital berbasis Artificial Intelligence (AI), AgroPredic juga mulai menginisiasi pengembangan perangkat IoT sebagai solusi pendukung untuk membantu pengumpulan data lapangan secara real-time. Langkah ini diharapkan dapat membantu petani mengambil keputusan yang lebih tepat sejak proses budidaya hingga pascapanen.\n\nDari Pangalengan, kami belajar satu hal yang sangat penting. Petani tidak kekurangan semangat untuk bertani. Mereka memiliki pengalaman, ketekunan, dan kemauan untuk terus berkembang. Yang sering kali mereka butuhkan adalah akses terhadap informasi, teknologi, dan jaringan yang dapat membantu mereka menghadapi tantangan pertanian modern secara lebih efektif.\n\nKarena itu, AgroPredic hadir bukan hanya sebagai platform teknologi, tetapi sebagai upaya untuk membangun ekosistem pertanian yang lebih terhubung, lebih transparan, dan lebih berkelanjutan bagi seluruh pelaku sektor pertanian.",
                    'en' => "In developing AgroPredict, we believe that good solutions must be built on real needs in the field. Hence, the team conducted observations and validations with farmers across West Java, including Pangalengan, a key horticultural center.\n\nThis visit taught us about the complexity farmers face daily. We learned that challenges are not just about growing crops, but encompass many interconnected factors in a complex ecosystem.\n\nOne frequent issue is crop price volatility. Many farmers lack market info, making it hard to time sales. Most simply accept buyers' rates without knowing broader market trends.\n\nThis weakens their bargaining power. When prices drop or demand shrinks, they have no easy alternatives. Thus, crops are sold at low rates even as production costs rise.\n\nBeyond pricing and logistics, soil management is a huge challenge. Many lack soil data. Drops in soil yields happen without clear causes, relying on habit and legacy practices.\n\nBefore selecting inputs or crop sequences, farmers need soil, moisture, and element metrics. Without data, decision risks are higher, affecting yields.\n\nThis is particularly tough for new growers lacking experience. They have the passion but lack technical info, guidance, and tools to evaluate their soil.\n\nAdditionally, viable surplus produce is not always sold. When demand slides, produce goes cheap or to waste.\n\nThis indicates agricultural issues cannot be solved in isolation. Soil health, farming quality, data logs, transparency, and market channels are all connected.\n\nAgroPredict is built on these findings. We want a platform that gives farmers better info, maps soil parameters, and expands market access.\n\nAlongside AI software, we are designing IoT nodes as supporting modules to gather real-time logs. This guides farmers from seed to harvest.\n\nFrom Pangalengan, we learned that farmers have the passion, grit, and will to grow. They just need data tools and networks to tackle modern farming challenges.\n\nHence, AgroPredict is a collaborative effort to build a connected, transparent, and sustainable ecosystem for all stakeholders."
                ]),
                'file_path' => '#',
                'author' => 'Tri Febriansah',
                'published_at' => '2026-06-02'
            ],
            [
                'title' => json_encode([
                    'id' => 'Belajar dari Garut: Ketika Regenerasi Petani dan Transparansi Pasar Menjadi Tantangan Bersama',
                    'en' => 'Learning from Garut: When Farmer Regeneration and Market Transparency Become a Shared Challenge'
                ]),
                'slug' => 'belajar-dari-garut',
                'category' => 'Sustainability',
                'content' => json_encode([
                    'id' => "Dalam proses pengembangan AgroPredic, kami terus berupaya memahami tantangan pertanian langsung dari sumbernya. Salah satu kegiatan validasi lapangan yang memberikan banyak pelajaran berharga dilakukan di Desa Sukaraya Mukti, Kecamatan Cibatu, Kabupaten Garut.\n\nBerbeda dengan beberapa lokasi sebelumnya yang lebih banyak menyoroti persoalan produktivitas lahan dan distribusi hasil panen, kunjungan di Garut membuka perspektif baru mengenai tantangan jangka panjang sektor pertanian, yaitu regenerasi petani dan masa depan desa pertanian.\n\nDalam diskusi bersama petani dan pemerintah desa, kami menemukan kekhawatiran yang hampir seragam. Semakin sedikit generasi muda yang tertarik untuk terjun ke sektor pertanian. Banyak anak muda menganggap pertanian sebagai pekerjaan yang berat, berisiko tinggi, dan kurang menjanjikan dibandingkan sektor pekerjaan lainnya.\n\nPadahal, keberlanjutan sektor pertanian sangat bergantung pada hadirnya generasi penerus yang mampu melanjutkan pengelolaan lahan, mengadopsi teknologi baru, dan membawa inovasi ke dalam aktivitas pertanian. Tanpa regenerasi yang baik, produktivitas dan ketahanan pangan di masa depan akan menghadapi tantangan yang semakin besar.\n\nSelain isu regenerasi petani, kami juga berdiskusi dengan pemerintah desa mengenai berbagai potensi pengembangan ekonomi lokal. Salah satu gagasan yang muncul adalah pengembangan kawasan berbasis ekowisata pertanian. Desa memiliki sumber daya alam yang menarik, aktivitas pertanian yang unik, serta budaya lokal yang berpotensi menjadi daya tarik wisata edukasi maupun wisata berbasis lingkungan.\n\nNamun seperti banyak desa lainnya, tantangan utama bukan terletak pada potensi, melainkan bagaimana mengelola dan mengembangkannya. Keterbatasan akses terhadap teknologi, pendampingan, jaringan pemasaran, serta model bisnis yang berkelanjutan masih menjadi hambatan yang perlu diatasi bersama.\n\nDalam sektor pertanian sendiri, permasalahan yang paling banyak disampaikan masih berkaitan dengan akses pasar dan transparansi harga. Sebagian besar petani masih mengandalkan jalur pemasaran tradisional melalui pengepul atau pembeli tertentu yang sudah lama menjadi mitra mereka.\n\nKetergantungan terhadap sedikit pembeli membuat posisi tawar petani menjadi terbatas. Ketika harga turun atau permintaan melemah, petani sering kali tidak memiliki alternatif pasar lain yang dapat dijangkau dengan mudah.\n\nMinimnya akses terhadap informasi harga juga menjadi tantangan serius. Banyak petani tidak mengetahui harga komoditas yang berlaku di pasar yang lebih luas, baik di tingkat distributor, pasar induk, maupun daerah lain yang memiliki kebutuhan berbeda. Akibatnya, keputusan penjualan sering dilakukan tanpa dasar informasi yang memadai.\n\nDalam beberapa kasus, petani memilih menyimpan hasil panen dengan harapan harga akan meningkat. Namun strategi tersebut tidak selalu berhasil. Ketika masa penyimpanan terlalu lama, kualitas hasil panen dapat menurun sehingga nilai jual yang diterima petani justru semakin berkurang.\n\nSelain faktor pasar, petani juga menghadapi tantangan klasik yang hingga kini masih menjadi ancaman utama sektor pertanian, yaitu perubahan cuaca dan serangan hama. Pola musim yang semakin sulit diprediksi membuat proses budidaya menjadi lebih berisiko dibandingkan sebelumnya.\n\nKeputusan mengenai waktu tanam, pemupukan, hingga panen harus dilakukan di tengah kondisi lingkungan yang semakin dinamis. Ketika ketidakpastian cuaca bertemu dengan serangan hama yang datang secara tiba-tiba, risiko kerugian yang dihadapi petani menjadi semakin besar.\n\nDari Desa Sukaraya Mukti, kami belajar bahwa pertanian bukan hanya tentang menghasilkan pangan. Di balik setiap lahan yang ditanami terdapat tantangan regenerasi petani, pembangunan ekonomi desa, akses informasi, transparansi pasar, hingga peningkatan kesejahteraan masyarakat secara berkelanjutan.\n\nTemuan-temuan tersebut semakin menguatkan visi AgroPredic untuk membangun solusi yang tidak hanya berfokus pada satu aspek pertanian. Kami percaya bahwa transformasi pertanian membutuhkan pendekatan yang terintegrasi, mulai dari akses data, informasi pasar, analitik berbasis kecerdasan buatan, hingga pemanfaatan teknologi digital yang mudah digunakan oleh petani.\n\nMelalui AgroPredic, kami ingin membantu menciptakan ekosistem yang lebih transparan, lebih terhubung, dan lebih inklusif bagi seluruh pelaku pertanian. Kami percaya bahwa teknologi dapat menjadi jembatan yang memperkuat hubungan antara petani, pasar, pemerintah, dan generasi muda yang akan menjadi penerus sektor pertanian Indonesia.\n\nKarena pada akhirnya, masa depan pertanian tidak hanya ditentukan oleh kesuburan lahan, tetapi juga oleh kemampuan kita membangun ekosistem yang mampu memberdayakan petani, memperkuat desa, dan menarik generasi penerus untuk kembali melihat pertanian sebagai sektor yang penuh peluang dan masa depan.",
                    'en' => "In developing AgroPredict, we strive to understand farming challenges directly from the source. One field validation that offered valuable lessons was in Sukaraya Mukti Village, Cibatu, Garut.\n\nUnlike past visits that highlighted yield and logistics, Garut opened a new perspective on long-term agricultural sustainability: farmer regeneration and the future of rural communities.\n\nDiscussions with farmers and village heads revealed a shared concern: fewer youth are interested in agriculture. They see it as tedious, high-risk, and financially unrewarding.\n\nYet, agricultural continuity depends on youth to manage land, adopt technology, and introduce innovation. Without regeneration, future yields face severe threats.\n\nBeyond regeneration, we discussed ecotourism potential. The village has appealing natural resources, unique farms, and heritage that can support eco-educational tourism.\n\nBut as in many villages, the bottleneck is execution. Limited tech, mentorship, networks, and business models hinder sustainable growth.\n\nFor farms, the most pressing issues remain market access and price transparency. Most growers rely on local middle buyers they have worked with for years.\n\nThis dependency limits farmers' margins. When demand slides, they have no alternative buyers.\n\nPrice data gaps are also critical. Many are blind to target rates at wholesale or remote markets. Thus, selling decisions are based on guesswork.\n\nSome store crop surpluses hoping for rate recoveries, but this carries high spoilage risk.\n\nAdditionally, farmers struggle with shifting climates and pests. Unpredictable seasons make cultivation riskier, affecting planting and treatment schedules.\n\nFrom Sukaraya Mukti, we learned farming goes beyond food production. Behind each field lies challenges in regeneration, rural economies, market access, and community welfare.\n\nThese findings support AgroPredict's vision to build integrated solutions. We believe transformation requires combining data access, market transparency, AI analytics, and user-friendly software.\n\nThrough AgroPredict, we aim to build a connected, transparent, and inclusive ecosystem. We believe tech can bridge farmers, buyers, government, and the next generation of growers in Indonesia."
                ]),
                'file_path' => '#',
                'author' => 'Tri Febriansah',
                'published_at' => '2026-06-02'
            ],
            [
                'title' => json_encode([
                    'id' => 'Penerapan Jaringan Sensor Nirkabel IoT di Bawah Rimbun Lahan Kopi',
                    'en' => 'Decentralized IoT Networks under Dense Forest Canopies'
                ]), 
                'slug' => 'decentralized-iot-forest-canopies', 
                'category' => 'Journal', 
                'content' => json_encode([
                    'id' => 'Kajian teoritis dan kalibrasi gelombang radio LoRa 920MHz pada topografi perbukitan vulkanik terjal di Indonesia.',
                    'en' => 'A comprehensive review of LoRaWAN 920MHz path loss formulas in tropical volcanic topography, demonstrating real field diagnostic results.'
                ]), 
                'file_path' => '#', 
                'author' => 'Tri Febriansah', 
                'published_at' => '2025-11-12'
            ],
            [
                'title' => json_encode([
                    'id' => 'Model Bisnis Business Matching Rantai Pasok Hortikultura Berkeadilan',
                    'en' => 'Empowerment Frameworks: Digital Bridges for Smallholder Cooperatives'
                ]), 
                'slug' => 'empowerment-frameworks-smallholder-cooperatives', 
                'category' => 'Case Study', 
                'content' => json_encode([
                    'id' => 'Analisis komparatif perbandingan harga beli tengkulak dengan harga jual langsung korporat berbasis platform digital.',
                    'en' => 'Analyzing user interfaces designed specifically for farmers with low literacy levels, focusing on color codes and voice integrations.'
                ]), 
                'file_path' => '#', 
                'author' => 'Ariyanti Yusup', 
                'published_at' => '2026-05-19'
            ]
        ];

        foreach ($knowledge as $kn) {
            $kn['views_count'] = rand(80, 500);
            KnowledgeItem::create($kn);
        }

        // 18. Map Markers
        $markers = [
            [
                'title' => json_encode([
                    'id' => 'Stasiun Cuaca & pH Tanah Desa Cibodas',
                    'en' => 'Weather Station & Soil pH - Cibodas Village'
                ]),
                'marker_type' => 'IoT Node',
                'latitude' => '-6.7860',
                'longitude' => '107.0090',
                'details' => json_encode([
                    ['key_id' => 'Kelembapan Lahan', 'key_en' => 'Soil Moisture', 'value' => '42%'],
                    ['key_id' => 'Tingkat pH Tanah', 'key_en' => 'Soil pH Level', 'value' => '6.2'],
                    ['key_id' => 'Status Gateway LoRa', 'key_en' => 'LoRa Gateway Status', 'value' => 'Online']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Sistem Pompa Irigasi Solar Lembah Sembalun',
                    'en' => 'Solar Drip Irrigation Pump - Sembalun Valley'
                ]),
                'marker_type' => 'Solar Microgrid',
                'latitude' => '-8.3530',
                'longitude' => '116.5290',
                'details' => json_encode([
                    ['key_id' => 'Kapasitas Pompa', 'key_en' => 'Pump Capacity', 'value' => '15,000 L/Day'],
                    ['key_id' => 'Efisiensi Energi', 'key_en' => 'Energy Efficiency', 'value' => '98%'],
                    ['key_id' => 'Bahan Bakar Dihemat', 'key_en' => 'Fossil Fuel Saved', 'value' => '100%']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Kelompok Tani Dampingan Tasikmalaya',
                    'en' => 'Assisted Farmers Association - Tasikmalaya'
                ]),
                'marker_type' => 'Farmers Community',
                'latitude' => '-7.3500',
                'longitude' => '108.2200',
                'details' => json_encode([
                    ['key_id' => 'Jumlah Petani', 'key_en' => 'Active Farmers', 'value' => '120+'],
                    ['key_id' => 'Komoditas Utama', 'key_en' => 'Main Commodity', 'value' => 'Kentang & Kubis'],
                    ['key_id' => 'Peningkatan Hasil', 'key_en' => 'Yield Increase', 'value' => '+24%']
                ])
            ]
        ];

        foreach ($markers as $m) {
            MapMarker::create($m);
        }
    }
}
