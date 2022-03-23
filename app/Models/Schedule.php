<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_location',
        'schedule_start',
        'schedule_end',
    ];

    public function track()
    {
        return $this->hasMany(Track::class, 'schedule_id', 'id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($schedule) { // before delete() method call this
             $schedule->track()->delete();
        });
    }

    public function scopeMonth($query, $month)
    {
        return $query->whereRaw('MONTH(schedule_start) = ? AND YEAR(schedule_start) = ?', [$month, date('Y')]);
    }
}
