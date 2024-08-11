@if ($type == 'monthly')
<h3>Laporan Transaksi Bulanan</h3>
<table>
    <thead>
        <tr>
            <th></th>
            <th>Nama</th>
            <th>Kamar</th>
            <th>Periode</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $item->user_name }}</td>
            <td>{{ $item->room }}</td>
            <td>{{ date('m-Y', strtotime($item->period)) }}</td>
            <td>{{ number_format($item->amount, 0, ',', '.') }}</td>
            <td>{{ $item->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<h3>Laporan Transaksi Tahunan</h3>
<table>
    <thead>
        <tr>
            <th rowspan="2"></th>
            <th rowspan="2">Periode</th>
            <th colspan="2">Tagihan</th>
            <th colspan="2">Terbayar</th>
            <th rowspan="2">%</th>
        </tr>
        <tr>
            <th>#</th>
            <th>Rp</th>
            <th>#</th>
            <th>Rp</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ date('m-Y', strtotime($item->period)) }}</td>
            <td>{{ $item->jumlah_tagihan }}</td>
            <td >{{ number_format($item->total_tagihan, 0, ',', '.') }}</td>
            <td>{{ $item->jumlah_terbayar }}</td>
            <td >{{ number_format($item->total_terbayar, 0, ',', '.') }}</td>
            <td>{{ $item->persentase_pembayaran }} %</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif