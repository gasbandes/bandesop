<form wire:submit.prevent="updateQuantity('{{ $cart_item->rowId }}', '{{ $cart_item->id }}')">
        <div class="input-group">
            <input wire:model.defer="quantity.{{ $cart_item->id }}"type="text" class="form-control input-sm" disabled value="{{ $cart_item->qty }}" min="1">

        </div>
</form>
