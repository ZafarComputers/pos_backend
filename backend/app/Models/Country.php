<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'status',
    ];

    /**
     * Always load the states with every country.
     *
     * @var array<int, string>
     */
    protected $with = ['states'];

    /**
     * Scope a query to only include active countries.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Get the states for this country.
     */
    public function states()
    {
        return $this->hasMany(State::class);
    }
}

// $countries = Country::active()->get();
// will give you each country with all its states (and since each state already eager loads its country and cities, you can chain relationships naturally).