<?php

namespace App\Models\Pivot;

use Illuminate\Database\Eloquent\Relations\Pivot;


class BookUser extends Pivot
{

    public static $statuses = [
        'WANT_TO_READ' => 'Want to read',
        'READING' => 'Reading',
        'Read' => 'Read'
    ];
}
