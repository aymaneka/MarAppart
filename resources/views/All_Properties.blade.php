@include('header')
<body class="">
    @include('nav')
  
   <div class=" bg-properties">
     <div class="d-flex justify-content-start "> 
       <div> <p class="properties">list of properties</p></div>
     </div>
  <div class=" my-5">        
   @livewire('filter-appartement')
  </div>
  </div>
     @livewireScripts
    @include('footer')  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>