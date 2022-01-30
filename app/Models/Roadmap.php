<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    use HasFactory;
    protected $fillable = [
        'projet_id',
        'name',
        'societe',
        'chef_de_projet',
        'date_debut',
        'date_fin',
    ];
}
