<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Previous_searches extends Model
{
    protected $table='previous_searches';

    protected $fillable = [
        'search_text', 
    ];
}
