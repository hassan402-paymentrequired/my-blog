<?php

use App\Livewire\Connect;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Connect::class)
        ->assertStatus(200);
});
