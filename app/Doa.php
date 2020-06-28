<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doa extends Model
{
    protected $table = 'doa';
    protected $fillable = [
        'judul', 'arab', 'latin', 'indonesia', 'ilustrasi'
    ];
}
