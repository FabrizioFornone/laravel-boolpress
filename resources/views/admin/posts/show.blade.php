@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div href="{{ route('admin.posts.index') }}" class="me-2">
                        {{ $post->title }}
                    </div>
                    <a class="ms-auto" href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
                </div>

                <div class="card-body">

                    <p class="lead">
                        {!! $post->content !!}
                    </p>

                    <div class="my-3">
                        Data creazione: {{ $post->created_at }}
                        <br>
                        Data ultima modifica: {{ $post->updated_at }}
                        <br>
                        ID: {{ $post->id }}
                    </div>

                    <div class="my-3">
                        Utente: {{ $post->user->name }}
                        <br>
                        Email: {{ $post->user->email }}
                    </div>

                    @if ($post->category !== null)
                    <div class="my-3">
                        Categoria: {{ $post->category->code }}
                        <br>
                        Descrizione: {{ $post->category->description }}
                    </div>
                    @endif

                    @if ($post->tags !== null)
                    <div class="my-3">
                        tags:
                        @foreach ($post->tags as $tag)
                        <div>{{ $tag->name }}</div>
                        @endforeach
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection