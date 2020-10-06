<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Deck extends Component
{
    public $pokemons;


    public function render()
    {
        $this->pokemons = \App\Models\Deck::all();

        return view('livewire.deck')
            ->extends('layouts.app')
            ->section('content');

    }
}
