<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Cetak PDF Data Peminjaman</title>
</head>

<body>
    <h1 class="text-center mb-4"><img src="{{ asset('backend/img/logo/logo2.png') }}" width="100px" alt=""> Data Peminjaman Aset PT. PETROKIMIA GRESIK</h1>
    <table class="table table-bordered table-striped table-earning">
        <thead>
            <tr>
                <th>No.</th>
                <th>QR Code</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Peminjaman</th>
                <th>Deadline Pengembalian</th>
                <th>Tanggal Pengembalian</th>
                <th>Lokasi</th>
                <th>Keperluan</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($asets as $aset)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td><img src="https://chart.googleapis.com/chart?chs=240x240&cht=qr&chl={{ $aset->qr_code }}" alt="Kode QR"
                        class="image-profile table-responsive-sm" width="100px"></td>
                    <td>{{ $aset['nama_aset'] }} </td>
                    <td>{{ $aset['nama_kategori'] }}</td>
                    <td>
                        @if ($aset['gambar'])
                            <img class="img-thumbnail" src="{{ asset('storage/' . $aset['gambar']) }}" alt=""
                                width="50px">
                        @endif
                    </td>
                    <td>{{ $aset['nama_pegawai'] }}</td>
                    <td>{{ $aset['tanggal_peminjaman'] }}</td>
                    <td>{{ $aset['deadline_pengembalian'] }}</td>
                    <td>{{ $aset['tanggal_pengembalian'] }}</td>
                    <td>{{ $aset['nama_lokasi'] }}</td>
                    <td>{{ $aset['keperluan'] }}</td>
                    <td>{{ $aset['status_peminjaman'] }}</td>
                    <td>{{ $aset['created_at'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <script>
        window.print();
    </script>
</body>

</html>
