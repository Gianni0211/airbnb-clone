<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\LocationPhotos;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocationPhotosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LocationPhotos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $r = rand(1,21);
        return [
            'file' => "http://localhost:8000/storage/placeholder/$r.jpg",
            'location_id' => function () {
                return Location::fatory()->create()->id;
            },
        ];
       
    }
}
