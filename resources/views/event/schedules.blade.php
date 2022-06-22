@extends('template.main_no_header')

@section('container')
    <div class="header-wrapper pb-3 mb-4 d-flex justify-content-between">
        <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <img src="/assets/img/logo.svg" alt="" width="100px">
            <span class="color-gia ms-2" style="font-family: var(--font-secondary); font-size:20px; font-weight:500">GIA Pringgading</span>
        </a>
        <h2>
            <div>{{ date('l, d-m-Y') }}</div>
            <div id="runningTime" class="text-center fw-bolder">{{ date('H:i:s') }}</div>
        </h2>
    </div>


    <table class="table" style="width:100%">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Ruangan</th>
                
                <th>Nama Peminjam</th>
                <th>Dari</th>
                <th>Sampai</th>
                <th>Keperluan</th>

            </tr>
        </thead>
        <tbody id="active-schedules">
            @if ($rents_active->count() <= 0)
                <tr>
                    <td colspan="7" class="text-center">No data available in table</td>
                </tr>
            @else
                @php
                    $no = 1;
                @endphp

                @foreach ($rents_active as $rent)
                    @php
                        $from_date_second = strtotime($rent->from_date);
                        $until_date_second = strtotime($rent->until_date);
                        $from_date = date('d-m-Y H:i', $from_date_second);
                        $until_date = date('d-m-Y H:i', $until_date_second);
                        $date_now = strtotime(date('d-m-Y H:i:s'));
                        
                    @endphp
                    <tr @if ($from_date_second <= $date_now && $date_now < $until_date_second) style="background-color: #d1e7dd" @endif>
                        <td>{{ $no++ }}</td>
                        <td>{{ $rent->room->name }}</td>
                        
                        <td>{{ $rent->borrower_name }}</td>
                        <td>{{ $from_date }}</td>
                        <td>{{ $until_date }}</td>
                        <td>{{ $rent->description }}</td>

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
