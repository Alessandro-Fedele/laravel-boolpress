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

                    @if(count($posts) === 0)
                    Ancora nessun post!
                    @else
                    @foreach ($posts as $post)
                    <div class="card mt-4">
                        <h2> {{$post->title}}</a></h2>
                        <p>{{$post->body}}</p>
                        <!-- Modifica -->
                        <!-- Cancella -->
                    </div>
                    @endforeach
                    @endif
                </div>
                <a href="{{route('admin.posts.create')}}" class="btn btn-link">
                    Crea un post
                </a>
            </div>
        </div>
    </div>
</div>
@endsection