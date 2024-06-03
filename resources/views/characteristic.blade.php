
<x-app-layout>
    <x-slot name="header">
        @include('header')

<div class="col-12 container  ">
    <div class="bg-light rounded  h-100 p-4">
        <div class=" d-flex justify-content-between ">
            <div><h6 class="mb-4">characteristic</h6></div>
            <div><button type="button" class="btn btn-dark mb-3" onclick="addChra()" data-bs-toggle="modal" data-bs-target="#exampleModal">add characteristic</button></div>
        </div>
        <div class="table-responsive">
            <table class="table  table-striped">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($characteristics as $characteristic )
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $characteristic->name}}</td>
                        <td> <button type="submit" onclick="edit('{{$characteristic->id}}')"><i class="fa-solid fa-pen-to-square"></i></button></td>
                        <form action="" method="POST">
                             @csrf
                             @method('DELETE')
                            </form>
                             <td><button type="button"  onclick="remove_chara('{{$characteristic->id}}')"  class="" data-bs-toggle="modal"  data-bs-target="#deletemodal" data-bs-whatever="@mdo"> <i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{route('characteristic.store')}}" method="post">
      @method('PUT')
              @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Characteristic</label>
                <input type="text" class="form-control" name="characteristic" id="recipient-name">
              </div>
              {{-- <input type="hidden" class="form-control" name="characteristic_id" id="recipient-name"> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit"  class="btn btn-success" id="update_btn">Save</button>
        </div>
      </div>
    </div>
</form>
  </div>


  {{--  --}}
  {{-- modal delete --}}

<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <form action="{{route('characteristic.destroy')}}" method="post" id="form" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
                <input type="hidden" name="id" id="chara-delete-id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger" id="delete-btn">Yes</button>
            </div>
          </form>
        </div>
    </div>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="{{asset('js\dash.js')}}"></script>
</x-slot>

   
</x-app-layout>