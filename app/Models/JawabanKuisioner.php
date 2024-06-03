<?php

// app/Models/JawabanKuisioner.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanKuisioner extends Model
{
    protected $fillable = ['user_id', 'kuisioner_id', 'jawaban'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kuisioner()
    {
        return $this->belongsTo(Kuisioner::class);
    }
}
