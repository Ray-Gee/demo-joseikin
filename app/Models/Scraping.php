<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scraping extends Model
{
    use HasFactory;

    public function infos()
    {
        return $this->hasMany(Info::class);
    }
}
