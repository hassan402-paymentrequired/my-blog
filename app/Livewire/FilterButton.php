<?php

namespace App\Livewire;

use Livewire\Component;

class FilterButton extends Component
{
    public function render()
    {
        return view('livewire.filter-button');
    }

    public $title = '';
    public $active = false;
    public function mount($title, $active)
    {
        $this->title = $title;
        $this->active = $active;
    }

    public function filter()
    {
        $this->dispatch('post-created', title: $this->title);
    }
}
