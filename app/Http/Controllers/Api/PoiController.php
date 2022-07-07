<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoiController extends Controller
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
            
        $response = [];

        foreach($apartments as $apartment){
            $poi = array(
                "lat"=> $apartment->latitude,
                "lon"=> $apartment->longitude,
            );
            array_push($response, $poi);
        }
        return response()->json($response);
    }
}
