<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApointedSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the list of subjects (English names)
        $subjects = [
            'Primary General', 'English', 'Health & Physical Education', 'Home Economics', 'Commerce',
            'Eastern Music', 'Agricultural Science', 'Art', 'Arts and Crafts', 'Bio Systems Technology',
            'Biology', 'Botany', 'Buddhism', 'Chemistry', 'Construction Technology', 'Dancing (Traditional)',
            'Engineering Technology', 'History', 'Information & Communication Technology', 'Mathematics',
            'Performing Arts', 'Physical Education', 'Physics', 'Science', 'Sinhala',
            'Sinhala Language & Literature', 'Communication & Media Studies', 'Graduate Appointment - Art',
            'Graduate Appointment - Commerce', 'Civic Education', 'Library & Information Studies',
            'Other (not Related to OL/AL Subjects)', 'History & Social Studies', 'Accounting',
            'Agriculture & Food Technology', 'Combined Mathematics', 'Counseling & Guidance',
            'Hindu Civilization', 'Karnataka Music', 'Social Studies', 'Tamil', 'Catholicism',
            'Christianity', 'Second Language - Sinhala', 'Islam', 'Primary English', 'Buddhist Civilization',
            'Food Technology', 'Geography', 'Business & Accounting Studies', 'Citizenship Education & Governance',
            'Political Science', 'Western Music', 'Agro Technology', 'Dancing Baratha', 'Business Studies',
            'Elements of Political Science', 'Design & Technology', 'Drama & Theatre (T)', 'Economics',
            'Hinduism', 'Sociology (Social Science)', 'Business Statistics', 'Electrical and Electronic Studies',
            'General English', 'Islamic Civilization', 'Landscaping', 'Logic and Scientific Method',
            'period not Named', 'Physical Education and Sports', 'Science / Maths', 'Tamil Language & Literature',
            'Life Confidence and Civic Education', 'Practical and Technical skills', 'Drama & Theatre (S)',
            'Not Specified', 'Statistics', 'Second Language - Tamil', 'Christian Civilization',
            'Motor Mechanic', 'Thripitaka Dhamma', 'Pali', 'Sanskrit', 'Education',
            'Fishery & Food Technology', 'Special Education', 'Arabic', 'Art and Designing', 'Mathematics I',
            'Event Management', 'Higher Mathematics', 'Professional Subject', 'Science for Technology',
            'Aesthetic-English Literature', 'Japanese', 'Does not Teach', 'Entrepreneurship education',
            'Textile and Apparel Studies', 'Aesthetic-Drama & Theatre (Sinhala)', 'Common General Test',
            'Aesthetic-Tamil Literature', 'Chinese', 'Graphic Designing', 'Mechanical Technology',
            'Metal Work', 'Management', 'Aesthetic-Drama & Theatre (Tamil)', 'Environmental Studies',
            'Computer Science', 'Philosophy', 'Crafts & Arts', 'Hindi', 'GIT',
            'Health and Social Care', 'Aesthetic-Arabic Literature', 'Software Development',
            'Child Psychology and Care', 'Tourism and Hospitality', 'Theology', 'Drama & Theatre (E)',
            'Supervision', 'Zoology', 'Electrical, Electronic And Information Technology', 'Applied Maths',
            'Saivanery', 'Wood Work', 'Pure Maths', 'Aesthetic-Sinhala Literature', 'Bio Resource Technology',
            'History (Indian)', 'Marine Fisheries', 'Civil Technology', 'Russian', 'German',
            'Greek and Roman Civilization', 'Construction Studies', 'Korean', 'French', 'Textile Technology',
            'Psychology', 'Web Designing', 'Aquatic Resource Studies', 'English Literature',
            'Plantation Product Studies', 'Development Studies', 'Appreciation of Tamil Literary Texts',
            'Fine Arts', 'Pre Vocational Studies II', 'Graduate Appointment - Aesthetic', 'Home Gardening',
            'Electronic Documentation & Shorthand', 'Food Processing Studies', 'Persian',
            'Graduate Appointment - Science', 'Fashion Designing', 'Geometric & Mechanical Drawing',
            'Applied Horticultural Studies', 'Archeology', 'Livestock Product Studies',
            'Entrepreneurship Studies', 'Interior Designing', 'Masonry', 'Metal Fabrication Studies',
            'Planning', 'History (European)', 'Mathematics II', 'Pottery, Firing & Glazing',
            'Project', 'History (Modern World)', 'Weaving (Hand or Power loom)', 'Pre Vocational Studies I',
            'Business Economics', 'Urdu', 'Needle Work', 'Ayurveda (Awasana)', 'Ayurveda (Praramba)',
            'Radio Mechanic'
        ];

        $data = [];
        $i = 1;

        foreach ($subjects as $subjectName) {
            // Generate a unique ID (A0001, A0002, ..., A0138)
            $subjectId = 'ASUB' . str_pad($i++, 4, '0', STR_PAD_LEFT);

            $data[] = [
                'a_subject_id' => $subjectId,
                'name_en' => $subjectName,
                'name_si' => null, // Placeholder - add accurate translations here if available
                'name_ta' => null, // Placeholder - add accurate translations here if available
                'active_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert all records in a single batch
        DB::table('apointed_subjects')->insert($data);
    }
}
