<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    protected $table = 'titles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title_id',
        'title_name',
        'active_status',
    ];
}
