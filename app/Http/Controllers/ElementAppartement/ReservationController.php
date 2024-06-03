<?php

namespace App\Http\Controllers\ElementAppartement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\storeReservationRequest;
use App\Models\Appartement;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        // return Auth()->user();
        // return 'cc';
            if( Auth()->user()->can('view all reservation')){
                $reservation = Reservation::with('appartement','user')->get();
                // return $reservation;
                return view('reservation' , ['reservations'=>$reservation] );
            }
            else {
             $reservation = Reservation::with('user', 'appartement')
            ->whereHas('appartement', function ($query) {
                $query->where('user_id', Auth()->user()->id);
            })
    ->get();
        //  return $reservation;
        return view('reservation' , ['reservations'=>$reservation]);
        }
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeReservationRequest $request , $id)
    {
        //
       
        //
        $user_id = Auth()->user()->id;
        $appartement_id = $id;
        // return $id;
        $lastreservation =  Reservation::where('appartement_id', $appartement_id)
        ->where('status', 1)
        ->orderBy('id', 'DESC')
        ->first();
            
            if ($lastreservation) {
            $overlap = Reservation::where('id', $lastreservation->id)
            ->where(function ($query) use ($request) {
            $query->where('date_debut', '>', now())
            ->whereBetween('date_debut', [$request->start_date, $request->end_date])
            ->orWhereBetween('date_fin', [$request->start_date, $request->end_date]);
            })
            ->first();
            // return $overlap;
            if($overlap){
                return redirect()->back()->with('error'," appartement hase been reserverd between{{$request->start_date}} and {{$request->end_date}}");
            }else{
                Reservation::create([
                    'appartement_id'=>$appartement_id,
                    'user_id'=>$user_id,
                    'date_debut'=>$request->start_date,
                    'date_fin'=>$request->end_date,
                    ]
                );
                return redirect()->back()->with('success',"Appartement reserved successfully");
            }
        }else{
            Reservation::create([
                'appartement_id'=>$appartement_id,
                'user_id'=>$user_id,
                'date_debut'=>$request->start_date,
                'date_fin'=>$request->end_date,
                ]
            );
            return redirect()->back()->with('success',"Appartement reserved successfully");
        }
      
        }
        
        



    //    return redirect()->back()->with('success','Appartement reserved successfully');


        

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $reservation = Reservation::with('user','appartement')->find($id);
        // return $reservation ;
        return view('check_reservation', [
          'reservation'=> $reservation,
        ]);


    }

    public function validation_reservation(Request $request , $id){

        // return $id;
     
            // Check if the "Confirmer" button was clicked
            if ($request->has('confirmer')) {
                $reservation = Reservation::find($id);
                // dd($reservation);
                $reservation->update([
                  'status' => 1 ,
                ]);
                return redirect()->back()->with('success',"Reservation  Has benn Confirmed ");   } 
            else {
                $reservation = Reservation::find($id);
                $reservation->update([
                  'status' => 2 ,
                ]);
                return redirect()->back()->with('erreur',"Reservation  Has benn Canceled ");
            }
        
        
        //    return r
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
