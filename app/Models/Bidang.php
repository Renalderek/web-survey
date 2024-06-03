<?php

// app/Models/Bidang.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $fillable = ['nama_bidang'];

    public function layanans()
    {
        return $this->hasMany(Layanan::class);
    }
}
