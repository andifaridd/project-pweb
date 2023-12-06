@extends('books.layouts.master')
@section('title', 'List Buku')
@section('content')
    <div class="mb-3">
        <a class="btn btn-success px-5" href="{{route('books.create')}}" role="button">Tambah Data Buku +</a>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Penulis</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Sinopsis</th>
                <th scope="col">Stok</th>
                <th scope="col">Harga</th>
                <th scope="col">Terakhir Diperbarui</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $books as $book )
                <tr>
                    <th scope="row">{{$book->id}}</th>
                    <td>{{$book->title}}</td>
                    <td>{{$book->writer}}</td>
                    <td>{{$book->publisher}}</td>
                    <td>{{$book->synopsis}}</td>
                    <td>{{$book->stock}}</td>
                    <td>@currency($book->price)</td>
                    <td>{{$book->updated_at}}</td>
                    <td>
                        <form action="/books/{{$book->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary btn-sm btn-icon" href="{{route('books.edit', $book->id)}}" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
                            <button class="btn btn-danger btn-sm btn-icon confirm-delete"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection