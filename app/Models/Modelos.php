<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Modelos extends Model
{
    use HasFactory;

    public static function showModelo($id) {

        $modelo = DB::table('modelos')
        ->where('id', '=', $id)
        ->get();

        return $modelo;

    }





}
