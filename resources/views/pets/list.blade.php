@extends('layouts.index')
@section('content')
    <div id="pets-list">
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pets as $pet)
                    <tr>
                        <td>{{ $pet['id'] }}</td>
                        <td>{{ $pet['name'] ?? 'N/A' }}</td>
                        <td>{{ $pet['status'] }}</td>
                        <td>
                            <a href="{{ route('pets.showPetById', $pet['id']) }}" class="btn btn-success">Show</a>
                            <a href="{{ route('pets.editPetById', $pet['id']) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pets.deletePetById', $pet['id']) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
