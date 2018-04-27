<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class acara extends Model
{
	use Searchable;

	public function searchableAs()
    {
        return 'judul';
    }
    protected $table = 'acaras';
}
