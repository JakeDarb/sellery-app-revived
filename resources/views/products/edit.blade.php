@extends('layouts/form')

@section('content')
@if($errors->any())
    @component('components/alert')
        @slot('type') danger @endslot
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endcomponent
@endif
<div class="form">
<h2 class="form__title">Product bewerken</h2>
    <form method="post" action="{{ url('/products/change') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="name" class="form__label">Naam</label>
            <input type="name" name="name" class="form__input" id="name" placeholder="Enter name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="desc" class="form__label">Beschrijving</label>
            <textarea name="desc" id="desc" class="form__textarea">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price" class="form__label">Prijs</label>
            <input type="price" name="price" class="form__input" id="price" value="{{ $product->price }}">
        </div>
        <div>
        <label for="category" class="form__label">Kies een categorie:</label>
        <select name="category" id="category" class="form__input">
            @foreach($productCategories as $category)
            
            <option value="{{ $category->id }}"<?php if($product->productCategory->id===$category->id){echo "selected";} ?>>{{ $category->name }}</option>
            @endforeach
        </select>
        </div>
        <div class="form__btnContainer">
        <button type="submit" class="btn btn--success form__btn">Pas aan</button>
        <a href="/products" class="btn form__btn">Bekijk producten</a>
        </div>
    </form>
</div>
@endsection