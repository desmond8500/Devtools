@extends('tutos.index')

@section('content')
    <h1>Hello-Bootstrap</h1> d
    @if ($folder)
        {{ $name }}
    @endif
@endsection
