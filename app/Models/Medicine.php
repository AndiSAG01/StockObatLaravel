<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'kind',
        'supplier_id',
    ];

    /**
     * Get the supplier that owns the medicine
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
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