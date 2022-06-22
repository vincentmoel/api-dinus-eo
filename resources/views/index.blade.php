@extends('template.main')

@section('container')
    <div class="header-wrapper pb-3 mb-4 d-flex justify-content-between">
        <h1 class="align-self-center">On Going Events</h1>
        <h2>
            <div>{{ date("l, d-m-Y") }}</div>
            <div id="runningTime" class="text-center fw-bolder" >{{ date('H:i:s') }}</div>
        </h2>
    </div>


    <table class="table" style="width:100%">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Room</th>
                <th>Name</th>
                <th>From Date</th>
                <th>Until Date</th>
                <th>Category</th>

            </tr>
        </thead>
        <tbody id="active-schedules">
            @if ($events_active->count() <= 0)
                <tr>
                    <td colspan="7" class="text-center">No data available in table</td>
                </tr>

            @else            
                @php
                    $no = 1;
                @endphp

                @foreach ($events_active as $event)
                    @php
                        $from_date_second = strtotime($event->from_date);
                        $until_date_second = strtotime($event->until_date);
                        $from_date = date('d-m-Y H:i', $from_date_second);
                        $until_date = date('d-m-Y H:i', $until_date_second);
                        $date_now = strtotime(date('d-m-Y H:i:s'));

                    @endphp
                    <tr @if($from_date_second <= $date_now && $date_now < $until_date_second) style="background-color: #d1e7dd" @endif>
                        <td>{{ $no++ }}</td>
                        <td>{{ $event->room->name }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $from_date }}</td>
                        <td>{{ $until_date }}</td>
                        <td>{{ $event->category }}</td>

                    </tr>
                @endforeach
            @endif




        </tbody>
    </table>



    <script>
        $(document).ready(function() {

            setInterval(runningTime, 1000);


        });

            function runningTime() {
                $.ajax({
                    url: '/date',
                    method: 'GET',
                    success: function(data) {
                        $('#runningTime').html(data);
                    },
                });

                $.ajax({
                url: '/schedules-refresh',
                method: 'POST',
                success: function(data) {
                    $('#active-schedules').empty();
                    $('#active-schedules').append(data);
                },
            });
            }
    </script>
@endsection
