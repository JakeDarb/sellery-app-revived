@extends('layouts/app')

@section('content')

    @if($flash = session('message'))
        @component('components/alert')
            @slot('type') success @endslot
            <p>{{ $flash }}</p>
        @endcomponent
    @endif
<h1 class="app__title">Bekijk producten</h1>
<div class="scroll--container">
<div class="scroll--container__title">
    <h2>Categoriën:</h2>
</div>
    <ul class="scroll--container__list">
    @foreach($categories as $category)
    <li class="scroll--item">
        <a href="/products/category/{{ $category->id }}">{{ $category->name }}</a>
    </li>
    @endforeach
    </ul>
    </div>
@livewire('product-search')
@endsection