
<x-app-layout>
    @include('header')
      <x-slot name="header">







        <body>

            <div class="main-wrapper container">




                <!-- sidebar section -->
                {{-- @include('dashboard.sidebar') --}}


                <div class="page-wrapper">
                    <div class="content container-fluid">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title mt-5">Edit Properties</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <form method="POST" action="{{route('properties.update',$appartement->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row formtype">
                                        <h5>Images</h5>
                                        <div class="d-flex flex-wrap justify-content-sm-center mb-4 ">
                                            @foreach ($appartement->images as $image)
                                            <div class="d-flex  m-2">
                                            <img src="{{asset('storage/image/'.$image->image)}}" class="rounded edit_image" alt="" srcset="">
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Properties Name</label>
                                                <input class="form-control" type="text" name="name_appartement"  value="{{$appartement->name}}">
                                                @error('name_appartement') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="recipient-name" class="col-form-label" >choisir votre Ville</label>
                                            <select class="form-select" aria-label="Default select example" name="city">
                                                @foreach($cities as $city)
                                                  <option value="{{$city->id}}"{{in_array($city->id,$selectedCity) ? 'selected' : '' }}>{{$city->name}}</option>
                                                  @error('city') <p class="text-danger">{{ $message }}</p> @enderror

                                                  @endforeach;
                                            </select>


                                        </div>


                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Adresse</label>
                                                <input type="text" class="form-control" name="localisation" id="recipient-name" value="{{$appartement->address}}">
                                                @error('localisation') <p class="text-danger">{{ $message }}</p> @enderror
                                              </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="message-text" class="col-form-label">Description </label>
                                                <textarea class="form-control" rows="5" name="description" id="message-text">{{$appartement->description}}</textarea>
                                                @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                                              </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">

                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Image</label>
                                                    <input type="file" class="form-control" name="images[]" multiple id="recipient-name">
                                                    @error('images') <p class="text-danger">{{ $message }}</p> @enderror
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Prix</label>
                                                <input type="number" class="form-control" name="prix" id="recipient-name" step="0.01" min="0" value="{{$appartement->prix}}">
                                                @error('prix') <p class="text-danger">{{ $message }}</p> @enderror
                                              </div>
                                        </div>

                                        <!-- add relation with facilitie?? -->


                                          <div class="col-md-4">
                                            <label for="recipient-name" class="col-form-label" for="tags">Caractéristiques sélectionnées</label>

                                            @foreach ($characteristics as $characteristic)
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="characteristics[]" value="{{$characteristic->id}}"
                                                    {{in_array($characteristic->id, $selectedCharacteristics) ? 'checked' : '' }}>
                                                    @error('characteristics') <p class="text-danger">{{ $message }}</p> @enderror
                                                    <label class="form-check-label" for="characteristic">{{$characteristic->name}}</label>
                                                </div>
                                            @endforeach

                                        </div>
                                          <div class="col-md-4">
                                            <label for="recipient-name" class="col-form-label" >Nombre de Chambre</label>
                                            <select class="form-select" aria-label="Default select example" name="nombreChambre">
                                                @for($i=1;$i<=6;$i++)
                                                <option value="{{$i}}" {{$i == $appartement->no_chambre? 'selected' : ''}}>{{$i}}</option>
                                                @endfor;
                                                @error('nombreChambre') <p class="text-danger">{{ $message }}</p> @enderror
                                            </select>
                                          </div>

                                          <div class="col-md-4">
                                            <label for="recipient-name" class="col-form-label" >Nombre de Personne</label>
                                            <select class="form-select" aria-label="Default select example" name="nombrePersonne">
                                                {{-- <option selected>{{$appartement->person_nombre}}</option> --}}
                                                @for($i=1;$i<=6;$i++)
                                                <option value="{{$i}}" {{$i == $appartement->person_nombre ? 'selected' : ''}}>{{$i}}</option>
                                                @endfor;
                                                @error('nombrePersonne') <p class="text-danger">{{ $message }}</p> @enderror
                                            </select>
                                          </div>

                                          {{-- <div class="col-md-4">
                                            <label for="recipient-name" class="col-form-label" for="tags">Sélectionnez des Caracteristiques:</label>
                                            <select class="form-select" aria-label="Default select example" name="" id="tags" multiple>

                                                <input type="checkbox"  value="{{$characteristic->id}}">{{$characteristic->name}}


                                            </select>
                                          </div> --}}
                                          <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="recipient-name" class="col-form-label">Espaces</label>
                                                    <input type="text" class="form-control" value="{{$appartement->space}}" name="espaces" id="recipient-name">
                                                    @error('espaces') <p class="text-danger">{{ $message }}</p> @enderror
                                                </div>
                                           </div>

                                           <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Date</label>
                                                <input type="date" class="form-control" value="{{$appartement->date}}" name="date" id="recipient-name">
                                                @error('date') <p class="text-danger">{{ $message }}</p> @enderror
                                              </div>
                                       </div>


                                            </div>

                                        </div>

                                    </div>
                            </div>
                        </div>
                        <div class="my-5">
                        <button type="submit" class="btn btn-primary buttonedit ml-2">Update</button>
                        <button type="button" class="btn btn-primary buttonedit"><a href="{{ route('dashboard')}}">Cancel</a></button>
                    </div>
                    </div>
                    </form>

                </div>

            </div>



        </body>

        </html>









       </x-slot>
</x-app-layout>


