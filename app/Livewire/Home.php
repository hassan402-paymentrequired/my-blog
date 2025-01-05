<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Livewire\Attributes\On;
use Livewire\Component;

class Home extends Component
{
    public $blogposts = [];
    public $filterTitle = null;

    public function mount()
    {
        $this->blogposts = BlogPost::latest()->get();
    }

    #[On('post-created')]
    public function index($title)
    {
        $this->filterTitle = $title;
        $this->blogposts = BlogPost::where('tag', 'like', '%' . $this->filterTitle . '%')->get();
       session()->flash('tag', $this->filterTitle);;
    }

    public function render()
    {
        return view('livewire.home', [
            'blogposts' => $this->blogposts,
            'activefilter' => $this->filterTitle
        ]);
    }
}
