<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZonalEducationOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zonalOffices = [
            // Western Province Zones (PEO0000006)
            array('workplace_id' => 'ZEO0000001', 'peo_wp_id' => 'PEO0000006', 'district_id' => NULL, 'name' => 'Colombo Zonal Department Of Education', 'short_name' => 'Colombo Zone'),
            array('workplace_id' => 'ZEO0000002', 'peo_wp_id' => 'PEO0000006', 'district_id' => NULL, 'name' => 'Homagama Zonal Department Of Education', 'short_name' => 'Homagama Zone'),
            array('workplace_id' => 'ZEO0000003', 'peo_wp_id' => 'PEO0000006', 'district_id' => NULL, 'name' => 'Sri Jayawardhanapura Zonal Department Of Education', 'short_name' => 'Sri Jayawardhanapura Zone'),
            array('workplace_id' => 'ZEO0000004', 'peo_wp_id' => 'PEO0000006', 'district_id' => NULL, 'name' => 'Piliyandala Zonal Department Of Education', 'short_name' => 'Piliyandala Zone'),
            array('workplace_id' => 'ZEO0000005', 'peo_wp_id' => 'PEO0000006', 'district_id' => NULL, 'name' => 'Gampaha Zonal Department Of Education', 'short_name' => 'Gampaha Zone'),
            array('workplace_id' => 'ZEO0000006', 'peo_wp_id' => 'PEO0000006', 'district_id' => NULL, 'name' => 'Minuwangoda Zonal Department Of Education', 'short_name' => 'Minuwangoda Zone'),
            array('workplace_id' => 'ZEO0000007', 'peo_wp_id' => 'PEO0000006', 'district_id' => NULL, 'name' => 'Negombo Zonal Department Of Education', 'short_name' => 'Negombo Zone'),
            array('workplace_id' => 'ZEO0000008', 'peo_wp_id' => 'PEO0000006', 'district_id' => NULL, 'name' => 'Kelaniya Zonal Department Of Education', 'short_name' => 'Kelaniya Zone'),
            array('workplace_id' => 'ZEO0000009', 'peo_wp_id' => 'PEO0000006', 'district_id' => NULL, 'name' => 'Kalutara Zonal Department Of Education', 'short_name' => 'Kalutara Zone'),
            array('workplace_id' => 'ZEO0000010', 'peo_wp_id' => 'PEO0000006', 'district_id' => NULL, 'name' => 'Matugama Zonal Department Of Education', 'short_name' => 'Matugama Zone'),
            array('workplace_id' => 'ZEO0000011', 'peo_wp_id' => 'PEO0000006', 'district_id' => NULL, 'name' => 'Horana Zonal Department Of Education ', 'short_name' => 'Horana Zone '),

            // Central Province Zones (PEO0000001)
            array('workplace_id' => 'ZEO0000012', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Kandy Zonal Department Of Education ', 'short_name' => 'Kandy Zone '),
            array('workplace_id' => 'ZEO0000013', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Denuwara Zonal Department Of Education ', 'short_name' => 'Denuwara Zone '),
            array('workplace_id' => 'ZEO0000014', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Gampola Zonal Department Of Education ', 'short_name' => 'Gampola Zone '),
            array('workplace_id' => 'ZEO0000015', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Teldeniya Zonal Department Of Education ', 'short_name' => 'Teldeniya Zone '),
            array('workplace_id' => 'ZEO0000016', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Waththegama Zonal Department Of Education', 'short_name' => 'Waththegama Zone'),
            array('workplace_id' => 'ZEO0000017', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Katugastota Zonal Department Of Education', 'short_name' => 'Katugastota Zone'),
            array('workplace_id' => 'ZEO0000018', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Matale Zonal Department Of Education', 'short_name' => 'Matale Zone'),
            array('workplace_id' => 'ZEO0000019', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Galewela Zonal Department Of Education', 'short_name' => 'Galewela Zone'),
            array('workplace_id' => 'ZEO0000020', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Naula Zonal Department Of Education', 'short_name' => 'Naula Zone'),
            array('workplace_id' => 'ZEO0000021', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Wilgamuwa Zonal Department Of Education', 'short_name' => 'Wilgamuwa Zone'),
            array('workplace_id' => 'ZEO0000022', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Nuwaraeliya  Zonal Department Of Education', 'short_name' => 'Nuwaraeliya  Zone'),
            array('workplace_id' => 'ZEO0000023', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Kotmale Zonal Department Of Education', 'short_name' => 'Kotmale Zone'),
            array('workplace_id' => 'ZEO0000024', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Hatton Zonal Department Of Education', 'short_name' => 'Hatton Zone'),
            array('workplace_id' => 'ZEO0000025', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Walapane Zonal Department Of Education', 'short_name' => 'Walapane Zone'),
            array('workplace_id' => 'ZEO0000026', 'peo_wp_id' => 'PEO0000001', 'district_id' => NULL, 'name' => 'Hanguranketha Zonal Department Of Education', 'short_name' => 'Hanguranketha Zone'),

            // Southern Province Zones (PEO0000005)
            array('workplace_id' => 'ZEO0000027', 'peo_wp_id' => 'PEO0000005', 'district_id' => NULL, 'name' => 'Galle Zonal Department Of Education', 'short_name' => 'Galle Zone'),
            array('workplace_id' => 'ZEO0000028', 'peo_wp_id' => 'PEO0000005', 'district_id' => NULL, 'name' => 'Elpitiya Zonal Department Of Education', 'short_name' => 'Elpitiya Zone'),
            array('workplace_id' => 'ZEO0000029', 'peo_wp_id' => 'PEO0000005', 'district_id' => NULL, 'name' => 'Ambalangoda Zonal Department Of Education', 'short_name' => 'Ambalangoda Zone'),
            array('workplace_id' => 'ZEO0000030', 'peo_wp_id' => 'PEO0000005', 'district_id' => NULL, 'name' => 'Udugama Zonal Department Of Education', 'short_name' => 'Udugama Zone'),
            array('workplace_id' => 'ZEO0000031', 'peo_wp_id' => 'PEO0000005', 'district_id' => NULL, 'name' => 'Matara Zonal Department Of Education', 'short_name' => 'Matara Zone'),
            array('workplace_id' => 'ZEO0000032', 'peo_wp_id' => 'PEO0000005', 'district_id' => NULL, 'name' => 'Akuressa Zonal Department Of Education', 'short_name' => 'Akuressa Zone'),
            array('workplace_id' => 'ZEO0000033', 'peo_wp_id' => 'PEO0000005', 'district_id' => NULL, 'name' => 'Hakmana Zonal Department Of Education', 'short_name' => 'Hakmana Zone'),
            array('workplace_id' => 'ZEO0000034', 'peo_wp_id' => 'PEO0000005', 'district_id' => NULL, 'name' => 'Morawaka Zonal Department Of Education', 'short_name' => 'Morawaka Zone'),
            array('workplace_id' => 'ZEO0000035', 'peo_wp_id' => 'PEO0000005', 'district_id' => NULL, 'name' => 'Tangalle Zonal Department Of Education', 'short_name' => 'Tangalle Zone'),
            array('workplace_id' => 'ZEO0000036', 'peo_wp_id' => 'PEO0000005', 'district_id' => NULL, 'name' => 'Hambantota Zonal Department Of Education', 'short_name' => 'Hambantota Zone'),
            array('workplace_id' => 'ZEO0000037', 'peo_wp_id' => 'PEO0000005', 'district_id' => NULL, 'name' => 'Walasmulla Zonal Department Of Education', 'short_name' => 'Walasmulla Zone'),

            // Northern Province Zones (PEO0000007)
            array('workplace_id' => 'ZEO0000038', 'peo_wp_id' => 'PEO0000007', 'district_id' => NULL, 'name' => 'Jaffana Zonal Department Of Education', 'short_name' => 'Jaffana Zone'),
            array('workplace_id' => 'ZEO0000039', 'peo_wp_id' => 'PEO0000007', 'district_id' => NULL, 'name' => 'Islands Zonal Department Of Education', 'short_name' => 'Islands Zone'),
            array('workplace_id' => 'ZEO0000040', 'peo_wp_id' => 'PEO0000007', 'district_id' => NULL, 'name' => 'Thenmarachchi Zonal Department Of Education', 'short_name' => 'Thenmarachchi Zone'),
            array('workplace_id' => 'ZEO0000041', 'peo_wp_id' => 'PEO0000007', 'district_id' => NULL, 'name' => 'Walikamam Zonal Department Of Education', 'short_name' => 'Walikamam Zone'),
            array('workplace_id' => 'ZEO0000042', 'peo_wp_id' => 'PEO0000007', 'district_id' => NULL, 'name' => 'Wadamarachchi Zonal Department Of Education', 'short_name' => 'Wadamarachchi Zone'),
            array('workplace_id' => 'ZEO0000043', 'peo_wp_id' => 'PEO0000007', 'district_id' => NULL, 'name' => 'Kilinochchi Zonal Department Of Education(North)', 'short_name' => 'Kilinochchi Zone(North)'),
            //new
            array('workplace_id' => 'ZEO0000100', 'peo_wp_id' => 'PEO0000007', 'district_id' => NULL, 'name' => 'Kilinochchi Zonal Department Of Education(South)', 'short_name' => 'Kilinochchi Zone(South)'),
            array('workplace_id' => 'ZEO0000044', 'peo_wp_id' => 'PEO0000007', 'district_id' => NULL, 'name' => 'Mannar Zonal Department Of Education', 'short_name' => 'Mannar Zone'),
            array('workplace_id' => 'ZEO0000045', 'peo_wp_id' => 'PEO0000007', 'district_id' => NULL, 'name' => 'Madu Zonal Department Of Education', 'short_name' => 'Madu Zone'),
            array('workplace_id' => 'ZEO0000046', 'peo_wp_id' => 'PEO0000007', 'district_id' => NULL, 'name' => 'Vavniya South Division Department Of Education', 'short_name' => 'Vavniya Division'),
            array('workplace_id' => 'ZEO0000047', 'peo_wp_id' => 'PEO0000007', 'district_id' => NULL, 'name' => 'Vavniya North Zonal Department Of Education', 'short_name' => 'Vavniya North Zone'),
            array('workplace_id' => 'ZEO0000048', 'peo_wp_id' => 'PEO0000007', 'district_id' => NULL, 'name' => 'Mullaitivu Zonal Department Of Education', 'short_name' => 'Mullaitivu Zone'),
            array('workplace_id' => 'ZEO0000049', 'peo_wp_id' => 'PEO0000007', 'district_id' => NULL, 'name' => 'Thunukkai Zonal Department Of Education', 'short_name' => 'Thunukkai Zone'),

            // Eastern Province Zones (PEO0000003)
            array('workplace_id' => 'ZEO0000050', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Batticaloa Zonal Department Of Education', 'short_name' => 'Batticaloa Zone'),
            array('workplace_id' => 'ZEO0000051', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Kalkudah Zonal Department Of Education', 'short_name' => 'Kalkudah Zone'),
            array('workplace_id' => 'ZEO0000052', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Paddrippu Zonal Department Of Education', 'short_name' => 'Paddrippu Zone'),
            array('workplace_id' => 'ZEO0000053', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Batticaloa Central Zonal Department Of Education', 'short_name' => 'Batticaloa Central Zone'),
            array('workplace_id' => 'ZEO0000054', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Batticaloa west Zonal Department Of Education', 'short_name' => 'Batticaloa west Zone'),
            array('workplace_id' => 'ZEO0000055', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Ampara Zonal Department Of Education', 'short_name' => 'Ampara Zone'),
            array('workplace_id' => 'ZEO0000056', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Kalmunai Zonal Department Of Education', 'short_name' => 'Kalmunai Zone'),
            array('workplace_id' => 'ZEO0000057', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Sammanthurai Zonal Department Of Education', 'short_name' => 'Sammanthurai Zone'),
            array('workplace_id' => 'ZEO0000058', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Mahaoya Zonal Department Of Education', 'short_name' => 'Mahaoya Zone'),
            array('workplace_id' => 'ZEO0000059', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Dehiattakandiya Zonal Department Of Education', 'short_name' => 'Dehiattakandiya Zone'),
            array('workplace_id' => 'ZEO0000060', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Akkaraipattu Zonal Department Of Education', 'short_name' => 'Akkaraipattu Zone'),
            array('workplace_id' => 'ZEO0000061', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Thirukkovil Zonal Department Of Education', 'short_name' => 'Thirukkovil Zone'),
            array('workplace_id' => 'ZEO0000062', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Trincomale Zonal Department Of Education', 'short_name' => 'Trincomale Zone'),
            array('workplace_id' => 'ZEO0000063', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Mutur Zonal Department Of Education', 'short_name' => 'Mutur Zone'),
            array('workplace_id' => 'ZEO0000064', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Kantalai Zonal Department Of Education', 'short_name' => 'Kantalai Zone'),
            array('workplace_id' => 'ZEO0000065', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Kinniya Zonal Department Of Education', 'short_name' => 'Kinniya Zone'),
            array('workplace_id' => 'ZEO0000066', 'peo_wp_id' => 'PEO0000003', 'district_id' => NULL, 'name' => 'Trincomale North Zonal Department Of Education', 'short_name' => 'Trincomale North Zone'),

            // North Western Province Zones (PEO0000004)
            array('workplace_id' => 'ZEO0000067', 'peo_wp_id' => 'PEO0000004', 'district_id' => NULL, 'name' => 'Kurunegala Zonal Department Of Education', 'short_name' => 'Kurunegala Zone'),
            array('workplace_id' => 'ZEO0000068', 'peo_wp_id' => 'PEO0000004', 'district_id' => NULL, 'name' => 'Kuliyapitiya Zonal Department Of Education', 'short_name' => 'Kuliyapitiya Zone'),
            array('workplace_id' => 'ZEO0000069', 'peo_wp_id' => 'PEO0000004', 'district_id' => NULL, 'name' => 'Nikaweratiya Zonal Department Of Education', 'short_name' => 'Nikaweratiya Zone'),
            array('workplace_id' => 'ZEO0000070', 'peo_wp_id' => 'PEO0000004', 'district_id' => NULL, 'name' => 'Maho Zonal Department Of Education', 'short_name' => 'Maho Zone'),
            array('workplace_id' => 'ZEO0000071', 'peo_wp_id' => 'PEO0000004', 'district_id' => NULL, 'name' => 'Giriulla Zonal Department Of Education', 'short_name' => 'Giriulla Zone'),
            array('workplace_id' => 'ZEO0000072', 'peo_wp_id' => 'PEO0000004', 'district_id' => NULL, 'name' => 'Ibbagamuwa Zonal Department Of Education', 'short_name' => 'Ibbagamuwa Zone'),
            array('workplace_id' => 'ZEO0000073', 'peo_wp_id' => 'PEO0000004', 'district_id' => NULL, 'name' => 'Puttalam Zonal Department Of Education', 'short_name' => 'Puttalam Zone'),
            array('workplace_id' => 'ZEO0000074', 'peo_wp_id' => 'PEO0000004', 'district_id' => NULL, 'name' => 'Chilaw Zonal Department Of Education', 'short_name' => 'Chilaw Zone'),

            // North Central Province Zones (PEO0000009)
            array('workplace_id' => 'ZEO0000075', 'peo_wp_id' => 'PEO0000009', 'district_id' => NULL, 'name' => 'Anuradhapura Zonal Department Of Education', 'short_name' => 'Anuradhapura Zone'),
            array('workplace_id' => 'ZEO0000076', 'peo_wp_id' => 'PEO0000009', 'district_id' => NULL, 'name' => 'Tambuttegama Zonal Department Of Education', 'short_name' => 'Tambuttegama Zone'),
            array('workplace_id' => 'ZEO0000077', 'peo_wp_id' => 'PEO0000009', 'district_id' => NULL, 'name' => 'Kekirawa Zonal Department Of Education', 'short_name' => 'Kekirawa Zone'),
            array('workplace_id' => 'ZEO0000078', 'peo_wp_id' => 'PEO0000009', 'district_id' => NULL, 'name' => 'Galenbindunuwewa Zonal Department Of Education', 'short_name' => 'Galenbindunuwewa Zone'),
            array('workplace_id' => 'ZEO0000079', 'peo_wp_id' => 'PEO0000009', 'district_id' => NULL, 'name' => 'Kebithigollewa Zonal Department Of Education', 'short_name' => 'Kebithigollewa Zone'),
            array('workplace_id' => 'ZEO0000080', 'peo_wp_id' => 'PEO0000009', 'district_id' => NULL, 'name' => 'Polonnaruwa Zonal Department Of Education', 'short_name' => 'Polonnaruwa Zone'),
            array('workplace_id' => 'ZEO0000081', 'peo_wp_id' => 'PEO0000009', 'district_id' => NULL, 'name' => 'Hingurakgoda Zonal Department Of Education', 'short_name' => 'Hingurakgoda Zone'),
            array('workplace_id' => 'ZEO0000082', 'peo_wp_id' => 'PEO0000009', 'district_id' => NULL, 'name' => 'Dimbulagala Zonal Department Of Education', 'short_name' => 'Dimbulagala Zone'),

            // Uva Province Zones (PEO0000008)
            array('workplace_id' => 'ZEO0000083', 'peo_wp_id' => 'PEO0000008', 'district_id' => NULL, 'name' => 'Badulla Zonal Department Of Education', 'short_name' => 'Badulla Zone'),
            array('workplace_id' => 'ZEO0000084', 'peo_wp_id' => 'PEO0000008', 'district_id' => NULL, 'name' => 'Viyaluwa Zonal Department Of Education', 'short_name' => 'Viyaluwa Zone'),
            array('workplace_id' => 'ZEO0000085', 'peo_wp_id' => 'PEO0000008', 'district_id' => NULL, 'name' => 'Bandarawela Zonal Department Of Education', 'short_name' => 'Bandarawela Zone'),
            array('workplace_id' => 'ZEO0000086', 'peo_wp_id' => 'PEO0000008', 'district_id' => NULL, 'name' => 'Mahiyanganaya Zonal Department Of Education', 'short_name' => 'Mahiyanganaya Zone'),
            array('workplace_id' => 'ZEO0000087', 'peo_wp_id' => 'PEO0000008', 'district_id' => NULL, 'name' => 'Welimada Zonal Department Of Education', 'short_name' => 'Welimada Zone'),
            array('workplace_id' => 'ZEO0000088', 'peo_wp_id' => 'PEO0000008', 'district_id' => NULL, 'name' => 'Passara Zonal Department Of Education', 'short_name' => 'Passara Zone'),
            array('workplace_id' => 'ZEO0000089', 'peo_wp_id' => 'PEO0000008', 'district_id' => NULL, 'name' => 'Monaragala Zonal Department Of Education', 'short_name' => 'Monaragala Zone'),
            array('workplace_id' => 'ZEO0000090', 'peo_wp_id' => 'PEO0000008', 'district_id' => NULL, 'name' => 'Wellawaya Zonal Department Of Education', 'short_name' => 'Wellawaya Zone'),
            array('workplace_id' => 'ZEO0000091', 'peo_wp_id' => 'PEO0000008', 'district_id' => NULL, 'name' => 'Tanamalwila Zonal Department Of Education', 'short_name' => 'Tanamalwila Zone'),
            array('workplace_id' => 'ZEO0000092', 'peo_wp_id' => 'PEO0000008', 'district_id' => NULL, 'name' => 'Bibile Zonal Department Of Education', 'short_name' => 'Bibile Zone'),

            // Sabaragamuwa Province Zones (PEO0000002)
            array('workplace_id' => 'ZEO0000093', 'peo_wp_id' => 'PEO0000002', 'district_id' => NULL, 'name' => 'Ratnapura Zonal Department Of Education', 'short_name' => 'Ratnapura Zone'),
            array('workplace_id' => 'ZEO0000094', 'peo_wp_id' => 'PEO0000002', 'district_id' => NULL, 'name' => 'Balangoda Zonal Department Of Education', 'short_name' => 'Balangoda Zone'),
            array('workplace_id' => 'ZEO0000095', 'peo_wp_id' => 'PEO0000002', 'district_id' => NULL, 'name' => 'Nivitigala Zonal Department Of Education', 'short_name' => 'Nivitigala Zone'),
            array('workplace_id' => 'ZEO0000096', 'peo_wp_id' => 'PEO0000002', 'district_id' => NULL, 'name' => 'Embilipitiya Zonal Department Of Education', 'short_name' => 'Embilipitiya Zone'),
            array('workplace_id' => 'ZEO0000097', 'peo_wp_id' => 'PEO0000002', 'district_id' => NULL, 'name' => 'Kegalle Zonal Department Of Education', 'short_name' => 'Kegalle Zone'),
            array('workplace_id' => 'ZEO0000098', 'peo_wp_id' => 'PEO0000002', 'district_id' => NULL, 'name' => 'Mawanella Zonal Department Of Education', 'short_name' => 'Mawanella Zone'),
            array('workplace_id' => 'ZEO0000099', 'peo_wp_id' => 'PEO0000002', 'district_id' => NULL, 'name' => 'Dehiowita Zonal Department Of Education', 'short_name' => 'Dehiowita Zone'),
        ];

        foreach ($zonalOffices as $office) {
            DB::table('zonal_education_offices')->updateOrInsert(
                ['workplace_id' => $office['workplace_id']],
                
                [
                    'peo_wp_id' => $office['peo_wp_id'],
                    'district_id' => $office['district_id'],
                    'name' => $office['name'],
                    'short_name' => $office['short_name'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]
            );
        }
    }
}
