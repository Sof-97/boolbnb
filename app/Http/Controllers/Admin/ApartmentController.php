<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\PostDec;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id = Auth::id();
        // $apartments = Apartment::all()->where('id', '=', $id);

        $apartments = Apartment::all();

        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        $services = Service::all();
        
        return view('admin.apartments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_user = Auth::id();
        $data = $request->all();
        $data['id_user'] = $id_user;

        $newApartment = new Apartment();

        if (array_key_exists('cover_image', $data)) {
            $image_url = Storage::put('apartment_images', $data['cover_image']);
            $data['cover_image'] = $image_url;
        }


        $newApartment->fill($data);
        $newApartment->slug = Str::slug($newApartment->title, '-');
        $newApartment->save();

        if(array_key_exists('services', $data)){
            $newApartment->service()->attach($data['services']);
        }
        
        return redirect()->route('admin.apartments.index')->with('created', "Hai aggiunto l'appartamento: $newApartment->title");;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        return view('admin.apartments.edit', compact('apartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $data = $request->all();
        $apartment->slug = Str::slug($request->title, '-');

        if(array_key_exists('cover_image', $data)){
            if( $apartment->cover_image ) Storage::delete($apartment->cover_image);

            $image_url = Storage::put('apartment_images', $data['cover_image'] );
            $data['cover_image'] = $image_url;
        }

        $apartment->update($data);
        

        return redirect()->route('admin.apartments.index')->with('modified', "Hai modificato: $apartment->title");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        Storage::delete($apartment->cover_image);
        $apartment->delete();

        return redirect()->route('admin.apartments.index')->with('deleted', "Hai eliminato con successo: $apartment->title");
    }
}
