<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}


    <div class="row mx-auto ">
        <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-0">
          <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
              <div class="container-fluid flex-lg-column align-items-stretch">
                  <h4 class="mt-2">FILTERS</h4>
                  <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                    <div class="border bg-light p-3 rounded mb-3">
                      <h5 class="mb-3" style="font-size: 18px;">CHECK CITY</h5>
                      <select class="form-select" aria-label="Default select example" name="city" wire:model="city" >
                        @foreach($cities as $city)
                          <option value="{{$city->id}}">{{$city->name}}</option>
                          @endforeach
                    </select>
                    </div>
                    <div class="border bg-light p-3 rounded mb-3">
                        <form wire:submit.prevent>
                            <h5 class="mb-3" style="font-size: 18px;"><output id="min">{{ $min_prix }}MAD</output><strong><</strong> PRICE <strong><</strong><output id="max">{{ $max_prix }}MAD</output></h5>
                            <label for="minRange" class="form-label">Min Price</label>
                            <input type="range" class="form-range" min="0" max="{{ $max_prix }}" value="0" step="1" id="minRange" wire:model="min_prix">
                            <label for="maxRange" class="form-label">Max Price</label>
                            <input type="range" class="form-range" min="0" max="1000" step="1" value="0" id="maxRange" wire:model="max_prix">
                        </form>
                      </div>
                    {{-- <div class="border bg-light p-3 rounded mb-3">
                      <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                      <div class="mb-2">
                        <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                        <label class="form-check-label" for="f1">WIFI</label>
                      </div>
                      <div class="mb-2">
                        <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                        <label class="form-check-label" for="f2">TV</label>
                      </div>
                      <div class="mb-2">
                        <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                        <label class="form-check-label" for="f3">AC</label>

                      </div>
                    </div> --}}
                       <div class="border bg-light p-3 rounded mb-3">
                          <h5 class="mb-3" style="font-size: 18px;">Adults</h5>
                          <div class="d-flex">
                            <div class="me-2">
                                <select class="form-select" aria-label="Default select example" name="nombrePersonne" wire:model='person_nombre'>
                                  <option selected>Nombre de Personne</option>
                                  @for($i=1;$i<=6;$i++)
                                  <option value="{{$i}}" >{{$i}}</option>
                                  @endfor

                                </select>
                              </div>
                            </div>
                      </div>
                       <div class="border bg-light p-3 rounded mb-3">
                          <h5 class="mb-3" style="font-size: 18px;">Chambre</h5>
                          <div class="d-flex">
                            <div class="me-2">
                                <select class="form-select" aria-label="Default select example" name="nombrePersonne" wire:model='chambre_nombre'>
                                  <option selected>Nombre de Chambre</option>
                                  @for($i=1;$i<=6;$i++)
                                  <option value="{{$i}}" >{{$i}}</option>
                                  @endfor
                                </select>
                              </div>
                            </div>
                      </div>
                  </div>
              </div>
          </nav>
        </div>
        <div class="row col-lg-9 col-md-12 mb-lg-0">
          @foreach($appartements as $appartement)
          <div class="col-md-6 col-lg-4 p-2 col-12"  >
              <div class="card border-0 rounded-4 bg-light  shadow-lg  rounded">
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
        </div>
      </div>

</div>
