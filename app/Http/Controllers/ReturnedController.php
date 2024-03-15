<?php

namespace App\Http\Controllers;

use App\Models\returned;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Rent;
Use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\DateTime;
class ReturnedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		//$ret = Returned::all();
		 $ret = DB::table('returneds')->join('rents','returneds.id_rent','=','rents.id')
		->join('cars','rents.id_car','=','cars.id')
		->join('users','rents.id_user','=','users.id')
        ->select('returneds.id','returneds.total_price',
		'rents.id_user',
		'users.namalengkap'
		,'cars.merk',
		'rents.price',
		'cars.platno',
		'returneds.nopol',
		'returneds.start_date',
		'returneds.finish_date', 'returneds.total_day')
		->where('rents.id_user','=',Auth::user()->id)
        ->get();
        return view('return.index', compact('ret'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rent = DB::table('rents')->join('users','rents.id_user','=','users.id')
		->join('cars','rents.id_car','=','cars.id')
        ->select('rents.id','rents.id_car','rents.id_user','users.namalengkap'
		,'cars.merk','rents.price','cars.platno','rents.start_date','rents.end_date')
		->where('rents.id_user','=',Auth::user()->id)
        ->get();
		return view('return.create',compact('rent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			//hitung hari  pengembalian 
				$stt = DB::table('rents')
                 ->select(DB::raw('(start_date)'))
                 ->where('id','=', $request->id_rent)                
                 ->get();
				 $stt = DB::table('rents')
                 ->select(DB::raw('(start_date)'))
                 ->where('id','=', $request->id_rent)                
                 ->get();
				$start = date($request->input('start_date'));
				 $finish = date($request->input('finish_date'));
				 		
				 $a = Carbon::parse($start);
				$b = Carbon::parse($finish);        	
				$datex = $a->diffInDays($b);
				
					//hitung total paid
					$price = $request->input('price');			
					$total_price= $datex * $price;
					//save
					 $ceknopol = $request->platno;
					if($ceknopol == $request->nopol){
							if($datex == 0){
							
							$save = Returned::create([
							'id_user' => $request->id_user,
							'id_car' => $request->id_car,
							'id_rent' => $request->id_rent,                
							'start_date'=> $start,
							'finish_date'=> $request->finish_date,
							'nopol'=> $request->nopol,
							'total_day'=> $datex,
							'total_price'=> $request->price,
						]); 
						
						 $status = DB::table('free')
					->where('id_car', $request->id_car)
					->update(['status' => 'rented']); 
					}else{
						$save = Returned::create([
						'id_user' => $request->id_user,
						'id_car' => $request->id_car,
						'id_rent' => $request->id_rent,                
						'start_date'=> $start,
						'finish_date'=> $request->finish_date,
						'nopol'=> $request->nopol,
						'total_day'=> $datex,
						'total_price'=> $total_price,
					]); 
					 $status = DB::table('cars')
					->where('id', $request->id_car)
					->update(['status' => 'free']); 
					}
					}else {
						return redirect(route('returned.create'))->with(['failed' => 'Nopol tidak sesuai']);
					}
					return redirect(route('returned.index'))->with(['success' => 'berhasil mengembalikan']);
					
				dd($save);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function show(returned $returned)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function edit(returned $returned)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, returned $returned)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\returned  $returned
     * @return \Illuminate\Http\Response
     */
    public function destroy(returned $returned)
    {
         $res = Returned::where('id', $returned)->delete();
           
            return redirect()->back();
    }
}
