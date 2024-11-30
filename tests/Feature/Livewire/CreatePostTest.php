<?php

use App\Livewire\CreatePost;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(CreatePost::class)
        ->assertStatus(200);
});
