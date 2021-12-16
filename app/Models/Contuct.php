<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contuct extends Model
{
    use HasFactory;
    protected $fileable=[
        'name',
        'email',
        'number',
        'subject',
        'message'
    ];
}
