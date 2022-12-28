<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'todo_day';

    protected $fillable = [
        'name',
        'is_done',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
