@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if ($post->image !== null)
                <div class="position-absolute img-show d-flex justify-content-center">
                        <img class="" src="{{$post->image}}" alt="">
                </div>
                @endif
                <div class="card-header d-flex justify-content-between">
                    <div href="{{ route('admin.posts.index') }}" class="me-2">
                        {{ $post->title }}
                    </div>
                    <div>
                        <a class="mx-5" href="{{ route('admin.posts.index') }}" title="back"><i
                                class="fa-solid fa-arrow-left"></i></a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" title="edit"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                    </div>
                </div>

                <div class="card-body">

                    <p class="lead">
                        {!! $post->content !!}
                    </p>

                    <div class="my-5">
                        Data creazione: <span class="mx-1">{{ $post->created_at->format($dateFormat)}}</span>
                        <br>
                        Data ultima modifica:
                        <span class="mx-1">
                            @if( $post->updated_at->diffInHours(date(0)) >= 12)

                            {{ $post->updated_at->diffForHumans(date(0)) }}

                            @else

                            {{ $post->updated_at->format($dateFormat) }}

                            @endif
                        </span>
                    </div>

                    <div class="my-5">
                        Utente: <span class="mx-1">{{ $post->user->name }}</span>
                        <br>
                        Email: <span class="mx-1">{{ $post->user->email }}</span>
                    </div>

                    @if ($post->category !== null)
                    <div class="my-5">
                        Categoria: <span class="mx-1"> {{ $post->category->code }}</span>
                        <br>
                        @if ($post->category->description !== null)
                        Descrizione: {{ $post->category->description }}
                        @endif
                    </div>
                    @endif

                    @if ($post->tags->count()!=0)
                    <div class="my-5">
                        Tags:
                        @foreach ($post->tags as $tag)
                        <span class="mx-1">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection