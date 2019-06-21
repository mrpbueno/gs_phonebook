<?php

namespace App;

use App\Events\ContactEvent;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'department',
        'phone_number_work',
        'phone_number_home',
        'phone_number_cell',
        'account_index',
    ];

    protected $dispatchesEvents = [
        'updated' => ContactEvent::class,
        'created' => ContactEvent::class,
        'deleted' => ContactEvent::class,
    ];
}
