<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('Tambah Admin')]
class AdminCreate extends Component
{
    public function render()
    {
        return view('livewire.admin-create');
    }
}
