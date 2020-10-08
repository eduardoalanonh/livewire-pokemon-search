<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Deck extends Component
{
    public $pokemons;
    public $foo;


    public function render()
    {
        if(session()->has('pokemon')){
            $pokemon = session()->get('pokemon');
            Auth()->user()->decks()->create($pokemon);
            session()->forget('pokemon');
        }

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
