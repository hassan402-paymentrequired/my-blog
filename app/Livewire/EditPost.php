<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    use WithFileUploads;

    public $title, $content, $tag, $image, $blog_post;
    public $author = 'Hassan@laramic';
    public $newImage;

    public function mount($id)
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
        return view('livewire.edit-post');
    }

    public function updateBlog()
    {
        $validated = $this->validate([
            'title' => 'required|min:5',
            'content' => 'required|min:5',
            'tag' => 'required|min:3',
            'newImage' => 'nullable|image|max:1024',
        ]);

        $this->blog_post->title = $this->title;
        $this->blog_post->content = $this->content;
        $this->blog_post->tag = $this->tag;

        if ($this->newImage) {
            $imagePath = $this->newImage->store('blog_images', 'public');
            $this->blog_post->image = $imagePath;
        }

        $this->blog_post->save();

        session()->flash('success', 'Your blog post has been updated successfully.');
        return redirect()->route('home');
    }
}
