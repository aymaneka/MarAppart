<div class="bg-light rounded  h-50 p-4">
    <div class=" d-flex justify-content-start ">
      <div><h6 class="mb-4">users</h6></div>                      
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table  table-striped">
      <thead>
          <tr>
              <th scope="col"></th>
              <th scope="col">UserName</th>
              <th scope="col">Email</th>
              <th scope="col">phone</th>
              <th scope="col">Change role </th>
              <th scope="col">Delete</th>
          </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row"></th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->phone}}</td>
        <td>
            <select name="role" wire:model="roleUser" wire:change="changeRole({{ $user->id }})">
                <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->hasRole('user') ? 'selected' : '' }}>User</option>
            </select>
        </td>
        <td>
            <button class="btn btn-danger" wire:click="deleteUser({{ $user->id }})">Delete</button>
        </td>
          </tr>
        
        @endforeach
      </tbody>
  </table>
      </div>