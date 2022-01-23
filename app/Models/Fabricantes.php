<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fabricantes extends Model
{
    use HasFactory;

    public static function showFabricante($id) {

        $fabricante = DB::table('fabricantes')
        ->where('id', '=', $id)
        ->get();
        
        return $fabricante;

    }


}
