<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ref extends Model
{
    use HasFactory;
    
    protected $table = 'wallethistory';
    public $timestamps = true;

   

    protected $fillable = [
        'refid',
        'credit',
        'debit'
    ];
}
