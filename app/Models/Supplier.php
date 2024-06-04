<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'telphone',
    ];

    /**
     * Get all of the medicines for the Supplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicines(): HasMany
    {
        return $this->hasMany(Medicine::class);
    }

    public function drugs(): HasMany
    {
        return $this->hasMany(Drugs::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
