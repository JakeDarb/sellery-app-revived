<div class="favourites">
    <div class="favourite">
        @if(!empty($favourite))
            <a href="#" class="btn btn--danger" wire:click.prevent="delete('{{ $product_id }}')">Remove from favourites</a>
        @else
            <a href="#" class="btn btn--success" wire:click.prevent="add('{{ $product_id }}')">Favourite</a>
        @endif
    </div>
</div>