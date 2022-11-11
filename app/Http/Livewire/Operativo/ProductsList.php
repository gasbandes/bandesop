<?php

namespace App\Http\Livewire\Operativo;

use Livewire\Component;

class ProductsList extends Component
{
    public function render()
    {
        $products = \App\Models\Producto::where('status',1)->paginate(5);
        $config = \DB::table('configuracion_generals')->first();
        $d_serie = $config->serie;
        $d_correlativo = $config->correlativo;

        $operativos = \DB::table('operativo')
        ->whereMonth('created_at',date('m'))
        ->where('confirmed','1')
        ->get();

        if (count($operativos) == 0)
         {
            $serie = str_pad($d_serie,3,'0',STR_PAD_LEFT);
            $correlativo = str_pad($d_correlativo + 1,7,'0',STR_PAD_LEFT);


         } else
        {
            {
                if($d_correlativo=='9999999'){
                    $serie = str_pad($d_serie + 1,3,'0',STR_PAD_LEFT);
                    $correlativo = str_pad(1,7,'0',STR_PAD_LEFT);
                }else{
                    $operativo = \DB::table('operativo')
                    ->whereMonth('created_at',date('m'))
                    ->orderby('id','desc')
                    ->first();
                    //$entrega = $operativo->last();

                    $serie = str_pad($d_serie,3,'0',STR_PAD_LEFT);
                    $correlativo = str_pad($operativo->{'correlativo'}+ 1,7,'0',STR_PAD_LEFT);

                }


            }
        }
        return view('livewire.operativo.products-list',compact('products','serie','correlativo'));
    }

    public function selectProduct($product) {

        $this->emit('productSelected', $product);
    }
}
