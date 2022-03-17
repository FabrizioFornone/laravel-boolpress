@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        Aggiunta di un nuovo post
                    </div>
                    <div>
                        <a href="{{ route('admin.posts.index') }}" title="back"><i
                                class="fa-solid fa-arrow-left"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.posts.store') }}" method="post">
                        @csrf

                        {{-- titolo --}}
                        <div class="mb-3">
                            <label>Titolo</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Inserisci il titolo" value="{{ old('title') }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- contenuto del post --}}
                        <div class="mb-3">
                            <label>Contenuto</label>
                            <textarea name="content" rows="10"
                                class="form-control @error('content') is-invalid @enderror"
                                placeholder="Inizia a scrivere qualcosa..." required>{{ old('content') }}</textarea>
                            @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Categoria</label>
                            <select name="category_id" class="form-select">
                                <option value="">-- nessuna categoria --</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if (old('category_id')===$category->id) selected
                                    @endIf>
                                    {{ $category->code }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-check form-check-inline mb-3">
                            @foreach ($tags as $tag)
                            <label class="form-check-label ml-3 mr-1" for="tag_{{$tag->id}}">{{ $tag->name }}</label>
                            <input type="checkbox" class="form-check-input" value="{{ $tag->id }}" id="tag_{{$tag->id}}"
                                name="tags[]">
                            @endforeach
                        </div>

                        <div class="form-group">
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Annulla</a>
                            <button type="submit" class="btn btn-success">Salva post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection