<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Empresas extends Model
{
    use HasFactory;


    public static function showEmpresa($id) {

        $empresa = DB::table('empresas')
        ->join('enderecos', 'enderecos.id', '=', 'empresas.fk_endereco')
        ->select('*','empresas.id', 'empresas.fk_endereco')
        ->where('empresas.id', '=', $id)
        ->get();

        return $empresa;

    }


}
