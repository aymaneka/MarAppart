<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppartementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'localisation'=>'required',
            'name_appartement'=>'required',
            'city'=>'required',
            'description'=>'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'prix'=>'required',
            'caracteristique'=>'required',
            'nombrePersonne'=>'required',
            'nombreChambre'=>'required',
            'espaces'=>'required',
            'date'=>'required'
            
            
        ];
    }
}
