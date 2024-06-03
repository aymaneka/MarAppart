<?php

namespace App\Http\Controllers\Appartement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appartement;
use App\Models\Image;
use App\Models\Localisation;
use App\Models\Characteristic;
use App\Models\Citie;
use App\Models\PersonController;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allcities = Citie::all();
        $allcharacteristic = Characteristic::get();
     
        $allapartemnt = Appartement::with('images')->with('characteristics')->with('city')->get();
        // return $allapartemnt;
        // return $allcities;
        // return $allapartemnt;
        // return $allapartemnt;
        // return $allapartemnt;

        return view('All_Properties', [
            // 'persons' => $NombrePerson,
            // 'characteristics' => $allcharacteristic,
            'cities'=>$allcities,
            'appartements'=>$allapartemnt,
        ]);
        

    }


        public function indexlanding()
        {
            //
            $allcities = Citie::all();
            $allcharacteristic = Characteristic::get();

            $allapartemnt = Appartement::with('images')->with('characteristics')->with('city')->get();
            // return $allcities;
            // return $allapartemnt;
            // return $allapartemnt;
            // return $allapartemnt;
    
            return view('landing', [
                // 'persons' => $NombrePerson,
                // 'characteristics' => $allcharacteristic,
                // 'cities'=>$allcities,
                'appartements'=>$allapartemnt,
            ]);
            
    
    
        }


        // public function filterAppartement(Request $request){

        //     $person = $request->nombrePersonne;
        //     $Appartement = Appartement::where('person_nombre','=',$person)->get();
        //     return view('All_Properties', [
        //         'filterappartements'=>$Appartement,
        //     ]);
        // }    

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $thisappartement = Appartement::with('images')->with('characteristics')->with('city')->find($id);
        // return $thisappartement;

        return view('properties',[
            'appartement'=>$thisappartement,
        ]);
        

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
