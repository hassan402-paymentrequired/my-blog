<?php

namespace App\Livewire;

use App\Models\BlogPost as ModelsBlogPost;
use Livewire\Component;

class BlogPost extends Component
{

    public $post;
    public function mount(ModelsBlogPost $blog_post)
    {
        $this->post = $blog_post;
    }
    public function render()
    {
        return view('livewire.blog-post',[
            'blogpost' => $this->post,
        ]);
    }
}
