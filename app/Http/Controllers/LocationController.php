<?php

namespace App\Http\Controllers;

use Reservation;
use App\Models\Place;
use App\Models\Location;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Models\LocationPhotos;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Storage;
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

            $locations = Location::with('images')->get();
        } else {

            $post_code = $request->query('l');
            $in = $request->query('in', '2020-11-03');
            $out = $request->query('out', '2020-11-06');
            $q = $request->query('q');

            $locations = Location::with('images')->get()->filter(function ($loc) use ($post_code) {
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
        $images = $request->input('images');
        $place = $request->input('address');




        $loc =  Location::create([
            'name' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'guest_number' => $request->input('guest'),
            'place_id' => Place::firstOrCreate([
                'post_code' => $place['post_code'],
                'name' => $place['name'],
                'country_code' => $place['country_code']

            ], [
                'name' => $place['name'],
                'region' => $place['region'],
                'region_code' => $place['region_code'],
                'country_code' => $place['country_code'],
                'post_code' => $place['post_code'],
                'latitude' => $place['cordinates']['lat'],
                'longitude' => $place['cordinates']['lng']
            ])->id,
            'user_id' => $request->input('user'),
            'subtitle' => 'Il sottotitolo',
            'category_id' => $request->input('category')
        ]);

        foreach ($images as $img) {
            $base64_img = explode(',', $img['image'])[1];
            $path = $loc->id . '/' . $img['id'] . $img['type'];
            Storage::put('public/loc_' . $path, base64_decode($base64_img));
            LocationPhotos::create([
                'file' => 'http://localhost:8000/storage/loc_' . $path,
                'location_id' => $loc->id
            ]);
        }

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
        $loc = Location::where('id', $location->id)->with('images', 'user', 'place', 'category')->get();
        return new LocationResource($loc);
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


    public function reservation(Request $request)
    {
        $loc = Location::find($request->input('id'));




        $period = CarbonPeriod::create($request->input('check_in'), $request->input('check_out'));

        $loc->reservations()->attach(
            auth()->user()->id,
            [
                'total_price' => ($period->count() * $loc->price * $request->input('guests')),
                'guests' => $request->input('guests'),
                'check_in' => $request->input('check_in'),
                'check_out' => $request->input('check_out'),
            ]
        );
        
        return response()->json(['success' => true]);
    }
}
