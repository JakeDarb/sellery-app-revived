@extends('layouts/form')

@section('content')
@if($flash = session('message'))
    @component('components/alert')
        @slot('type') danger @endslot
        <p>{{ $flash }}</p>
    @endcomponent
@endif
<div class="form">
<h2 class="form__title">Log in</h2>
    <form method="post" action="{{ url('/login') }}">
        @csrf
        <div class="form-group">
            <label for="email" class="form__label">Email adres</label>
            <input type="email" name="email" class="form__input" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password" class="form__label">Wachtwoord</label>
            <input type="password" name="password" class="form__input" id="password" placeholder="Password">
        </div>
        <div class="form__linkContainer">
            <a href="/register" class="form__link">Klik hier als je nog geen account hebt</a>
        </div>
        <div class="form__btnContainer">
            <button type="submit" class="btn btn--success form__btn">Log in</button>
            <a href="/products" class="btn form__btn">Bekijk producten</a>
        </div>
    </form>
    </div>
@endsection