<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'address',
        'payment',
        'total_price',
        'shipping_price',
        'status',
    ];

    // menambahkan kebalikan dari relasi pada user
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    // menambahkan relasi pada item
    public function items()
    {
        return $this->hasMany(TransactionItem::class, 'transactions_id', 'id');
    }
}
