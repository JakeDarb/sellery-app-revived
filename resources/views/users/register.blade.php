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
    <form method="post" action="{{ url('/register') }}" enctype="multipart/form-data">
        @csrf
        <h2 class="form__title">Registreer</h2>
        <div class="form-group">
            <label for="name" class="form__label">Naam</label>
            <input type="name" name="name" class="form__input" id="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="email" class="form__label">Email adres</label>
            <input type="email" name="email" class="form__input" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="password" class="form__label">Wachtwoord</label>
            <input type="password" name="password" class="form__input" id="password" placeholder="Password">
        </div>
        <div>
            <label for="file" class="form__label">Profielfoto</label>
            <div class="form__file">
                <input type="file" name="file" accept='.png, .jpg, .jpeg'>
            </div>
        </div>
        <div class="form__linkContainer">
            <a href="/login" class="form__link">Klik hier als je al een account hebt</a>
        </div>
        <div class="form__btnContainer">
            <button type="submit" class="btn btn--success form__btn">Registreer</button>
            <a href="/products" class="btn form__btn">Bekijk producten</a>
        </div>
    </form>
</div>
@endsection