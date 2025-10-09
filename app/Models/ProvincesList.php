<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvincesList extends Model
{
    use HasFactory;

    protected $table = 'provinces_lists';

    protected $primaryKey = 'id';

    protected $fillable = [
        'province_id',
        'province_name',
        'active_status',
    ];
}
