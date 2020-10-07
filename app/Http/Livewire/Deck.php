<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Deck extends Component
{
    public $pokemons;
    public $foo;


    public function render()
    {
        $this->pokemons = auth()->user()->decks;

        return view('livewire.deck')
            ->extends('layouts.app')
            ->section('content');

    }


    public function destroy($id)
    {
        \App\Models\Deck::destroy($id);
    }
}
