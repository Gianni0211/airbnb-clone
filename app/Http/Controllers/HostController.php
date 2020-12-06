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
    public function request(){
        return view('hostHome');
    }
    public function sendMail(User $user){
        
        
        Notification::send($user, new HostRequestNotification($user));
        return redirect()->back();
    }
    public function acceptHost(User $user)
    {
        $user->makeUserHost();
        return redirect(route('home'));
    }

    /* public function create()
    {
        return Inertia::render('views/LocationCreate');
    } */
   

}
