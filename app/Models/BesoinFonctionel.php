<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class BesoinFonctionel extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \Spatie\Tags\HasTags;

    protected $fillable = ['projet_id', 'name', 'acteur', 'prerequis', 'description'];

    public function projet(): HasOne
    {
        return $this->hasOne(Projet::class);
    }

    public function scenarios(): HasMany
    {
        return $this->hasMany(Scenario::class, 'besoin_id');
    }

    public function commentaires(): HasMany
    {
        return $this->hasMany(Comment::class, 'besoin_id', 'id');
    }

    public function stickers(): HasMany
    {
        return $this->hasMany(Sticker::class, 'besoin_id', 'id');
    }


}
