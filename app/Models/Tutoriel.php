<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;

class Tutoriel extends Model
{
    use HasFactory;
    use HasTags;
    use SoftDeletes;

    protected $fillable = ['name', 'folder'];
}
