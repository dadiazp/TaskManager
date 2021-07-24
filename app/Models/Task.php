<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Log;
use App\Models\User;

class Task extends Model
{
    use HasFactory;

    public $table = 'tasks';
    public $primaryKey = 'id';

    protected $fillable = [
        'title',
        'description',
        'deadline',
        'user_id',
        'creator_id'
    ];

    public function logs()
    {
        return $this->hasMany(Log::class);    
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }
}
