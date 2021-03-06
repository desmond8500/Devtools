<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function teams(): HasMany
    {
        return $this->hasMany(Membre::class);
    }
}
