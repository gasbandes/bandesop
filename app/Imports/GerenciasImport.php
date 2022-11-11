<?php

namespace App\Imports;

use App\Models\Gerencia;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class GerenciasImport implements ToCollection, WithHeadingRow
{

    use Importable;

     private $gerencias;

     public function __construct()
    {
        $this->gerencias = Gerencia::all(['id', 'descripcion'])->pluck('id', 'descripcion');
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        if (count($rows)) {


            foreach ($rows as $row)
         {
            Gerencia::create([
                'empresa_id' => $row['ente'],
                'descripcion' => $row['descripcion']
             ]);
         }
        }
        return null;

    }


    /**
     * @return array
     */
    public function upsertColumns()
    {
        return ['empresa_id', 'descripcion'];
    }

     /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'descripcion';
    }
}
