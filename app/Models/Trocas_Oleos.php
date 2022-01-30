<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Trocas_Oleos extends Model
{
    use HasFactory;

    protected $table = 'trocas_oleos';

    public static function listAllTrocas() {
        
        $trocas = DB::table('trocas_oleos as to')
        ->join('veiculos as vc', 'vc.id', '=', 'to.fk_veiculo')
        ->join('oficinas as of', 'of.id', '=', 'to.fk_oficina')
        ->join('modelos as md', 'md.id', '=', 'vc.fk_modelo')
        ->join('empresas as emp', 'emp.id', '=', 'vc.fk_empresa')
        ->select('to.id as to_id', '*', 'to.data_troca as data_troca',
        DB::raw('strftime("%d/%m/%Y", data_troca) as data_troca_format'))
        ->get();

        return $trocas;

    }

    public static function getVeiculos() {

        $veiculos = DB::table('veiculos as vc')
        ->join('modelos as mod', 'mod.id', '=', 'vc.fk_modelo')
        ->select('vc.id', 'mod.nome_modelo', 'vc.placa')
        ->get();

        return $veiculos;

    }


}
