<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ibuhamil extends Model
{
    use HasFactory;

    protected $table = "ibuhamil";

    protected $fillable = [
        'nama',
        'no',
        'alamat',
    ];
    protected $guarded = [];
    public $timestamps = false;

    public function kesehatanibu()
    {
        return $this->hasMany(kesehatanibu::class);
    }

}
