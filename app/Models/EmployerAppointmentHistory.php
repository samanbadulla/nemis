<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployerAppointmentHistory extends Model
{
    use HasFactory;

    protected $table = 'employer_appointment_histories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'appointment_id',
        'employee_id',
        'appoint_date',
        'end_date',
        'service_id',
        'rank_id',
        'position_id',
        'office_level_id',
        'workplace_id',
        'updated_type',
    ];

    // Relationships

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
}
