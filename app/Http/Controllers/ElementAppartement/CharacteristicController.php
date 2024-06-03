<?php

namespace App\Http\Controllers\ElementAppartement;

use App\Models\Characteristic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CharacteristicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $characteristic = Characteristic::get();
       
      return view('characteristic',[
        'characteristics' => $characteristic,
      ]);

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
    public function store(Request $request)
    {
        // 
        Characteristic::create([
            'name'=>$request->characteristic,
        ]);

        return redirect()->route('characteristic.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Characteristic  $characteristic
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Characteristic  $characteristic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $characteristic= Characteristic::find($id);
        return response()->json($characteristic);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Characteristic  $characteristic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        // return $id;
        $characteristic = Characteristic::find($id);
        $characteristic->update([
            'name'=> $request->characteristic,

        ]);
        return redirect()->route('characteristic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Characteristic  $characteristic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)

    {
        //
        $id = $request->id;
        Characteristic::find($id)->delete();
        return redirect()->route('characteristic.index')->with('success','Appartement has been deleted successfully');

    }
}
