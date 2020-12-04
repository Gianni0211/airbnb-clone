<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function fetchCategories(){
        $categories = Category::all();
        return response()->json($categories);
    }

    public function getPlace(Request $req){
        $place_id = Place::where('post_code', $req->query('post_code'))->first();
        
        if(!$place_id){
            
            return response()->json(["errore" => "No place found with post_code " . $req->query('post_code')], 401);
        
        }
        $loc = Location::where('place_id',$place_id->id)->get();
        
        return response()->json($loc);
    }
}
