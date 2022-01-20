@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" action="{{ route('admin.posts.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="url" class="form-control" id="image" name="image" placeholder="Add URL... " value="{{old('image')}}" required>
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Contenuto</label>
                    <textarea class="form-control" id="body" name="body" rows="3" value="{{old('body')}}" required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Crea</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection