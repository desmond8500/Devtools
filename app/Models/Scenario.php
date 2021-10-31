<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scenario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['besoin_id', 'type'];

    public function etapes(): HasMany
    {
        return $this->hasMany(Etape::class, 'scenario_id');
    }
}
