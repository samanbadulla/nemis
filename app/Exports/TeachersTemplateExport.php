<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class TeachersTemplateExport implements FromCollection, WithHeadings, WithTitle
{
    /**
     * Return sample data rows for the Excel template.
     */
    public function collection()
    {
        return collect([
            [
                '123856789V',
                'T01',
                'John Doe',
                'G01',
                '2025-11-02',
                'R01',
                'E01',
                'C01',
                'YES',
                '',
                'B01',
                'joh22n@example.com',
                '0773234567',
                'DIS010',
                'GND00001',
                '123 Main St',
                'Colombo 07',
                '',
                '00700',
                '',
                '',
                '',
                '',
                '',
                '',
                // EmployerAppointment model fields for reference
                '2020-01-15',
                '2055-01-15',
                'SER001',
                'RANK001',
                'INS0000001',
                'A54585',
                'WOP67890',
                // Current employee
                '2020-01-15',
                'SER001',
                'RANK001',
                'INS0000001',
                // Teacher related fields
                'TCAT0001',
                'TCHTYPE001',
                'MED01',
                'ASUB0001',
                'SUB0001',
                'SUB0001',
                'SUB0001',
            ],
        ]);
    }

    /**
     * Define the Excel headings to match import structure.
     */
    public function headings(): array
    {
        return [
            'nic',
            'title_id',
            'full_name',
            'gender_id',
            'date_of_birth',
            'religion_id',
            'ethnicity_id',
            'civil_status_id',
            'health_condition',
            'health_problem',
            'blood_group_id',
            'email',
            'phone',
            'district_id',
            'gn_division_id',
            'address_line1',
            'address_line2',
            'address_line3',
            'postal_code',
            'latitude',
            'longitude',
            't_address_line1',
            't_address_line2',
            't_address_line3',
            't_postal_code',
            //EmployerAppointment model fields for reference
            'first_appointment_date',
            'retirement_date',
            'service_id',
            'rank_id',
            'workplace_id',
            'appointment_letter_no',
            'w_op_no',
            // Current employee
            'current_appoint_date',
            'current_service_id',
            'current_rank_id',
            'current_workplace_id',
            // Teacher related fields
            'teacher_category',
            'teacher_type',
            'appointment_medium',
            'appointment_subject',
            'main_subject',
            'secondary_subject',
            'current_teaching_subject',
        ];
    }

    /**
     * Optional: Name the worksheet tab.
     */
    public function title(): string
    {
        return 'Teachers Template';
    }
}
