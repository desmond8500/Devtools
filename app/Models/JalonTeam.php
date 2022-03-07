<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JalonTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'jalon_id',
        'team_id',
    ];

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class, 'foreign_key', 'team_id');
    }
}
