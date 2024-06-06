<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Ventas;
use Livewire\WithPagination;
class TableComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $ventas = Ventas::where("producto","LIKE","%".$this->search."%")
        ->orWhere("cliente","LIKE","%".$this->search."%")
        ->paginate(10);
        return view('livewire.table-component',compact('ventas'));
    }
}
