<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProvincialEducationOffice extends Model
{
    use HasFactory;

    protected $table = 'provincial_education_offices';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'workplace_id',
        'pmoe_wp_id',
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
     * Each Provincial Education Office belongs to a Provincial Ministry of Education Office
     */
    public function provincialMinistryOfEducationOffice()
    {
        return $this->belongsTo(
            ProvincialMinistryOfEducationOffice::class,
            'pmoe_wp_id',   // foreign key on this table
            'workplace_id'  // referenced key in provincial_ministry_of_education_offices
        );
    }
}
