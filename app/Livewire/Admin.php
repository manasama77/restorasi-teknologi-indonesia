<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
#[Title('Admin')]
class Admin extends Component
{
    use WithPagination;

    public $deleteId = null;
    public $search = null;

    protected $listeners = ['confirmDelete' => 'deleteUser'];

    public function render()
    {
        $users = User::latest();

        if($this->search) {
            $users->where('username', 'like', '%'.$this->search.'%')->orWhere('name', 'like', '%'.$this->search.'%');
        }

        $datas = $users->paginate(5);
        return view('livewire.admin', [
            'datas' => $datas,
        ]);
    }

    public function searchProcess()
    {
        dd($this->search);
        $users = User::latest();
        if($this->search) {
            $users->where('username', 'like', '%'.$this->search.'%')->orWhere('name', 'like', '%'.$this->search.'%');
        }

        $datas = $users->paginate(5);
        return view('livewire.admin', [
            'datas' => $datas,
        ]);
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $user = User::find($this->deleteId);

        $this->dispatch('swal:confirm', [
            'title' => 'Hapus user '.$user->username.'?',
            'text' => 'Tindakan ini akan menghapus user dan tidak bisa dikembalikan.',
            'icon' => 'error',
            'showCancelButton' => true,
            'confirmButtonText' => 'Yes, delete it!',
            'cancelButtonText' => 'No, keep it',
        ]);
    }

    public function deleteUser()
    {
        if ($this->deleteId) {
            User::find($this->deleteId)->delete();
            $this->deleteId = null;
            $this->dispatch('swal:success', [
                'title' => 'Deleted!',
                'text' => 'User has been deleted.',
                'icon' => 'success',
            ]);
            $this->render();
        }
    }
}
