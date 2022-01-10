<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCows extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cow()
    {
        return $this->belongsTo(Cows::class);
    }
}
