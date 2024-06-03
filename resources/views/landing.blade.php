@include('header') 
@include('nav') 
<body class="">
   <!-- <div class="container ">
   <img src="{{asset('img/architecture-morocco-style.jpg')}}"   alt="landing-image">
   </div> -->
   <div class="bg-image">
    <div class=" content-cherche d-md-flex f-sm-column  justify-content-md-around  align-items-center  h-100" style="position: inherit;
    z-index: 1;">
      <div class="description-inside_nav">
        <p class="description-acceuil">The most affortable place </p>
        <p class="description-acceuil">to stay in Morrocan dreams </p>
     </div>
      <div class="col-md-4 col-10">
        <form class="form-inline">
              <div class=" d-flex flex-column justify-content-center"><a href="#here" class="description-acceuil">View Properties
            <button type="button" class="btn btn-light col-4 fs-4  mb-2">view</button></a> </div>
          </form>
      </div>
    </div>
  </div>
      
 
              


 <!-- cursouel  -->
    
  <div id="here" class="container my-5">  
    @livewire('appartement-search')
  <div> 
  {{-- <div class="d-flex justify-content-between "> 
    <div> <p class="properties">list of properties</p></div>
    <div class="col-md-4 col-10">
      <form class="form-inline">
        <div class="form-group mx-sm-3 my-3">
          <label for="inputSearch" class="sr-only"></label>
          <input type="text" class="form-control " id="inputSearch" placeholder="Recherche">
        </div>
         <button type="submit" class="btn btn-primary mb-2">Chercher</button> 
      </form>
    </div>
  </div>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
<div class="carousel-indicators">
<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
</div>
<div class="carousel-inner">
<div class="carousel-item active">
<div class="row mx-auto ">
  @foreach($appartements as $appartement)
  <div class="col-md-6 col-lg-4 p-2 col-12" href="#modal-meal" data-bs-toggle="modal" >
      <div class="card border-0 rounded-4 bg-light  shadow-lg  rounded">
        @foreach ($appartement->images as $image)
      <a href="properties"><img src="{{asset('storage/image/'.$image->image)}}" class="card-img-top" > </a> 
      @break
      @endforeach;
      <div class="card-body text-center">
        <h5 class="card-title fw-bold text-dark">{{$appartement->name}}</h5>
        <p class="mb-2 items-center text-dark" ><i class="fa-solid fa-location-dot"></i>  {{$appartement->localisation->city->name}},{{$appartement->localisation->localisation}}</p>
        <p class="card-text text-success">MAD{{$appartement->prix}}</p>
        <hr class="my-1" />
        <p class="fw-bold text-dark">Status : {{$appartement->status}}</p>
        <p class="text-dark"><span class="fw-bold text-dark">Date :</span>{{$appartement->date}}</p>
      </div>    
    </div>
  </div> 
  @endforeach





<div class="carousel-item">
<div class="row mx-auto ">
<div class="col-md-6 col-lg-4 p-2 col-12" href="#modal-meal" data-bs-toggle="modal" >
<div class="card border-0 rounded-4 bg-light  shadow-lg  rounded">
<img src="{{asset('/img/modern-living-room.jpg')}}" class="card-img-top">
<div class="card-body text-center">
<h5 class="card-title fw-bold text-dark">test</h5>
<p class="mb-2 items-center text-dark" ><i class="bi bi-geo-alt-fill"></i> : test</p>
<p class="card-text text-success">test</p>
<hr class="my-1" />
<p class="fw-bold text-dark">Available on :</p>
<p class="text-dark"><span class="fw-bold text-dark">Date :</span> 12:03:2022</p>
</div>    
</div>
</div>  

<div class="col-md-6 col-lg-4 p-2 col-12" href="#modal-meal" data-bs-toggle="modal" >
<div class="card border-0 rounded-4 bg-light  shadow-lg  rounded">
<img src="{{asset('/img/modern-living-room.jpg')}}" class="card-img-top">
<div class="card-body text-center">
<h5 class="card-title fw-bold text-dark">test</h5>
<p class="mb-2 items-center text-dark" ><i class="bi bi-geo-alt-fill"></i> : test</p>
<p class="card-text text-success">test</p>
<hr class="my-1" />
<p class="fw-bold text-dark">Available on :</p>
<p class="text-dark"><span class="fw-bold text-dark">Date :</span> 12:03:2022</p>
</div>    
</div>
</div>  

<div class="col-md-6 col-lg-4 p-2 col-12" href="#modal-meal" data-bs-toggle="modal" >
<div class="card border-0 rounded-4 bg-light  shadow-lg  rounded">
<img src="{{asset('/img/modern-living-room.jpg')}}" class="card-img-top">
<div class="card-body text-center">
<h5 class="card-title fw-bold text-dark">test</h5>
<p class="mb-2 items-center text-dark" ><i class="bi bi-geo-alt-fill"></i> : test</p>
<p class="card-text text-success">test</p>
<hr class="my-1" />
<p class="fw-bold text-dark">Available on :</p>
<p class="text-dark"><span class="fw-bold text-dark">Date :</span> 12:03:2022</p>
</div>    
</div>
</div>  
</div>  

</div>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
<span class="carousel-control-prev-icon " aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
<span class=" text-dark carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div>
</div> --}} 






<div class="  bg-content-living container-fluid d-flex flex-column  ">
  <div class="text-center">
    <p class="script-living">minimum living cost takes care of everything</p>
  </div>
  <div class="d-flex flex-lg-row flex-column justify-content-center align-items-center">
    <div class="image-parent-content ">
      <img src="{{asset('img/medium-shot-woman-old-city.jpg')}}" class="image-content img-fluid" alt="">
    </div>
    <div class="w-75 d-flex flex-lg-column justify-content-center align-items-center">
      <div class="d-flex flex-lg-row  justify-content-lg-around flex-column justify-content-center align-items-center w-100 h-50 my-5">
        <div class="text-center mx-sm-2"><i class="border-icon fs-1 fa-solid fa-money-check-dollar"></i><p class="script-icon">Pay as little <br> As possible!</p></div>
        <div class="text-center mx-sm-2"><i class="border-icon fs-1 fa-solid fa-house-flag"></i><p class="script-icon">Enjoy wisdom <br> Of community!</p></div>
        <div class="text-center"><i class="border-icon fs-1 fa-solid fa-layer-group"></i><p class="script-icon">Let's somebody else <br> Take care of Landlord!</p></div>
      </div>
      <div class="d-flex flex-lg-row justify-content-lg-around  flex-column justify-content-center align-items-center w-100 h-50">
        <div class="text-center mx-sm-2"><i class="border-icon fs-1 fa-solid fa-seedling"></i><p class="script-icon">Enjoy peaceful <br>Environment!</p></div>
        <div class="text-center mx-sm-2"><i class="border-icon fs-1 fa-solid fa-shield-halved"></i><p class="script-icon">Stay Safe! <br> Save Money!</p></div>
        <div class="text-center"><i class="border-icon fs-1 fa-solid fa-eye"></i><p class="script-icon">Pay for what <br> You use!</p></div>
      </div>
    </div>
  </div>
 </div> 

@livewireScripts
@include('footer') 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
