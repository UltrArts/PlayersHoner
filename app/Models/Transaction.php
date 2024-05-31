<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesCustomId;

class Transaction extends Model
{
    use HasFactory, GeneratesCustomId;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'unsignedBigInt';

    protected $fillable = [
        'value',
        'account_id',
        'transaction_type_id'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }
}
