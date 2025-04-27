<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('Tambah Berkas')]
class BerkasCreate extends Component
{
    public function render()
    {
        return view('livewire.berkas-create');
    }
}
