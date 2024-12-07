@extends('components.userLayout')
@section('content')
    @foreach ($vaccines as $item)
        <h1>dosis ke {{ $item->dose }} dengan harga {{ $item->price }}</h1>
        <a href="{{ route('vaccine.edit', $item->id) }}" class="btn btn-sm btn-warning">edit</a>
    @endforeach
@endsection

