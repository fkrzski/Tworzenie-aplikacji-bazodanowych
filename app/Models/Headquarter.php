<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Headquarter extends Model
{
    use HasFactory;

    protected $table = 'headquarters';

    protected $fillable = [
        'city',
    ];

    public function publisher(): HasOne
    {
        return $this->hasOne(Publisher::class);
    }
}
