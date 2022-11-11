<div>
    <div class="card border-0 shadow-sm mt-3">
        <div class="card-body">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <span>Secuencia de funcionarios beneficiados</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <span class="mr-3"><b>{{ $serie }}</b></span> | <span><b>{{ $correlativo }}</b></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                @forelse($products as $product)
                    <div wire:click.prevent="selectProduct({{ $product }})" class="col-lg-6 col-md-3" style="cursor: pointer;">
                        <div class="card border-0 shadow h-100">
                            <div class="position-relative">
                                <img width="90" src="{{ asset('/images/productos/'.$product->foto)}}" class="card-img-top" alt="Product Image">
                                <div class="badge bg-info mb-3 position-absolute" style="left:10px;top: 10px;">Disponible: {{ $product->cantidad }} UNID</div>
                            </div>
                            <div class="card-body">
                                <div class="mb-2">
                                    <h6 style="font-size: 15px;" class="card-title mb-0 text-center">{{ $product->name }}</h6>

                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning mb-0">
                            Lo siento, producto no encontrado...
                        </div>
                    </div>
                @endforelse
            </div>
            <div @class(['mt-3' => $products->hasPages()])>
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
