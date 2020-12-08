<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Resources\LocationResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LocationController extends Controller
{


    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!count($request->query())) {

            $locations = Location::all();
        } else {

            $post_code = $request->query('l');
            $in = $request->query('in', '2020-11-03');
            $out = $request->query('out', '2020-11-06');
            $q = $request->query('q');

            $locations = Location::all()->filter(function ($loc) use ($post_code) {
                return $loc->place->post_code == $post_code;
            })->filter(function ($loc) use ($in, $out) {
                return $loc->isAvailable($in, $out);
            });
        }
        return new LocationResource($locations);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loc =  Location::create([
            'name' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'guest_number' => $request->input('guest'),
            'place_id' => 1,
            'user_id' => $request->input('user'),
            'subtitle' => 'Il sottotitolo',
            'category_id' => $request->input('category')

        ]);
        return response()->json($loc);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return new LocationResource($location);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        if (auth()->user() == $location->user) {
            $location->delete();
            return response()->json(['succes' => true, 'message' => 'Resource delete successfully'], 200);
        }
        return response()->json(['succes' => false, 'message' => 'unauthorized'], 401);
    }
}
