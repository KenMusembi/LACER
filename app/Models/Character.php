<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    //ensure only authorized users can access
    protected $guarded = [];

    //user function to assign a user to a click
    public function user(){
        return $this->belongsTo(User::class);
    }
}
