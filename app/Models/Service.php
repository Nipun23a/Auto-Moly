<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'provider',
        'description',
        'cost_range',
        'url',
    ];

    // Disable updated_at timestamp since you mentioned only created_at is used
    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function vehicles(){
        return $this->hasMany(Vehicle::class,'service_id','id');
    }
}
