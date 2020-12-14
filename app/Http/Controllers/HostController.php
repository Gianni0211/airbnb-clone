<?php

namespace App\Http\Controllers;

use App\Models\User;

use Inertia\Inertia;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\HostRequestNotification;

class HostController extends Controller
{
    
    public function sendMail(User $user){
        
        
        Notification::send($user, new HostRequestNotification($user));
        return response()->json([
            'succes' => true
        ]);
    }
    public function acceptHost(User $user)
    {
        $user->makeUserHost();
        return response()->json([
            'succes' => true
        ]);
    }

    /* public function create()
    {
        return Inertia::render('views/LocationCreate');
    } */
   

}
