<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JourneyChapter;

class JourneyChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JourneyChapter::truncate();

        $chapters = [
            [
                'chapter_tag' => 'Chapter 01',
                'year_label' => '2024',
                'title' => json_encode([
                    'en' => 'Listening Before Building',
                    'id' => 'Mendengarkan Sebelum Membangun'
                ]),
                'content' => json_encode([
                    'en' => 'Before building a platform, we chose to listen. Our early journey began through dialogues alongside farmers in Kampung Kiaragoong, Margahayu Village, Cisewu, Garut—an agrarian region where our initial ideas took shape.',
                    'id' => 'Sebelum membangun sebuah platform, kami memilih untuk mendengarkan. Perjalanan awal dimulai melalui diskusi bersama petani di Kampung Kiaragoong, Desa Margahayu, Kecamatan Cisewu, Kabupaten Garut—wilayah agraris yang menjadi salah satu tempat lahirnya gagasan awal.'
                ]),
                'features' => null,
                'image_path' => '/images/journey/discussing_farmers.png',
                'order_num' => 1,
            ],
            [
                'chapter_tag' => 'Field Study',
                'year_label' => 'Garut, West Java',
                'title' => json_encode([
                    'en' => 'Uncovering the Realities of Blok Cibodas',
                    'id' => 'Menemukan Realita di Blok Cibodas'
                ]),
                'content' => json_encode([
                    'en' => 'In one specific cultivation block—Blok Cibodas—we observed how bird pest attacks, water scarcity, and highly fragmented supply chains combined to slash crop yields (normally 6-8 tons/hectare) and erode farmer incomes. These observations catalyzed our first digital prototype.',
                    'id' => 'Di salah satu area persawahan, Blok Cibodas, kami mempelajari bagaimana serangan hama burung, ketidakpastian irigasi, serta rantai distribusi yang terfragmentasi dapat memengaruhi produktivitas (sekitar 6–8 ton gabah per hektar) dan kesejahteraan petani. Pengalaman tersebut menjadi titik awal lahirnya solusi pertama kami.'
                ]),
                'features' => null,
                'image_path' => '/images/journey/cibodas_observation.png',
                'order_num' => 2,
            ],
            [
                'chapter_tag' => 'Chapter 02',
                'year_label' => 'PasokPasti',
                'title' => json_encode([
                    'en' => 'PasokPasti — Our First Innovation',
                    'id' => 'PasokPasti — Inovasi Pertama Kami'
                ]),
                'content' => json_encode([
                    'en' => 'PasokPasti was built as a digital supply chain platform to make food distribution efficient, transparent, and fair. By connecting farmers directly with cooperatives, distributors, and markets, we proved that technology succeeds when tailored to real field dynamics.',
                    'id' => 'PasokPasti merupakan inisiatif pertama yang kami bangun sebagai platform digital untuk mendukung rantai pasok pangan yang lebih efisien, transparan, dan berkelanjutan. Fokus utamanya adalah memperkuat hubungan antara petani, koperasi, distributor, dan pasar melalui pemanfaatan teknologi digital.'
                ]),
                'features' => [
                    'Digital Supply Chain',
                    'AI Harvest Prediction',
                    'Blockchain Traceability',
                    'Market Information',
                    'AI Assistant / Copilot',
                    'Crop Identification'
                ],
                'image_path' => '/images/journey/pasokpasti_mockup.png',
                'order_num' => 3,
            ],
            [
                'chapter_tag' => 'Chapter 03',
                'year_label' => 'Beyond Supply Chain',
                'title' => json_encode([
                    'en' => 'Moving Beyond the Supply Chain',
                    'id' => 'Melangkah Melampaui Rantai Pasok'
                ]),
                'content' => json_encode([
                    'en' => 'As we spent more time in the fields, it became clear that distribution was only half the battle. Soil depletion, water scarcity, erratic weather, and lack of real-time cultivation guidance required our immediate innovation.',
                    'id' => 'Semakin banyak kami berdiskusi dengan petani dan pemangku kepentingan, semakin jelas bahwa tantangan pertanian tidak berhenti pada distribusi. Produktivitas lahan, efisiensi penggunaan air, kesehatan tanah, dan pengambilan keputusan di tingkat budidaya juga membutuhkan perhatian yang sama besar. Hal tersebut mendorong kami untuk memperluas fokus dari rantai pasok menuju teknologi pertanian yang lebih menyeluruh.'
                ]),
                'features' => null,
                'image_path' => null,
                'order_num' => 4,
            ],
            [
                'chapter_tag' => 'Chapter 04',
                'year_label' => 'HUMARSA Project',
                'title' => json_encode([
                    'en' => 'HUMARSA Project — Precise and Sustainable',
                    'id' => 'HUMARSA Project — Presisi dan Berkelanjutan'
                ]),
                'content' => json_encode([
                    'en' => 'Collaborating with the Karyamukti Village Government, we began prototyping HUMARSA—a smart agricultural IoT initiative. We designed portable land monitoring robots and smart greenhouse frameworks to automate and optimize water and soil inputs.',
                    'id' => 'Langkah berikutnya adalah pengembangan HUMARSA, sebuah inisiatif yang berfokus pada teknologi Internet of Things (IoT) untuk mendukung pertanian yang lebih presisi dan berkelanjutan. Melalui kolaborasi bersama Pemerintah Desa Karyamukti, kami merancang prototipe greenhouse cerdas dan perangkat IoT portabel untuk pemantauan kondisi lahan pertanian secara dinamis.'
                ]),
                'features' => null,
                'image_path' => 'multiple_humarsa',
                'order_num' => 5,
            ],
            [
                'chapter_tag' => 'Field Validation',
                'year_label' => 'Chapter 05',
                'title' => json_encode([
                    'en' => 'Learning by Building',
                    'id' => 'Belajar Sambil Membangun (Learning by Building)'
                ]),
                'content' => json_encode([
                    'en' => 'True agricultural solutions are not born in isolated labs. We built and tested our prototypes in real home gardens and farms managed directly by our team. From solar-powered drip irrigation to compost sensors, we learned by doing.',
                    'id' => 'Kami percaya bahwa inovasi tidak lahir hanya dari laboratorium. Karena itu, berbagai prototipe kami uji secara bertahap melalui lingkungan nyata, termasuk pada lahan pertanian dan kebun yang dikelola oleh anggota tim. Berbagai eksperimen dilakukan, mulai dari sistem irigasi sederhana, pengelolaan kompos organik, hingga penerapan sensor untuk pemantauan kondisi tanaman.'
                ]),
                'features' => null,
                'image_path' => '/images/journey/iot_experiment.png',
                'order_num' => 6,
            ],
            [
                'chapter_tag' => 'Collaboration',
                'year_label' => 'Chapter 06',
                'title' => json_encode([
                    'en' => 'Cultivating a Shared Vision',
                    'id' => 'Kolaborasi Lintas Sektor'
                ]),
                'content' => json_encode([
                    'en' => 'Innovation is a collective effort. We traveled across West Java, exchanging knowledge with tech communities like Habibie Garden and Lembang Agri, consulting agricultural experts, and collaborating with university lecturers in agricultural technology.',
                    'id' => 'Sejak awal, AGRONEX dibangun melalui kolaborasi. Perjalanan kami diperkaya melalui diskusi bersama petani, kelompok tani, akademisi, peneliti, praktisi pertanian, hingga berbagai komunitas yang memiliki visi serupa. Kami melakukan kunjungan dan pertukaran pengetahuan dengan berbagai pihak yang bergerak di bidang pertanian berbasis teknologi, termasuk Habibie Garden dan Lembang Agri.'
                ]),
                'features' => null,
                'image_path' => '/images/journey/expert_consultation.png',
                'order_num' => 7,
            ],
            [
                'chapter_tag' => 'AGRONEX Ecosystem',
                'year_label' => 'Chapter 07',
                'title' => json_encode([
                    'en' => 'From Projects to Ecosystem',
                    'id' => 'Dari Proyek Menjadi Ekosistem'
                ]),
                'content' => json_encode([
                    'en' => 'We learned a vital lesson: agricultural challenges do not exist in isolation. Logistics depends on production; production depends on water; water depends on energy; energy depends on data; data depends on artificial intelligence. Everything is connected. This realization is why we built the AGRONEX Smart Agriculture Ecosystem.',
                    'id' => 'Berbagai proyek yang kami bangun memberikan satu pelajaran penting. Permasalahan pertanian tidak pernah berdiri sendiri. Distribusi berkaitan dengan produksi, produksi berkaitan dengan air, air dengan energi, energi dengan data, dan data dengan AI. Dari sinilah lahir AGRONEX. Bukan sekadar sebuah aplikasi, bukan hanya perangkat IoT, melainkan sebuah Smart Agriculture Ecosystem yang menghubungkan petani, teknologi, data, energi, pembelajaran, dan pasar dalam satu ekosistem yang terintegrasi.'
                ]),
                'features' => null,
                'image_path' => 'ecosystem_connect_text',
                'order_num' => 8,
            ],
        ];

        foreach ($chapters as $ch) {
            JourneyChapter::create($ch);
        }
    }
}
