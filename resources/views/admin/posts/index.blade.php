@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">Posts List
                    <a href="{{ route('admin.posts.create')}}"><i class="fa-solid fa-plus"></i></a>
                </div>

                <div class="card-body">
                    <ul class="list-group d-flex">
                        @foreach ($posts as $post)

                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <h3 class="py-1">
                                    {{ $post->title }}
                                </h3>
                                <div class="py-1">
                                    <strong>{{Str::upper( $post->user->name) }}</strong>
                                </div>
                                <div class="py-1">
                                    <strong>Categories: </strong>
                                    {{ isset($post->category) ? $post->category->code : "senza categoria" }}
                                </div>

                                @if ($post->tags->count()!=0)
                                <div> <strong>Tags:</strong>
                                    @foreach ($post->tags as $tag)
                                    <span class="pr-1">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="mx-3">
                                    <a href="{{ route('admin.posts.show', $post->id) }}" title="show"><i
                                            class="fa-solid fa-eye"></i></a>
                                </div>

                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method("delete")

                                    <button type="submit" class="btn btn-link">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
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