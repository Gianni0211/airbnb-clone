<?php

namespace App\Models;


use App\Models\User;
use App\Models\Location;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Symfony\Component\VarDumper\Cloner\Data;

class Reservation extends Pivot
{
    public $incrementing = true;
    protected $table = 'reservations';
    protected $dates = [
        'check_in',
        'check_out'
    ];
    protected $dateFormat = 'Y-m-d';
    protected $guarded = [];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    
}
