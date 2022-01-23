<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Oficinas extends Model
{
    use HasFactory;

    public static function showOficina($id) {

        $oficina = DB::table('oficinas')
        ->where('id', '=', $id)
        ->get();
        
        return $oficina;

    }


}
