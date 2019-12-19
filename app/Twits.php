<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twits extends Model
{
    protected $table='twits';
    protected $fillable=[
        'body','user_id'
    ];
}
