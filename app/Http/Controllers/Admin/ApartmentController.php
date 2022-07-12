<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function messages()
    {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        $apartments = Apartment::with('message')->where('id_user', '=', $id)->get();
        return view('admin.apartments.message', compact('user', 'apartments'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        $apartments = Apartment::all()->where('id_user', '=', $id);
        return view('admin.apartments.dashboard', compact('user', 'apartments'));
    }
    public function sponsor(){
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        // $apartments = Apartment::all()->where('id_user', '=', $id);
        $apartment = DB::table('apartments')->where('id', '12')->first();
        $plans = DB::table('sponsorships')->get();
        return view('admin.apartments.sponsor', compact('user', 'apartment', 'plans'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $apartments = Apartment::all()->where('id_user', '=', $id);

        // $apartments = Apartment::all();

        return view('admin.apartments.apartment', compact('apartments'));
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

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:150',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string|max:500',
            'cover_image' => 'required',
            'mq2' => 'required|numeric|min:20|max:300',
            'rooms' => 'required|numeric|min:1',
            'beds' => 'required|numeric|min:1',
            'bathrooms' => 'required|numeric|min:1',
            'is_visible' => 'required|boolean',
            'address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect('admin/apartments/create')
                ->withErrors($validator);
        }


        if (array_key_exists('cover_image', $data)) {
            $image_url = Storage::put('apartment_images', $data['cover_image']);
            $data['cover_image'] = $image_url;
        }


        $newApartment->fill($data);
        $newApartment->slug = Str::slug($newApartment->title, '-');
        $newApartment->save();

        if (array_key_exists('services', $data)) {
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
        if (Auth::id() == $apartment->id_user) {
            return view('admin.apartments.show', compact('apartment'));
        } else {
            $id = Auth::id();
            $apartments = Apartment::with('message')->where('id_user', '=', $id);

            return view('admin.apartments.apartment', compact('apartments'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        if (Auth::id() == $apartment->id_user) {
            $services = Service::all();
            $apartment_services_id =  $apartment->service->pluck('id')->toArray();
            return view('admin.apartments.edit', compact('apartment', 'services', 'apartment_services_id'));
        } else {
            $id = Auth::id();
            $apartments = Apartment::all()->where('id_user', '=', $id);

            return view('admin.apartments.apartment', compact('apartments'));
        }
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

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:150',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string|max:500',
            'cover_image' => 'required',
            'mq2' => 'required|numeric|min:20|max:300',
            'rooms' => 'required|numeric|min:1',
            'beds' => 'required|numeric|min:1',
            'bathrooms' => 'required|numeric|min:1',
            'is_visible' => 'required|boolean',
            'address' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect("admin/apartments/$apartment->id/edit")
                ->withErrors($validator);
        }
        if (array_key_exists('cover_image', $data)) {
            if ($apartment->cover_image) Storage::delete($apartment->cover_image);
            $image_url = Storage::put('apartment_images', $data['cover_image']);
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
