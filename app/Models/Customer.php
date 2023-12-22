<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * Mass assignable columns
     */
    protected $fillable = ['firstname', 'lastname', 'email'];
}
