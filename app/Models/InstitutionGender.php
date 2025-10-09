<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionGender extends Model
{
    use HasFactory;

    protected $table = 'institution_genders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'gender_id',
        'name',
        'active_status',
    ];
}
