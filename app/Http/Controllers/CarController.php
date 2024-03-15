<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $car = Car::all();
      
        return view('car.index', compact('car'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'model' => 'required|string|max:100',
            'merk' => 'required',
            'platno' => 'required', //CATEGORY_ID KITA CEK HARUS ADA DI TABLE CATEGORIES DENGAN FIELD ID
            'tarif' => 'required|integer' //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
        ]);
            $car = Car::create([
                'model' => $request->model,
                'merk' => $request->merk,
                'platno' => $request->platno,
                'tarif' => $request->tarif,
				'status' => 'free',
              
            ]);
            return redirect(route('car.index'))->with(['success' => 'Mobil Baru Ditambahkan']);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
          $res = Car::where('id', $car)->delete();
           
            return redirect()->back();
    }
}
