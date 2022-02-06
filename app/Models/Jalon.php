<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jalon extends Model
{
    use HasFactory;

    protected $fillable = [
        'sprint_id',
        'order',
        'description',
        'start_date',
        'end_date',
        'duration',
        'avancement',
    ];
}
