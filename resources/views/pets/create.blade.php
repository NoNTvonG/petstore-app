@extends('layouts.index')
@section('content')
    <form action="{{ route('pets.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" id="category" name="category[name]"
                value="{{ old('category.name') }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>Sold</option>
            </select>
        </div>

        <div class="form-group">
            <label for="photoUrls">Photo URLs</label>
            <input type="text" class="form-control mb-2" id="photoUrls" name="photoUrls[]" placeholder="Enter photo URL">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
