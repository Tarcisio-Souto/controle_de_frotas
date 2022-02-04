<?php

namespace App\Exports;

use App\Models\Multas;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class MultasExport implements FromCollection, WithHeadings
{

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
        $multas = DB::table('multas as mul')
        ->join('veiculos as vc', 'vc.id', '=', 'mul.fk_veiculo')
        ->join('tipos_infracoes as ti', 'ti.id', '=', 'mul.fk_infracao')
        ->join('modelos as md', 'md.id', '=', 'vc.fk_modelo')
        ->join('empresas as emp', 'emp.id', '=', 'vc.fk_empresa')
        ->select('md.nome_modelo', 'vc.placa', 'emp.nome', 'ti.descricao_infracao',
        'mul.data_multa', 'mul.custo_total',
        DB::raw('strftime("%d/%m/%Y", mul.data_multa) as data_multa'))
        ->get();

        return $multas;        
        //return Multas::all();
    }
}
