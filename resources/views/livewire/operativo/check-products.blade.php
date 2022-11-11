<div>
    <div class="card">
        <div class="card-body">
            <div>
                @if (session()->has('message'))
                    <!-- Secondary Alert -->
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong> ¡Lo siento! </strong> <span>{{ session('message') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr class="text-center">
                            <th class="align-middle">Producto</th>
                            <th class="align-middle">Cantidad</th>
                            <th class="align-middle">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($cart_items->isNotEmpty())
                            @foreach($cart_items as $cart_item)

                                <tr class="text-center">
                                    <td class="align-middle">
                                        {{ $cart_item->name }} <br>
                                        <span class="badge bg-success">
                                        {{ $cart_item->options->code }}
                                    </span>

                                    </td>
                                    <td class="align-middle">

                                            <div class="input-group">
                                                <input name="quantity" type="text" class="form-control input-sm"  value="{{ $cart_item->qty }}" min="1">
                                                <input type="hidden" name="producto_id[]" value="{{ $cart_item->id }}">
                                            </div>

                                    </td>

                                    <td class="align-middle text-center">
                                        <a href="#" wire:click.prevent="removeItem('{{ $cart_item->rowId }}')">
                                            <i class="mdi mdi-delete text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center">
                                    <span class="text-danger">
                                    Por favor busca y selecciona el producto
                                    </span>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="form-group ">
                <button wire:click="resetCart" type="button" class="btn btn-pill btn-danger mr-3"><i class="mdi mdi-refresh"></i> Reiniciar</button>
                <button  type="submit" id="entregaCombo" class="btn btn-pill btn-primary"><i class="mdi mdi-check"></i> Proceder</button>
            </div>
        </div>

    </div>

{{--Checkout Modal--}}



</div>

