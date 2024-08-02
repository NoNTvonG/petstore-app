@extends('layouts.index')

@section('content')
    <div class="container">
        <h1>Edit Pet</h1>

        <form action="{{ route('pets.update', $pet['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pet['name']) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category[name]"
                    value="{{ old('category.name', $pet['category']['name'] ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="available" {{ old('status', $pet['status']) == 'available' ? 'selected' : '' }}>Available
                    </option>
                    <option value="pending" {{ old('status', $pet['status']) == 'pending' ? 'selected' : '' }}>Pending
                    </option>
                    <option value="sold" {{ old('status', $pet['status']) == 'sold' ? 'selected' : '' }}>Sold</option>
                </select>
            </div>

            <div class="form-group">
                <label for="photoUrls">Photo URLs</label>
                @foreach ($pet['photoUrls'] as $index => $photoUrl)
                    <input type="text" class="form-control mb-2" id="photoUrls_{{ $index }}" name="photoUrls[]"
                        value="{{ old('photoUrls.' . $index, $photoUrl) }}">
                @endforeach
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Pet</button>
                <a href="{{ route('pets.index') }}" class="btn btn-secondary">Back to Pets</a>
            </div>
        </form>
    </div>
@endsection
