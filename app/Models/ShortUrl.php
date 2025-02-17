<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    protected $fillable = ['short_url','long_url'];
}
