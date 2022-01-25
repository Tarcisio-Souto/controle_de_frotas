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
        ->select('*')
        ->get();

        return $manutencoes;

    }



}
