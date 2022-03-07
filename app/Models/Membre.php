<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Membre extends Model
{
    use HasFactory;

    protected $fillable = [
        'jalon_id',
        'team_id',
        'role'
    ];

    public function get_name($team_id)
    {
        $team = Team::find($team_id);

        if ($team) {
            return $team->name;
        }
        return null;
    }
}
