<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soccer extends Model
{
    protected $table = 'soccer';

    protected $casts = [
        'league' => 'object',
        'teams' => 'object',
    ];
}
