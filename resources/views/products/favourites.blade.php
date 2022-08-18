@extends('layouts/app')

@section('content')

<h1 class="app__title">Favorieten</h1>
<div class="btn--container">
    <a href="/products" class="btn">Producten bekijken</a>
</div>
    <div class="product--container">
            @foreach($favourites as $favourite)
            <a href="/products/{{ $favourite->products->id }}" class="product__link">
                <div class="product__card">
                    <div class="product__image" style="background-image: url(../../attachements/{{ \App\Models\Product::find($favourite->product_id)->productAttachements->first()->source; }} )">
                    </div>
                    <p class="product__title">{{ $favourite->products->name }}</p>
                    <p class="product__price">&euro;{{ $favourite->products->price }}</p>
                </div>
            </a>
            @endforeach
    </div>

@endsection