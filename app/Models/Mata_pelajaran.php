<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mata_pelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajarans';

    protected $guarded = [];

    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
}
