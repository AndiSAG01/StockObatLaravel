<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    protected $table = 'types';

    protected $fillable = [
        'name'
    ];

    /**
     * Get all of the medicines for the Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicines(): HasMany
    {
        return $this->hasMany(Medicine::class);
    }
}
