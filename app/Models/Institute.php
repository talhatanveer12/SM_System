<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Institute extends Model
{
    use HasFactory;

    public function scopeInstituteData(){
        return  DB::table('institutes')
                ->where('email', '=', auth()->user()->email)
                ->first();
    }

    protected $guarded = [];
}
