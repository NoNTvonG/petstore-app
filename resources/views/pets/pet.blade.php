@extends('layouts.index')
@section('content')
    <h1>{{ $pet['name'] }}</h1>

    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $pet['id'] }}</td>
                <td>{{ $pet['name'] }}</td>
                <td>{{ $pet['photoUrls'][0] }}</td>
                <td>{{ $pet['status'] }}</td>
                <td>
                    <a href="{{ route('pets.editPetById', $pet['id']) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('pets.deletePetById', $pet['id']) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('pets.index') }}" class="btn btn-secondary mb-3">Back to Pets</a>
@endSection
