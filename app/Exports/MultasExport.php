<?php

namespace App\Exports;

use App\Models\Multas;
use App\Models\TiposInfracoes;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class MultasExport implements FromCollection, WithHeadings
{

    protected $periodoIni;
    protected $periodoFim;
    protected $regiao1;
    protected $regiao2;
    protected $regiao3;
    protected $regiao4;
    protected $regiao5;
    protected $regiao6;
    protected $infracao;

    function __construct($periodoIni, $periodoFim,
    $regiao1, $regiao2, $regiao3, $regiao4, $regiao5, $regiao6,
    $infracao) {

            $this->periodoIni = $periodoIni;
            $this->periodoFim = $periodoFim;
            $this->regiao1 = $regiao1;
            $this->regiao2 = $regiao2;
            $this->regiao3 = $regiao3;
            $this->regiao4 = $regiao4;
            $this->regiao5 = $regiao5;
            $this->regiao6 = $regiao6;
            $this->infracao = $infracao;

    }


    public function headings():array{
        return[
            'Modelo',
            'Placa',
            'Empresa',
            'Tipo de Infração',
            'Data da Multa',
            'Valor da Multa' 
        ];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        $array_emp = [$this->regiao1, $this->regiao2, $this->regiao3, 
        $this->regiao4, $this->regiao5, $this->regiao6];
    
        if ($this->infracao != "null") {

            $multas = DB::table('multas as mul')
            ->join('veiculos as vc', 'vc.id', '=', 'mul.fk_veiculo')
            ->join('tipos_infracoes as ti', 'ti.id', '=', 'mul.fk_infracao')
            ->join('modelos as md', 'md.id', '=', 'vc.fk_modelo')
            ->join('empresas as emp', 'emp.id', '=', 'vc.fk_empresa')
            ->select('md.nome_modelo', 'vc.placa', 'emp.nome', 'ti.descricao_infracao',
            DB::raw('strftime("%d/%m/%Y", mul.data_multa)'), 'mul.custo_total')
            ->whereBetween('mul.data_multa', [$this->periodoIni, $this->periodoFim])
            ->whereIn('emp.nome', $array_emp)
            ->where('ti.id', '=', $this->infracao)
            ->get();

        } else {

            $multas = DB::table('multas as mul')
            ->join('veiculos as vc', 'vc.id', '=', 'mul.fk_veiculo')
            ->join('tipos_infracoes as ti', 'ti.id', '=', 'mul.fk_infracao')
            ->join('modelos as md', 'md.id', '=', 'vc.fk_modelo')
            ->join('empresas as emp', 'emp.id', '=', 'vc.fk_empresa')
            ->select('md.nome_modelo', 'vc.placa', 'emp.nome', 'ti.descricao_infracao',
            DB::raw('strftime("%d/%m/%Y", mul.data_multa)'), 'mul.custo_total')
            ->whereBetween('mul.data_multa', [$this->periodoIni, $this->periodoFim])
            ->whereIn('emp.nome', $array_emp)
            ->get();

        }
       

        return $multas;      

    }
}
