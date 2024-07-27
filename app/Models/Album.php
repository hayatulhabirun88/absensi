<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';

    protected $guarded = [];

    public function ekstrakulikuler()
    {
        return $this->belongsTo(Ekstrakulikuler::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }
}
