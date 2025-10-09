<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citylists extends Model
{
    use HasFactory;

    protected $table = 'citylists';

    protected $primaryKey = 'id';

    protected $fillable = [
        'city_id',
        'district_id',
        'city_name_en',
        'city_name_si',
        'city_name_ta',
        'postcode',
        'latitude',
        'longitude',
        'active_status'
    ];
}
