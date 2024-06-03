<?php

// app/Models/Kuisioner.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    protected $fillable = ['pertanyaan'];

    public function jawabanKuisioners()
    {
        return $this->hasMany(JawabanKuisioner::class);
    }
}
