<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveCarriedOver extends Model
{
    protected $fillable=[
        'userId',
        'year',
        'carriedOver'
    ];
}
