@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-4">
                <h2>{{$post->title}}</h2>
                <img src="{{$post->image}}" alt="{{$post->title}}">
                <p>{{$post->body}}</p>
                <p>Categoria: {{$post->category->name}}</p>
                <br>
                <!-- tags -->
                <p>Tag:
                    @foreach($post->tags as $tag)
                    <span class="badge bg-primary text-white w-25">{{$tag->name}}</span>
                    @endforeach
                </p>
                <div>
                    <small>{{$post->created_at}} Written by {{$post->user->name}}</small>
                </div>
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
    </div>
</div>
@endsection