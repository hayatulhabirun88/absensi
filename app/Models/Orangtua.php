<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orangtua extends Model
{
    use HasFactory;

    protected $table = 'orangtuas';

    protected $guarded = [];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
