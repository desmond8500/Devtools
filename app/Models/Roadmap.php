<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roadmap extends Model
{
    use HasFactory;

    protected $fillable = [
        'projet_id',
        'name',
        'client',
        'chief',
        'start_date',
        'end_date',
    ];

    public function sprints(): HasMany
    {
        return $this->hasMany(Sprint::class, 'roadmap_id');
    }
}
