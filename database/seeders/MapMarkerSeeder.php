<?php

namespace Database\Seeders;

use App\Models\MapMarker;
use Illuminate\Database\Seeder;

class MapMarkerSeeder extends Seeder
{
    /**
     * Run the database seeds for real verified field deployment & observation points.
     */
    public function run(): void
    {
        MapMarker::truncate();

        $markers = [
            [
                'title' => json_encode([
                    'id' => 'Validasi & Diskusi Petani Kentang Pangalengan',
                    'en' => 'Potato Farmers Validation & Discussion - Pangalengan'
                ]),
                'marker_type' => 'Validasi Lapangan & Petani',
                'latitude' => '-7.163981008187171',
                'longitude' => '107.60986670454173',
                'details' => json_encode([
                    ['key_id' => 'Fokus Kegiatan', 'value' => 'Validasi & diskusi bersama petani kentang, optimasi dosis pupuk & kelembapan tanah andosol'],
                    ['key_id' => 'Komoditas', 'value' => 'Kentang Granola & Hortikultura Dataran Tinggi'],
                    ['key_id' => 'Lokasi', 'value' => 'Pangalengan, Kabupaten Bandung']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Greenhouse Cerdas Desa Karyamukti, Garut',
                    'en' => 'Smart Greenhouse Concept & Discussion - Karyamukti Village, Garut'
                ]),
                'marker_type' => 'Smart Greenhouse & IoT',
                'latitude' => '-7.081678198847807',
                'longitude' => '108.00074849244785',
                'details' => json_encode([
                    ['key_id' => 'Fokus Kegiatan', 'value' => 'Penjejakan & diskusi konsep smart farming greenhouse cerdas terintegrasi'],
                    ['key_id' => 'Sistem Otomasi', 'value' => 'Pengaturan sirkulasi iklim mikro & irigasi presisi sensor'],
                    ['key_id' => 'Lokasi', 'value' => 'Desa Karyamukti, Garut']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Kemitraan KWT Karyajaya & Yota Adiwidya Center',
                    'en' => 'Women Farmers Group Mentorship - Karyajaya & Yota Adiwidya Center'
                ]),
                'marker_type' => 'Kemitraan Komunitas & Edukasi',
                'latitude' => '-7.2702235822044114',
                'longitude' => '107.84079667133378',
                'details' => json_encode([
                    ['key_id' => 'Mitra Kolaborasi', 'value' => 'Yota Adiwidya Center & Kelompok Wanita Tani (KWT)'],
                    ['key_id' => 'Program', 'value' => 'Pendampingan budidaya pekarangan lestari & pemanfaatan sensor agritech ramah perempuan'],
                    ['key_id' => 'Lokasi', 'value' => 'Desa Karyajaya, Bayongbong, Garut']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'FGD & Pendampingan Karang Taruna Tani Lembang',
                    'en' => 'FGD & Youth Farmers Mentorship with Desa Lestari - Lembang'
                ]),
                'marker_type' => 'Regenerasi Petani Muda & FGD',
                'latitude' => '-6.805646297845111',
                'longitude' => '107.63940877790776',
                'details' => json_encode([
                    ['key_id' => 'Mitra Kolaborasi', 'value' => 'Karang Taruna Tani & Program Desa Lestari'],
                    ['key_id' => 'Program', 'value' => 'FGD regenerasi petani muda dan perencanaan pendampingan teknologi agritech presisi'],
                    ['key_id' => 'Lokasi', 'value' => 'Lembang, Kabupaten Bandung Barat']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Pengujian Kualitas Air Irigasi Baleendah',
                    'en' => 'Irrigation Water Quality Testing - Baleendah'
                ]),
                'marker_type' => 'Pengujian Air (WaterSense)',
                'latitude' => '-7.010708862334704',
                'longitude' => '107.60985089829983',
                'details' => json_encode([
                    ['key_id' => 'Fokus Kegiatan', 'value' => 'Pengujian parameter mutu air irigasi, pH, konduktivitas listrik (EC), dan salinitas'],
                    ['key_id' => 'Perangkat', 'value' => 'Probe sensor telemetri WaterSense'],
                    ['key_id' => 'Lokasi', 'value' => 'Baleendah, Kabupaten Bandung']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Pengujian Kualitas Air & Kalibrasi Sensor Cibiru',
                    'en' => 'Water Quality Testing & Sensor Calibration - Cibiru'
                ]),
                'marker_type' => 'Pengujian Air (WaterSense)',
                'latitude' => '-6.931634642295689',
                'longitude' => '107.71638436109879',
                'details' => json_encode([
                    ['key_id' => 'Fokus Kegiatan', 'value' => 'Pengujian mutu air pertanian semi-urban & hidroponik presisi'],
                    ['key_id' => 'Tujuan', 'value' => 'Kalibrasi multi-probe sensor air real-time'],
                    ['key_id' => 'Lokasi', 'value' => 'Cibiru, Kota Bandung']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Pengujian Terpadu Tanah & Air Pameungpeuk',
                    'en' => 'Integrated Soil & Water Field Testing - Pameungpeuk'
                ]),
                'marker_type' => 'Uji Tanah & Air Terpadu',
                'latitude' => '-7.011540374378147',
                'longitude' => '107.5965633081789',
                'details' => json_encode([
                    ['key_id' => 'Fokus Kegiatan', 'value' => 'Pengujian terpadu kelembapan, suhu, NPK tanah serta kualitas air pengairan'],
                    ['key_id' => 'Integrasi Sensor', 'value' => 'Kombinasi sensor telemetri SoilSense & WaterSense'],
                    ['key_id' => 'Lokasi', 'value' => 'Pameungpeuk - Baleendah, Kabupaten Bandung']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Diskusi & Uji Alat Petani Hortikultura Tasikmalaya',
                    'en' => 'Field Discussion & Testing with Horticulture Farmers - Tasikmalaya'
                ]),
                'marker_type' => 'Uji Perangkat & Validasi Petani',
                'latitude' => '-7.355807873619365',
                'longitude' => '108.23590621942218',
                'details' => json_encode([
                    ['key_id' => 'Fokus Kegiatan', 'value' => 'Diskusi lapangan dan pengujian akurasi alat telemetri bersama paguyuban petani hortikultura'],
                    ['key_id' => 'Dampak', 'value' => 'Efisiensi penyiraman 30% dan pencegahan over-fertilization'],
                    ['key_id' => 'Lokasi', 'value' => 'Tasikmalaya, Jawa Barat']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Validasi Kemitraan Koperasi Petani Ciamis',
                    'en' => 'Cooperative Partnership Validation - Ciamis'
                ]),
                'marker_type' => 'Kemitraan Koperasi & Model Bisnis',
                'latitude' => '-7.300413843974022',
                'longitude' => '108.25012231110406',
                'details' => json_encode([
                    ['key_id' => 'Mitra Kolaborasi', 'value' => 'Koperasi Petani Ciamis'],
                    ['key_id' => 'Fokus Kegiatan', 'value' => 'Diskusi dan validasi skema sewa gotong-royong telemetri terjangkau bagi petani anggota koperasi'],
                    ['key_id' => 'Lokasi', 'value' => 'Ciamis, Jawa Barat']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Pengujian Transmisi Telemetri Ciamis Timur',
                    'en' => 'Telemetry Field Transmission Testing - East Ciamis'
                ]),
                'marker_type' => 'Pengujian Hardware IoT',
                'latitude' => '-7.348856791762124',
                'longitude' => '108.31603339862663',
                'details' => json_encode([
                    ['key_id' => 'Fokus Kegiatan', 'value' => 'Pengujian jangkauan sinyal telemetri LoRaWAN/GSM dan ketahanan probe sensor di lahan terbuka perkebunan'],
                    ['key_id' => 'Hasil Uji', 'value' => 'Sinyal stabil & transmisi data real-time berhasil tercatat di cloud'],
                    ['key_id' => 'Lokasi', 'value' => 'Ciamis Timur, Jawa Barat']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Pengujian Daya Mandiri & Sensor Ciamis Selatan',
                    'en' => 'Solar Power & Sensor Resilience Testing - South Ciamis'
                ]),
                'marker_type' => 'Pengujian Hardware IoT',
                'latitude' => '-7.388108130464201',
                'longitude' => '108.3936299213376',
                'details' => json_encode([
                    ['key_id' => 'Fokus Kegiatan', 'value' => 'Pengujian keandalan modul panel surya AgroPower dan daya tahan operasional sensor di lahan tadah hujan'],
                    ['key_id' => 'Ketahanan', 'value' => 'Operasional 24/7 mandiri tanpa listrik PLN'],
                    ['key_id' => 'Lokasi', 'value' => 'Ciamis Selatan, Jawa Barat']
                ])
            ],
            [
                'title' => json_encode([
                    'id' => 'Pilot Project Utama & Kemitraan Den Rawit Pamarican',
                    'en' => 'Flagship Pilot Project & Strategic Partnership with Den Rawit - Pamarican Ciamis'
                ]),
                'marker_type' => 'Pilot Project Utama & Kemitraan',
                'latitude' => '-7.432989427706715',
                'longitude' => '108.54106695455766',
                'details' => json_encode([
                    ['key_id' => 'Mitra Utama', 'value' => 'Den Rawit Pamarican (Sentra Cabai Rawit Ciamis)'],
                    ['key_id' => 'Implementasi', 'value' => 'Pemasangan SoilSense, otomatisasi irigasi fertigasi tetes, & pemantauan cuaca mikro'],
                    ['key_id' => 'Target Capaian', 'value' => 'Peningkatan produktivitas cabai rawit hingga 25% dan efisiensi air 35%'],
                    ['key_id' => 'Lokasi', 'value' => 'Pamarican, Kabupaten Ciamis']
                ])
            ]
        ];

        foreach ($markers as $m) {
            MapMarker::create($m);
        }
    }
}
