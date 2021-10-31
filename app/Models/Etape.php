<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etape extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['scenario_id','ordre', 'description'];
}
