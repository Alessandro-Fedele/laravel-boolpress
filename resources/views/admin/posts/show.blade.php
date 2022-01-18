@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-4">
                <h2>{{$post->title}}</h2>
                <p>{{$post->body}}</p>
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