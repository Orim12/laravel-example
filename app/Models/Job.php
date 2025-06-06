<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    // Optioneel: geef aan welke velden mass-assignable zijn
    protected $fillable = ['title', 'salary', 'employer_id'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function user()
    {
        // Via employer naar user
        return $this->employer ? $this->employer->user : null;
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'job_tag',
            'job_listing_id',
            'tag_id'
        );
    }
}
