<?php

namespace App\Http\Livewire;

use App\Models\Deck;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public $pokemon_exist = false;


    protected $rules = [
        'pokemon' => 'min:1',
    ];

    public function render()
    {
        return view('livewire.input')
            ->extends('layouts.app')
            ->section('content');
    }

    public function getPokemon()
    {
        $this->validate();
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/' . strtolower($this->pokemon));
        $this->response_code = $response->status();
        $this->data = $response->json();

        //verify pokemon exists
        if (auth()->user()) {
            $pokemon_exist = DB::table('decks')->where([
                ['name', '=', $this->data['name']],
                ['user_id', '=', \auth()->user()->getAuthIdentifier()]
            ])->get();
            $this->pokemon_exist = $pokemon_exist->isNotEmpty();
        }

        if ($this->data ?? false) {
            $this->images = array_filter($this->data['sprites'],
                fn($item) => !is_array($item));
            $this->ability = $this->data['abilities'][0]['ability']['name'];
        }

    }

    public function addPokemonOnDeck()
    {
        $pokemonAdd = [
            'name' => $this->data['name'],
            'weight' => $this->data['weight'],
            'height' => $this->data['height'],
            'base_experience' => $this->data['base_experience'],
            'ability' => $this->ability,
            'image' => array_shift($this->images)
        ];
        if (auth()->user()) {
            $pokemon = Auth()->user()->decks()->create($pokemonAdd);

            $this->pokemon_model = $pokemon->name;

            session()->flash('message', 'Post successfully updated.');
        } else {
            session()->put('pokemon', $pokemonAdd);

            return redirect()->to('/login');
        }
    }
}
