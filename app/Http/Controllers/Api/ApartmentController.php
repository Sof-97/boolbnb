<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = DB::table('apartments')
            ->where('is_visible', '=', true)
            ->get();
        return response()->json($apartments);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $apartment = Apartment::where('slug', $slug)->first();
        if (!$apartment) return response()->json([
            'error' => 'Resource not found'
        ], 404);
        return response()->json($apartment);
    }

    /*
    *
    *   Query ricerca standard 
    * 
    */
    public function search($query)
    {
        $apartment = DB::table('apartments')
            ->where([
                ['title', 'like', '%' . $query . '%'],
                ['is_visible', '=', true]
            ])
            ->orWhere([
                ['description', 'like', '%' . $query . '%'],
                ['is_visible', '=', true]
            ])
            ->orWhere([
                ['address', 'like', '%' . $query . '%'],
                ['is_visible', '=', true]
            ])
            ->get();
        return response()->json($apartment);
    }

    public function radiusSearch($radius, $lat, $lon)
    {

        $allApartments = DB::table('apartments')->where('is_visible', '=', true)->get();
        $apartments = [];

        $lat2 = deg2rad($lat);
        $lon2 = deg2rad($lon);

        foreach ($allApartments as $apartment) {
            $lat1 = deg2rad($apartment->latitude);
            $lon1 = deg2rad($apartment->longitude);

            $deltaLat = $lat2 - $lat1;
            $deltaLon = $lon2 - $lon1;

            $val = pow(sin($deltaLat / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($deltaLon / 2), 2);
            $res = 2 * asin(sqrt($val));

            $radiusEarth = 6371;
            $distance = $radiusEarth * $res;

            if ($distance <= $radius) {
                array_push($apartments, $apartment);
            }
        }

        return response()->json($apartments);
    }
}
