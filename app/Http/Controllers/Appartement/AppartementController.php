<?php

namespace App\Http\Controllers\Appartement;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Appartement;
use App\Models\Image;
use App\Models\Characteristic;
use App\Models\Citie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAppartementRequest;
use App\Http\Requests\UpdateAppartementRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Enums\AppartementStatus;

class AppartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $StatisticUser = User::count();
        $StatisticAppartement = Appartement::count();
        // $StatisticReservation = Reservation::count()->where('status', 1);
        $allReservations = Reservation::count();
        $ConfirmedReservations = Reservation::where('status', 1)->count();
        // return $allReservations;
        $allcities = Citie::all();
        $allcharacteristic = Characteristic::get();
        $user= Auth()->user();

        if($user->can('view all appartement')){
            $allapartemnt = Appartement::with('images')->with('characteristics')->with('city')->get();
            
        } 
        else{
        $allapartemnt = Appartement::with('images')->with('characteristics')->with('city')->where('user_id',$user->id)->get();
        }
        return view('mydashboard', [
            'characteristics' => $allcharacteristic,
            'cities'=>$allcities,
            'appartements'=>$allapartemnt,
            'users' => $StatisticUser,
            'allreservations' =>  $allReservations,
            'confirmedreservations' =>  $ConfirmedReservations,
            'allappartement' =>  $StatisticAppartement,

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
     * @param  \App\Http\Requests\StoreAppartementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppartementRequest $request)
    {
        //
        // return "ok";
            $userId = Auth()->user()->id;
        
            $newAppartement = Appartement::create([
                'user_id' => $userId,
                'person_nombre' => $request->nombrePersonne,
                'name'=>$request->name_appartement,
                'description' => $request->description,
                'address'=>$request->localisation,
                'city_id'=>$request->city,
                'space' => $request->espaces,
                'no_chambre' => $request->nombreChambre,
                'prix' => $request->prix,
                'date' => $request->date,
            ]);
            $id = $newAppartement->id;
            // $images = [];
            
            $imageData = [];
            foreach ($request->file('images') as $image) {
                $filename =  Str::uuid()->toString(). '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('image', $filename, 'public');
                $imageData[] = [
                    'appartement_id' => $id,
                    'image' => $filename,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            
            Image::insert($imageData);
            
            
        
            // $id = $newAppartement->id;
        
            // foreach ($images as $image) { 
            //     Image::insert([
            //         'appartement_id' => $id,
            //         'image' => $image,
            //     ]);
            // }
     
       
        // Localisation::create([
        //     'appartement_id'=>$id,
        //     'localisation'=>,
        //     'city_id'=>$request->city,
        // ]);



      $characteristiques = $request->input('caracteristique'); 
      $newAppartement->characteristics()->attach($characteristiques);

    // return $this->index();
    return redirect()->route('dashboard');
    
        }

   
    

        
       
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appartement  $appartement
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //

       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appartement  $appartement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    
         $allcities = Citie::all();
         $allcharacteristic = Characteristic::get();
        $thisappartement = Appartement::with('images')->with('characteristics')->with('city')->find($id);
    //    return $thisappartement->characteristics;
    foreach($thisappartement->characteristics as $characteristic){

        $selectedCharacteristics[] = $characteristic->id;
    }
    $thiscity[] = $thisappartement->city->id;
    // return $selectedCharacteristics;
         return view('edit_properties',[
            'appartement'=>$thisappartement,
            'characteristics'=>$allcharacteristic,
            'selectedCharacteristics'=>$selectedCharacteristics,
            'selectedCity'=>$thiscity,
            'cities'=>$allcities,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppartementRequest  $request
     * @param  \App\Models\Appartement  $appartement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppartementRequest $request,$id)

    {

        // return $request->input('characteristics');
        $appartement = Appartement::find($id);

    // update the appa$appartement's attributes
  
    $appartement->update([
        'person_nombre' => $request->nombrePersonne,
        'name'=>$request->name_appartement,
        'description' => $request->description,
        'address'=>$request->localisation,
        'city_id'=>$request->city,
        'space' => $request->espaces,
        'no_chambre' => $request->nombreChambre,
        'prix' => $request->prix,
        'date' => $request->date,
    ]);
    // save the changes to the appa$appartement
    
    // update the appa$appartement's images
    if($request->file('images')){ 
    foreach ($request->file('images') as $image) {
        $filename = Str::uuid()->toString() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('image', $filename, 'public');
          Image::create([
            'appartement_id' => $appartement->id,
            'image' => $filename,
        ]);
    }
   }
    // update the $appartement's localisation
    // $appartement->localisation->update([
    //     'localisation' => $request->localisation,
    //     'city_id' => $request->city,
    // ]);

    // update the $appartement's characteristics
    $characteristics = $request->input('characteristics');
    $appartement->characteristics()->sync($characteristics);
        


    //   $characteristiques = $request->input('caracteristique'); 
    //   $newAppartement->characteristics()->attach($characteristiques);
        return redirect()->route('dashboard');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appartement  $appartement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        {    
            $id = $request->id;
            // return $id;
            //  $appartement->find($id);
            Appartement::find($id)->delete();
            return redirect()->route('dashboard')->with('success','Appartement has been deleted successfully');
        }
    }


}
