<?php
// app/Models/User.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'nama', 'alamat', 'nomor_hp', 'pendidikan_terakhir', 'pekerjaan',
    ];

    public function jawabanKuisioners()
    {
        return $this->hasMany(JawabanKuisioner::class);
    }
}
