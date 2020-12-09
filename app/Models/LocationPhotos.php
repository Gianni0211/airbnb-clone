<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LocationPhotos extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function location(){
        return $this->belongsTo(Location::class);
    }
}
