<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'weight', 'base_experience','height','ability','image'
    ];


    public function User()
    {
        $this->belongsTo(User::class);
    }
}
