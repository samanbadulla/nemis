<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictsList extends Model
{
    use HasFactory;

    protected $table = 'districts_lists';

    protected $primaryKey = 'id';

    protected $fillable = [
        'district_id',
        'province_id',
        'district_name',
        'active_status',
    ];

    /**
     * Relationship: District belongs to a Province
     */
    public function province()
    {
        return $this->belongsTo(ProvincesList::class, 'province_id', 'province_id');
    }

    public function divisionalSecretariatOffices()
    {
        return $this->hasMany(DivisionalSecretariatOffice::class, 'district_id', 'district_id');
    }
}
