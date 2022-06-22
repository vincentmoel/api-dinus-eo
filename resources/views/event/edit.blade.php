@extends('template.main')

@section('container')
    <script type="text/javascript" src="/assets/vendor/daterangepicker/moment.min.js"></script>
    <script type="text/javascript" src="/assets/vendor/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" href="/assets/vendor/daterangepicker/daterangepicker.css">


    <div class="header-wrapper pb-3 mb-4">

        <a href="/rents" class="text-dark" id="go-back-link">

            <h2><i class="bi bi-arrow-left-circle" id="arrow-left"></i><i class="bi bi-arrow-left-circle-fill d-none"
                    id="arrow-left-fill"></i> Edit Rent</h2>
        </a>
    </div>


    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div>
                <div class="mb-2">{{ session('error') }} with</div>
                <div>
                    <div class="row">
                        @foreach (session('data') as $data)
                            @php
                                $from_date = date('d-m-Y H:i', strtotime($data->from_date));
                                $until_date = date('d-m-Y H:i', strtotime($data->until_date));
                            @endphp
                            <li>{{ $data->borrower_name }} | {{ $data->description }} | <strong>{{ $from_date }} to {{ $until_date }}</strong></li>
                        @endforeach
                    </div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="/rents/{{ $rent->id }}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="room_id" class="form-label">Room</label>
            <select class="form-select @error('room_id') is-invalid @enderror" aria-label="Default select example"
                name="room_id">
                <option value="" selected disabled>Choose One</option>
                @foreach ($rooms as $room)
                    @if (old('room_id', $rent->room_id) == $room->id)
                        <option value="{{ $room->id }}" selected>{{ $room->name }}</option>
                    @else
                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('room_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="borrower_name" class="form-label">Borrower Name</label>
            <input type="text" name="borrower_name" class="form-control @error('borrower_name') is-invalid @enderror"
                value="{{ old('borrower_name', $rent->borrower_name) }}">
            @error('borrower_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                value="{{ old('phone', $rent->phone) }}">
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                value="{{ old('description', $rent->description) }}">
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="from_date" class="form-label">From Date</label>
            <input type="text" name="from_date" value="{{ old('from_date') }}"
                class="form-control @error('from_date') is-invalid @enderror" id="startDate">

            @error('from_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="until_date" class="form-label">Until Date</label>
            <input type="text" name="until_date" class="form-control @error('until_date') is-invalid @enderror"
                id="endDate">

            @error('until_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="btn-wrapper">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            @php
                $from_date = date('m/d/Y H:i', strtotime(old('from_date',$rent->from_date)));
                $until_date = date('m/d/Y H:i', strtotime(old('until_date',$rent->until_date)));
            @endphp

            $('#endDate').val("{{ $until_date }}");
            $('#startDate').val("{{ $from_date }}");

        });

        $('#startDate,#endDate').daterangepicker({
            "singleDatePicker": true,
            "timePicker": true,
            "timePicker24Hour": true,
            "autoApply": true,
            "locale": {
                "direction": "ltr",
                "format": "MM/DD/YYYY HH:mm",
                "separator": " - ",
                "applyLabel": "Apply",
                "cancelLabel": "Cancel",
                "fromLabel": "From",
                "toLabel": "To",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                    "Su",
                    "Mo",
                    "Tu",
                    "We",
                    "Th",
                    "Fr",
                    "Sa"
                ],
                "monthNames": [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ],
                "firstDay": 1
            },
            "linkedCalendars": false,
            "startDate": "{{ date('m/d/Y H:i') }}",
            "drops": "up"
        }, function(start, end, label) {
            console.log(
                "New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')"
            );
        });
    </script>
@endsection
