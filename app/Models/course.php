<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class course extends Eloquent
{
    protected $connection = 'mongodb';
	protected $collection = 'course';
    protected $guarded  = [];

    public function skill() {
        return $this->hasMany(skill::class);
    }

    public function capability() {
        return $this->hasMany(capability::class);
    }
    
}
