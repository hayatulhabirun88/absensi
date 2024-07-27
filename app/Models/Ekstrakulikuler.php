<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jadwal;

class Ekstrakulikuler extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'ekstrakulikulers';

    public function pendaftar()
    {

        return $this->hasMany(Pendaftar::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

}
