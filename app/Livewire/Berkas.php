<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\Berkas as ModelsBerkas;
use Illuminate\Support\Facades\Storage;

#[Layout('components.layouts.app')]
#[Title('Admin')]
class Berkas extends Component
{
    use WithPagination;

    public $deleteId = null;
    public $search = null;

    protected $listeners = ['confirmDelete' => 'deleteUser'];

    public function render()
    {
        $berkas = ModelsBerkas::with([
            'user',
        ])->orderBy('tanggal', 'desc');

        if($this->search) {
            $berkas->where(function($query) {
                $query->where('no_berkas', 'like', '%'.$this->search.'%')
                      ->orWhere('nama_customer', 'like', '%'.$this->search.'%')
                      ->orWhere('no_berkas', 'like', '%'.$this->search.'%')
                      ->orWhere('file_path', 'like', '%'.$this->search.'%')
                      ->orWhereHas('user', function($q) {
                          $q->where('name', 'like', '%'.$this->search.'%');
                      });
            });
        }

        $datas = $berkas->paginate(5);
        return view('livewire.berkas', [
            'datas' => $datas,
        ]);
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $user = ModelsBerkas::find($this->deleteId);

        $this->dispatch('swal:confirm', [
            'title' => 'Hapus berkas '.$user->no_berkas.'?',
            'text' => 'Tindakan ini akan menghapus berkas dan tidak bisa dikembalikan.',
            'icon' => 'error',
            'showCancelButton' => true,
            'confirmButtonText' => 'Yes, delete it!',
            'cancelButtonText' => 'No, keep it',
        ]);
    }

    public function deleteUser()
    {
        if ($this->deleteId) {
            $mb = ModelsBerkas::find($this->deleteId);
            unlink(public_path('storage/'.$mb->file_path));
            $mb->delete();

            $this->deleteId = null;
            $this->dispatch('swal:success', [
                'title' => 'Deleted!',
                'text' => 'Berkas has been deleted.',
                'icon' => 'success',
            ]);
            $this->render();
        }
    }

    public function download($id)
    {
        $berkas = ModelsBerkas::find($id);
        return Storage::disk('public')->download($berkas->file_path);
    }
}
