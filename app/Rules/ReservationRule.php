<?php

namespace App\Rules;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class ReservationRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     * 
     */
    // public $appartement_id ='';
    
    public function __construct($apartement_id)
    {
        //
        // $this->appartement_id =  $apartement_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value )
    {
        // 
        // $appartement_id = $parameters[0];
        
        // $start_date= request('start_date');
        // $end_date =   request('end_date');

        // $last_start_date_reservation = Reservation::where('appartement_id',)->where('status', 1);
        // dd($check); 
        // if($check){
        //    return 
        // } 
        // else{
        //     return 
        // }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
