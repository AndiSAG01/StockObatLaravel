<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Drugs extends Model
{
    use HasFactory;
    use AutoNumberTrait;
    protected $fillable = [
        'date',
        'code',
        'stock',
        'medicine_id',
        'production_date',
        'expiration_date',
    ];




    public function getAutoNumberOptions()
    {
        return [
            'code' => [
                'format' => 'BT.?', // Format kode yang akan digunakan.
                'length' => 4 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }


    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'drug_id');
    }

    public function saveSnapshotStock()
    {
        // Buat snapshot hanya jika belum pernah disimpan sebelumnya
        if ($this->snapshot_stock === null) {
            $this->snapshot_stock = $this->stock;
            $this->save();
        }
    }
}
