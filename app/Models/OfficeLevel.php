<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class OfficeLevel extends Model
{

    use HasFactory;

    protected $table = 'office_levels';

    protected $primaryKey = 'id';

    protected $fillable = [
        'office_level_id',
        'office_level_rank',
        'office_level_name',
        'active_status',
    ];

    public function workplaces()
    {
        return $this->hasMany(Workplaces::class, 'office_level_id', 'office_level_id');
    }
}
