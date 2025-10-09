<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionalEducationOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisionalOffices = [
            // Western Province Zones (PEO006)
            array("workplace_id"=>"DEO0000001", "zeo_wp_id"=>"ZEO0000001", "name"=>"Colombo-north Division Department Of Education", "short_name"=>"Colombo-north Division"),
            array("workplace_id"=>"DEO0000002", "zeo_wp_id"=>"ZEO0000001", "name"=>"Colombo-central Division Department Of Education", "short_name"=>"Colombo-central Division"),
            array("workplace_id"=>"DEO0000003", "zeo_wp_id"=>"ZEO0000001", "name"=>"Colombo-south Division Department Of Education", "short_name"=>"Colombo-south Division"),
            array("workplace_id"=>"DEO0000004", "zeo_wp_id"=>"ZEO0000001", "name"=>"Borella Division Department Of Education", "short_name"=>"Borella Division"),

            array("workplace_id"=>"DEO0000005", "zeo_wp_id"=>"ZEO0000002", "name"=>"Homagama Division Department Of Education", "short_name"=>"Homagama Division"),
            array("workplace_id"=>"DEO0000006", "zeo_wp_id"=>"ZEO0000002", "name"=>"Hanwella Division Department Of Education", "short_name"=>"Hanwella Division"),
            array("workplace_id"=>"DEO0000007", "zeo_wp_id"=>"ZEO0000002", "name"=>"Padukka Division Department Of Education", "short_name"=>"Padukka Division"),

            array("workplace_id"=>"DEO0000008", "zeo_wp_id"=>"ZEO0000003", "name"=>"Kolonnawa Division Department Of Education", "short_name"=>"Kolonnawa Division"),
            array("workplace_id"=>"DEO0000009", "zeo_wp_id"=>"ZEO0000003", "name"=>"Nugegoda Division Department Of Education", "short_name"=>"Nugegoda Division"),
            array("workplace_id"=>"DEO0000010", "zeo_wp_id"=>"ZEO0000003", "name"=>"Maharagma Division Department Of Education", "short_name"=>"Maharagma Division"),
            array("workplace_id"=>"DEO0000011", "zeo_wp_id"=>"ZEO0000003", "name"=>"Kaduwela Division Department Of Education", "short_name"=>"Kaduwela Division"),
            
            array("workplace_id"=>"DEO0000012", "zeo_wp_id"=>"ZEO0000004", "name"=>"Dehiwala Division Department Of Education", "short_name"=>"Dehiwala Division"),
            array("workplace_id"=>"DEO0000013", "zeo_wp_id"=>"ZEO0000004", "name"=>"Moratuwa Division Department Of Education", "short_name"=>"Moratuwa Division"),
            array("workplace_id"=>"DEO0000014", "zeo_wp_id"=>"ZEO0000004", "name"=>"Kesbewa Division Department Of Education", "short_name"=>"Kesbewa Division"),
            
            array("workplace_id"=>"DEO0000015", "zeo_wp_id"=>"ZEO0000005", "name"=>"Gampaha Division Department Of Education", "short_name"=>"Gampaha Division"),
            array("workplace_id"=>"DEO0000016", "zeo_wp_id"=>"ZEO0000005", "name"=>"Attanagalla Division Department Of Education", "short_name"=>"Attanagalla Division"),
            array("workplace_id"=>"DEO0000017", "zeo_wp_id"=>"ZEO0000005", "name"=>"Dompe Division Department Of Education", "short_name"=>"Dompe Division"),
            
            array("workplace_id"=>"DEO0000018", "zeo_wp_id"=>"ZEO0000006", "name"=>"Minuwangoda Division Department Of Education", "short_name"=>"Minuwangoda Division"),
            array("workplace_id"=>"DEO0000019", "zeo_wp_id"=>"ZEO0000006", "name"=>"Mirigama Division Department Of Education", "short_name"=>"Mirigama Division"),
            array("workplace_id"=>"DEO0000020", "zeo_wp_id"=>"ZEO0000006", "name"=>"Diuvlapitiya Division Department Of Education", "short_name"=>"Diuvlapitiya Division"),
            
            array("workplace_id"=>"DEO0000021", "zeo_wp_id"=>"ZEO0000007", "name"=>"Negombo Division Department Of Education", "short_name"=>"Negombo Division"),
            array("workplace_id"=>"DEO0000022", "zeo_wp_id"=>"ZEO0000007", "name"=>"Katana Division Department Of Education", "short_name"=>"Katana Division"),
            array("workplace_id"=>"DEO0000023", "zeo_wp_id"=>"ZEO0000007", "name"=>"Ja-Ela Division Department Of Education", "short_name"=>"Ja-Ela Division"),
            
            array("workplace_id"=>"DEO0000024", "zeo_wp_id"=>"ZEO0000008", "name"=>"Kelaniya Division Department Of Education", "short_name"=>"Kelaniya Division"),
            array("workplace_id"=>"DEO0000025", "zeo_wp_id"=>"ZEO0000008", "name"=>"Wattala Division Department Of Education", "short_name"=>"Wattala Division"),
            array("workplace_id"=>"DEO0000026", "zeo_wp_id"=>"ZEO0000008", "name"=>"Biyagama Division Department Of Education", "short_name"=>"Biyagama Division"),
            array("workplace_id"=>"DEO0000027", "zeo_wp_id"=>"ZEO0000008", "name"=>"Mahara Division Department Of Education", "short_name"=>"Mahara Division"),
            
            array("workplace_id"=>"DEO0000028", "zeo_wp_id"=>"ZEO0000009", "name"=>"Kalutara Division Department Of Education", "short_name"=>"Kalutara Division"),
            array("workplace_id"=>"DEO0000029", "zeo_wp_id"=>"ZEO0000009", "name"=>"Beruwala Division Department Of Education", "short_name"=>"Beruwala Division"),
            array("workplace_id"=>"DEO0000030", "zeo_wp_id"=>"ZEO0000009", "name"=>"Panadura Division Department Of Education", "short_name"=>"Panadura Division"),
            array("workplace_id"=>"DEO0000031", "zeo_wp_id"=>"ZEO0000009", "name"=>"Dodangoda Division Department Of Education", "short_name"=>"Dodangoda Division"),
            
            array("workplace_id"=>"DEO0000032", "zeo_wp_id"=>"ZEO0000010", "name"=>"Matugama Division Department Of Education", "short_name"=>"Matugama Division"),
            array("workplace_id"=>"DEO0000033", "zeo_wp_id"=>"ZEO0000010", "name"=>"Agalawatta Division Department Of Education", "short_name"=>"Agalawatta 1 Division"),
            array("workplace_id"=>"DEO0000034", "zeo_wp_id"=>"ZEO0000010", "name"=>"Palindanuwara Division Department Of Education", "short_name"=>"Palindanuwara Division"),
            array("workplace_id"=>"DEO0000035", "zeo_wp_id"=>"ZEO0000010", "name"=>"Walallawita Division Department Of Education", "short_name"=>"Walallawita Division"),
            
            array("workplace_id"=>"DEO0000036", "zeo_wp_id"=>"ZEO0000011", "name"=>"Horana Division Department Of Education", "short_name"=>"Horana Division"),
            array("workplace_id"=>"DEO0000037", "zeo_wp_id"=>"ZEO0000011", "name"=>"Bandaragama Division Department Of Education", "short_name"=>"Bandaragama Division"),
            array("workplace_id"=>"DEO0000038", "zeo_wp_id"=>"ZEO0000011", "name"=>"Bulathsinhala Division Department Of Education", "short_name"=>"Bulathsinhala Division"),
            
            array("workplace_id"=>"DEO0000039", "zeo_wp_id"=>"ZEO0000012", "name"=>"Gangawata Korale Division Department Of Education", "short_name"=>"Gangawata Korale Division"),
            array("workplace_id"=>"DEO0000040", "zeo_wp_id"=>"ZEO0000012", "name"=>"Patha hewaheta Division Department Of Education", "short_name"=>"Patha hewaheta Division"),
            
            array("workplace_id"=>"DEO0000041", "zeo_wp_id"=>"ZEO0000013", "name"=>"Yati Nuwara Division Department Of Education", "short_name"=>"Yati Nuwara Division"),
            array("workplace_id"=>"DEO0000042", "zeo_wp_id"=>"ZEO0000013", "name"=>"Uda Nuwara Division Department Of Education", "short_name"=>"Uda Nuwara Division"),
            
            array("workplace_id"=>"DEO0000043", "zeo_wp_id"=>"ZEO0000014", "name"=>"Uda Palatha Division Department Of Education", "short_name"=>"Uda Palatha Division"),
            array("workplace_id"=>"DEO0000044", "zeo_wp_id"=>"ZEO0000014", "name"=>"Ganga-Ihala Korale Division Department Of Education", "short_name"=>"Ganga-Ihala Korale Division"),
            array("workplace_id"=>"DEO0000045", "zeo_wp_id"=>"ZEO0000014", "name"=>"Pasbage Korale Division Department Of Education", "short_name"=>"Pasbage Korale Division"),
            
            array("workplace_id"=>"DEO0000046", "zeo_wp_id"=>"ZEO0000015", "name"=>"Minipe Division Department Of Education", "short_name"=>"Minipe Division"),
            array("workplace_id"=>"DEO0000047", "zeo_wp_id"=>"ZEO0000015", "name"=>"Medadumbara Division Department Of Education", "short_name"=>"Medadumbara Division"),
            array("workplace_id"=>"DEO0000048", "zeo_wp_id"=>"ZEO0000015", "name"=>"Udadumbara Division Department Of Education", "short_name"=>"Udadumbara Division"),
            
            array("workplace_id"=>"DEO0000049", "zeo_wp_id"=>"ZEO0000016", "name"=>"Kundasale Division Department Of Education", "short_name"=>"Kundasale Division"),
            array("workplace_id"=>"DEO0000050", "zeo_wp_id"=>"ZEO0000016", "name"=>"Pathadumbara Division Department Of Education", "short_name"=>"Pathadumbara Division"),
            array("workplace_id"=>"DEO0000051", "zeo_wp_id"=>"ZEO0000016", "name"=>"Panvila Division Department Of Education", "short_name"=>"Panvila Division"),
            
            array("workplace_id"=>"DEO0000052", "zeo_wp_id"=>"ZEO0000017", "name"=>"Harispattuwa Division Department Of Education", "short_name"=>"Harispattuwa Division"),
            array("workplace_id"=>"DEO0000053", "zeo_wp_id"=>"ZEO0000017", "name"=>"Galagedara Division Department Of Education", "short_name"=>"Galagedara Division"),
            array("workplace_id"=>"DEO0000054", "zeo_wp_id"=>"ZEO0000017", "name"=>"Akurana Division Department Of Education", "short_name"=>"Akurana Division"),
            array("workplace_id"=>"DEO0000055", "zeo_wp_id"=>"ZEO0000017", "name"=>"Pujapitiya Division Department Of Education", "short_name"=>"Pujapitiya Division"),
            array("workplace_id"=>"DEO0000056", "zeo_wp_id"=>"ZEO0000017", "name"=>"Hataraliyadda Division Department Of Education", "short_name"=>"Hataraliyadda Division"),
            
            array("workplace_id"=>"DEO0000057", "zeo_wp_id"=>"ZEO0000018", "name"=>"Matale Division Department Of Education", "short_name"=>"Matale Division"),
            array("workplace_id"=>"DEO0000058", "zeo_wp_id"=>"ZEO0000018", "name"=>"Rattota Division Department Of Education", "short_name"=>"Rattota Division"),
            array("workplace_id"=>"DEO0000059", "zeo_wp_id"=>"ZEO0000018", "name"=>"Yatawatta Division Department Of Education", "short_name"=>"Yatawatta Division"),
            array("workplace_id"=>"DEO0000060", "zeo_wp_id"=>"ZEO0000018", "name"=>"Ukuwela Division Department Of Education", "short_name"=>"Ukuwela Division"),
            
            array("workplace_id"=>"DEO0000061", "zeo_wp_id"=>"ZEO0000019", "name"=>"Galewela Division Department Of Education", "short_name"=>"Galewela Division"),
            array("workplace_id"=>"DEO0000062", "zeo_wp_id"=>"ZEO0000019", "name"=>"Pallepola Division Department Of Education", "short_name"=>"Pallepola Division"),
            array("workplace_id"=>"DEO0000063", "zeo_wp_id"=>"ZEO0000019", "name"=>"Dambulla Division Department Of Education", "short_name"=>"Dambulla Division"),
            
            array("workplace_id"=>"DEO0000064", "zeo_wp_id"=>"ZEO0000020", "name"=>"Naula Division Department Of Education", "short_name"=>"Naula Division"),
            array("workplace_id"=>"DEO0000065", "zeo_wp_id"=>"ZEO0000020", "name"=>"Ambanganga Korale Division Department Of Education", "short_name"=>"Ambanganga Korale Division"),
            
            array("workplace_id"=>"DEO0000066", "zeo_wp_id"=>"ZEO0000021", "name"=>"Wilgamuwa Division Department Of Education", "short_name"=>"Wilgamuwa Division"),
            array("workplace_id"=>"DEO0000067", "zeo_wp_id"=>"ZEO0000021", "name"=>"Laggala Division Department Of Education", "short_name"=>"Laggala Division"),
            
            array("workplace_id"=>"DEO0000068", "zeo_wp_id"=>"ZEO0000022", "name"=>"Nuwaraeliya Division Department Of Education", "short_name"=>"Nuwaraeliya Division"),
            array("workplace_id"=>"DEO0000069", "zeo_wp_id"=>"ZEO0000022", "name"=>"Nuwaraeliya T-1 Division Department Of Education", "short_name"=>"Nuwaraeliya T-1 Division"),
            array("workplace_id"=>"DEO0000070", "zeo_wp_id"=>"ZEO0000022", "name"=>"Nuwaraeliya T-2 Division Department Of Education", "short_name"=>"Nuwaraeliya T-2 Division"),
            array("workplace_id"=>"DEO0000071", "zeo_wp_id"=>"ZEO0000022", "name"=>"Nuwaraeliya T-3 Division Department Of Education", "short_name"=>"Nuwaraeliya T-3 Division"),
            
            array("workplace_id"=>"DEO0000072", "zeo_wp_id"=>"ZEO0000023", "name"=>"Kotmale Division Department Of Education", "short_name"=>"Kotmale Division"),
            
            array("workplace_id"=>"DEO0000073", "zeo_wp_id"=>"ZEO0000024", "name"=>"Ambagamuwa Division Department Of Education", "short_name"=>"Ambagamuwa Division"),
            array("workplace_id"=>"DEO0000074", "zeo_wp_id"=>"ZEO0000024", "name"=>"Hatton Tami-1 Division Department Of Education", "short_name"=>"Hatton Tami-1 Division"),
            array("workplace_id"=>"DEO0000075", "zeo_wp_id"=>"ZEO0000024", "name"=>"Hatton Tami-2 Division Department Of Education", "short_name"=>"Hatton Tami-2 Division"),
            array("workplace_id"=>"DEO0000076", "zeo_wp_id"=>"ZEO0000024", "name"=>"Hatton Tami-3 Division Department Of Education", "short_name"=>"Hatton Tami-3 Division"),
            
            array("workplace_id"=>"DEO0000077", "zeo_wp_id"=>"ZEO0000025", "name"=>"Walapane Division Department Of Education", "short_name"=>"Walapane Division"),
            
            array("workplace_id"=>"DEO0000078", "zeo_wp_id"=>"ZEO0000026", "name"=>"Hanguranketha Division Department Of Education", "short_name"=>"Hanguranketha Division"),
            
            array("workplace_id"=>"DEO0000079", "zeo_wp_id"=>"ZEO0000027", "name"=>"Galle Division Department Of Education", "short_name"=>"Galle Division"),
            array("workplace_id"=>"DEO0000080", "zeo_wp_id"=>"ZEO0000027", "name"=>"Habaraduwa Division Department Of Education", "short_name"=>"Habaraduwa Division"),
            array("workplace_id"=>"DEO0000081", "zeo_wp_id"=>"ZEO0000027", "name"=>"Akmeemana Division Department Of Education", "short_name"=>"Akmeemana Division"),
            array("workplace_id"=>"DEO0000082", "zeo_wp_id"=>"ZEO0000027", "name"=>"Baddegama Division Department Of Education", "short_name"=>"Baddegama Division"),
            
            array("workplace_id"=>"DEO0000083", "zeo_wp_id"=>"ZEO0000028", "name"=>"Elpitiya Division Department Of Education", "short_name"=>"Elpitiya Division"),
            array("workplace_id"=>"DEO0000084", "zeo_wp_id"=>"ZEO0000028", "name"=>"Karandeniya Division Department Of Education", "short_name"=>"Karandeniya Division"),
            array("workplace_id"=>"DEO0000085", "zeo_wp_id"=>"ZEO0000028", "name"=>"Bentota Division Department Of Education", "short_name"=>"Bentota Division"),
            array("workplace_id"=>"DEO0000086", "zeo_wp_id"=>"ZEO0000028", "name"=>"Divitura Welivitiya Division Department Of Education", "short_name"=>"Divitura Welivitiya Division"),
            array("workplace_id"=>"DEO0000087", "zeo_wp_id"=>"ZEO0000028", "name"=>"Pitigala (Niyagama) Division Department Of Education", "short_name"=>"Pitigala Division (Niyagama)"),
            
            array("workplace_id"=>"DEO0000088", "zeo_wp_id"=>"ZEO0000029", "name"=>"Ambalangoda Division Department Of Education", "short_name"=>"Ambalangoda Division"),
            array("workplace_id"=>"DEO0000089", "zeo_wp_id"=>"ZEO0000029", "name"=>"Hikkaduwa Division Department Of Education", "short_name"=>"Hikkaduwa Division"),
            array("workplace_id"=>"DEO0000090", "zeo_wp_id"=>"ZEO0000029", "name"=>"Balapitiya Division Department Of Education", "short_name"=>"Balapitiya Division"),
            
            array("workplace_id"=>"DEO0000091", "zeo_wp_id"=>"ZEO0000030", "name"=>"Mapalagama Division Department Of Education", "short_name"=>"Mapalagama Division"),
            array("workplace_id"=>"DEO0000092", "zeo_wp_id"=>"ZEO0000030", "name"=>"Yakkalamulla Division Department Of Education", "short_name"=>"Yakkalamulla Division"),
            array("workplace_id"=>"DEO0000093", "zeo_wp_id"=>"ZEO0000030", "name"=>"Tawalama Division Department Of Education", "short_name"=>"Tawalama Division"),
            
            array("workplace_id"=>"DEO0000094", "zeo_wp_id"=>"ZEO0000031", "name"=>"Matara Division Department Of Education", "short_name"=>"Matara Division"),
            array("workplace_id"=>"DEO0000095", "zeo_wp_id"=>"ZEO0000031", "name"=>"Weligama Division Department Of Education", "short_name"=>"Weligama Division"),
            array("workplace_id"=>"DEO0000096", "zeo_wp_id"=>"ZEO0000031", "name"=>"Devinuwara Division Department Of Education", "short_name"=>"Devinuwara Division"),
            array("workplace_id"=>"DEO0000097", "zeo_wp_id"=>"ZEO0000031", "name"=>"Dikwella Division Department Of Education", "short_name"=>"Dikwella Division"),
            
            array("workplace_id"=>"DEO0000098", "zeo_wp_id"=>"ZEO0000032", "name"=>"Akuressa Division Department Of Education", "short_name"=>"Akuressa Division"),
            array("workplace_id"=>"DEO0000099", "zeo_wp_id"=>"ZEO0000032", "name"=>"Welipitiya Division Department Of Education", "short_name"=>"Welipitiya Division"),
            array("workplace_id"=>"DEO0000100", "zeo_wp_id"=>"ZEO0000032", "name"=>"Malimboda Division Department Of Education", "short_name"=>"Malimboda Division"),
            
            array("workplace_id"=>"DEO0000101", "zeo_wp_id"=>"ZEO0000033", "name"=>"Hakmana Division Department Of Education", "short_name"=>"Hakmana Division"),
            array("workplace_id"=>"DEO0000102", "zeo_wp_id"=>"ZEO0000033", "name"=>"Tihagoda Division Department Of Education", "short_name"=>"Tihagoda Division"),
            array("workplace_id"=>"DEO0000103", "zeo_wp_id"=>"ZEO0000033", "name"=>"Mulatiyana Division Department Of Education", "short_name"=>"Mulatiyana Division"),
            array("workplace_id"=>"DEO0000104", "zeo_wp_id"=>"ZEO0000033", "name"=>"Kamburupitiya Division Department Of Education", "short_name"=>"Kamburupitiya Division"),
            
            array("workplace_id"=>"DEO0000105", "zeo_wp_id"=>"ZEO0000034", "name"=>"Morawaka Division Department Of Education", "short_name"=>"Morawaka Division"),
            array("workplace_id"=>"DEO0000106", "zeo_wp_id"=>"ZEO0000034", "name"=>"Pasgoda Division Department Of Education", "short_name"=>"Pasgoda Division"),
            array("workplace_id"=>"DEO0000107", "zeo_wp_id"=>"ZEO0000034", "name"=>"Kotapola Division Department Of Education", "short_name"=>"Kotapola Division"),
            
            array("workplace_id"=>"DEO0000108", "zeo_wp_id"=>"ZEO0000035", "name"=>"Tangalle Division Department Of Education", "short_name"=>"Tangalle Division"),
            array("workplace_id"=>"DEO0000109", "zeo_wp_id"=>"ZEO0000035", "name"=>"Beliatta Division Department Of Education", "short_name"=>"Beliatta Division"),
            array("workplace_id"=>"DEO0000110", "zeo_wp_id"=>"ZEO0000035", "name"=>"Angunakolapelessa Division Department Of Education", "short_name"=>"Angunakolapelessa Division"),
            
            array("workplace_id"=>"DEO0000111", "zeo_wp_id"=>"ZEO0000036", "name"=>"Hambantota Division Department Of Education", "short_name"=>"Hambantota Division"),
            array("workplace_id"=>"DEO0000112", "zeo_wp_id"=>"ZEO0000036", "name"=>"Tissamaharama Division Department Of Education", "short_name"=>"Tissamaharama Division"),
            array("workplace_id"=>"DEO0000113", "zeo_wp_id"=>"ZEO0000036", "name"=>"Suriyawewa Division Department Of Education", "short_name"=>"Suriyawewa Division"),
            array("workplace_id"=>"DEO0000114", "zeo_wp_id"=>"ZEO0000036", "name"=>"Ambalantota Division Department Of Education", "short_name"=>"Ambalantota Division"),
            array("workplace_id"=>"DEO0000115", "zeo_wp_id"=>"ZEO0000036", "name"=>"Lunugamwehera Division Department Of Education", "short_name"=>"Lunugamwehera Division"),
            
            array("workplace_id"=>"DEO0000116", "zeo_wp_id"=>"ZEO0000037", "name"=>"Walasmulla Division Department Of Education", "short_name"=>"Walasmulla Division"),
            array("workplace_id"=>"DEO0000117", "zeo_wp_id"=>"ZEO0000037", "name"=>"Katuwana Division Department Of Education", "short_name"=>"Katuwana Division"),
            
            array("workplace_id"=>"DEO0000118", "zeo_wp_id"=>"ZEO0000038", "name"=>"Jaffana Division Department Of Education", "short_name"=>"Jaffana Division"),
            array("workplace_id"=>"DEO0000119", "zeo_wp_id"=>"ZEO0000038", "name"=>"Nallur Division Department Of Education", "short_name"=>"Nallur Division"),
            array("workplace_id"=>"DEO0000120", "zeo_wp_id"=>"ZEO0000038", "name"=>"Kopay Division Department Of Education", "short_name"=>"Kopay Division"),
            
            array("workplace_id"=>"DEO0000121", "zeo_wp_id"=>"ZEO0000039", "name"=>"Kayts Division Department Of Education", "short_name"=>"Kayts Division"),
            array("workplace_id"=>"DEO0000122", "zeo_wp_id"=>"ZEO0000039", "name"=>"Delfts Division Department Of Education", "short_name"=>"Delfts Division"),
            array("workplace_id"=>"DEO0000123", "zeo_wp_id"=>"ZEO0000039", "name"=>"Velanai Division Department Of Education", "short_name"=>"Velanai Division"),
            array("workplace_id"=>"DEO0000124", "zeo_wp_id"=>"ZEO0000039", "name"=>"Karainagar Division Department Of Education", "short_name"=>"Karainagar Division"),
            
            array("workplace_id"=>"DEO0000125", "zeo_wp_id"=>"ZEO0000040", "name"=>"Chawakachcheri Division Department Of Education", "short_name"=>"Chawakachcheri Division"),
            
            array("workplace_id"=>"DEO0000126", "zeo_wp_id"=>"ZEO0000041", "name"=>"Uduvil Division Department Of Education", "short_name"=>"Uduvil Division"),
            array("workplace_id"=>"DEO0000127", "zeo_wp_id"=>"ZEO0000041", "name"=>"Chankanai Division Department Of Education", "short_name"=>"Chankanai Division"),
            array("workplace_id"=>"DEO0000128", "zeo_wp_id"=>"ZEO0000041", "name"=>"Sandilipay Division Department Of Education", "short_name"=>"Sandilipay Division"),
            array("workplace_id"=>"DEO0000129", "zeo_wp_id"=>"ZEO0000041", "name"=>"Tellipalai Division Department Of Education", "short_name"=>"Tellipalai Division"),
            
            array("workplace_id"=>"DEO0000130", "zeo_wp_id"=>"ZEO0000042", "name"=>"Point Pedro Division Department Of Education", "short_name"=>"Point Pedro Division"),
            array("workplace_id"=>"DEO0000131", "zeo_wp_id"=>"ZEO0000042", "name"=>"Karaveddy Division Department Of Education", "short_name"=>"Karaveddy Division"),
            array("workplace_id"=>"DEO0000132", "zeo_wp_id"=>"ZEO0000042", "name"=>"Maruthankerny Division Department Of Education", "short_name"=>"Maruthankerny Division"),
            
            
            array("workplace_id"=>"DEO0000134", "zeo_wp_id"=>"ZEO0000043", "name"=>"Kandawalai Division Department Of Education", "short_name"=>"Kandawalai Division"),
            array("workplace_id"=>"DEO0000135", "zeo_wp_id"=>"ZEO0000043", "name"=>"Pallai Division Department Of Education", "short_name"=>"Pallai Division"),
            
            array("workplace_id"=>"DEO0000137", "zeo_wp_id"=>"ZEO0000044", "name"=>"Mannar Division Department Of Education", "short_name"=>"Mannar Division"),
            array("workplace_id"=>"DEO0000138", "zeo_wp_id"=>"ZEO0000044", "name"=>"Musali Division Department Of Education", "short_name"=>"Musali Division"),
            array("workplace_id"=>"DEO0000139", "zeo_wp_id"=>"ZEO0000044", "name"=>"Nanaddan Division Department Of Education", "short_name"=>"Nanaddan Division"),
            
            array("workplace_id"=>"DEO0000140", "zeo_wp_id"=>"ZEO0000045", "name"=>"Madu Division Department Of Education", "short_name"=>"Madu Division"),
            array("workplace_id"=>"DEO0000141", "zeo_wp_id"=>"ZEO0000045", "name"=>"Manthai West Division Department Of Education", "short_name"=>"Manthai West Division"),
            
            array("workplace_id"=>"DEO0000142", "zeo_wp_id"=>"ZEO0000046", "name"=>"Vavniya South-Sinhala Division Department Of Education", "short_name"=>"Vavniya South-Sinhala Division"),
            array("workplace_id"=>"DEO0000143", "zeo_wp_id"=>"ZEO0000046", "name"=>"Vavniya South-Tamil Division Department Of Education", "short_name"=>"Vavniya South-Tamil Division"),
            array("workplace_id"=>"DEO0000144", "zeo_wp_id"=>"ZEO0000046", "name"=>"Vengalachettiulam Division Department Of Education", "short_name"=>"Vengalachettiulam Division"),
            
            array("workplace_id"=>"DEO0000145", "zeo_wp_id"=>"ZEO0000047", "name"=>"Vavniya North Division Department Of Education", "short_name"=>"Vavniya North Division"),
            array("workplace_id"=>"DEO0000146", "zeo_wp_id"=>"ZEO0000047", "name"=>"Omantai Division Department Of Education", "short_name"=>"Omantai Division"),
            
            array("workplace_id"=>"DEO0000147", "zeo_wp_id"=>"ZEO0000048", "name"=>"Maritime Pattu Division Department Of Education", "short_name"=>"Maritime Pattu Division"),
            array("workplace_id"=>"DEO0000148", "zeo_wp_id"=>"ZEO0000048", "name"=>"Puthukkudiyiruppu Division Department Of Education", "short_name"=>"Puthukkudiyiruppu Division"),
            array("workplace_id"=>"DEO0000149", "zeo_wp_id"=>"ZEO0000048", "name"=>"Welioya Division Department Of Education", "short_name"=>"Welioya Division"),
            
            array("workplace_id"=>"DEO0000150", "zeo_wp_id"=>"ZEO0000049", "name"=>"Thunukkai Division Department Of Education", "short_name"=>"Thunukkai Division"),
            array("workplace_id"=>"DEO0000151", "zeo_wp_id"=>"ZEO0000049", "name"=>"Manthai East Division Department Of Education", "short_name"=>"Manthai East Division"),
            array("workplace_id"=>"DEO0000152", "zeo_wp_id"=>"ZEO0000049", "name"=>"Oddusudan Division Department Of Education", "short_name"=>"Oddusudan Division"),
            
            array("workplace_id"=>"DEO0000153", "zeo_wp_id"=>"ZEO0000075", "name"=>"Nuwaragam Palatha(East) Division Department Of Education", "short_name"=>"Nuwaragam Palatha(East) Division"),
            array("workplace_id"=>"DEO0000154", "zeo_wp_id"=>"ZEO0000075", "name"=>"Nuwaragam Palatha(Central) Division Department Of Education", "short_name"=>"Nuwaragam Palatha(Central) Division"),
            array("workplace_id"=>"DEO0000155", "zeo_wp_id"=>"ZEO0000075", "name"=>"Rambewa Division Department Of Education", "short_name"=>"Rambewa Division"),
            array("workplace_id"=>"DEO0000156", "zeo_wp_id"=>"ZEO0000075", "name"=>"Nochchiiyagama Division Department Of Education", "short_name"=>"Nochchiiyagama Division"),
            array("workplace_id"=>"DEO0000157", "zeo_wp_id"=>"ZEO0000075", "name"=>"Wilachchiya Division Department Of Education", "short_name"=>"Wilachchiya Division"),
            array("workplace_id"=>"DEO0000158", "zeo_wp_id"=>"ZEO0000075", "name"=>"Nachchaduwa Division Department Of Education", "short_name"=>"Nachchaduwa Division"),
            
            array("workplace_id"=>"DEO0000159", "zeo_wp_id"=>"ZEO0000076", "name"=>"Tambuttegama Division Department Of Education", "short_name"=>"Tambuttegama Division"),
            array("workplace_id"=>"DEO0000160", "zeo_wp_id"=>"ZEO0000076", "name"=>"Talawa Division Department Of Education", "short_name"=>"Talawa Division"),
            array("workplace_id"=>"DEO0000161", "zeo_wp_id"=>"ZEO0000076", "name"=>"Rajanganaya Division Department Of Education", "short_name"=>"Rajanganaya Division"),
            array("workplace_id"=>"DEO0000162", "zeo_wp_id"=>"ZEO0000076", "name"=>"Galnewa Division Department Of Education", "short_name"=>"Galnewa Division"),
            
            array("workplace_id"=>"DEO0000163", "zeo_wp_id"=>"ZEO0000077", "name"=>"Kekirawa Division Department Of Education", "short_name"=>"Kekirawa Division"),
            array("workplace_id"=>"DEO0000164", "zeo_wp_id"=>"ZEO0000077", "name"=>"Palugaswewa Division Department Of Education", "short_name"=>"Palugaswewa Division"),
            array("workplace_id"=>"DEO0000165", "zeo_wp_id"=>"ZEO0000077", "name"=>"Palagala Division Department Of Education", "short_name"=>"Palagala Division"),
            array("workplace_id"=>"DEO0000166", "zeo_wp_id"=>"ZEO0000077", "name"=>"Thirappane Division Department Of Education", "short_name"=>"Thirappane Division"),
            array("workplace_id"=>"DEO0000167", "zeo_wp_id"=>"ZEO0000077", "name"=>"Ipalogama Division Department Of Education", "short_name"=>"Ipalogama Division"),
            
            array("workplace_id"=>"DEO0000168", "zeo_wp_id"=>"ZEO0000078", "name"=>"Galenbindunuwewa Division Department Of Education", "short_name"=>"Galenbindunuwewa Division"),
            array("workplace_id"=>"DEO0000169", "zeo_wp_id"=>"ZEO0000078", "name"=>"Kahatagasdigiliya Division Department Of Education", "short_name"=>"Kahatagasdigiliya Division"),
            array("workplace_id"=>"DEO0000170", "zeo_wp_id"=>"ZEO0000078", "name"=>"Mihintale Division Department Of Education", "short_name"=>"Mihintale Division"),
            
            array("workplace_id"=>"DEO0000171", "zeo_wp_id"=>"ZEO0000079", "name"=>"Kebithigollewa Division Department Of Education", "short_name"=>"Kebithigollewa Division"),
            array("workplace_id"=>"DEO0000172", "zeo_wp_id"=>"ZEO0000079", "name"=>"Padaviya Division Department Of Education", "short_name"=>"Padaviya Division"),
            array("workplace_id"=>"DEO0000173", "zeo_wp_id"=>"ZEO0000079", "name"=>"Horowpathana Division Department Of Education", "short_name"=>"Horowpathana Division"),
            array("workplace_id"=>"DEO0000174", "zeo_wp_id"=>"ZEO0000079", "name"=>"Medawachchiya Division Department Of Education", "short_name"=>"Medawachchiya Division"),
            
            array("workplace_id"=>"DEO0000175", "zeo_wp_id"=>"ZEO0000080", "name"=>"Tamankaduwa Division Department Of Education", "short_name"=>"Tamankaduwa Division"),
            array("workplace_id"=>"DEO0000176", "zeo_wp_id"=>"ZEO0000080", "name"=>"Lankapura Division Department Of Education", "short_name"=>"Lankapura Division"),
            
            array("workplace_id"=>"DEO0000177", "zeo_wp_id"=>"ZEO0000081", "name"=>"Hingurakgoda Division Department Of Education", "short_name"=>"Hingurakgoda Division"),
            array("workplace_id"=>"DEO0000178", "zeo_wp_id"=>"ZEO0000081", "name"=>"Medirigiriya Division Department Of Education", "short_name"=>"Medirigiriya Division"),
            array("workplace_id"=>"DEO0000179", "zeo_wp_id"=>"ZEO0000081", "name"=>"Elahera Division Department Of Education", "short_name"=>"Elahera Division"),
            
            array("workplace_id"=>"DEO0000180", "zeo_wp_id"=>"ZEO0000082", "name"=>"Dimbulagala Division Department Of Education", "short_name"=>"Dimbulagala Division"),
            array("workplace_id"=>"DEO0000181", "zeo_wp_id"=>"ZEO0000082", "name"=>"Welikanda Division Department Of Education", "short_name"=>"Welikanda Division"),
            array("workplace_id"=>"DEO0000182", "zeo_wp_id"=>"ZEO0000082", "name"=>"Aralaganwila Division Department Of Education", "short_name"=>"Aralaganwila Division"),
            
            array("workplace_id"=>"DEO0000183", "zeo_wp_id"=>"ZEO0000083", "name"=>"Badulla Division Department Of Education", "short_name"=>"Badulla Division"),
            array("workplace_id"=>"DEO0000184", "zeo_wp_id"=>"ZEO0000083", "name"=>"Haliela Division Department Of Education", "short_name"=>"Haliela Division"),
            
            array("workplace_id"=>"DEO0000185", "zeo_wp_id"=>"ZEO0000084", "name"=>"Soranatota Division Department Of Education", "short_name"=>"Soranatota Division"),
            array("workplace_id"=>"DEO0000186", "zeo_wp_id"=>"ZEO0000084", "name"=>"Meegahakivula Division Department Of Education", "short_name"=>"Meegahakivula Division"),
            array("workplace_id"=>"DEO0000187", "zeo_wp_id"=>"ZEO0000084", "name"=>"Kandeketiya Division Department Of Education", "short_name"=>"Kandeketiya Division"),
            
            array("workplace_id"=>"DEO0000188", "zeo_wp_id"=>"ZEO0000085", "name"=>"Bandarawela Division Department Of Education", "short_name"=>"Bandarawela Division"),
            array("workplace_id"=>"DEO0000189", "zeo_wp_id"=>"ZEO0000085", "name"=>"Haldummulla Division Department Of Education", "short_name"=>"Haldummulla Division"),
            array("workplace_id"=>"DEO0000190", "zeo_wp_id"=>"ZEO0000085", "name"=>"Haputale Division Department Of Education", "short_name"=>"Haputale Division"),
            array("workplace_id"=>"DEO0000191", "zeo_wp_id"=>"ZEO0000085", "name"=>"Ella Division Department Of Education", "short_name"=>"Ella Division"),
            
            array("workplace_id"=>"DEO0000192", "zeo_wp_id"=>"ZEO0000086", "name"=>"Mahiyanganaya Division Department Of Education", "short_name"=>"Mahiyanganaya Division"),
            array("workplace_id"=>"DEO0000193", "zeo_wp_id"=>"ZEO0000086", "name"=>"Ridimaliyedda Division Department Of Education", "short_name"=>"Ridimaliyedda Division"),
            
            array("workplace_id"=>"DEO0000194", "zeo_wp_id"=>"ZEO0000087", "name"=>"Welimada Division Department Of Education", "short_name"=>"Welimada Division"),
            array("workplace_id"=>"DEO0000195", "zeo_wp_id"=>"ZEO0000087", "name"=>"Uva-Paranagama Division Department Of Education", "short_name"=>"Uva-Paranagama Division"),
            
            array("workplace_id"=>"DEO0000196", "zeo_wp_id"=>"ZEO0000088", "name"=>"Passara Division Department Of Education", "short_name"=>"Passara Division"),
            
            array("workplace_id"=>"DEO0000197", "zeo_wp_id"=>"ZEO0000089", "name"=>"Siyambalanduwa Division Department Of Education", "short_name"=>"Siyambalanduwa Division"),
            array("workplace_id"=>"DEO0000198", "zeo_wp_id"=>"ZEO0000089", "name"=>"Monaragala Division Department Of Education", "short_name"=>"Monaragala Division"),
            array("workplace_id"=>"DEO0000199", "zeo_wp_id"=>"ZEO0000089", "name"=>"Badalkumbura Division Department Of Education", "short_name"=>"Badalkumbura Division"),
            
            array("workplace_id"=>"DEO0000200", "zeo_wp_id"=>"ZEO0000090", "name"=>"Wellawaya Division Department Of Education", "short_name"=>"Wellawaya Division"),
            array("workplace_id"=>"DEO0000201", "zeo_wp_id"=>"ZEO0000090", "name"=>"Buttala Division Department Of Education", "short_name"=>"Buttala Division"),
            
            array("workplace_id"=>"DEO0000202", "zeo_wp_id"=>"ZEO0000091", "name"=>"Tanamalwila Division Department Of Education", "short_name"=>"Tanamalwila Division"),
            
            array("workplace_id"=>"DEO0000203", "zeo_wp_id"=>"ZEO0000092", "name"=>"Bibile Division Department Of Education", "short_name"=>"Bibile Division"),
            array("workplace_id"=>"DEO0000204", "zeo_wp_id"=>"ZEO0000092", "name"=>"Madulla Division Department Of Education", "short_name"=>"Madulla Division"),
            array("workplace_id"=>"DEO0000205", "zeo_wp_id"=>"ZEO0000092", "name"=>"Medagama Division Department Of Education", "short_name"=>"Medagama Division"),
            
            array("workplace_id"=>"DEO0000206", "zeo_wp_id"=>"ZEO0000050", "name"=>"Manmunai - North (Batticaloa) Division Department Of Education", "short_name"=>"Manmunai - North (Batticaloa) Division"),
            array("workplace_id"=>"DEO0000207", "zeo_wp_id"=>"ZEO0000050", "name"=>"Eravur Pattu - 1 (Chenkalady) Division Department Of Education", "short_name"=>"Eravur Pattu - 1 (Chenkalady) Division"),
            array("workplace_id"=>"DEO0000208", "zeo_wp_id"=>"ZEO0000050", "name"=>"Manmunai Pattu (Arraiyampathy) Division Department Of Education", "short_name"=>"Manmunai Pattu (Arraiyampathy) Division"),
            
            array("workplace_id"=>"DEO0000209", "zeo_wp_id"=>"ZEO0000051", "name"=>"Koralapattu North (Vakarai) Division Department Of Education", "short_name"=>"Koralapattu North (Vakarai) Division"),
            array("workplace_id"=>"DEO0000210", "zeo_wp_id"=>"ZEO0000051", "name"=>"Koralaipattu (Valaichchenai) Division Department Of Education", "short_name"=>"Koralaipattu (Valaichchenai) Division"),
            array("workplace_id"=>"DEO0000211", "zeo_wp_id"=>"ZEO0000051", "name"=>"Eravurpattu - 2 (Chenkalady) Division Department Of Education", "short_name"=>"Eravurpattu - 2 (Chenkalady) Division"),
            
            array("workplace_id"=>"DEO0000212", "zeo_wp_id"=>"ZEO0000070", "name"=>"M.S.E. Pattu (Kaluwanchchikkudy) Division Department Of Education", "short_name"=>"M.S.E. Pattu (Kaluwanchchikkudy) Division"),
            array("workplace_id"=>"DEO0000213", "zeo_wp_id"=>"ZEO0000070", "name"=>"Porativupattu (Vellaveli) Division Department Of Education", "short_name"=>"Porativupattu (Vellaveli) Division"),
            
            array("workplace_id"=>"DEO0000214", "zeo_wp_id"=>"ZEO0000053", "name"=>"Eravur Town Division Department Of Education", "short_name"=>"Eravur Town Division"),
            array("workplace_id"=>"DEO0000215", "zeo_wp_id"=>"ZEO0000053", "name"=>"Kaththankudi Division Department Of Education", "short_name"=>"Kaththankudi Division"),
            array("workplace_id"=>"DEO0000216", "zeo_wp_id"=>"ZEO0000053", "name"=>"Koralapattu West (Oddamavdi) Division Department Of Education", "short_name"=>"Koralapattu West (Oddamavdi) Division"),
            
            array("workplace_id"=>"DEO0000217", "zeo_wp_id"=>"ZEO0000054", "name"=>"Eravur Pattu - 3 Division Department Of Education", "short_name"=>"Eravur Pattu - 3 Division"),
            array("workplace_id"=>"DEO0000218", "zeo_wp_id"=>"ZEO0000054", "name"=>"Manmunai - West (Vavunativu) Division Department Of Education", "short_name"=>"Manmunai - West (Vavunativu) Division"),
            array("workplace_id"=>"DEO0000219", "zeo_wp_id"=>"ZEO0000054", "name"=>"Manmunai-S. West (Kokkaddichcholai) Division Department Of Education", "short_name"=>"Manmunai-S. West (Kokkaddichcholai) Division"),
            
            array("workplace_id"=>"DEO0000220", "zeo_wp_id"=>"ZEO0000055", "name"=>"Ampara Division Department Of Education", "short_name"=>"Ampara Division"),
            array("workplace_id"=>"DEO0000221", "zeo_wp_id"=>"ZEO0000055", "name"=>"Uhana Division Department Of Education", "short_name"=>"Uhana Division"),
            array("workplace_id"=>"DEO0000222", "zeo_wp_id"=>"ZEO0000055", "name"=>"Damana Division Department Of Education", "short_name"=>"Damana Division"),
            array("workplace_id"=>"DEO0000223", "zeo_wp_id"=>"ZEO0000055", "name"=>"Lahugala Division Department Of Education", "short_name"=>"Lahugala Division"),
            
            array("workplace_id"=>"DEO0000224", "zeo_wp_id"=>"ZEO0000055", "name"=>"Kalmunai Division Department Of Education", "short_name"=>"Kalmunai Division"),
            array("workplace_id"=>"DEO0000225", "zeo_wp_id"=>"ZEO0000055", "name"=>"Ninthavur Division Department Of Education", "short_name"=>"Ninthavur Division"),
            array("workplace_id"=>"DEO0000226", "zeo_wp_id"=>"ZEO0000055", "name"=>"Karaithivu Division Department Of Education", "short_name"=>"Karaithivu Division"),
            array("workplace_id"=>"DEO0000227", "zeo_wp_id"=>"ZEO0000055", "name"=>"Kalmunai Tamil Division Department Of Education", "short_name"=>"Kalmunai Tamil Division"),
            array("workplace_id"=>"DEO0000228", "zeo_wp_id"=>"ZEO0000055", "name"=>"Sainthamaruthu Division Department Of Education", "short_name"=>"Sainthamaruthu Division"),
            
            array("workplace_id"=>"DEO0000229", "zeo_wp_id"=>"ZEO0000057", "name"=>"Sammanthurai Division Department Of Education", "short_name"=>"Sammanthurai Division"),
            array("workplace_id"=>"DEO0000230", "zeo_wp_id"=>"ZEO0000057", "name"=>"Iragamam Division Department Of Education", "short_name"=>"Iragamam Division"),
            array("workplace_id"=>"DEO0000231", "zeo_wp_id"=>"ZEO0000057", "name"=>"Navithanveli Division Department Of Education", "short_name"=>"Navithanveli Division"),
            
            array("workplace_id"=>"DEO0000232", "zeo_wp_id"=>"ZEO0000058", "name"=>"Mahaoya Division Department Of Education", "short_name"=>"Mahaoya Division"),
            array("workplace_id"=>"DEO0000233", "zeo_wp_id"=>"ZEO0000058", "name"=>"Padiyatalawa Division Department Of Education", "short_name"=>"Padiyatalawa Division"),
            
            array("workplace_id"=>"DEO0000234", "zeo_wp_id"=>"ZEO0000059", "name"=>"Dehiattakandiya Division Department Of Education", "short_name"=>"Dehiattakandiya Division"),
            
            array("workplace_id"=>"DEO0000235", "zeo_wp_id"=>"ZEO0000060", "name"=>"Akkaraipattu Division Department Of Education", "short_name"=>"Akkaraipattu Division"),
            array("workplace_id"=>"DEO0000236", "zeo_wp_id"=>"ZEO0000060", "name"=>"Addalachchenai Division Department Of Education", "short_name"=>"Addalachchenai Division"),
            array("workplace_id"=>"DEO0000237", "zeo_wp_id"=>"ZEO0000060", "name"=>"Potuvil 1(muslim) Division Department Of Education", "short_name"=>"Potuvil 1(muslim) Division"),
            
            array("workplace_id"=>"DEO0000238", "zeo_wp_id"=>"ZEO0000061", "name"=>"Tirukkovil Division Department Of Education", "short_name"=>"Tirukkovil Division"),
            array("workplace_id"=>"DEO0000239", "zeo_wp_id"=>"ZEO0000061", "name"=>"Alayadivembu Division Department Of Education", "short_name"=>"Alayadivembu Division"),
            array("workplace_id"=>"DEO0000240", "zeo_wp_id"=>"ZEO0000061", "name"=>"Potuvil 2 (tamil) Division Department Of Education", "short_name"=>"Potuvil 2 (tamil) Division"),
            
            array("workplace_id"=>"DEO0000241", "zeo_wp_id"=>"ZEO0000062", "name"=>"Trincomalee Town Division Department Of Education", "short_name"=>"Trincomalee Town Division"),
            array("workplace_id"=>"DEO0000242", "zeo_wp_id"=>"ZEO0000062", "name"=>"Kuchchaveli Division Department Of Education", "short_name"=>"Kuchchaveli Division"),
            array("workplace_id"=>"DEO0000243", "zeo_wp_id"=>"ZEO0000062", "name"=>"Thampalakamam Division Department Of Education", "short_name"=>"Thampalakamam Division"),
            
            array("workplace_id"=>"DEO0000244", "zeo_wp_id"=>"ZEO0000063", "name"=>"Mutur Division Department Of Education", "short_name"=>"Mutur Division"),
            array("workplace_id"=>"DEO0000245", "zeo_wp_id"=>"ZEO0000063", "name"=>"Eechchilampattu Division Department Of Education", "short_name"=>"Eechchilampattu Division"),
            
            array("workplace_id"=>"DEO0000246", "zeo_wp_id"=>"ZEO0000064", "name"=>"Kantalai Division Department Of Education", "short_name"=>"Kantalai Division"),
            array("workplace_id"=>"DEO0000247", "zeo_wp_id"=>"ZEO0000064", "name"=>"Seruwila Division Department Of Education", "short_name"=>"Seruwila Division"),
            
            array("workplace_id"=>"DEO0000248", "zeo_wp_id"=>"ZEO0000065", "name"=>"Kinniya Division Department Of Education", "short_name"=>"Kinniya Division"),
            array("workplace_id"=>"DEO0000249", "zeo_wp_id"=>"ZEO0000065", "name"=>"Mullipothana Division Department Of Education", "short_name"=>"Mullipothana Division"),
            
            array("workplace_id"=>"DEO0000250", "zeo_wp_id"=>"ZEO0000065", "name"=>"Kurinchakerny Division Department Of Education", "short_name"=>"Kurinchakerny Division"),
            //
            array("workplace_id"=>"DEO0000251", "zeo_wp_id"=>"ZEO0000066", "name"=>"Gomarankadawala Division Department Of Education", "short_name"=>"Gomarankadawala Division"),
            array("workplace_id"=>"DEO0000252", "zeo_wp_id"=>"ZEO0000066", "name"=>"Morawewa Division Department Of Education", "short_name"=>"Morawewa Division"),
            array("workplace_id"=>"DEO0000253", "zeo_wp_id"=>"ZEO0000066", "name"=>"Padavi Sripura Division Department Of Education", "short_name"=>"Padavi Sripura Division"),
            //
            array("workplace_id"=>"DEO0000254", "zeo_wp_id"=>"ZEO0000067", "name"=>"Kurunegala Division Department Of Education", "short_name"=>"Kurunegala Division"),
            array("workplace_id"=>"DEO0000255", "zeo_wp_id"=>"ZEO0000067", "name"=>"Polgahawela Division Department Of Education", "short_name"=>"Polgahawela Division"),
            array("workplace_id"=>"DEO0000256", "zeo_wp_id"=>"ZEO0000067", "name"=>"Mawathagama Division Department Of Education", "short_name"=>"Mawathagama Division"),
            
            array("workplace_id"=>"DEO0000257", "zeo_wp_id"=>"ZEO0000068", "name"=>"Panduwasnuwara Division Department Of Education", "short_name"=>"Panduwasnuwara Division"),
            array("workplace_id"=>"DEO0000258", "zeo_wp_id"=>"ZEO0000068", "name"=>"Bingiriya Division Department Of Education", "short_name"=>"Bingiriya Division"),
            array("workplace_id"=>"DEO0000259", "zeo_wp_id"=>"ZEO0000068", "name"=>"Kuliyapitiya - West Division Department Of Education", "short_name"=>"Kuliyapitiya - West Division"),
            array("workplace_id"=>"DEO0000260", "zeo_wp_id"=>"ZEO0000068", "name"=>"Udubaddawa Division Department Of Education", "short_name"=>"Udubaddawa Division"),
            array("workplace_id"=>"DEO0000261", "zeo_wp_id"=>"ZEO0000068", "name"=>"Dahanakgedara Division Department Of Education", "short_name"=>"Dahanakgedara Division"),
            
            array("workplace_id"=>"DEO0000262", "zeo_wp_id"=>"ZEO0000069", "name"=>"Nikaweratiya Division Department Of Education", "short_name"=>"Nikaweratiya Division"),
            array("workplace_id"=>"DEO0000263", "zeo_wp_id"=>"ZEO0000069", "name"=>"Wariyapola Division Department Of Education", "short_name"=>"Wariyapola Division"),
            array("workplace_id"=>"DEO0000264", "zeo_wp_id"=>"ZEO0000069", "name"=>"Kobeigane Division Department Of Education", "short_name"=>"Kobeigane Division"),
            array("workplace_id"=>"DEO0000265", "zeo_wp_id"=>"ZEO0000069", "name"=>"Kotavehera Division Department Of Education", "short_name"=>"Kotavehera Division"),
            
            array("workplace_id"=>"DEO0000266", "zeo_wp_id"=>"ZEO0000070", "name"=>"Maho Division Department Of Education", "short_name"=>"Maho Division"),
            array("workplace_id"=>"DEO0000267", "zeo_wp_id"=>"ZEO0000070", "name"=>"Polpitigama Division Department Of Education", "short_name"=>"Polpitigama Division"),
            array("workplace_id"=>"DEO0000268", "zeo_wp_id"=>"ZEO0000070", "name"=>"Galgamuwa Division Department Of Education", "short_name"=>"Galgamuwa Division"),
            array("workplace_id"=>"DEO0000269", "zeo_wp_id"=>"ZEO0000070", "name"=>"Giribawa Division Department Of Education", "short_name"=>"Giribawa Division"),
            
            array("workplace_id"=>"DEO0000270", "zeo_wp_id"=>"ZEO0000071", "name"=>"Kuliyapitiya - East Division Department Of Education", "short_name"=>"Kuliyapitiya - East Division"),
            array("workplace_id"=>"DEO0000271", "zeo_wp_id"=>"ZEO0000071", "name"=>"Alawwa Division Department Of Education", "short_name"=>"Alawwa Division"),
            array("workplace_id"=>"DEO0000272", "zeo_wp_id"=>"ZEO0000071", "name"=>"Pannala Division Department Of Education", "short_name"=>"Pannala Division"),
            
            array("workplace_id"=>"DEO0000273", "zeo_wp_id"=>"ZEO0000072", "name"=>"Ibbagamuwa Division Department Of Education", "short_name"=>"Ibbagamuwa Division"),
            array("workplace_id"=>"DEO0000274", "zeo_wp_id"=>"ZEO0000072", "name"=>"Ridigama Division Department Of Education", "short_name"=>"Ridigama Division"),
            array("workplace_id"=>"DEO0000275", "zeo_wp_id"=>"ZEO0000072", "name"=>"Ganewatta Division Department Of Education", "short_name"=>"Ganewatta Division"),
            
            array("workplace_id"=>"DEO0000276", "zeo_wp_id"=>"ZEO0000073", "name"=>"Puttalam North Division Department Of Education", "short_name"=>"Puttalam North Division"),
            array("workplace_id"=>"DEO0000277", "zeo_wp_id"=>"ZEO0000073", "name"=>"Puttalam South Division Department Of Education", "short_name"=>"Puttalam South Division"),
            array("workplace_id"=>"DEO0000278", "zeo_wp_id"=>"ZEO0000073", "name"=>"Anamaduwa Division Department Of Education", "short_name"=>"Anamaduwa Division"),
            array("workplace_id"=>"DEO0000279", "zeo_wp_id"=>"ZEO0000073", "name"=>"Kalpitiya Division Department Of Education", "short_name"=>"Kalpitiya Division"),
            array("workplace_id"=>"DEO0000280", "zeo_wp_id"=>"ZEO0000073", "name"=>"Pallama Division Department Of Education", "short_name"=>"Pallama Division"),
            
            array("workplace_id"=>"DEO0000281", "zeo_wp_id"=>"ZEO0000074", "name"=>"Chilaw Division Department Of Education", "short_name"=>"Chilaw Division"),
            array("workplace_id"=>"DEO0000282", "zeo_wp_id"=>"ZEO0000074", "name"=>"Arachchikattuwa Division Department Of Education", "short_name"=>"Arachchikattuwa Division"),
            array("workplace_id"=>"DEO0000283", "zeo_wp_id"=>"ZEO0000074", "name"=>"Nattandiya Division Department Of Education", "short_name"=>"Nattandiya Division"),
            array("workplace_id"=>"DEO0000284", "zeo_wp_id"=>"ZEO0000074", "name"=>"Wennappuwa Division Department Of Education", "short_name"=>"Wennappuwa Division"),
            
            array("workplace_id"=>"DEO0000285", "zeo_wp_id"=>"ZEO0000093", "name"=>"Ratnapura 1 Division Department Of Education", "short_name"=>"Ratnapura 1 Division"),
            array("workplace_id"=>"DEO0000286", "zeo_wp_id"=>"ZEO0000093", "name"=>"Sri Pada Division Department Of Education", "short_name"=>"Ratnapura 2 Division"),
            array("workplace_id"=>"DEO0000287", "zeo_wp_id"=>"ZEO0000093", "name"=>"Pelmadulla Division Department Of Education", "short_name"=>"Pelmadulla Division"),
            array("workplace_id"=>"DEO0000288", "zeo_wp_id"=>"ZEO0000093", "name"=>"Eheliyagoda Division Department Of Education", "short_name"=>"Eheliyagoda Division"),
            array("workplace_id"=>"DEO0000289", "zeo_wp_id"=>"ZEO0000093", "name"=>"Kuruwita Division Department Of Education", "short_name"=>"Kuruwita Division"),
            
            array("workplace_id"=>"DEO0000290", "zeo_wp_id"=>"ZEO0000094", "name"=>"Balangoda Division Department Of Education", "short_name"=>"Balangoda Division"),
            array("workplace_id"=>"DEO0000291", "zeo_wp_id"=>"ZEO0000094", "name"=>"Imbulpe Division Department Of Education", "short_name"=>"Imbulpe Division"),
            array("workplace_id"=>"DEO0000292", "zeo_wp_id"=>"ZEO0000094", "name"=>"Weligepola Division Department Of Education", "short_name"=>"Weligepola Division"),
            
            array("workplace_id"=>"DEO0000293", "zeo_wp_id"=>"ZEO0000095", "name"=>"Nivitigala Division Department Of Education", "short_name"=>"Nivitigala Division"),
            array("workplace_id"=>"DEO0000294", "zeo_wp_id"=>"ZEO0000095", "name"=>"Ayagama Division Department Of Education", "short_name"=>"Ayagama Division"),
            array("workplace_id"=>"DEO0000295", "zeo_wp_id"=>"ZEO0000095", "name"=>"Kalawana Division Department Of Education", "short_name"=>"Kalawana Division"),
            array("workplace_id"=>"DEO0000296", "zeo_wp_id"=>"ZEO0000095", "name"=>"Kahawatta Division Department Of Education", "short_name"=>"Kahawatta Division"),
            array("workplace_id"=>"DEO0000297", "zeo_wp_id"=>"ZEO0000095", "name"=>"Elapatha Division Department Of Education", "short_name"=>"Elapatha Division"),
            
            array("workplace_id"=>"DEO0000298", "zeo_wp_id"=>"ZEO0000096", "name"=>"Embilipitiya Division Department Of Education", "short_name"=>"Embilipitiya Division"),
            array("workplace_id"=>"DEO0000299", "zeo_wp_id"=>"ZEO0000096", "name"=>"Kolonne Division Department Of Education", "short_name"=>"Kolonne Division"),
            array("workplace_id"=>"DEO0000300", "zeo_wp_id"=>"ZEO0000096", "name"=>"Godakawela Division Department Of Education", "short_name"=>"Godakawela Division"),
            
            array("workplace_id"=>"DEO0000301", "zeo_wp_id"=>"ZEO0000097", "name"=>"Kegalle Division Department Of Education", "short_name"=>"Kegalle Division"),
            array("workplace_id"=>"DEO0000302", "zeo_wp_id"=>"ZEO0000097", "name"=>"Galigamuwa Division Department Of Education", "short_name"=>"Galigamuwa Division"),
            array("workplace_id"=>"DEO0000303", "zeo_wp_id"=>"ZEO0000097", "name"=>"Warakapola Division Department Of Education", "short_name"=>"Warakapola Division"),
            array("workplace_id"=>"DEO0000304", "zeo_wp_id"=>"ZEO0000097", "name"=>"Dedigama Division Department Of Education", "short_name"=>"Dedigama Division"),
            
            array("workplace_id"=>"DEO0000305", "zeo_wp_id"=>"ZEO0000098", "name"=>"Mawanella Division Department Of Education", "short_name"=>"Mawanella Division"),
            array("workplace_id"=>"DEO0000306", "zeo_wp_id"=>"ZEO0000098", "name"=>"Rambukkana Division Department Of Education", "short_name"=>"Rambukkana Division"),
            array("workplace_id"=>"DEO0000307", "zeo_wp_id"=>"ZEO0000098", "name"=>"Aranayaka Division Department Of Education", "short_name"=>"Aranayaka Division"),
            
            array("workplace_id"=>"DEO0000308", "zeo_wp_id"=>"ZEO0000099", "name"=>"Dehiowita Division Department Of Education", "short_name"=>"Dehiowita Division"),
            array("workplace_id"=>"DEO0000309", "zeo_wp_id"=>"ZEO0000099", "name"=>"Ruwanwella Division Department Of Education", "short_name"=>"Ruwanwella Division"),
            array("workplace_id"=>"DEO0000310", "zeo_wp_id"=>"ZEO0000099", "name"=>"Deraniyagala Division Department Of Education", "short_name"=>"Deraniyagala Division"),
            array("workplace_id"=>"DEO0000311", "zeo_wp_id"=>"ZEO0000099", "name"=>"Yatiyantota Division Department Of Education", "short_name"=>"Yatiyantota Division"),
            array("workplace_id"=>"DEO0000312", "zeo_wp_id"=>"ZEO0000099", "name"=>"Kitulgala Division Department Of Education", "short_name"=>"Kitulgala Division"),

            array("workplace_id"=>"DEO0000133", "zeo_wp_id"=>"ZEO0000100", "name"=>"Karachchi Division Department Of Education", "short_name"=>"Karachchi Division"),
            array("workplace_id"=>"DEO0000136", "zeo_wp_id"=>"ZEO0000100", "name"=>"Poonakary Division Department Of Education", "short_name"=>"Poonakary Division"),

            array("workplace_id"=>"DEO0000313", "zeo_wp_id"=>"ZEO0000052", "name"=>"Manmunai South & Eruvil paththu Department Of Education", "short_name"=>"Manmunai South & Eruvil paththu"),
            array("workplace_id"=>"DEO0000314", "zeo_wp_id"=>"ZEO0000052", "name"=>"Porativu Pattu Of Education", "short_name"=>"Porativu Pattu"),

            



        ];

    foreach ($divisionalOffices as $office) {
            DB::table('divisional_education_offices')->updateOrInsert(
                ['workplace_id' => $office['workplace_id']],
                [
                    'zeo_wp_id' => $office['zeo_wp_id'],
                    'name' => $office['name'],
                    'short_name' => $office['short_name'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]
            );
        }
    }
}
