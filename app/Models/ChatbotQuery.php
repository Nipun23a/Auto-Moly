<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotQuery extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'query',
        'response',
    ];

    /**
     * Relationship: ChatbotQuery belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
