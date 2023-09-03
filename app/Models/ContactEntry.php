<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// @todo: Delete model and resource
class ContactEntry extends Model
{
    protected $fillable = [
        'email',
        'message',
        'name',
    ];
}
