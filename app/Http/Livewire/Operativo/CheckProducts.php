<?php

namespace App\Http\Livewire\Operativo;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CheckProducts extends Component
{


    public $listeners = ['productSelected', 'discountModalRefresh'];

    public $cart_instance;
    public $customers;
    public $global_discount;
    public $global_tax;
    public $shipping;
    public $quantity;
    public $check_quantity;
    public $discount_type;
    public $item_discount;
    public $data;
    public $customer_id;
    public $total_amount;
    public $empleado;


    public function render()
    {


        $cart_items = Cart::instance($this->cart_instance)->content();
        return view('livewire.operativo.check-products',compact('cart_items'));
    }


     public function productSelected($product) {
        $cart = Cart::instance($this->cart_instance);

        $exists = $cart->search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id == $product['id'];
        });

        if ($exists->isNotEmpty()) {
            session()->flash('message', '¡Producto agregado al carrito!');

            return;
        }

        $cart->add([
            'id'      => $product['id'],
            'name'    => $product['name'],
            'qty'     => 1,
            'price'   => 1,
            'weight'  => 1,
            'options' => [
                'product_discount'      => 0.00,
                'product_discount_type' => 'fixed',
                'sub_total'             => 1,
                'code'                  => $product['codigo'],
                'stock'                 => $product['cantidad'],
                'unit'                  => 1,
                'product_tax'           => 1,
                'unit_price'            => 1,
            ]
        ]);

        $this->check_quantity[$product['id']] = $product['cantidad'];
        $this->quantity[$product['id']] = 1;
        $this->discount_type[$product['id']] = 'fixed';
        $this->item_discount[$product['id']] = 0;
        $this->total_amount = 1;
    }


    public function removeItem($row_id) {
        Cart::instance($this->cart_instance)->remove($row_id);
    }



    public function calculate($product) {
        $price = 0;
        $unit_price = 0;
        $product_tax = 0;
        $sub_total = 0;



        return ['price' => 1, 'unit_price' => 1, 'product_tax' => 1, 'sub_total' => 1];
    }

      public function calculateTotal() {
        return Cart::instance($this->cart_instance)->total() + $this->shipping;
    }


    public function resetCart() {
        Cart::instance($this->cart_instance)->destroy();
    }

    public function empleado($id)
    {
        $this->empleado = \App\Models\Personal::find($id);
    }


    public function proceed() {

            $this->dispatchBrowserEvent('showCheckoutModal');

    }
}
