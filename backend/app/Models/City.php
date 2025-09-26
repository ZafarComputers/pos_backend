<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'state_id',
        'status',
    ];

    /**
     * Always load the state and its country with every city.
     *
     * @var array<int, string>
     */
    protected $with = ['state.country'];

    /**
     * Scope a query to only include active cities.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Get the state that this city belongs to.
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}


// use ->  $cities = City::active()->get();
// and each city will automatically include its state and the state’s country without extra queries