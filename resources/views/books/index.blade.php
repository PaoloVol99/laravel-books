@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{ route('books.create') }}">Aggiungi libro</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Casa editrice</th>
                    <th>Titolo</th>
                    <th>Autore</th>
                    <th>Numero pagine</th>
                    <th>Cod. ISBN</th>
                    <th>Disponibile</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
    
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->publishing_company }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}">
                            {{ $book->title }}
                        </a>
                    </td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->pages }}</td>
                    <td>{{ $book->ISBN }}</td>
                    <td>{{ $book->is_available }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('books.edit', $book->id) }}">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                            @csrf

                            @method('DELETE')

                            <input class="btn btn-danger btn-sm" type="submit" value="delete">
                        </form>

                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>

    </div>
    
@endsection