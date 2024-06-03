
<body class="">
<x-app-layout>
  @include('header')
    <x-slot name="header">
  
    
            
     

        <!-- Page Content  -->
        <div id="content">

          <div class=" d-flex justify-content-end ">
            <div class=""><button type="button" class=" proper-btn btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add properites</button></div>
        </div>
        @if(Auth::user()->hasRole('admin'))
                      <!-- statistique card -->
                      <div class="body-stats">
                        <div class="main-content">
                          <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
                            <div class="container-fluid">
                              <h2 class="mb-5 text-dark">Stats Card</h2>
                              <div class="header-body">
                                <div class="row">
                                  <div class="col-xl-3 col-lg-6">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                      <div class="card-body">
                                        <div class="row">
                                          <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">All propreties</h5>
                                            <span class="h2 font-weight-bold mb-0">{{$allappartement}}</span>
                                          </div>
                                          <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                              <i class="fas fa-chart-bar"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                          <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span> -->
                                          {{-- <span class="text-nowrap">Since last month</span> --}}
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-3 col-lg-6">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                      <div class="card-body">
                                        <div class="row">
                                          <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                                            <span class="h2 font-weight-bold mb-0">{{$users}}</span>
                                          </div>
                                          <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                              <i class="fas fa-chart-pie"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                          {{-- <span class="text-danger mr-2"> 3.48%</span>
                                          <span class="text-nowrap">Since last week</span> --}}
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-3 col-lg-6">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                      <div class="card-body">
                                        <div class="row">
                                          <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Reservation</h5>
                                            <span class="h2 font-weight-bold mb-0">{{$allreservations}}</span>
                                          </div>
                                          <div class="col-auto">
                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                              <i class="fas fa-users"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                          {{-- <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                          <span class="text-nowrap">Since yesterday</span> --}}
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-xl-3 col-lg-6">
                                    <div class="card card-stats mb-4 mb-xl-0">
                                      <div class="card-body">
                                        <div class="row">
                                          <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Confirmed Reservation</h5>
                                            <span class="h2 font-weight-bold mb-0">{{$confirmedreservations}}</span>
                                          </div>
                                          <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                              <i class="fas fa-percent"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                          {{-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                          <span class="text-nowrap">Since last month</span> --}}
                                        </p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--  -->
                      @endif

                    <div class="col-12">
                        <div class="bg-light rounded  h-50 p-4">
                          <div class=" d-flex justify-content-start ">
                            <div><h6 class="mb-4">Properties Table</h6></div>                      
                          </div>
                            <div class="table-responsive">
                                <table class="table  table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Localisation</th>
                                            <th scope="col">City</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Nombre de Personne</th>
                                            <th scope="col">Prix</th>
                                            <th scope="col">Espaces</th>
                                            <th scope="col">Caracteristique</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($appartements as $appartement)

                                        <tr>
                                            <th scope="row">1</th>

                    
                                            
                                            <div class="modal fade" id="exampleModal{{$loop->index}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                 
                                                  <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Images </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                    @foreach ($appartement->images as $image)
                                                    <img class="my-2" src="{{asset('storage/image/'.$image->image)}}" alt="" srcset="">
                                                    @endforeach
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            
                                            <td> 
                                            <button type="button" class=" proper-btn btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal{{$loop->index}}" data-bs-whatever="@mdo">view images</button>
                                          </td>
                                            
                                            <td>{{$appartement->name}}</td>
                                            <td>{{$appartement->status}}</td>
                                            <td>{{$appartement->address}}</td>
                                            <td>{{$appartement->city->name}}</td> 
                                            <td>{{$appartement->description}}</td>
                                            <td>{{$appartement->person_nombre}}</td> 
                                            <td>{{$appartement->prix}}</td>
                                            <td>{{$appartement->space}}</td>
                                            {{-- @foreach ($appartement->characteristics as $characteristic)
                                            <td> {{$characteristic->name}}</td>
                                            @endforeach  --}}
                                            <td> <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                  <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->index}}" aria-expanded="false" aria-controls="collapseOne">
                                                     Characteristic
                                                    </button>
                                                  </h2>
                                                  <div id="collapse{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <ul>
                                                         @foreach ($appartement->characteristics as $characteristic)
                                                         <li>{{$characteristic->name}}</li>
                                                         @endforeach
                                                        </ul>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div></td>
                                            <td>{{$appartement->date}}</td>
                                            <form action="" method="POST">
                                            <td><a href="{{route('properties.edit', $appartement->id)}}"><i class="fa-solid fa-pen-to-square"></i></td></a>
                                             @csrf
                                             @method('DELETE')
                                            </form>
                                             <td><button type="button"    onclick="remove_appart('{{ $appartement->id }}')"class="" data-bs-toggle="modal"  data-bs-target="#deletemodal" data-bs-whatever="@mdo"> <i class="fa-solid fa-trash"></i></button></td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        

                    <!-- second table  -->
             
        </div>
  

    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class=" modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nom de l'appartement</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('appartement.store')}}" method="POST" id="form" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Nom d'appartement</label>
              <input type="text" class="form-control" name="name_appartement" id="recipient-name">
            </div>
            <label for="recipient-name" class="col-form-label" >choisir votre Ville</label>
        <select class="form-select" aria-label="Default select example" name="city">
            @foreach($cities as $city)
              <option value="{{$city->id}}">{{$city->name}}</option>  
              @endforeach
        </select>
        
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Adresse</label>
            <input type="text" class="form-control" name="localisation" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description </label>
            <textarea class="form-control" name="description" id="message-text"></textarea>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Image</label>
            <input type="file" class="form-control" name="images[]" multiple id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Prix</label>
            <input type="number" class="form-control" name="prix" id="recipient-name" step="0.01" min="0">
          </div>
         
        <label for="recipient-name" class="col-form-label" for="tags">Sélectionnez des Caracteristique:</label>
            <select class="form-select" aria-label="Default select example" name="caracteristique[]" id="tags" multiple>
                @foreach($characteristics as $characteristic)
                <option value="{{$characteristic->id}}">{{$characteristic->name}}</option>  
                @endforeach
            </select>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nombre de Chambre</label>
                <input type="number" class="form-control" name="nombreChambre" id="recipient-name">
              </div>
            <label for="recipient-name" class="col-form-label" >Nombre de Personne</label>
        <select class="form-select" aria-label="Default select example" name="nombrePersonne">
            <option selected>Nombre de Personne</option>
            @for($i=1;$i<=6;$i++)
            <option value="{{$i}}">{{$i}}</option>  
            @endfor;  
        </select>
                <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Espaces</label>
            <input type="text" class="form-control" name="espaces" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Date</label>
            <input type="date" class="form-control" name="date" id="recipient-name">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="save" >Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
{{-- modal delete --}}

<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{route('properties.destroy')}}" method="post" id="form" enctype="multipart/form-data">
          @csrf
          @method('DELETE')
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <p>Are you sure you want to delete?</p>
              <input type="hidden" name="id" id="appar-delete-id">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">No</button>
              <button type="submit" class="btn btn-danger" id="delete-btn">Yes</button>
          </div>
        </form>
      </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="{{asset('js\dash.js')}}"></script>
{{-- rechrche cite--}}

 {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>       
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> 
    <!-- side barr  --> --}}

</x-slot>

   
</x-app-layout>
</body>


</html>
