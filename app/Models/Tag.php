<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $value = strtolower(trim(urldecode((string) $value)));

        return static::query()
            ->whereRaw('LOWER(TRIM(name)) = ?', [$value])
            ->firstOrFail();
    }
}
