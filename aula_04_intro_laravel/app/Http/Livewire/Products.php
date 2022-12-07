<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Products extends Component
{
    public $produtos;

    public function render()
    {
        return view('livewire.products');
    }
}
