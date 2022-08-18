<div class="search--container">
    @if($search)
        <p class="search__label">Zoeken naar: "{{ $search }}"</p>
    @else
    <label for="search" class="search__label">Naar een product zoeken</label>
    @endif
    <input wire:keyup="search" wire:model="search" type="text" name="search" id="search" class="search__input">

    <div class="product--container">
        @foreach($products as $product)
        <a href="/products/{{ $product->id }}" class="product__link">
        <div class="product__card">
            <div class="product__image" style="background-image: url(attachements/{{ $product->productAttachements->first()->source; }} )">
            </div>
            <p class="product__title">{{ $product->name }}</p>
            <p class="product__price">&euro;{{ $product->price }}</p>
        </div>
        </a>
        @endforeach
    </div>
</div>