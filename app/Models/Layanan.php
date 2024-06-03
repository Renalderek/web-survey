<?php
// app/Models/Layanan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = ['bidang_id', 'nama_layanan'];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function kuisioners()
    {
        return $this->hasMany(Kuisioner::class);
    }
}
