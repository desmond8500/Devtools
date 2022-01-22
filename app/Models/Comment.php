<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'besoin_id',
        'description'
    ];

    public function get_user($id)
    {
        $user = User::find($id);

        if ($user) {
            return $user->name;
        }else{
            return null;
        }
    }
}
