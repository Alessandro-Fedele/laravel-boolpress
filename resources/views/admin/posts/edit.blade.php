@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.posts.update', $post->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Immagine</label>
                    <input type="file" class="form-control" name="image" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoria</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($category->id === $post->category_id) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tag</label>
                    <!-- parentesi quadre così gli id scelti verranno mandati al server come array -->
                    <select name="tags[]" class="form-control" multiple>
                        @foreach($tags as $tag)
                        <!-- @php
                        $exists = $post->tags->where("id", $tag->id)->count();
                        @endphp -->
                        <option value="{{$tag->id}}" @if ($post->tags->contains($tag)) selected @endif>{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Contenuto</label>
                    <textarea class="form-control" id="body" name="body" rows="3">{{ $post->body }}</textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Modifica</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection