<?php

namespace App\Imports;

use App\Models\Personal;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class PersonalImport implements ToCollection,WithHeadingRow
{
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
            Personal::where('nu_cedula',$row['cedula'])
            ->update([
                'tipo_empleado' => 2,

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
