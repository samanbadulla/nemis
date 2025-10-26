<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'id';

    protected $fillable = [
        'service_id',
        'service_name',
        'description',
        'active_status',
    ];

    // If you want to filter active institutions by default
    public function scopeActive($query)
    {
        return $query->where('active_status', 1);
    }

    /**
     * A Service has many Positions.
     */
    public function positions()
    {
        return $this->hasMany(Position::class, 'service_id', 'service_id');
    }
}
