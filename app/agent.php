<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class agent extends Model
{
    protected $fillable=['ticket_id', 'user_id'];
    use HasFactory;
    
    public function tickets(){
        return $this->hasMany(Tickets::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
