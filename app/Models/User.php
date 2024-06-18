<?php
// app/Models/User.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'alamat', 'nomor_hp', 'pendidikan_terakhir', 'pekerjaan',
    ];

}
