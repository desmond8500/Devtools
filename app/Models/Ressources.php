<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressources extends Model
{
    use HasFactory;
    protected $fillable = [
        'projet_id',
        'name',
        'description',
        'link',
        'icon',
    ];
}
