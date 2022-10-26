<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeOwners extends Model
{
    use HasFactory;

    protected $table = "home_owners";
    protected $fillable = ['title', 'first_name', 'initials', 'last_name'];
}
