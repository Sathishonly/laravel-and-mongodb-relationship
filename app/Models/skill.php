<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class skill extends Eloquent
{
    protected $connection = 'mongodb';
	protected $collection = 'skill';
    protected $guarded  = [];

    public function course() {
        return $this->belongsTo(course::class);
    }
}
