<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function episode(){
        return $this->hasMany(Episode::class, 'series_id');
    }
}
