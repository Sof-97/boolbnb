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
        $apartments = Apartment::all();
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
}
