
@include('header')
<div class="d-flex flex-column justify-content-center align-items-center  vh-100 bg_login ">
   
    <div class="w-25 mx-auto mt-6 px-6 py-4 bg-white shadow overflow-hidden rounded-lg max-w-md bg-transparent">
        {{ $slot }}
    </div>
</div>
