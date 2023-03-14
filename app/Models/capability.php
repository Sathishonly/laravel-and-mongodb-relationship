<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class capability extends Eloquent
{
    protected $connection = 'mongodb';
	protected $collection = 'capability';
    protected $guarded  = [];


    public function course() {
        return $this->belongsTo(course::class);
    }
}
