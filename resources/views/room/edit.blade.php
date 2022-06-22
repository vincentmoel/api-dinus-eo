@extends('template.main')

@section('container')
    <div class="header-wrapper pb-3 mb-4">

        <a href="/rooms" class="text-dark" id="go-back-link">

            <h2><i class="bi bi-arrow-left-circle" id="arrow-left"></i><i class="bi bi-arrow-left-circle-fill d-none"
                    id="arrow-left-fill"></i> Edit Room</h2>
        </a>
    </div>

    <form action="/rooms/{{ $room->room_id }}" method="POST">
        @method('put')
        @csrf
       
        <div class="mb-3">
            <label for="name" class="form-label">Room Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ $room->name }}" placeholder="ex : Studio">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="floor" class="form-label">Floor</label>
            <input type="text" name="floor" class="form-control @error('floor') is-invalid @enderror"
                value="{{ $room->floor }}" placeholder="ex : 4">
            @error('floor')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="building_id" class="form-label">Building</label>
            <select class="form-select @error('building_id') is-invalid @enderror" aria-label="Default select example"
                name="building_id">
                <option value="" selected disabled>Choose One</option>
                @foreach ($buildings as $building)
                    @if ( $building->building_id == $room->building_id)
                        <option value="{{ $building->building_id }}" selected>{{ $building->name }}</option>
                    @else
                        <option value="{{ $building->building_id }}">{{ $building->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('building_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="btn-wrapper">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection
