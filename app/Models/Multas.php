<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Multas extends Model
{
    use HasFactory;

    public static function listAllMultas() {

        $multas = DB::table('multas as mul')
        ->join('veiculos as vc', 'vc.id', '=', 'mul.fk_veiculo')
        ->join('tipos_infracoes as ti', 'ti.id', '=', 'mul.fk_infracao')
        ->join('modelos as md', 'md.id', '=', 'vc.fk_modelo')
        ->join('empresas as emp', 'emp.id', '=', 'vc.fk_empresa')
        ->select('*', 'mul.id as mul_id',
        DB::raw('strftime("%d/%m/%Y", mul.data_multa) as data_multa'))
        ->get();

        return $multas;

    }

    public static function getVeiculos() {

        $veiculos = DB::table('veiculos as vc')
        ->join('modelos as mod', 'mod.id', '=', 'vc.fk_modelo')
        ->select('vc.id', 'mod.nome_modelo', 'vc.placa')
        ->get();

        return $veiculos;

    }

    public static function getMulta($id) {

        $multa = DB::table('multas as mul')
        ->join('veiculos as vc', 'vc.id', '=', 'mul.fk_veiculo')
        ->join('tipos_infracoes as ti', 'ti.id', '=', 'mul.fk_infracao')
        ->join('modelos as md', 'md.id', '=', 'vc.fk_modelo')
        ->join('empresas as emp', 'emp.id', '=', 'vc.fk_empresa')
        ->select('*', 'mul.id as mul_id',
        DB::raw('strftime("%d/%m/%Y", mul.data_multa) as data_multa'))
        ->where('mul.id', '=', $id)
        ->get();

        return $multa;

    }


    public static function getMultasToChart() {

        $infracoes = DB::table('tipos_infracoes as ti')
        ->leftJoin('multas as mul', 'ti.id', '=', 'mul.fk_infracao')
        ->groupBy('ti.descricao_infracao')
        ->select(DB::raw('count(mul.fk_infracao) as qtd, ti.descricao_infracao'))
        ->get();

        return $infracoes;

    }



}
