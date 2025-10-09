<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GnDivision extends Model
{
    use HasFactory;

    protected $table = 'gn_divisions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'gn_division_id',
        'dso_id',
        'gn_division_name',
        'gn_division_code',
        'active_status',
    ];

    /**
     * Relationship: GN Division belongs to a Divisional Secretariat Office
     */
    public function divisionalSecretariatOffice()
    {
        return $this->belongsTo(DivisionalSecretariatOffice::class, 'dso_id', 'dso_id');
    }
}
