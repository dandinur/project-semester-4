<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kesehatanibu extends Model
{
    use HasFactory;

    protected $table = 'kesehatanibu';
    protected $guarded = [];
    public $timestamps = false;

    protected $fillable = ['ibuhamil_id', 'bb', 'lila', 'lingkarperut', 'tanggal'];

    public function ibuhamil()
    {
        return $this->belongsTo(ibuhamil::class);
    }
}
