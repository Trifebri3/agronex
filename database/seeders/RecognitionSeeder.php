<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recognition;
use App\Models\TeamMember;

class RecognitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recognition::truncate();

        // Retrieve seeded team members
        $tri = TeamMember::where('name', 'Like', '%Tri%')->first();
        $ariyanti = TeamMember::where('name', 'Like', '%Ariyanti%')->first();

        $triId = $tri ? $tri->id : null;
        $ariyantiId = $ariyanti ? $ariyanti->id : null;

        $recognitions = [
            [
                'category' => 'Awards',
                'year' => '2026',
                'title' => json_encode([
                    'en' => 'Finalist of Generasi Bakti BCA 2026',
                    'id' => 'Finalis Generasi Bakti BCA 2026'
                ]),
                'organization' => json_encode([
                    'en' => 'PT Bank Central Asia Tbk.',
                    'id' => 'PT Bank Central Asia Tbk.'
                ]),
                'description' => json_encode([
                    'en' => 'Recognized as one of the national finalists in the technology innovation and social impact category.',
                    'id' => 'Ditetapkan sebagai finalis nasional dalam kategori inovasi teknologi dan dampak sosial kemasyarakatan.'
                ]),
                'award_logo_path' => 'https://upload.wikimedia.org/wikipedia/commons/5/5c/BCA_logo.svg',
                'certificate_path' => '/konten/WhatsApp Image 2026-07-27 at 23.04.00.jpeg',
                'doc_path' => '/konten/WhatsApp Image 2026-07-27 at 23.04.00.jpeg',
                'story' => json_encode([
                    'en' => 'A national initiative empowering young innovators to solve critical real-world challenges through technology. Tri Febriansah led the team to showcase the AGRONEX smart farming IoT and predictive AI ecosystem to national panels.',
                    'id' => 'Inisiatif tingkat nasional untuk mendukung inovator muda memecahkan masalah riil. Tri Febriansah memimpin tim mempresentasikan IoT pertanian presisi dan model kecerdasan buatan AGRONEX di hadapan dewan juri nasional.'
                ]),
                'related_project' => 'AgroPredict AI Platform',
                'media_coverage' => 'https://www.bca.co.id/',
                'team_member_id' => $triId,
                'order_num' => 1,
            ],
            [
                'category' => 'National Recognition',
                'year' => '2025',
                'title' => json_encode([
                    'en' => 'Youth Pioneer of West Java in Technological Innovation',
                    'id' => 'Pemuda Pelopor Jawa Barat Bidang Inovasi Teknologi'
                ]),
                'organization' => json_encode([
                    'en' => 'West Java Youth and Sports Office (Dispora Jabar)',
                    'id' => 'Dinas Pemuda dan Olahraga Provinsi Jawa Barat (Dispora Jabar)'
                ]),
                'description' => json_encode([
                    'en' => 'Awarded by the West Java Youth and Sports Office for impactful contributions in bringing precision agricultural IoT devices to rural farmers.',
                    'id' => 'Penghargaan Juara 1 Tingkat Provinsi Jawa Barat atas kontribusi nyata dalam mendesain dan menerapkan alat pemantauan sensor tanah nirkabel bagi petani.'
                ]),
                'award_logo_path' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Coat_of_arms_of_Indonesia.svg',
                'certificate_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.11 (1).jpeg',
                'doc_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.11 (2).jpeg',
                'story' => json_encode([
                    'en' => 'Tri Febriansah was selected as the winner of Youth Pioneer in technological innovation for West Java province, recognizing his contribution to agricultural digitization.',
                    'id' => 'Tri Febriansah terpilih sebagai pemenang pertama Pemuda Pelopor Jawa Barat, mengapresiasi usahanya membangun perangkat telemetri IoT mandiri untuk membantu petani menghemat air dan pupuk.'
                ]),
                'related_project' => 'AGRONEX IoT Portable',
                'media_coverage' => 'https://jabarprov.go.id/',
                'team_member_id' => $triId,
                'order_num' => 2,
            ],
            [
                'category' => 'Intellectual Property',
                'year' => '2026',
                'title' => json_encode([
                    'en' => 'Copyright: AGRONEX Smart Agriculture Platform (AI, IoT & AR)',
                    'id' => 'Hak Cipta: Platform Cerdas Pertanian AGRONEX (AI, IoT & AR)'
                ]),
                'organization' => json_encode([
                    'en' => 'Ministry of Law and Human Rights RI (Kemenkumham)',
                    'id' => 'Kementerian Hukum dan Hak Asasi Manusia Republik Indonesia (DJKI)'
                ]),
                'description' => json_encode([
                    'en' => 'Officially registered computer program (No. EC002026124181) protecting smart agriculture algorithms, IoT edge processing, and predictive crop analytics.',
                    'id' => 'Pencatatan ciptaan resmi Program Komputer (No. EC002026124181) melindungi arsitektur software, algoritma analitik, dan telemetri IoT pertanian presisi.'
                ]),
                'award_logo_path' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Coat_of_arms_of_Indonesia.svg',
                'certificate_path' => '/images/haki.png',
                'doc_path' => '/images/haki.png',
                'story' => json_encode([
                    'en' => 'Official copyright registered by Tri Febriansah and Shandy Muhammad Yusuf under Directorate General of Intellectual Property.',
                    'id' => 'Hak cipta resmi yang dicatatkan oleh Tri Febriansah dan Shandy Muhammad Yusuf di bawah DJKI Kemenkumham RI.'
                ]),
                'related_project' => 'AGRONEX Ecosystem Platform',
                'media_coverage' => 'https://dgip.go.id/',
                'team_member_id' => $triId,
                'order_num' => 3,
            ],
            [
                'category' => 'Intellectual Property',
                'year' => '2026',
                'title' => json_encode([
                    'en' => 'Copyright: IoT & AI System for Integrated Water Monitoring & Management',
                    'id' => 'Hak Cipta: Sistem IoT dan AI Untuk Monitoring dan Pengelolaan Air Terintegrasi'
                ]),
                'organization' => json_encode([
                    'en' => 'Ministry of Law and Human Rights RI (Kemenkumham)',
                    'id' => 'Kementerian Hukum dan Hak Asasi Manusia Republik Indonesia (DJKI)'
                ]),
                'description' => json_encode([
                    'en' => 'Officially registered computer program (No. EC002026184233) protecting precision water telemetry, smart irrigation actuation, and AI water resources optimization.',
                    'id' => 'Pencatatan ciptaan resmi Program Komputer (No. EC002026184233) melindungi otomasi telemetri irigasi, sensor kualitas air, dan AI efisiensi pengelolaan air terintegrasi.'
                ]),
                'award_logo_path' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Coat_of_arms_of_Indonesia.svg',
                'certificate_path' => '/images/hakiiotair.png',
                'doc_path' => '/images/hakiiotair.png',
                'story' => json_encode([
                    'en' => 'Official copyright registration granted to Tri Febriansah by Directorate General of Intellectual Property for integrated water management systems.',
                    'id' => 'Surat Pencatatan Ciptaan resmi yang diterbitkan untuk Tri Febriansah oleh DJKI Kementerian Hukum atas sistem IoT dan AI pengelolaan air terintegrasi.'
                ]),
                'related_project' => 'AGRONEX Water Management IoT',
                'media_coverage' => 'https://dgip.go.id/',
                'team_member_id' => $triId,
                'order_num' => 4,
            ],
            [
                'category' => 'Strategic Partnerships',
                'year' => '2025',
                'title' => json_encode([
                    'en' => 'Strategic Field Collaboration with Lembang Agri',
                    'id' => 'Kolaborasi Lapangan Strategis dengan Lembang Agri'
                ]),
                'organization' => json_encode([
                    'en' => 'Lembang Agri Cooperative',
                    'id' => 'Koperasi Lembang Agri'
                ]),
                'description' => json_encode([
                    'en' => 'Strategic partnership validating the crop yields of organic vegetable farming using real-time IoT soil NPK telemetries.',
                    'id' => 'Kemitraan strategis dengan koperasi produsen sayur organik di Lembang untuk memvalidasi performa sensor tanah presisi.'
                ]),
                'award_logo_path' => 'https://upload.wikimedia.org/wikipedia/commons/8/87/Avatar_pooh.png',
                'certificate_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.12.jpeg',
                'doc_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.12.jpeg',
                'story' => json_encode([
                    'en' => 'This strategic partnership enabled the AGRONEX team to perform extensive field validation and train local vegetable growers in Lembang.',
                    'id' => 'Kemitraan ini membuka akses lahan pengujian sayuran organik bagi tim AGRONEX, dipimpin oleh Ariyanti Yusup untuk melakukan validasi kesesuaian bisnis telemetri sensor.'
                ]),
                'related_project' => 'AGRONEX Smart Agriculture Ecosystem',
                'media_coverage' => null,
                'team_member_id' => $ariyantiId,
                'order_num' => 4,
            ],
            [
                'category' => 'Publications',
                'year' => '2024',
                'title' => json_encode([
                    'en' => 'Journal of Agricultural Technology: IoT Precision Monitoring',
                    'id' => 'Jurnal Teknologi Pertanian: Pemantauan Presisi IoT'
                ]),
                'organization' => json_encode([
                    'en' => 'UIN Sunan Gunung Djati Bandung',
                    'id' => 'UIN Sunan Gunung Djati Bandung'
                ]),
                'description' => json_encode([
                    'en' => 'Published scientific paper outlining the performance and calibration results of low-power LoRaWAN soil moisture and NPK telemetry nodes.',
                    'id' => 'Publikasi ilmiah mengenai kalibrasi sensor IoT portabel dan transmisi data nirkabel berbasis LoRaWAN di lingkungan lahan basah.'
                ]),
                'award_logo_path' => 'https://upload.wikimedia.org/wikipedia/commons/b/ba/Logo_UIN_Sunan_Gunung_Djati.svg',
                'certificate_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.16.jpeg',
                'doc_path' => '/konten/WhatsApp Image 2026-07-27 at 23.37.16.jpeg',
                'story' => json_encode([
                    'en' => 'Research conducted alongside university agronomists, validating the efficiency gains of portable agricultural sensors compared to traditional soil testing.',
                    'id' => 'Riset yang didukung oleh dosen pembimbing teknologi pertanian untuk membuktikan tingkat akurasi pembacaan data sensor NPK dibandingkan hasil uji laboratorium konvensional.'
                ]),
                'related_project' => 'AGRONEX IoT Portable',
                'media_coverage' => 'https://uinsgd.ac.id/',
                'team_member_id' => $triId,
                'order_num' => 5,
            ],
            [
                'category' => 'Government Programs',
                'year' => '2024',
                'title' => json_encode([
                    'en' => 'Empowerment Program for Cisewu Farmer Associations',
                    'id' => 'Program Pemberdayaan Gabungan Kelompok Tani Cisewu'
                ]),
                'organization' => json_encode([
                    'en' => 'Kecamatan Cisewu, Garut',
                    'id' => 'Pemerintah Kecamatan Cisewu, Garut'
                ]),
                'description' => json_encode([
                    'en' => 'Strategic community pilot program validated by the local sub-district government to introduce precision compost sensors and automatic irrigation.',
                    'id' => 'Program implementasi dan pendampingan teknologi IoT untuk memantau dekomposisi pupuk organik pada sawah tadah hujan.'
                ]),
                'award_logo_path' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Coat_of_arms_of_Indonesia.svg',
                'certificate_path' => '/konten/fotogarut.png',
                'doc_path' => '/konten/fotogarut.png',
                'story' => json_encode([
                    'en' => 'Supported by village officials, this community deployment enabled the collection of initial datasets that trained the AGRONEX neural networks.',
                    'id' => 'Kolaborasi yang didukung penuh pemerintah desa setempat untuk memberikan edukasi melek digital serta melatih kesiapan operasional petani pedesaan.'
                ]),
                'related_project' => 'HUMARSA Project',
                'media_coverage' => null,
                'team_member_id' => $ariyantiId,
                'order_num' => 6,
            ],
        ];

        foreach ($recognitions as $rec) {
            Recognition::create($rec);
        }
    }
}
