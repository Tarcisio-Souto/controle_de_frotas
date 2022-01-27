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
        ->select('ab.id as id_ab', '*')
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


}
