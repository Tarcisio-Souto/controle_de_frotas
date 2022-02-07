<?php

namespace App\Exports;

use App\Models\Manutencoes;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ManutencoesExport implements FromCollection, WithHeadings
{

    protected $periodoIni;
    protected $periodoFim;
    protected $regiao1;
    protected $regiao2;
    protected $regiao3;
    protected $regiao4;
    protected $regiao5;
    protected $regiao6;
    protected $servico;

    function __construct($periodoIni, $periodoFim,
    $regiao1, $regiao2, $regiao3, $regiao4, $regiao5, $regiao6,
    $servico) {

            $this->periodoIni = $periodoIni;
            $this->periodoFim = $periodoFim;
            $this->regiao1 = $regiao1;
            $this->regiao2 = $regiao2;
            $this->regiao3 = $regiao3;
            $this->regiao4 = $regiao4;
            $this->regiao5 = $regiao5;
            $this->regiao6 = $regiao6;
            $this->servico = $servico;

    }

    public function headings():array{
        return[
            'Modelo',
            'Placa',
            'Empresa',
            'Tipo de Serviço',
            'Data da Manutenção',
            'Valor da Manutenção'
        ];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
        $array_emp = [$this->regiao1, $this->regiao2, $this->regiao3, 
        $this->regiao4, $this->regiao5, $this->regiao6];

        if ($this->servico != "null") {

            $manutencoes = DB::table('manutencoes as man')
            ->join('veiculos as vc', 'vc.id', '=', 'man.fk_veiculo')
            ->join('oficinas as of', 'of.id', '=', 'man.fk_oficina')
            ->join('servicos as serv', 'serv.id', '=', 'man.fk_servico')
            ->join('modelos as mod', 'mod.id', '=', 'vc.fk_modelo')
            ->join('empresas as emp', 'emp.id', '=', 'vc.fk_modelo')
            ->select('mod.nome_modelo', 'vc.placa', 'emp.nome', 'serv.descricao_servicos',
            DB::raw('strftime("%d/%m/%Y", man.data_manutencao) as data_manutencao'), 'man.custo_total')
            ->whereBetween('man.data_manutencao', [$this->periodoIni, $this->periodoFim])
            ->whereIn('emp.nome', $array_emp)
            ->where('ti.id', '=', $this->servico)
            ->get();
                   

        } else {

            $manutencoes = DB::table('manutencoes as man')
            ->join('veiculos as vc', 'vc.id', '=', 'man.fk_veiculo')
            ->join('oficinas as of', 'of.id', '=', 'man.fk_oficina')
            ->join('servicos as serv', 'serv.id', '=', 'man.fk_servico')
            ->join('modelos as mod', 'mod.id', '=', 'vc.fk_modelo')
            ->join('empresas as emp', 'emp.id', '=', 'vc.fk_modelo')
            ->select('mod.nome_modelo', 'vc.placa', 'emp.nome', 'serv.descricao_servicos',
            DB::raw('strftime("%d/%m/%Y", man.data_manutencao) as data_manutencao'), 'man.custo_total')
            ->whereBetween('man.data_manutencao', [$this->periodoIni, $this->periodoFim])
            ->whereIn('emp.nome', $array_emp)
            ->get();

        }


        return $manutencoes;

    }
}
