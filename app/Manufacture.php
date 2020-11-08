<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $fillable = [
        'name', 'category_id', 'description', 'publication_status',
    ];
}
