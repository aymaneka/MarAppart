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
            'localisation' => 'required|string|max:255',
            'name_appartement' => 'required|string|max:255',
            'city' => 'required|exists:cities,id',
            'description' => 'required|string',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prix' => 'required|numeric|min:0',
            'caracteristique' => 'required|array',
            'caracteristique.*' => 'exists:characteristics,id',
            'nombrePersonne' => 'required|integer|min:1',
            'nombreChambre' => 'required|integer|min:1',
            'espaces' => 'required|string|max:255',
            'date' => 'required|date',
        ];
    }

     /**
     * Get custom messages for validator errors.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'localisation.required' => 'Please provide the location of the apartment.',
            'name_appartement.required' => 'Please provide the name of the apartment.',
            'city.required' => 'Please select a city.',
            'city.exists' => 'The selected city is invalid.',
            'description.required' => 'Please provide a description.',
            'images.required' => 'Please upload at least one image.',
            'images.*.image' => 'Each file must be an image.',
            'images.*.mimes' => 'Each image must be a file of type: jpeg, png, jpg, gif, svg.',
            'images.*.max' => 'Each image may not be greater than 2MB.',
            'prix.required' => 'Please provide a price.',
            'prix.numeric' => 'The price must be a number.',
            'prix.min' => 'The price must be at least 0.',
            'caracteristique.required' => 'Please select at least one characteristic.',
            'caracteristique.*.exists' => 'The selected characteristic is invalid.',
            'nombrePersonne.required' => 'Please provide the number of people.',
            'nombrePersonne.integer' => 'The number of people must be an integer.',
            'nombrePersonne.min' => 'The number of people must be at least 1.',
            'nombreChambre.required' => 'Please provide the number of rooms.',
            'nombreChambre.integer' => 'The number of rooms must be an integer.',
            'nombreChambre.min' => 'The number of rooms must be at least 1.',
            'espaces.required' => 'Please provide the spaces.',
            'date.required' => 'Please provide the date.',
            'date.date' => 'Please provide a valid date.',
        ];
    }
}
