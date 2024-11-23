<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'user-id';
    protected $fillable = ['user-name', 'user-password', 'user-email'];
    public $timestamps = false;  
    
    public function Transaction(): HasMany
    {
        return $this->hasMany(Transaction::class, 'user-id-fk');
    }  
}
