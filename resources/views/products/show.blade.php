@extends('layouts/app')

@section('content')
    @if($flash = session('message'))
        <p>{{ $flash }}</p>
    @endif
    <h1 class="app__title">{{$product -> name}}</h1>
    @if(Auth::id())
        @if(Auth::id()!= $product -> user -> id)
            @livewire('favourites', ['product_id' => $product->id])
        @else
            <form method="post" action="/products/destroy/{{ $product -> id }}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <div class="detail__delete">
                    <input type="submit" value="product verwijderen" class="btn btn--danger">
                    <a href="product/edit/{{ $product->id }}" class="btn btn--success">update</a>
                </div>
            </form>
        @endif
    @endif
    <div class="detail__images">
        @if($product -> productAttachements)
            @foreach($product -> productAttachements as $attachement)
            <div class="detail__image--container">
            <img src="/attachements/{{ $attachement->source }}" alt="product pic" class="detail__image">
            </div>
            @endforeach
        @endif
    </div>
    <div class="detail__block">
        <h2>Product information</h2>
        <div class="detail__label">
            <h3>Price</h3>
        </div>
        <div class="detail__info">
            <p>&euro;{{$product -> price}}</p>
        </div>
        <div class="detail__label">
            <h3>Description</h3>
        </div>
        <div class="detail__info">
            <p>{{$product -> description}}</p>
        </div>
        <div class="detail__label">
            <h3>Category</h3>
        </div>
        <div class="detail__info">
            <p>{{$product -> productCategory-> name}}</p>
        </div>
    </div>
    <div class="detail__block">
        <h2>Seller information</h2>
        <div class="detail__block--seller">
        <div class="detail__info--seller">
            @if(!empty($product -> user -> picture_source))
                <img src="/attachements/users/{{ $product -> user -> picture_source }}" alt="">
            @endif
            </div>
        <div class="detail__info--seller">
            <h3>Name</h3>
            <p>{{$product -> user -> name}}</p>
            <h3>Email</h3>
            <p>{{$product -> user -> email}}</p>
        </div>
        </div>
    </div>
@endsection