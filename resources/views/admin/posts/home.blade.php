@extends('layouts.admin')

@section('title', 'Tutti i post')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Ultimi Post') }}</div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif



    </div>
</div>
@endsection