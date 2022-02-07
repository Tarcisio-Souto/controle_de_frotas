<?php

namespace App\Exports;

use App\Models\Trocas_Oleos;
use App\Models\TrocasOleos;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrocasOleosExport implements FromCollection, WithHeadings
{

    protected $periodoIni;
    protected $periodoFim;
    protected $regiao1;
    protected $regiao2;
    protected $regiao3;
    protected $regiao4;
    protected $regiao5;
    protected $regiao6;

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
            'Data da Troca',
            'Nome do Óleo',
            'Filtro de Óleo',
            'Filtro de Combustível',
            'KM da Troca',
            'KM Próxima Troca',
            'Custo' 
        ];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        $array_emp = [$this->regiao1, $this->regiao2, $this->regiao3, 
        $this->regiao4, $this->regiao5, $this->regiao6];

        $trocas = DB::table('trocas_oleos as to')
        ->join('veiculos as vc', 'vc.id', '=', 'to.fk_veiculo')
        ->join('oficinas as of', 'of.id', '=', 'to.fk_oficina')
        ->join('modelos as md', 'md.id', '=', 'vc.fk_modelo')
        ->join('empresas as emp', 'emp.id', '=', 'vc.fk_empresa')
        ->select('md.nome_modelo', 'vc.placa', 'emp.nome',
        DB::raw('strftime("%d/%m/%Y", data_troca)'),
        'to.nome_oleo', 'to.filtro_oleo', 'to.filtro_combustivel',
        'to.km_troca', 'to.km_prox_troca', 'to.custo_total')
        ->whereBetween('data_troca', [$this->periodoIni, $this->periodoFim])
        ->whereIn('emp.nome', $array_emp)
        ->get();

        return $trocas;

    }
}
