@extends('template.main')

@section('container')
    <div class="header-wrapper pb-3 mb-4">
        <h1>Rooms</h1>
    </div>



    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <div class="mb-4">
        <button type="button" class="btn btn-add" data-bs-toggle="modal" data-bs-target="#addDataModal">
            <i class="bi bi-plus-circle"></i> Add Room
        </button>
    </div>

    <table id="data-table" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Room Name</th>
                <th>Floor</th>
                <th>Building</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Created By</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>

            @php
                $no = 1;
            @endphp

            @foreach ($rooms as $room)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->floor }}</td>
                    <td>{{ $room->building->name }}</td>
                    <td>{{ date_format($room->created_at, 'd-m-Y H:i:s') }}</td>
                    <td>{{ date_format($room->updated_at, 'd-m-Y H:i:s') }}</td>
                    <td>{{ $room->user->name }}</td>
                    <td class="text-center text-xl-start">
                        <a href="/rooms/{{ $room->room_id }}/edit" class="btn btn-primary mb-1 mb-xl-0"><i class="bi bi-pencil-square"></i></a>
                        <form action="/rooms/{{ $room->room_id }}" method="POST" class="d-inline" id="form-delete">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach


        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Room Name</th>
                <th>Floor</th>
                <th>Building</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Created By</th>
                <th>Action</th>

            </tr>
        </tfoot>
    </table>


    <!-- Add Data Modal -->
    <div class="modal fade" id="addDataModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addDataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDataModalLabel">Add Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/rooms" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Room Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="ex : Studio">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="floor" class="form-label">Floor</label>
                            <input type="text" name="floor" class="form-control @error('floor') is-invalid @enderror"
                                value="{{ old('floor') }}" placeholder="ex : 4">
                            @error('floor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="building_id" class="form-label">Building</label>
                            <select class="form-select @error('building_id') is-invalid @enderror"
                                aria-label="Default select example" name="building_id">
                                <option value="" selected disabled>Choose One</option>
                                @foreach ($buildings as $building)
                                    @if (old('building_id') == $building->building_id)
                                        <option value="{{ $building->building_id }}" selected>{{ $building->name }}</option>
                                    @else
                                        <option value="{{ $building->building_id }}">{{ $building->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('department_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>






    <script>
        $(document).ready(function() {
            $('#data-table').DataTable();
            @if (count($errors) > 0)
                $('#addDataModal').modal('show');
            @endif


        });
    </script>
@endsection
