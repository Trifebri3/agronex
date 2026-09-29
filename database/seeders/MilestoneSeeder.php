<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Milestone;

class MilestoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Milestone::truncate();

        $milestones = [
            [
                'year' => 'Origin',
                'status' => 'Research',
                'title' => json_encode([
                    'en' => 'Growing with Agriculture',
                    'id' => 'Tumbuh Bersama Pertanian'
                ]),
                'subtitle' => json_encode([
                    'en' => 'Deep agrarian roots',
                    'id' => 'Akar agraris yang mendalam'
                ]),
                'description' => json_encode([
                    'en' => 'Before AGRONEX existed, our journey began with a deep connection to agriculture. Several members of the founding team grew up in farming communities, where agriculture was not only a livelihood but also a way of life. These experiences shaped our understanding of real agricultural challenges.',
                    'id' => 'Sebelum AGRONEX berdiri, perjalanan kami dimulai dari hubungan mendalam dengan dunia pertanian. Sebagian anggota tim pendiri tumbuh di lingkungan agraris, di mana pertanian bukan sekadar mata pencaharian, tetapi bagian dari kehidupan sehari-hari. Pengalaman ini membentuk cara kami memahami kesulitan nyata para petani.'
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.19.jpeg',
                'video_path' => null,
                'document_path' => null,
                'gallery' => json_encode([
                    '/konten/WhatsApp Image 2026-07-27 at 23.37.19.jpeg',
                    '/konten/WhatsApp Image 2026-07-27 at 23.37.11.jpeg'
                ]),
                'locations' => json_encode(['Garut', 'Cisewu']),
                'technologies' => json_encode(['Traditional Farming', 'Field Observation']),
                'lessons_learned' => json_encode([
                    'en' => 'Traditional farming knowledge holds valuable insights, but lack of modern data collection tools limits yield stability.',
                    'id' => 'Pengetahuan pertanian tradisional memiliki wawasan berharga, tetapi kurangnya alat pengumpul data membatasi stabilitas hasil panen.'
                ]),
                'impact' => json_encode([
                    'en' => 'Gained deep empathy and understood the core agricultural challenges from the ground up.',
                    'id' => 'Memperoleh empati mendalam dan memahami masalah inti pertanian langsung dari akar rumput.'
                ]),
                'achievements' => json_encode([
                    'en' => 'Empathy research phase completed across rural communities.',
                    'id' => 'Fase riset empati selesai dilakukan di berbagai komunitas pedesaan.'
                ]),
                'related_product' => 'AgroCommunity',
                'order_num' => 1,
                'is_published' => true,
            ],
            [
                'year' => '2024',
                'status' => 'Research',
                'title' => json_encode([
                    'en' => 'Listening Before Building',
                    'id' => 'Mendengarkan Sebelum Membangun'
                ]),
                'subtitle' => json_encode([
                    'en' => 'Dialogue first, technology second',
                    'id' => 'Diskusi pertama, teknologi kemudian'
                ]),
                'description' => json_encode([
                    'en' => 'Rather than starting with technology, we started by listening. We conducted discussions with farmers, observed farming activities, documented field conditions, and identified recurring challenges across multiple agricultural communities.',
                    'id' => 'Bukannya langsung membuat teknologi, kami memulai dengan mendengarkan. Kami berdiskusi dengan para petani, mengamati aktivitas bertani, mencatat kondisi lahan secara detail, dan memetakan masalah yang sering terjadi di berbagai kelompok tani.'
                ]),
                'image_path' => '/konten/fotogarut.png',
                'video_path' => null,
                'document_path' => null,
                'gallery' => json_encode([
                    '/konten/fotogarut.png',
                    '/konten/garut.png',
                    '/konten/pangalengan.png',
                    '/konten/WhatsApp Image 2026-07-27 at 23.37.21.jpeg'
                ]),
                'locations' => json_encode(['Garut', 'Bandung', 'Tasikmalaya', 'Pangalengan']),
                'technologies' => json_encode(['Focus Groups', 'Field Documentation']),
                'lessons_learned' => json_encode([
                    'en' => 'Farmers do not need generic apps; they need solutions that fit their daily field routines and water challenges.',
                    'id' => 'Petani tidak membutuhkan aplikasi umum; mereka perlu solusi praktis yang sesuai dengan rutinitas harian dan kendala air mereka.'
                ]),
                'impact' => json_encode([
                    'en' => 'Mapped and validated 12 major bottlenecks across 4 distinct districts.',
                    'id' => 'Memetakan dan memvalidasi 12 masalah utama di 4 wilayah kabupaten yang berbeda.'
                ]),
                'achievements' => json_encode([
                    'en' => 'Completed detailed field analysis reports for Blok Cibodas.',
                    'id' => 'Menyelesaikan laporan analisis lapangan terperinci untuk Blok Cibodas.'
                ]),
                'related_product' => 'AgroPredict',
                'order_num' => 2,
                'is_published' => true,
            ],
            [
                'year' => '2024',
                'status' => 'Prototype',
                'title' => json_encode([
                    'en' => 'PasokPasti Digital Supply Chain',
                    'id' => 'PasokPasti Rantai Pasok Digital'
                ]),
                'subtitle' => json_encode([
                    'en' => 'Fair and transparent distribution',
                    'id' => 'Distribusi yang adil dan transparan'
                ]),
                'description' => json_encode([
                    'en' => 'Our first innovation focused on solving food supply chain fragmentation. We designed PasokPasti to connect local growers directly with regional cooperative distribution networks.',
                    'id' => 'Inovasi pertama kami difokuskan untuk mengatasi rantai pasok pangan yang terfragmentasi. Kami merancang PasokPasti untuk menghubungkan petani kecil langsung dengan jaringan koperasi.'
                ]),
                'image_path' => '/konten/Screenshot 2026-07-27 233232.png',
                'video_path' => null,
                'document_path' => null,
                'gallery' => json_encode(['/konten/Screenshot 2026-07-27 233232.png']),
                'locations' => json_encode(['Bandung', 'Garut']),
                'technologies' => json_encode(['AI Harvest Prediction', 'Blockchain Traceability', 'Market Prices Data']),
                'lessons_learned' => json_encode([
                    'en' => 'Supply chain problems cannot be solved independently. Production, irrigation, and field conditions must also be addressed.',
                    'id' => 'Masalah rantai pasok tidak bisa diselesaikan sendirian. Kondisi produksi, irigasi, dan tanah di lapangan juga harus dibenahi.'
                ]),
                'impact' => json_encode([
                    'en' => 'Created a transparent price tracking system blueprint to prevent crop underpricing.',
                    'id' => 'Membuat cetak biru sistem pelacakan harga yang transparan untuk mencegah kerugian harga panen.'
                ]),
                'achievements' => json_encode([
                    'en' => 'Designed the initial supply chain architecture mockup.',
                    'id' => 'Merancang prototipe mockup awal dari arsitektur rantai pasok.'
                ]),
                'related_product' => 'PasokPasti',
                'order_num' => 3,
                'is_published' => true,
            ],
            [
                'year' => '2025',
                'status' => 'Prototype',
                'title' => json_encode([
                    'en' => 'HUMARSA Smart Greenhouse',
                    'id' => 'HUMARSA Greenhouse Cerdas'
                ]),
                'subtitle' => json_encode([
                    'en' => 'Pioneering IoT precision systems',
                    'id' => 'Merintis sistem presisi berbasis IoT'
                ]),
                'description' => json_encode([
                    'en' => 'The next iteration shifted towards precision agriculture through IoT. We designed portable greenhouse monitoring systems and soil telemetry controllers to optimize water inputs.',
                    'id' => 'Langkah selanjutnya berfokus pada pertanian presisi berbasis IoT. Kami merancang alat pemantauan greenhouse portabel dan telemetri tanah untuk mengoptimalkan kebutuhan air tanaman.'
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.12 (1).jpeg',
                'video_path' => null,
                'document_path' => null,
                'gallery' => json_encode([
                    '/konten/WhatsApp Image 2026-07-27 at 23.37.12 (1).jpeg',
                    '/konten/WhatsApp Image 2026-07-27 at 23.37.11 (1).jpeg'
                ]),
                'locations' => json_encode(['Desa Karyamukti', 'Garut']),
                'technologies' => json_encode(['Soil Sensors', 'Embedded Systems', 'Irrigation Automation']),
                'lessons_learned' => json_encode([
                    'en' => 'Farm productivity depends heavily on accurate real-time microclimate soil telemetries.',
                    'id' => 'Produktivitas kebun sangat bergantung pada keakuratan pembacaan telemetri iklim mikro tanah secara real-time.'
                ]),
                'impact' => json_encode([
                    'en' => 'Demonstrated 35% reduction in irrigation water usage during greenhouse trials.',
                    'id' => 'Membuktikan penghematan air irigasi hingga 35 persen dalam pengujian skala greenhouse.'
                ]),
                'achievements' => json_encode([
                    'en' => 'Completed hardware design and CAD blueprints for the portable sensors.',
                    'id' => 'Menyelesaikan desain perangkat keras dan cetak biru CAD untuk sensor portabel.'
                ]),
                'related_product' => 'AGRONEX IoT Portable',
                'order_num' => 4,
                'is_published' => true,
            ],
            [
                'year' => '2025',
                'status' => 'Pilot',
                'title' => json_encode([
                    'en' => 'Smart Farming Laboratory',
                    'id' => 'Laboratorium Pertanian Cerdas'
                ]),
                'subtitle' => json_encode([
                    'en' => 'Rigorous calibration in the field',
                    'id' => 'Kalibrasi ketat langsung di lahan'
                ]),
                'description' => json_encode([
                    'en' => 'AGRONEX continued experimenting with various IoT devices and sustainable farming practices. We established testing setups in home gardens to test telemetry stability.',
                    'id' => 'AGRONEX terus bereksperimen dengan berbagai perangkat IoT dan pertanian berkelanjutan. Kami mendirikan ruang uji coba di kebun mandiri untuk menguji kestabilan pembacaan data.'
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.12.jpeg',
                'video_path' => null,
                'document_path' => null,
                'gallery' => json_encode([
                    '/konten/WhatsApp Image 2026-07-27 at 23.37.12.jpeg',
                    '/konten/WhatsApp Image 2026-07-27 at 23.37.11 (2).jpeg'
                ]),
                'locations' => json_encode(['Bandung', 'Garut']),
                'technologies' => json_encode(['NPK Telemetry', 'Solar Power Pods', 'Compost Temperature Sensors']),
                'lessons_learned' => json_encode([
                    'en' => 'Robust housing and low-power hardware layouts are essential for solar nodes deployed in open fields.',
                    'id' => 'Perlindungan luar yang kuat dan desain perangkat hemat daya sangat penting agar sensor panel surya bertahan di luar ruangan.'
                ]),
                'impact' => json_encode([
                    'en' => 'Achieved stable sensor telemetry over 6 months of continuous outdoor testing.',
                    'id' => 'Mencapai telemetri data sensor yang stabil selama lebih dari 6 bulan pengujian terbuka di lapangan.'
                ]),
                'achievements' => json_encode([
                    'en' => 'Calibrated soil moisture algorithms against laboratory chemical tests.',
                    'id' => 'Mengkalibrasi algoritma kelembapan tanah dibandingkan hasil uji kimia laboratorium.'
                ]),
                'related_product' => 'AGRONEX IoT Portable',
                'order_num' => 5,
                'is_published' => true,
            ],
            [
                'year' => '2025',
                'status' => 'Pilot',
                'title' => json_encode([
                    'en' => 'Ecosystem Collaboration',
                    'id' => 'Kolaborasi Ekosistem'
                ]),
                'subtitle' => json_encode([
                    'en' => 'Innovation grows through synergy',
                    'id' => 'Inovasi tumbuh melalui sinergi'
                ]),
                'description' => json_encode([
                    'en' => 'We collaborated with academic groups, farmer associations, agricultural experts, technology communities, and local governments to refine our agricultural models.',
                    'id' => 'Kami bekerja sama dengan kelompok akademis, asosisasi petani, pakar teknologi pertanian, dan pemerintah setempat untuk memperluas manfaat model pertanian cerdas.'
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.16.jpeg',
                'video_path' => null,
                'document_path' => null,
                'gallery' => json_encode([
                    '/konten/WhatsApp Image 2026-07-27 at 23.37.16.jpeg',
                    '/konten/WhatsApp Image 2026-07-27 at 23.37.14.jpeg'
                ]),
                'locations' => json_encode(['Lembang', 'Garut Sub-districts']),
                'technologies' => json_encode(['Knowledge Exchange', 'Field Trials Protocols']),
                'lessons_learned' => json_encode([
                    'en' => 'Bridging technology and farmer adoption requires simple, localized interfaces and face-to-face field guidance.',
                    'id' => 'Menghubungkan teknologi dengan kebiasaan petani membutuhkan tampilan aplikasi yang sederhana serta pendampingan langsung.'
                ]),
                'impact' => json_encode([
                    'en' => 'Onboarded early farmer groups to participate in comparative research studies.',
                    'id' => 'Mengajak kelompok tani awal untuk berpartisipasi dalam riset komparasi efisiensi lahan.'
                ]),
                'achievements' => json_encode([
                    'en' => 'Strategic partnership aligned with cooperative networks.',
                    'id' => 'Kesepakatan kemitraan strategis tercapai dengan beberapa koperasi pertanian Jawa Barat.'
                ]),
                'related_product' => 'AgroCommunity',
                'order_num' => 6,
                'is_published' => true,
            ],
            [
                'year' => '2026',
                'status' => 'Live',
                'title' => json_encode([
                    'en' => 'AGRONEX Smart Agriculture',
                    'id' => 'AGRONEX Pertanian Cerdas'
                ]),
                'subtitle' => json_encode([
                    'en' => 'A unified agricultural grid',
                    'id' => 'Satu jaringan pertanian terintegrasi'
                ]),
                'description' => json_encode([
                    'en' => 'All previous learnings merged into one integrated ecosystem. We built the AGRONEX Smart Agriculture grid to cover NPK sensing, solar power supply, AI predictions, and fair markets.',
                    'id' => 'Semua pembelajaran sebelumnya kini menyatu dalam satu ekosistem. Kami membangun platform terintegrasi AGRONEX untuk mencakup sensor NPK, daya mandiri surya, kecerdasan buatan, dan akses pasar.'
                ]),
                'image_path' => '/konten/fotoutama.JPG',
                'video_path' => null,
                'document_path' => null,
                'gallery' => json_encode([
                    '/konten/fotoutama.JPG',
                    '/konten/WhatsApp Image 2026-07-27 at 23.04.00.jpeg'
                ]),
                'locations' => json_encode(['Garut', 'Bandung', 'Lembang']),
                'technologies' => json_encode(['AgroPredict AI', 'IoT Portable', 'Plant AR', 'AgroEnergy Hub']),
                'lessons_learned' => json_encode([
                    'en' => 'A standalone app is not enough; farmers require a complete loop of data, sensors, and distribution.',
                    'id' => 'Aplikasi mandiri saja tidak cukup; petani membutuhkan ekosistem lengkap dari data, alat sensor, hingga pasar.'
                ]),
                'impact' => json_encode([
                    'en' => 'Decreased crop monitoring time and streamlined crop reports into cooperative databases.',
                    'id' => 'Memangkas waktu pemantauan lahan dan menyederhanakan pelaporan hasil panen ke database koperasi.'
                ]),
                'achievements' => json_encode([
                    'en' => 'Launch of the integrated dashboard and NPK sensor modules.',
                    'id' => 'Peluncuran resmi dashboard terintegrasi dan modul sensor NPK.'
                ]),
                'related_product' => 'AgroPredict',
                'order_num' => 7,
                'is_published' => true,
            ],
            [
                'year' => 'Future',
                'status' => 'Research',
                'title' => json_encode([
                    'en' => 'Beyond Indonesia',
                    'id' => 'Melampaui Batas Indonesia'
                ]),
                'subtitle' => json_encode([
                    'en' => 'Roadmap to global climate intelligence',
                    'id' => 'Peta jalan menuju intelijen iklim global'
                ]),
                'description' => json_encode([
                    'en' => 'Our ultimate vision is to scale precision agricultural tools internationally to foster climate intelligence, digital twin simulations, and renewable energy grids.',
                    'id' => 'Visi utama kami adalah membawa perangkat pertanian presisi ke tingkat global untuk memperkuat data perubahan iklim, simulasi digital, dan kemandirian energi.'
                ]),
                'image_path' => '/konten/WhatsApp Image 2026-07-27 at 23.04.00.jpeg',
                'video_path' => null,
                'document_path' => null,
                'gallery' => json_encode(['/konten/WhatsApp Image 2026-07-27 at 23.04.00.jpeg']),
                'locations' => json_encode(['ASEAN']),
                'technologies' => json_encode(['Carbon Agriculture', 'Climate Intelligence AI', 'Digital Twin Modeling']),
                'lessons_learned' => json_encode([
                    'en' => 'Adapting machine learning prediction models for global climate variations is the next milestone.',
                    'id' => 'Menyesuaikan model prediksi kecerdasan buatan untuk variasi iklim global adalah tantangan berikutnya.'
                ]),
                'impact' => json_encode([
                    'en' => 'Establishing models for international smart farming frameworks.',
                    'id' => 'Menyusun model awal untuk kerangka kerja pertanian cerdas lintas negara.'
                ]),
                'achievements' => json_encode([
                    'en' => 'Drafted strategic blueprints for carbon tracking algorithms.',
                    'id' => 'Menyusun draf algoritma pelacakan karbon tanah.'
                ]),
                'related_product' => 'AgroPredict',
                'order_num' => 8,
                'is_published' => true,
            ],
        ];

        foreach ($milestones as $m) {
            Milestone::create($m);
        }
    }
}
