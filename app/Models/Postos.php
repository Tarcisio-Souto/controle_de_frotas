<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Postos extends Model
{
    use HasFactory;

    public static function showPosto($id) {

        $posto = DB::table('postos')
        ->where('id', '=', $id)
        ->get();
        
        return $posto;

    }


}
