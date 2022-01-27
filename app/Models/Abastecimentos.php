<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Abastecimentos extends Model
{
    use HasFactory;

    public static function listAllAbastecimentos() {

        $abastecimentos = DB::table('abastecimentos as ab')
        ->join('veiculos as vc', 'vc.id', '=', 'ab.fk_veiculo')
        ->join('postos as pt', 'pt.id', '=', 'ab.fk_posto')
        ->join('modelos as md', 'md.id', '=', 'vc.fk_modelo')
        ->join('empresas as emp', 'emp.id', '=', 'vc.fk_empresa')
        ->select('ab.id as id_ab', '*',
        DB::raw('strftime("%d/%m/%Y", ab.data_abastecimento) as data_abastecimento'))
        ->get();

        return $abastecimentos;

    }


    public static function getVeiculos() {

        $veiculos = DB::table('veiculos as vc')
        ->join('modelos as mod', 'mod.id', '=', 'vc.fk_modelo')
        ->select('vc.id', 'mod.nome_modelo', 'vc.placa')
        ->get();

        return $veiculos;

    }


    public static function showAbastecimento($id) {

        $abastecimento = DB::table('abastecimentos as ab')
        ->join('veiculos as vc', 'vc.id', '=', 'ab.fk_veiculo')
        ->join('postos as pt', 'pt.id', '=', 'ab.fk_posto')
        ->join('modelos as md', 'md.id', '=', 'vc.fk_modelo')
        ->select('ab.id as id_ab', '*',
        DB::raw('strftime("%d/%m/%Y", ab.data_abastecimento) as data_abastecimento'))
        ->where('ab.id', '=', $id)
        ->get();

        return $abastecimento;


    }


}
