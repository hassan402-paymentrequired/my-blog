<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Livewire\Component;

class EditPost extends Component
{

    public $title , $content, $tag,  $image, $blog_post;
    public $author = 'Hassan@laramic';

    public function mount( $id)
    {
        $blogPost = BlogPost::findOrFail($id);

        $this->blog_post = $blogPost;

        $this->title = $blogPost->title;
        $this->content = $blogPost->content;
        $this->tag = $blogPost->tag;
        $this->image = $blogPost->image;
    }

    public function render()
    {
        // dd($this->blogposts);
        return view('livewire.edit-post');
    }


  public function updateBlog()
  {
    $validated = $this->validate([
        'title' => 'required|min:5',
        'content' => 'required|min:5',
        'tag' => 'required|min:3',
        'image' => 'image|max:1024',
    ]);

     $this->blog_post->updated($validated);
     $this->blog_post->save();
     session()->flash('success', 'Your message has been sent successfully.');
     return redirect()->route('home');
  }
}
