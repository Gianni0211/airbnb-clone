<?php

namespace App\Models;

use App\Models\User;
use App\Models\Place;
use App\Models\LocationPhotos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    //Relazioni 
    protected $guarded = [];
    public function images(){
        return $this->hasMany(LocationPhotos::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function place()
    {
        return $this->belongsTo(Place::class);
    }



}
