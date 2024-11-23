<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = 'transaction-id';
    protected $fillable = ['transaction-id', 'user-id-fk', 'plant-id-fk', 'transaction-date'];
    public $timestamps = false;
    
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user-id-fk');
    }
  
    public function Plant(): BelongsTo
    {
        return $this->belongsTo(Plant::class, 'plant-id-fk');
    }
}
