<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'views',
        'inquiries',
        'favorites',
        'click_through_rate',
        'date_tracked',
    ];

    /**
     * Relationship: Analytics belongs to a Vehicle
     */
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
