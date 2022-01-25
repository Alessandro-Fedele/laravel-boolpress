@extends('layouts.admin')

@section('title', 'Tutti i post')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">{{ __('Ultimi Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="text-center">
                        <a href="{{route('admin.posts.create')}}" class="btn btn-link">
                            Crea un post
                        </a>
                    </div>

                    @if(count($posts) === 0)
                    Ancora nessun post!
                    @else
                    @foreach ($posts as $post)
                    <div class="card mt-4">
                        <h2><a href="{{route('admin.posts.show', $post->id)}}"> {{$post->title}}</a></h2>
                        <img src="{{$post->image}}" alt="{{$post->title}}">
                        <p>{{$post->body}}</p>
                        <p>Categoria: {{$post->category->name}}</p>
                        <!-- tags -->
                        <p>Tag:
                            @foreach($post->tags as $tag)
                            <span class="badge bg-primary text-white w-25">{{$tag->name}}</span>
                            @endforeach
                        </p>
                        <div>
                            <small>{{$post->created_at}} Written by {{$post->user->name}}</small>
                        </div>
                        <!-- Modifica -->
                        <a class="btn btn-primary m-3" href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
                        <!-- Cancella -->
                        <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="m-3">
                            @csrf
                            @method("DELETE")

                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                    @endforeach
                    @endif
                </div>
                <a href="{{route('admin.posts.create')}}" class="btn btn-link">
                    Crea un post
                </a>
                <div class="d-flex justify-content-center mt-3">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection