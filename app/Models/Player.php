<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesCustomId;

class Player extends Model
{
    use HasFactory, GeneratesCustomId;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'unsignedBigInt';

    protected $fillable = [
        'name',
        'last_name',
        'tel',
        'email',
        'is_retired',
        'is_available',
        'is_pre_register',
        'retirement_date',
        'retirement_amount',
        'tax_value',
        'tax_type_id'
    ];

    public function taxType()
    {
        return $this->belongsTo(TaxType::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
