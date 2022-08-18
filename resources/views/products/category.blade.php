@extends('layouts/app')

@section('content')
    <h1 class="app__title">{{ $category->name }}</h1>
    <div class="product--container">
        @foreach($products as $product)
        <a href="/products/{{ $product->id }}" class="product__link">
            <div class="product__card">
                <div class="product__image" style="background-image: url(../../attachements/{{ \App\Models\Product::find($product->id)->productAttachements->first()->source; }} )">
                </div>
                <p class="product__title">{{ $product->name }}</p>
                <p class="product__price">&euro;{{ $product->price }}</p>
            </div>
        </a>
        @endforeach
    </div>

@endsection