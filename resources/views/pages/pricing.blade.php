@extends('components.userLayout')
@section('content')
    @foreach ($vaccines as $item)
        <h1>dosis ke {{ $item->dose }} dengan harga {{ $item->price }}</h1>
    @endforeach
@endsection
