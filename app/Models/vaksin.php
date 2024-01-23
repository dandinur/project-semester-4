<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vaksin extends Model
{
    use HasFactory;

    protected $table = 'vaksin';

    protected $fillable = [
        'id',
        'jenis_vaksin',
    ];
    protected $guarded =[];

    public $timestamps = false;

    public function imunisasi()
    {
        return $this->hasMany(imunisasi::class);
    }

}
