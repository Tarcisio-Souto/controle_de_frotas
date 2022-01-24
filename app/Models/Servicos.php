<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Servicos extends Model
{
    use HasFactory;

    public static function showServico($id) {

        $servico = DB::table('servicos')
        ->where('id', '=', $id)
        ->get();
        
        return $servico;

    }


}
