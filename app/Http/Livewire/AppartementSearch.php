<?php

namespace App\Http\Livewire;

use App\Models\Appartement;
use Livewire\Component;
use Livewire\WithPagination;

class AppartementSearch extends Component
{
    use WithPagination ;
    public $search = '';
    protected $paginationTheme = 'bootstrap';
   
   public function updatingSearch(){
    $this->resetPage();

   }
    public function render()
    {

        $allapartemnt = Appartement::with('images')
        ->with('characteristics')
        ->with('city')
        ->whereHas('city', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->paginate(6);      // dd($allapartemnt);

        return view('livewire.appartement-search' , [
            'appartements'=>$allapartemnt,

        ]);


        
    }
}
