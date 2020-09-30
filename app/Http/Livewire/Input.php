<?php

namespace App\Http\Livewire;

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

    public function render()
    {
        return view('livewire.input');
    }

    public function add()
    {
        $this->data = $this->pokemon;
        return $this->data;
    }

    public function getPokemon()
    {
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/' . $this->pokemon);
        $this->response_code = $response->status();
        $this->data = $response->json();

        if ($this->data ?? false) {
            $this->images = array_filter($this->data['sprites'], function ($item) {
                return (!is_array($item));
            });
            $this->ability = $this->data['abilities'][0]['ability']['name'];
        }

    }
}
