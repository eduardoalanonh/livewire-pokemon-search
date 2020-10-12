<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $photo;
    public $user;
    public $user_photo;
    public $new_email;
    public $response_email = false;

    public function render()
    {
        $this->user = auth()->user();

        $this->user_photo = str_replace('public/', '', $this->user->profile_photo_path);

        return view('livewire.profile')
            ->extends('layouts.app')
            ->section('content');
    }

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $path = $this->photo->store('public/photos');

        \auth()->user()->update([
            'profile_photo_path' => $path
        ]);

        $this->user_photo = str_replace('public/', '', $path);
    }

    public function updateEmail()
    {
        $this->response_email = \auth()->user()->update([
            'email' => $this->new_email
        ]);
        $this->new_email = null;

    }
}
