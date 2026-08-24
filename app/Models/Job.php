<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'salary',
        'location',
        'schedule',
        'url',
        'featured'
    ];

    public function tag(string $tag_name)
    {
        $tag_name = strtolower(trim($tag_name));

        if ($tag_name === '') {
            return;
        }

        $tag = Tag::firstOrCreate(['name' => $tag_name]);

        $this->tags()->syncWithoutDetaching([$tag->id]);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
