<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenderList extends Model
{
    use HasFactory;

    protected $table = 'gender_lists'; // Explicit table name (optional if matches convention)

    protected $primaryKey = 'id';

    protected $fillable = [
        'gender_id',
        'gender_name',
        'active_status',
    ];
}
