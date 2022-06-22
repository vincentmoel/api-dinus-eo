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
