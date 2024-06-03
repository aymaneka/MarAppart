<x-app-layout>
    <x-slot name="header">
        @include('header')

       <div class="container col-12 ">

       @livewire('role-user')
        
       </div>


       @livewireScripts
    </x-slot>
</x-app-layout>