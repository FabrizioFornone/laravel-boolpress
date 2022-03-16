@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div href="{{ route('admin.posts.index') }}" class="me-2">
                        {{ $post->title }}
                    </div>
                    <a class="ms-auto" href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
                </div>

                <div class="card-body">

                    <p class="lead">
                        {!! $post->content !!}
                    </p>

                    <div class="my-3">
                        Data creazione: <span class="mx-2">{{ $post->created_at }}</span>
                        <br>
                        Data ultima modifica: <span class="mx-2">{{ $post->updated_at }}</span>
                    </div>

                    <div class="my-3">
                        Utente: <span class="mx-2">{{ $post->user->name }}</span>
                        <br>
                        Email: <span class="mx-2">{{ $post->user->email }}</span>
                    </div>

                    @if ($post->category !== null)
                    <div class="my-3">
                        Categoria: <span class="mx-2"> {{ $post->category->code }}</span>
                        <br>
                        @if ($post->category->description !== null)
                        Descrizione: {{ $post->category->description }}
                        @endif
                    </div>
                    @endif

                    @if ($post->tags->count()!=0)
                    <div class="my-3">
                        Tags:
                        @foreach ($post->tags as $tag)
                        <span class="mx-2">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection