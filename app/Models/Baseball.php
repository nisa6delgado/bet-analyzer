<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baseball extends Model
{
    protected $table = 'baseball';

    protected $casts = [
        'splits' => 'array',
    ];
}
