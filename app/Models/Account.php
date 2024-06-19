<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesCustomId;

class Account extends Model
{
    use HasFactory, GeneratesCustomId;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'unsignedBigInt';

    protected $fillable = [
        'account_number',
        'account_nib',
        'balance',
        'is_available',
        'tax_value',
        'bank_id',
        'tax_type_id',
        'player_id',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function taxType()
    {
        return $this->belongsTo(TaxType::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }


}
