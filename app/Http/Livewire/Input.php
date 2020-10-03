<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Input extends Component
{
    public $pokemon;
    public $data;
    public $types;
    public $images;
    public $ability;
    public $response_code;
    public $pokemon_model;


    protected $rules = [
        'pokemon' => 'min:1'
    ];

    public function render()
    {
        return view('livewire.input');
    }

    public function getPokemon()
    {
        $this->validate();
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/' . $this->pokemon);
        $this->response_code = $response->status();
        $this->data = $response->json();

        if ($this->data ?? false) {
            $this->images = array_filter($this->data['sprites'],
                fn($item) => !is_array($item));
            $this->ability = $this->data['abilities'][0]['ability']['name'];
        }
    }

    public function addPokemonOnDeck()
    {
       $pokemon = Auth()->user()->decks()->create([
            'name' => $this->data['name'],
            'weight' => $this->data['weight'],
            'height' => $this->data['height'],
            'base_experience' => $this->data['base_experience'],
            'ability' => $this->ability,
        ]);

       $this->pokemon_model = $pokemon->name;



    }
}
