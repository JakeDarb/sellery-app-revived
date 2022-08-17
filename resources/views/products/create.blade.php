@extends('layouts/form')

@section('content')
@if($errors->any())
    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif
<div class="form">
<h2 class="form__title">Product toevoegen</h2>
    <form method="post" action="{{ url('/products/store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="form__label">Naam</label>
            <input type="name" name="name" class="form__input" id="name" placeholder="Enter name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="desc" class="form__label">Beschrijving</label>
            <textarea name="desc" id="desc" class="form__textarea">{{ old('desc') }}</textarea>
        </div>
        <div>
            <label for="files" class="form__label">Foto's</label>
            <div class="form__file">
                <input type="file" name="files[]" accept='.png, .jpg, .jpeg, .pfd, .doc, .docx, .ppt' multiple>
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="form__label">Prijs</label>
            <input type="price" name="price" class="form__input" id="price" value="{{ old('price') }}">
        </div>
        <div>
        <label for="category" class="form__label">Kies een categorie:</label>
        <select name="category" id="category" class="form__input">
            @foreach($productCategories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        </div>
        <div class="form__btnContainer">
        <button type="submit" class="btn btn--success form__btn">Toevoegen</button>
        <a href="/products" class="btn form__btn">Bekijk producten</a>
        </div>
    </form>
</div>
@endsection