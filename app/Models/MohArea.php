<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class MohArea extends Model
{
    use HasFactory;

    protected $table = 'moh_areas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'moh_area_id',
        'moh_area_name',
        'address',
        'postal_code',
        'phone',
        'email',
        'active_status',
    ];
}
