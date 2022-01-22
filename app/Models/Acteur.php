<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'projet_id',
        'description'
    ];

    public function get_name($id)
    {
        $acteur = Acteur::find($id);

        if($acteur){
            return $acteur->name;
        }else{
            return null;
        }
    }
}
