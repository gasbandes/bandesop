<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Modules\Gerencia\Entities\Gerencia;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class GerenciasExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
         $gerencia = Gerencia::with('ente:id,razon_social')->get();

         return view('gerencia::exports.index', [
            'gerencias' => Gerencia::with('ente:id,razon_social')->get()
        ]);
    }
}
