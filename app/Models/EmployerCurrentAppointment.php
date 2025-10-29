<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerCurrentAppointment extends Model
{
    use HasFactory;

    protected $table = 'employer_current_appointments';

    protected $fillable = [
        'appointment_id',
        'employee_id',
        'appoint_date',
        'service_id',
        'rank_id',
        'office_level_id',
        'position_id',
        'workplace_id',
    ];

    /**
     * Relationships
     */
    public function employee()
    {
        return $this->belongsTo(People::class, 'employee_id', 'people_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'service_id');
    }

    public function rank()
    {
        return $this->belongsTo(ServiceRank::class, 'rank_id', 'rank_id');
    }

    public function officeLevel()
    {
        return $this->belongsTo(OfficeLevel::class, 'office_level_id', 'office_level_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'position_id');
    }

    // Employer appointment
    public function appointment()
    {
        return $this->belongsTo(EmployerAppointment::class, 'appointment_id', 'appointment_id');
    }

    // Appointment history
    public function appointmentHistory()
    {
        return $this->belongsTo(EmployerAppointmentHistory::class, 'appointment_id', 'appointment_id');
    }

    // Attachment appointment
    public function attachmentAppointment()
    {
        return $this->belongsTo(EmployerAttachmentAppointment::class, 'appointment_id', 'appointment_id');
    }

    public function workplace()
    {
        return $this->belongsTo(Workplaces::class, 'workplace_id', 'workplace_id');
    }
}
