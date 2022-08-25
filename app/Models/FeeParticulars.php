<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeParticulars extends Model
{
    use HasFactory;

    protected $casts = [
        'particular_name' => 'array',
        'prefix_amount' => 'array',
    ];
}
