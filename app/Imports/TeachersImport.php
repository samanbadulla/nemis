<?php

namespace App\Imports;

use App\Models\People;
use App\Models\EmployerAppointment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class TeachersImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    protected $userId;
    protected int $successCount = 0;
    protected int $failCount = 0;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Convert each row to a model instance.
     */
    public function model(array $row)
    {
        $healthValue = trim(strtolower($row['health_condition'] ?? 'yes'));
        $healthCondition = in_array($healthValue, ['yes', 'y', 'true', '1'], true);

        $initials = People::generateInitials($row['full_name'] ?? '');
        $appointmentId = EmployerAppointment::generateAppointmentId($row['first_appointment_date'] ?? null);

        DB::beginTransaction();

        try {
            $people = People::updateOrCreate(
                ['nic_hash' => hash('sha256', strtoupper($row['nic']))],
                [
                    'nic' => $row['nic'] ?? null,
                    'title_id' => $row['title_id'] ?? null,
                    'full_name' => $row['full_name'] ?? null,
                    'name_with_initials' => $initials,
                    'gender_id' => $row['gender_id'] ?? null,
                    'date_of_birth' => $row['date_of_birth'] ?? null,
                    'religion_id' => $row['religion_id'] ?? null,
                    'ethnicity_id' => $row['ethnicity_id'] ?? null,
                    'civil_status_id' => $row['civil_status_id'] ?? null,
                    'health_condition' => $healthCondition,
                    'health_problem' => $row['health_problem'] ?? null,
                    'blood_group_id' => $row['blood_group_id'] ?? null,
                    'email' => $row['email'] ?? null,
                    'phone' => $row['phone'] ?? null,
                    'district_id' => $row['district_id'] ?? null,
                    'gn_division_id' => $row['gn_division_id'] ?? null,
                    'address_line1' => $row['address_line1'] ?? '',
                    'address_line2' => $row['address_line2'] ?? '',
                    'address_line3' => $row['address_line3'] ?? null,
                    'postal_code' => $row['postal_code'] ?? null,
                    'latitude' => $row['latitude'] ?? null,
                    'longitude' => $row['longitude'] ?? null,
                    't_address_line1' => $row['t_address_line1'] ?? null,
                    't_address_line2' => $row['t_address_line2'] ?? null,
                    't_address_line3' => $row['t_address_line3'] ?? null,
                    't_postal_code' => $row['t_postal_code'] ?? null,
                    'profile_picture' => 'default.png',
                   // 'created_by' => $this->userId,
                ]
            );

            EmployerAppointment::updateOrCreate(
                ['employee_id' => $people->people_id],
                [
                    'appointment_id' => $appointmentId,
                    'employee_id' => $people->people_id,
                    'first_appointment_date' => $row['first_appointment_date'] ?? null,
                    'retirement_date' => $row['retirement_date'] ?? null,
                    'service_id' => $row['service_id'] ?? null,
                    'rank_id' => $row['rank_id'] ?? null,
                    'position_id' => 'POS001',
                    'office_level_id' => 'OLID006',
                    'workplace_id' => $row['workplace_id'] ?? null,
                    'appointment_letter_no' => $row['appointment_letter_no'] ?? null,
                    'appointment_letter' => 'default_letter.pdf',
                    'w_op_no' => $row['w_op_no'] ?? null,
                   // 'created_by' => $this->userId,
                ]
            );

            DB::commit();
            $this->successCount++;
            return $people;
        } catch (\Throwable $e) {
            DB::rollBack();
            $this->failCount++;
            Log::error('Teacher import failed', [
                'row' => $row,
                'error' => $e->getMessage(),
            ]);
            return null;
        }
    }

    public function rules(): array
    {
        return [
            'nic' => 'required|string|max:12|unique:people,nic',
            'full_name' => 'required|string|max:255',
            'title_id' => 'required|string|max:3|exists:titles,title_id',
            'gender_id' => 'required|string|max:3|exists:gender_lists,gender_id',
            'religion_id' => 'required|string|max:3|exists:religions,religion_id',
            'ethnicity_id' => 'required|string|max:3|exists:ethnicities,ethnicity_id',
            'civil_status_id' => 'required|string|max:3|exists:civil_statuses,civil_status_id',
            'email' => 'required|email|max:255|unique:people,email',
            'phone' => 'required|string|max:15|unique:people,phone',
            'date_of_birth' => 'required|date',
            // EmployerAppointment related validations
            'first_appointment_date' => 'required|date',
            'service_id' => 'required|string|max:10|exists:services,service_id',
            'rank_id' => 'required|string|max:10|exists:service_ranks,rank_id',
            'workplace_id' => 'required|string|max:10|exists:workplaces,workplace_id',
            'appointment_letter_no' => 'required|string|max:255',
            'w_op_no' => 'required|string|max:255',
            // current employee check
        ];
    }

    public function getSuccessCount(): int
    {
        return $this->successCount;
    }

    public function getFailCount(): int
    {
        return $this->failCount;
    }
}
