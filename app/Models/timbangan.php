<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timbangan extends Model
{
    use HasFactory;

    protected $table = 'timbangan';
    protected $guarded = [];
    public $timestamps = false;

    protected $fillable = ['balita_id', 'bb', 'lingkarkepala', 'tb', 'tanggal'];

    public function balita()
    {
        return $this->belongsTo(balita::class);
    }
}
