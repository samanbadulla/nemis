<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployerAttachmentAppointment extends Model
{
    use HasFactory;

    protected $table = 'employer_attachment_appointments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'appointment_id',
        'employee_id',
        'appoint_date',
        'end_date',
        'position_id',
        'office_level_id',
        'workplace_id',
        'active_status',
    ];

    // Relationships

    public function employee()
    {
        return $this->belongsTo(People::class, 'employee_id', 'people_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'position_id');
    }

    public function officeLevel()
    {
        return $this->belongsTo(OfficeLevel::class, 'office_level_id', 'office_level_id');
    }
}
