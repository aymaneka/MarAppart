<x-app-layout>
    <x-slot name="header">  
        @include('header') 
        <div class="container container-reservation">
          @if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif 
@if ($message = Session::get('erreur'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif 
          <form action="{{route('validation_reservation',$reservation->id)}}">
            @csrf
          <div class="row justify-content-center ">
            <div class="col-md-8">
              <div class="ticket">
                <div class="ticket-header">
                  <h3 class="ticket-title">Confirmation réservation</h3>
                </div>
                <div class="ticket-body">
                  <div class="ticket-info">
                    <div class="ticket-row">
                      <div class="ticket-label">Nom complet :</div>
                      <div class="ticket-value">{{$reservation->user->name}}</div>
                    </div>
                    <div class="ticket-row">
                      <div class="ticket-label">appartement :</div>
                      <div class="ticket-value">{{$reservation->appartement->name}}</div>
                    </div>
                    <div class="ticket-row">
                      <div class="ticket-label">address :</div>
                      <div class="ticket-value">{{$reservation->appartement->city->name}} , {{$reservation->appartement->address}}</div>
                    </div>
                    <div class="ticket-row">
                      <div class="ticket-label">Téléphone :</div>
                      <div class="ticket-value"> {{$reservation->user->phone}}</div>
                    </div>
                    <div class="ticket-row">
                      <div class="ticket-label">Date de début :</div>
                      <div class="ticket-value"> {{$reservation->date_debut}}</div>
                    </div>
                    <div class="ticket-row">
                      <div class="ticket-label">Date de fin :</div>
                      <div class="ticket-value"> {{$reservation->date_fin}}</div>
                    </div>
                  </div>
                  @if ($reservation->status == 0 )   
                  <div class="ticket-actions">
                    <button type="submit" class="btn btn-success" name="confirmer" >Confirmer</button>
                    <button type="submit" class="btn btn-danger"  >Annuler</button>
                  </div>
                  @else
                       <div class="ticket-label">CHECK DONE </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </form>
        </div>
        

            
    </x-slot>
</x-app-layout>