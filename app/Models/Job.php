<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    // Optioneel: geef aan welke velden mass-assignable zijn
    protected $fillable = ['title', 'salary'];
}
