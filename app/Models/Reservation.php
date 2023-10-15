<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable =[
        'start_at',
        'end_at',
        'day',
        'code',
        'station',
    ];
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
