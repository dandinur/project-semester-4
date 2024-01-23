<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class imunisasi extends Model
{
    use HasFactory;

    protected $table = 'imunisasi';

    protected $fillable= ['tanggal', 'vaksin_id', 'balita_id' ];
    protected $guarded =[];

    public $timestamps = false;

    public function vaksin()
    {
        return $this->belongsTo(vaksin::class);
    }
    public function balita()
    {
        return $this->belongsTo(balita::class);
    }
}
