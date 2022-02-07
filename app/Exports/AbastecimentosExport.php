<?php

namespace App\Exports;

use App\Models\Abastecimentos;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbastecimentosExport implements FromCollection, WithHeadings
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
    $regiao1, $regiao2, $regiao3, $regiao4, $regiao5, $regiao6) {

            $this->periodoIni = $periodoIni;
            $this->periodoFim = $periodoFim;
            $this->regiao1 = $regiao1;
            $this->regiao2 = $regiao2;
            $this->regiao3 = $regiao3;
            $this->regiao4 = $regiao4;
            $this->regiao5 = $regiao5;
            $this->regiao6 = $regiao6;

    }

    public function headings():array{
        return[
            'Modelo',
            'Placa',
            'Empresa',
            'Data do Abastecimento',
            'Valor do Abastecimento'
        ];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $array_emp = [$this->regiao1, $this->regiao2, $this->regiao3, 
        $this->regiao4, $this->regiao5, $this->regiao6];

        $abastecimentos = DB::table('abastecimentos as ab')
        ->join('veiculos as vc', 'vc.id', '=', 'ab.fk_veiculo')
        ->join('postos as pt', 'pt.id', '=', 'ab.fk_posto')
        ->join('modelos as md', 'md.id', '=', 'vc.fk_modelo')
        ->join('empresas as emp', 'emp.id', '=', 'vc.fk_empresa')
        ->select('md.nome_modelo', 'vc.placa', 'emp.nome',
        DB::raw('strftime("%d/%m/%Y", ab.data_abastecimento)'), 'ab.custo_total')
        ->whereBetween('ab.data_abastecimento', [$this->periodoIni, $this->periodoFim])
        ->whereIn('emp.nome', $array_emp)
        ->get();

        return $abastecimentos;

    }
}
