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
        'status',
    ];
}
