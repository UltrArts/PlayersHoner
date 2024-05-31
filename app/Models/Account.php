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
        'tax_value'
    ];


}
