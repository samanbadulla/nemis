<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApontedSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        // --- Start Subject Inserts ---

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0001',
            'name_en' => 'Primary General',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0002',
            'name_en' => 'English',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0003',
            'name_en' => 'Health & Physical Education',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0004',
            'name_en' => 'Home Economics',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0005',
            'name_en' => 'Commerce',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0006',
            'name_en' => 'Eastern Music',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0007',
            'name_en' => 'Agricultural Science',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0008',
            'name_en' => 'Art',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0009',
            'name_en' => 'Arts and Crafts',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0010',
            'name_en' => 'Bio Systems Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0011',
            'name_en' => 'Biology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0012',
            'name_en' => 'Botany',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0013',
            'name_en' => 'Buddhism',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0014',
            'name_en' => 'Chemistry',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0015',
            'name_en' => 'Construction Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0016',
            'name_en' => 'Dancing (Traditional)',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0017',
            'name_en' => 'Engineering Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0018',
            'name_en' => 'History',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0019',
            'name_en' => 'Information & Communication Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0020',
            'name_en' => 'Mathematics',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0021',
            'name_en' => 'Performing Arts',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0022',
            'name_en' => 'Physical Education',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0023',
            'name_en' => 'Physics',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0024',
            'name_en' => 'Science',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0025',
            'name_en' => 'Sinhala',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0026',
            'name_en' => 'Sinhala Language & Literature',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0027',
            'name_en' => 'Communication & Media Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0028',
            'name_en' => 'Graduate Appointment - Art',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0029',
            'name_en' => 'Graduate Appointment - Commerce',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0030',
            'name_en' => 'Civic Education',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0031',
            'name_en' => 'Library & Information Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0032',
            'name_en' => 'Other (not Related to OL/AL Subjects)',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0033',
            'name_en' => 'History & Social Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0034',
            'name_en' => 'Accounting',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0035',
            'name_en' => 'Agriculture & Food Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0036',
            'name_en' => 'Combined Mathematics',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0037',
            'name_en' => 'Counseling & Guidance',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0038',
            'name_en' => 'Hindu Civilization',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0039',
            'name_en' => 'Karnataka Music',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0040',
            'name_en' => 'Social Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0041',
            'name_en' => 'Tamil',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0042',
            'name_en' => 'Catholicism',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0043',
            'name_en' => 'Christianity',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0044',
            'name_en' => 'Second Language - Sinhala',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0045',
            'name_en' => 'Islam',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0046',
            'name_en' => 'Primary English',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0047',
            'name_en' => 'Buddhist Civilization',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0048',
            'name_en' => 'Food Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0049',
            'name_en' => 'Geography',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0050',
            'name_en' => 'Business & Accounting Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0051',
            'name_en' => 'Citizenship Education & Governance',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0052',
            'name_en' => 'Political Science',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0053',
            'name_en' => 'Western Music',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0054',
            'name_en' => 'Agro Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0055',
            'name_en' => 'Dancing Baratha',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0056',
            'name_en' => 'Business Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0057',
            'name_en' => 'Elements of Political Science',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0058',
            'name_en' => 'Design & Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0059',
            'name_en' => 'Drama & Theatre (T)',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0060',
            'name_en' => 'Economics',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0061',
            'name_en' => 'Hinduism',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0062',
            'name_en' => 'Sociology (Social Science)',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0063',
            'name_en' => 'Business Statistics',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0064',
            'name_en' => 'Electrical and Electronic Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0065',
            'name_en' => 'General English',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0066',
            'name_en' => 'Islamic Civilization',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0067',
            'name_en' => 'Landscaping',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0068',
            'name_en' => 'Logic and Scientific Method',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0069',
            'name_en' => 'period not Named',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0070',
            'name_en' => 'Physical Education and Sports',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0071',
            'name_en' => 'Science / Maths',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0072',
            'name_en' => 'Tamil Language & Literature',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0073',
            'name_en' => 'Life Confidence and Civic Education',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0074',
            'name_en' => 'Practical and Technical skills',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0075',
            'name_en' => 'Drama & Theatre (S)',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0076',
            'name_en' => 'Not Specified',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0077',
            'name_en' => 'Statistics',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0078',
            'name_en' => 'Second Language - Tamil',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0079',
            'name_en' => 'Christian Civilization',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0080',
            'name_en' => 'Motor Mechanic',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0081',
            'name_en' => 'Thripitaka Dhamma',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0082',
            'name_en' => 'Pali',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0083',
            'name_en' => 'Sanskrit',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0084',
            'name_en' => 'Education',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0085',
            'name_en' => 'Fishery & Food Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0086',
            'name_en' => 'Special Education',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0087',
            'name_en' => 'Arabic',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0088',
            'name_en' => 'Art and Designing',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0089',
            'name_en' => 'Mathematics I',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0090',
            'name_en' => 'Event Management',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0091',
            'name_en' => 'Higher Mathematics',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0092',
            'name_en' => 'Professional Subject',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0093',
            'name_en' => 'Science for Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0094',
            'name_en' => 'Aesthetic-English Literature',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0095',
            'name_en' => 'Japanese',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0096',
            'name_en' => 'Does not Teach',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0097',
            'name_en' => 'Entrepreneurship education',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0098',
            'name_en' => 'Textile and Apparel Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0099',
            'name_en' => 'Aesthetic-Drama & Theatre (Sinhala)',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0100',
            'name_en' => 'Common General Test',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0101',
            'name_en' => 'Aesthetic-Tamil Literature',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0102',
            'name_en' => 'Chinese',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0103',
            'name_en' => 'Graphic Designing',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0104',
            'name_en' => 'Mechanical Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0105',
            'name_en' => 'Metal Work',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0106',
            'name_en' => 'Management',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0107',
            'name_en' => 'Aesthetic-Drama & Theatre (Tamil)',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0108',
            'name_en' => 'Environmental Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0109',
            'name_en' => 'Computer Science',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0110',
            'name_en' => 'Philosophy',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0111',
            'name_en' => 'Crafts & Arts',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0112',
            'name_en' => 'Hindi',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0113',
            'name_en' => 'GIT',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0114',
            'name_en' => 'Health and Social Care',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0115',
            'name_en' => 'Aesthetic-Arabic Literature',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0116',
            'name_en' => 'Software Development',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0117',
            'name_en' => 'Child Psychology and Care',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0118',
            'name_en' => 'Tourism and Hospitality',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0119',
            'name_en' => 'Theology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0120',
            'name_en' => 'Drama & Theatre (E)',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0121',
            'name_en' => 'Supervision',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0122',
            'name_en' => 'Zoology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0123',
            'name_en' => 'Electrical, Electronic And Information Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0124',
            'name_en' => 'Applied Maths',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0125',
            'name_en' => 'Saivanery',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0126',
            'name_en' => 'Wood Work',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0127',
            'name_en' => 'Pure Maths',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0128',
            'name_en' => 'Aesthetic-Sinhala Literature',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0129',
            'name_en' => 'Bio Resource Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0130',
            'name_en' => 'History (Indian)',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0131',
            'name_en' => 'Marine Fisheries',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0132',
            'name_en' => 'Civil Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0133',
            'name_en' => 'Russian',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0134',
            'name_en' => 'German',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0135',
            'name_en' => 'Greek and Roman Civilization',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0136',
            'name_en' => 'Construction Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0137',
            'name_en' => 'Korean',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0138',
            'name_en' => 'French',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0139',
            'name_en' => 'Textile Technology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0140',
            'name_en' => 'Psychology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0141',
            'name_en' => 'Web Designing',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0142',
            'name_en' => 'Aquatic Resource Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0143',
            'name_en' => 'English Literature',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0144',
            'name_en' => 'Plantation Product Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0145',
            'name_en' => 'Development Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0146',
            'name_en' => 'Appreciation of Tamil Literary Texts',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0147',
            'name_en' => 'Fine Arts',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0148',
            'name_en' => 'Pre Vocational Studies II',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0149',
            'name_en' => 'Graduate Appointment - Aesthetic',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0150',
            'name_en' => 'Home Gardening',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0151',
            'name_en' => 'Electronic Documentation & Shorthand',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0152',
            'name_en' => 'Food Processing Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0153',
            'name_en' => 'Persian',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0154',
            'name_en' => 'Graduate Appointment - Science',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0155',
            'name_en' => 'Fashion Designing',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0156',
            'name_en' => 'Geometric & Mechanical Drawing',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0157',
            'name_en' => 'Applied Horticultural Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0158',
            'name_en' => 'Archeology',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0159',
            'name_en' => 'Livestock Product Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0160',
            'name_en' => 'Entrepreneurship Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0161',
            'name_en' => 'Interior Designing',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0162',
            'name_en' => 'Masonry',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0163',
            'name_en' => 'Metal Fabrication Studies',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0164',
            'name_en' => 'Planning',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0165',
            'name_en' => 'History (European)',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0166',
            'name_en' => 'Mathematics II',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0167',
            'name_en' => 'Pottery, Firing & Glazing',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0168',
            'name_en' => 'Project',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0169',
            'name_en' => 'History (Modern World)',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0170',
            'name_en' => 'Weaving (Hand or Power loom)',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0171',
            'name_en' => 'Pre Vocational Studies I',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0172',
            'name_en' => 'Business Economics',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0173',
            'name_en' => 'Urdu',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0174',
            'name_en' => 'Needle Work',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0175',
            'name_en' => 'Ayurveda (Awasana)',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0176',
            'name_en' => 'Ayurveda (Praramba)',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('apointed_subjects')->insert([
            'a_subject_id' => 'ASUB0177',
            'name_en' => 'Radio Mechanic',
            'name_si' => null,
            'name_ta' => null,
            'active_status' => true,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // --- End Subject Inserts ---
    }
}
