@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">Lista dei Post
                    <a href="{{ route('admin.posts.create')}}">Aggiungi</a>
                </div>

                <div class="card-body">
                    <ul class="list-group d-flex">
                        @foreach ($posts as $post)

                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                {{ $post->title }}
                            </div>
                            <div>
                                <a class="ms-auto" href="{{ route('admin.posts.show', $post->id) }}">Mostra</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection