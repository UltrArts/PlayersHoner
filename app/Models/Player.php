<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesCustomId;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Player extends Model
{
    use HasFactory, GeneratesCustomId;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'unsignedBigInt';

    protected $fillable = [
        'id', 
        'name', 
        'last_name', 
        'tel', 'tel2', 
        'birth', 
        'email',
        'is_retired', 
        'is_available', 
        'is_pre_register', 
        'user_id', 
        'retirement_date'    ];

    public function taxType():BelongsTo
    {
        return $this->belongsTo(TaxType::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function account():HasOne
    {
        return $this->hasOne(Account::class);
    }

}
