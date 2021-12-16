<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporter extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',  
        'number', 
        'password',
        'is_admin'
    ];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
