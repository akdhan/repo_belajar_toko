<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    protected $table = 'parkir';
    public $timestamps = false;

    protected $fillable = ['kendaraan', 'id_custom'];
}
