<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class balita extends Model
{
    use HasFactory;

    protected $table = "balita";

    protected $fillable = [
        'id',
        'nama_balita',
        'tanggal_lahir',
        'jenis_kelamin',
    ];
    protected $guarded = [];
    public $timestamps = false;

    public function imunisasi()
    {
        return $this->hasMany(imunisasi::class);
    }

    public function timbangan()
    {
        return $this->hasMany(timbangan::class);
    }

}
