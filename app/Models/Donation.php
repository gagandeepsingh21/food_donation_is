<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = [
        'dtitle',
        'image',
        'dquantity',
        'pnumber',
        'location',
        'isset',
        'date',
        
    ];
}
