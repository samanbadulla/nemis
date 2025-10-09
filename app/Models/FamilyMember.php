<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'family_members';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     */
    public $incrementing = true;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'family_id',
        'child_name',
        'date_of_birth',
        'birth_fc_no',
        'health_condition',
        'active_status',
    ];

    /**
     * Relationship: A FamilyMember belongs to a Family.
     */
    public function family()
    {
        return $this->belongsTo(Family::class, 'family_id', 'family_id');
    }
}
