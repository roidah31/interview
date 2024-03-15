<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;
use App\Models\Car;
Use DB;
use Illuminate\Support\Facades\Auth;
class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       		
		$rent = DB::table('rents')->join('users','rents.id_user','=','users.id')
		->join('cars','rents.id_car','=','cars.id')
        ->select('rents.*','users.namalengkap','cars.merk','cars.tarif','cars.platno')     
        ->orderBy('rents.created_at','desc')
		->where('rents.id_user','=',Auth::user()->id)
        ->get();
		return view('rent.index', compact('rent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
		$car = DB::table('cars')
		->where('cars.status','=','free')
        ->get();
        return view('rent.create',compact('car'));
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
            'id_car' => 'required',
            'start_date' => 'required'
        ]);
            $rent = Rent::create([
                'id_user' => $request->id_user,
                'id_car' => $request->id_car,
                'name_car' => $request->name_car,
                'price' => $request->tarif,
				'start_date'=>$request->start_date,
				'end_date'=>$request->end_date,
            ]);
			 $status = DB::table('cars')
					->where('id', $request->id_car)
					->update(['status' => 'rented']); 
            return redirect(route('rent.index'))->with(['success' => 'Sewa Baru dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show(Rent $rent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rent $rent)
    {
        $res = Rent::where('id', $rent)->delete();
           
            return redirect()->back();
    }
}
