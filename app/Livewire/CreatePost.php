<?php

namespace App\Livewire;

// use function Livewire\Volt\{layout, state, title};

use App\Models\BlogPost;
use Exception;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{

    use WithFileUploads;

    public $title = '';

    public $body = '';

    public $tag = '';

    public $image = null;
    public $author = 'Hassan@laramic';

    public function render()
    {
        return view('livewire.create-post');
    }


    public function store()
    {

        $validated = $this->validate([
            'title' => 'required|min:5',
            'body' => 'required|min:5',
            'tag' => 'required|min:3',
            'image' => 'image|max:1024',
        ]);

        try {

            if ($this->image) {
                $this->image =  $this->image->store('images', 'public');
            }

            //  dd($this->title, $this->body, $this->tag, $this->image);
            BlogPost::create([
                'title' => $this->title,
                'content' => $this->body,
                'author' => "Hassan@laramic",
                'tag' => $this->tag,
                'image' =>  $this->image
            ]);
            $this->reset();

            session()->flash('success', 'Your message has been sent successfully.');

            return redirect()->route('home');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
