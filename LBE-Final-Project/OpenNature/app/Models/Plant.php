<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plant extends Model
{
    use HasFactory;
    protected $table = 'plants';
    protected $primaryKey = 'plant-id';
    protected $fillable = ['plant-id', 'plant-name', 'plant-image', 'plant-price'];
    public $timestamps = false;

    public function Transaction(): HasMany
    {
        return $this->hasMany(Transaction::class, 'plant-id-fk');
    }
}
