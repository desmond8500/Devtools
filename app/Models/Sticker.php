<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sticker extends Model
{
    use HasFactory;
    protected $fillable = [
        'besoin_id',
        'team_id',
    ];

    public function team_name($id)
    {
        $team = Team::find($id);

        if ($team) {
            return $team->name;
        } else {
            return null;
        }
    }
}
