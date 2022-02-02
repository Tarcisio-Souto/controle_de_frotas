<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Veiculos extends Model
{
    use HasFactory;

    public static function listAllVeiculos() {

        $veiculos = DB::table('veiculos as vc')
        ->join('modelos as mod', 'mod.id', '=', 'vc.fk_modelo')
        ->join('empresas as emp', 'emp.id', '=', 'vc.fk_empresa')
        ->select('*', 'vc.id as vc_id')
        ->get();

        return $veiculos;

    }

    public static function showVeiculo($id) {

        $veiculo = DB::table('veiculos as vc')
        ->join('modelos as mod', 'mod.id', '=', 'vc.fk_modelo')
        ->join('empresas as emp', 'emp.id', '=', 'vc.fk_empresa')
        ->select('*', 'vc.id as vc_id')
        ->where('vc_id', '=', $id)
        ->get();

        return $veiculo;

    }




}
