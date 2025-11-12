<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'families';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     */
    public $incrementing = true;

    /**
     * The data type of the primary key.
     */
    protected $keyType = 'int';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'family_id',
        'member_a_id',
        'member_b_id',
        'married_date',
        'married_cf_no',
        'married_cf',
        'divorce_date',
        'family_name',
        'active_status',
    ];

    /**
     * Relationships
     */

    // Husband (Male Member)
    public function memberA()
    {
        return $this->belongsTo(People::class, 'member_a_id', 'people_id');
    }

    // Wife (Female Member)
    public function memberB()
    {
        return $this->belongsTo(People::class, 'member_b_id', 'people_id');
    }

    // Children (if you later add a family_members table)
    public function children()
    {
        return $this->hasMany(FamilyMember::class, 'family_id', 'family_id');
    }

    /**
     * Scope to only include active families.
     */
    public function scopeActive($query)
    {
        return $query->where('active_status', '1');
    }

    public function getSpousInfo($teacherId)
    {
        if ($this->memberA->people_id == $teacherId) {
            return $this->memberB;
        }

        return $this->memberA;
    }
}
