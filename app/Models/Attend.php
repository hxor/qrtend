<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attend extends Model
{
    protected $fillable = ['user_id', 'status', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
