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

        $this->user_photo = $this->user->profile_photo_path;
        if ($this->user_photo) {
            $this->user_photo = 'https://eduardoalano.s3-sa-east-1.amazonaws.com/' . $this->user->profile_photo_path;
        }

        return view('livewire.profile')
            ->extends('layouts.app')
            ->section('content');
    }

    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $path = $this->photo->store('photos', 's3');

        \auth()->user()->update([
            'profile_photo_path' => $path
        ]);

        $this->user_photo = 'https://eduardoalano.s3-sa-east-1.amazonaws.com/' . $path;
    }

    public function updateEmail()
    {
        $this->response_email = \auth()->user()->update([
            'email' => $this->new_email
        ]);
        $this->new_email = null;
    }
}
