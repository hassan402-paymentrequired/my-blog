<?php

namespace App\Livewire;

use App\Mail\ConnectionMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Component;


class Connect extends Component
{
    #[Validate(['required','min:5'])]
    public $name = '';

    #[Validate('required')]
    public $email = '';
    public $content = '';
    public function render()
    {
        return view('livewire.connect');
    }


    public function send()
    {
        Mail::to('lateefoluwafemi@gmail.com')->queue(new ConnectionMail($this->name, $this->email, $this->content));
        session()->flash('success', 'Your message has been sent successfully.');

        return redirect()->route('home');

    }
}
