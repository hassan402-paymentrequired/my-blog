<?php

use App\Livewire\FilterButton;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(FilterButton::class)
        ->assertStatus(200);
});
