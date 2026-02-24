<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Membership extends Pivot
{
    protected $table = 'colocation_user';

    protected $fillable = [
        'role',
        'joined_at',
        'left_at',
    ];

    protected $casts = [
        'joined_at' => 'datetime',
        'left_at' => 'datetime',
    ];
}
