
@include('header')
@include('nav')
<body>
  <body>

     
    <div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-md-7 ">
          <h3>appartement :  {{$appartement->name}}</h3>
          {{-- @foreach ($appartement->images as $image)
          <img src="{{asset('storage/image/'.$image->image)}}" class="img-fluid rounded " alt="Appartement">
          @endforeach;
        </div> --}}
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            @foreach ($appartement->images as $key => $image)
              <div class="carousel-item @if ($key === 0) active @endif">
                <img src="{{asset('storage/image/'.$image->image)}}" class="img-fluid rounded " alt=".">
              </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <h3 class="mt-4">Ce que propose ce logement</h3>
        <div class="row">
          <hr>
          <div class="col-md-5">
            @foreach ($appartement->characteristics as $characteristic )
              @if ($characteristic->name == 'Baignoire' || $characteristic->name == 'Connexion Wi-Fi gratuite' || $characteristic->name == 'TV')
                <p><i class="fa fa-fw {{ $characteristic->name == 'Baignoire' ? 'fa-shower' : ($characteristic->name == 'Connexion Wi-Fi gratuite' ? 'fa-wifi' : ($characteristic->name == 'TV' ? 'fa-tv' : '' )) }}"></i> {{ $characteristic->name }}</p>
              @endif
            @endforeach
          </div>
          <div class="col-md-6">
            @foreach ($appartement->characteristics as $characteristic )
              @if ($characteristic->name == 'Front de mer' || $characteristic->name == 'Terrasse' || $characteristic->name == 'Piscine extérieure' || $characteristic->name == 'Parking gratuit' || $characteristic->name == 'Vue sur le jardin')
                <p><i class="fa fa-solid {{ $characteristic->name == 'Front de mer' ? 'fa-umbrella-beach' : ($characteristic->name == 'Terrasse' ? 'fa-building-circle-check' : ($characteristic->name == 'Piscine extérieure' ? 'fa-water-ladder' :( $characteristic->name == 'Parking gratuit' ? 'fa-square-parking' : ( $characteristic->name == 'Vue sur le jardin' ? 'fa-tree-city' : ''  )))) }}"></i> {{ $characteristic->name }}</p>
              @endif
            @endforeach
          </div>
          <hr>
        </div>

        </div>
        <div class="col-md-5 col my-2  d-flex flex-column justify-content-center ">
          <div class=" d-flex flex-column  ">
         
            <h3>a propos de cette appartement:</h3>
            <p>{{$appartement->description}}</p>
            <h2>Détails de l'appartement</h2>
            <ul>
              <li>Nombre de person :  {{$appartement->person_nombre}}</li>
              <li>Nombre de chambre : {{$appartement->no_chambre}} </li>
              <li> space:  {{$appartement->space}} m<sup>2</sup></li>
              <li><i class="fa-solid fa-location-dot"></i>  {{$appartement->city->name}} ,  {{$appartement->address}}</li>
            </ul>
            <h2>Prix</h2>
            <p>Le loyer journalier est de {{$appartement->prix}} MAD.</p>
          </div>
          <div>
            <div class="card border-0 col-md-10   rounded-4 bg-light shadow-lg rounded mt-5">
              <div class="card-body">
                @if ($message = Session::get('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong >{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif 
              @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif 
                <h2>Réserver maintenant</h2>
               
              
                {{-- <h4>Status : {{$appartement->status}}</h4> --}}
                <form   method="POST" action="{{route('reservation.store' ,$appartement->id)}}">
                  @csrf
                  <div class="form-group my-3">
                    <label for="checkin">Date d'arrivée:</label>
                    <input type="date" class="form-control " name="start_date" id="checkin">
                    @error('start_date') <p class="text-danger">{{ $message }}</p> @enderror 
                  </div>
                  <div class="form-group my-3">
                    <label for="checkout">Date de départ:</label>
                    <input type="date" class="form-control "  name="end_date" id="checkout">
                    @error('start_date') <p class="text-danger">{{ $message }}</p> @enderror 
                  </div>
                  {{-- @if ($appartement->status  == 'Disponible' )  --}}
                  <button type="submit" class="btn btn-primary reserve-btn" >Réserver</button>
                  {{-- @endif  --}}
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> 
  </body>
