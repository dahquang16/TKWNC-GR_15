<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'location',
        'max_participants',
        'is_active'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'event_registrations')
                    ->withPivot('registered_at')
                    ->withTimestamps();
    }

    public function getRegisteredCountAttribute()
    {
        return $this->registrations()->count();
    }

    public function getIsFullAttribute()
    {
        if (!$this->max_participants) {
            return false;
        }
        return $this->registered_count >= $this->max_participants;
    }

    public function getStatusAttribute()
    {
        $now = now();
        if ($now < $this->start_time) {
            return 'upcoming';
        } elseif ($now >= $this->start_time && $now <= $this->end_time) {
            return 'ongoing';
        } else {
            return 'ended';
        }
    }
}
