<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesCustomId;

class TaxType extends Model
{
    use HasFactory, GeneratesCustomId;
    
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'unsignedBigInt';

    protected $fillable = ['type'];

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
