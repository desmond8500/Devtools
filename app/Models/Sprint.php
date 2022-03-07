<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sprint extends Model
{
    use HasFactory;
    protected $fillable = [
        'roadmap_id',
        'name',
        'description',
        'order',
        'start_date',
        'end_date',
        'show',
        'status'
    ];

    public function jalons(): HasMany
    {
        return $this->hasMany(Jalon::class, 'sprint_id');
    }
}
