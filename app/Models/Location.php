<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Place;
use App\Models\Category;
use Carbon\CarbonPeriod;
use App\Models\LocationPhotos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    //Relazioni 
    protected $guarded = [];
    public function images()
    {
        return $this->hasMany(LocationPhotos::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function reservations()
    {
        return $this->belongsToMany(User::class, 'reservations')->using(Reservation::class)->withPivot(['check_in', 'check_out']);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

   

    public function isAvailable($check_in, $check_out)
    {
        $desiredPeriod = CarbonPeriod::create($check_in,$check_out);
        
        return !$this->reservations()->get() 
            ->map(function ($reservation) use ($desiredPeriod) {

                $resPeriod = CarbonPeriod::create($reservation->pivot->check_in, $reservation->pivot->check_out);
                return $resPeriod->overlaps($desiredPeriod);
            })->contains(true);
    }
}
