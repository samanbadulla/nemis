<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EmployerAppointment extends Model
{
    use HasFactory;

    protected $table = 'employer_appointments'; // optional, Laravel can infer from class name

    protected $primaryKey = 'appointment_id'; // if you want to use appointment_id as PK
    public $incrementing = false;             // because appointment_id is a char
    protected $keyType = 'string';

    protected $fillable = [
        'appointment_id',
        'employee_id',
        'first_appointment_date',
        'retirement_date',
        'service_id',
        'rank_id',
        'position_id',
        'office_level_id',
        'workplace_id',
        'appointment_letter_no',
        'appointment_letter',
        'pay_sheet_no',
        'w_op_no',
        'active_status',
    ];

    protected $casts = [
        'first_appointment_date' => 'date',
        'retirement_date' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->appointment_id)) {
                $model->appointment_id = self::generateAppointmentId($model->first_appointment_date);
            }
        });
    }

    /**
     * Scope for active institution types
     */
    public function scopeActive($query)
    {
        return $query->where('active_status', '1');
    }

    /**
     * Generate unique appointment ID
     * Format: AP + Year (2) + Sequence (8)
     */
    public static function generateAppointmentId(string $date): string
    {
        // Extract 2-digit year from given date (e.g., "2025-11-12" → "25")
        $year = date('y', strtotime($date));

        // Find the last inserted appointment for this year
        $last = self::where('appointment_id', 'like', "AP{$year}%")
            ->orderBy('appointment_id', 'desc')
            ->first();

        if ($last) {
            // Extract numeric sequence (last 8 digits)
            $lastNumber = (int) substr($last->appointment_id, -8);
            $nextNumber = str_pad($lastNumber + 1, 8, '0', STR_PAD_LEFT);
        } else {
            $nextNumber = '00000001';
        }

        return "AP{$year}{$nextNumber}"; // e.g., AP2500000123
    }



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

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'position_id');
    }

    public function officeLevel()
    {
        return $this->belongsTo(OfficeLevel::class, 'office_level_id', 'office_level_id');
    }

    public function workplace()
    {
        return $this->belongsTo(Workplaces::class, 'workplace_id', 'workplace_id');
    }
}
