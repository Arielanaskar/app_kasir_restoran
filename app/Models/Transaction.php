<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function transaction_details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['year'] ?? false, function($query, $search) {
            return $query->whereYear('created_at', $search);
        });

        $query->when($filters['month'] ?? false, function($query, $search) {
            return $query->whereMonth('created_at', $search);
        });
    }
}
