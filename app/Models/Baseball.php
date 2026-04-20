<?php

namespace App\Models;

use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Model;

class Baseball extends Model
{
    protected $table = 'baseball';

    protected $casts = [
        'splits' => 'array',
    ];

    public function getTimeAttribute($attribute)
    {
        return new DateTime($attribute)
            ->setTimezone(new DateTimeZone(config('app.timezone')))
            ->format('h:ia');
    }
}
