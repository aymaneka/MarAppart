<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

        <div class="d-flex justify-content-between "> 
          <div> <p class="properties">list of properties</p></div>
          <div class="col-md-4 col">
            <form class="form-inline">
              <div class="form-group mx-sm-3 my-3 d-flex" >
                <label for="inputSearch" class="sr-only"></label>
                <input type="text" class="form-control " wire:model="search" id="inputSearch" placeholder="Recherche">
                 <i class=" mt-2 ms-2 fa fa-search"></i>
              </div>
              <!-- <button type="submit" class="btn btn-primary mb-2">Chercher</button> -->
            </form>
          </div>
        </div>

        <div class="row mx-auto ">
            @foreach($appartements as $appartement)
            <div class="col-md-6 col-lg-4 p-2 col-12" href="#modal-meal" data-bs-toggle="modal" >
                <div class="card border-0 rounded-4 bg-light shadow-lg  rounded">
                  @foreach ($appartement->images as $image)
                <a href="{{route('propertie.show', $appartement->id)}}"><img src="{{asset('storage/image/'.$image->image)}}" class="card-img-top" > </a> 
                @break
                @endforeach
                <div class="card-body text-center">
                  <h5 class="card-title fw-bold text-dark">{{$appartement->name}}</h5>
                  <p class="mb-2 items-center text-dark" ><i class="fa-solid fa-location-dot"></i>  {{$appartement->city->name}},{{$appartement->address}}</p>
                  <p class="card-text text-success">MAD{{$appartement->prix}}</p>
                  <hr class="my-1" />
                  <p class="text-dark"><span class="fw-bold text-dark">Date :</span>{{$appartement->date}}</p>
                </div>    
              </div>
            </div> 
            @endforeach
            <div class="container">
                {{$appartements->links()}}
            </div>
           </div>
        </div>
        @livewireScripts
        </div>
    
