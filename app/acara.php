<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class acara extends Model
{
    protected $table = 'acaras';

    public function getRouteKeyName()
    {
    	return 'judul';
    }
}
