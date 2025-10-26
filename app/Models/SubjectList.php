<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class SubjectList extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'subject_lists';

    protected $fillable = [
        'subject_id',
        'subject_code',
        'name_en',
        'name_si',
        'name_ta',
        'active_status',
    ];

    // If you want to filter active institutions by default
    public function scopeActive($query)
    {
        return $query->where('active_status', 1);
    }
}
