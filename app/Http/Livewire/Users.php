<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Users extends Component
{
    public $user;

    public function render()
    {

        return view('livewire.users')
            ->extends('layouts.app')
            ->section('content');
    }
}
