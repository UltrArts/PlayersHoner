<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesCustomId;

class Bank extends Model
{
    use HasFactory, GeneratesCustomId;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'unsignedBigInt';

    protected $fillable = ['bank_name'];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
