@extends('layouts/app')

@section('content')
@if($flash = session('message'))
        <p>{{ $flash }}</p>
    @endif
<h1>products</h1>
<h2>Categories</h2>
    <ul class="scroll--container">
    @foreach($categories as $category)
    <li class="scroll--item">
        <a href="/products/category/{{ $category->id }}">{{ $category->name }}</a>
    </li>
    @endforeach
    </ul>
@livewire('product-search')
@endsection