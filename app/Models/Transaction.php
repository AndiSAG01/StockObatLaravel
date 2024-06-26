<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class 
Transaction extends Model
{
    use HasFactory;
    use AutoNumberTrait;
    protected $fillable = [
        'code_transaction',
        'date',
        'drug_id',
        'quantity_sell',
        'description'
    ];

    public function drug()
    {
        return $this->belongsTo(Drugs::class, 'drug_id');
    }

    public function medicine(): BelongsTo
    {
        return $this->belongsTo(Medicine::class);
    }


    public function getAutoNumberOptions()
    {
        return [
            'code_transaction' => [
                'format' => 'T-.?', // Format kode yang akan digunakan.
                'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
