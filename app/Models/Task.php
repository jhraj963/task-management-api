<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [''];

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
