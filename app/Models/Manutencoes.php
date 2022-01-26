<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Manutencoes extends Model
{
    use HasFactory;

    public static function getManutencoes(){

        $manutencoes = DB::table('manutencoes as man')
        ->join('veiculos as vc', 'vc.id', '=', 'man.fk_veiculo')
        ->join('oficinas as of', 'of.id', '=', 'man.fk_oficina')
        ->join('servicos as serv', 'serv.id', '=', 'man.fk_servico')
        ->join('modelos as mod', 'mod.id', '=', 'vc.fk_modelo')
        ->select('man.id as id_man', '*',
        DB::raw('strftime("%d/%m/%Y", man.data_manutencao) as data_manutencao'))
        ->get();

        return $manutencoes;

    }

    public static function getVeiculos() {

        $veiculos = DB::table('veiculos as vc')
        ->join('modelos as mod', 'mod.id', '=', 'vc.fk_modelo')
        ->select('vc.id', 'mod.nome_modelo', 'vc.placa')
        ->get();

        return $veiculos;

    }

    public static function showManutencao($id){

        $manutencoes = DB::table('manutencoes as man')
        ->join('veiculos as vc', 'vc.id', '=', 'man.fk_veiculo')
        ->join('oficinas as of', 'of.id', '=', 'man.fk_oficina')
        ->join('servicos as serv', 'serv.id', '=', 'man.fk_servico')
        ->join('modelos as mod', 'mod.id', '=', 'vc.fk_modelo')
        ->select('man.id as id_man', '*',
        DB::raw('strftime("%d/%m/%Y", man.data_manutencao) as data_manutencao'))
        ->where('man.id', '=', $id)
        ->get();

        return $manutencoes;

    }


}
