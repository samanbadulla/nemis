<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ZonalEducationOffice extends Model
{
    use HasFactory;

    protected $table = 'zonal_education_offices';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'workplace_id',
        'peo_wp_id',
        'district_id',
        'name',
        'short_name',
        'email',
        'phone',
        'address',
        'postal_code',
        'latitude',
        'longitude',
        'active_status',
    ];

    /**
     * Each Zonal Education Office belongs to a Provincial Education Office
     */
    public function provincialEducationOffice()
    {
        return $this->belongsTo(
            ProvincialEducationOffice::class,
            'peo_wp_id',   // foreign key on this table
            'workplace_id' // referenced key in provincial_education_offices
        );
    }

    /**
     * Each Zonal Education Office belongs to a District
     */
    public function district()
    {
        return $this->belongsTo(
            DistrictsList::class,
            'district_id', // foreign key
            'district_id'  // primary/unique key in districts_lists
        );
    }
}
