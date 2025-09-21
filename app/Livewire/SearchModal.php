<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class SearchModal extends Component
{
    public $query = '';
    public $results = [];
    public $showModal = false;

    // Jalankan pencarian live saat query berubah
    public function updatedQuery()
    {
        $this->results = Post::where('title', 'like', '%' . $this->query . '%')
            ->take(10)
            ->get();
    }

    // Saat submit form, modal tetap terbuka dan hasil ditampilkan
    public function searchSubmit()
    {
        $this->results = Post::where('title', 'like', '%' . $this->query . '%')->get();
        // jangan tutup modal
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->query = '';
        $this->results = [];
    }

    public function render()
    {
        return view('livewire.search-modal');
    }
}
