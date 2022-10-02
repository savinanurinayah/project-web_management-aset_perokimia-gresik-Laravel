@extends('includes.template')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2>Data Peminjaman</h2>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="get" class="form-horizontal">
                            <div class="card-body card-block">
                                <div class="form-row align-items-center row form-group">
                                    <div class="col-3 col-md-5 mb-3">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Nama Peminjam"
                                                id="peminjam" name="peminjam" value="{{ request('peminjam') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"
                                                    id="button-addon2">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 col-md-5 mb-3 ml-5">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Status"
                                                id="status" name="status" value="{{ request('status') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"
                                                    id="button-addon2">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <a class="btn btn-danger" target="_blank" href="{{ url('peminjaman/data/cetak') }}">
                                        <i class="zmdi zmdi-print"></i>Cetak PDF</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row m-t-25" style="min-height: 500px;">
                    <div class="col-lg-12">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-bordered table-earning">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th>Konfirmasi</th>
                                        <th>No.</th>
                                        <th>Status</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Gambar</th>
                                        <th>Nama Peminjam</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Deadline Pengembalian</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($asets as $peminjaman)
                                        <?php
                                        $btn = '';
                                        if ($peminjaman['status_peminjaman'] == 'PROSES'):
                                            $badge = 'badge';
                                            $btn =
                                                '<button data-id="' .
                                                $peminjaman['id_peminjaman'] .
                                                '" data-status="diterima" data-href="' .
                                                url('peminjaman/update?id=' . $peminjaman['id_peminjaman'] . '&status=diterima') .
                                                '" class="btn btn-success btn-sm btn-terima">Diterima</button>
                                                                                                                                                                                                        <button data-id="' .
                                                $peminjaman['id_peminjaman'] .
                                                '" data-status="ditolak" data-href="' .
                                                url('peminjaman/update?id=' . $peminjaman['id_peminjaman'] . '&status=ditolak') .
                                                '" class="btn btn-danger btn-sm btn-tolak">Ditolak</button>';
                                        elseif ($peminjaman['status_peminjaman'] == 'DITERIMA'):
                                            $badge = 'badge';
                                            $btn = '<button data-id="' . $peminjaman['id_peminjaman'] . '" data-status="selesai" data-href="' . url('peminjaman/update?id=' . $peminjaman['id_peminjaman'] . '&status=selesai') . '" class="btn btn-primary btn-sm btn-selesai">Selesai</button>';
                                        elseif ($peminjaman['status_peminjaman'] == 'SELESAI'):
                                            $badge = 'badge';
                                        else:
                                            $badge = 'badge';
                                        endif;

                                        ?>
                                        <tr class="text-center">
                                            <td>
                                                {!! $btn !!}
                                            </td>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $badge }}">{{ $peminjaman['status_peminjaman'] }}</span>
                                            </td>
                                            <td>{{ $peminjaman['nama_aset'] }}</td>
                                            <td>{{ $peminjaman['nama_kategori'] }}</td>
                                            <td>
                                                @if ($peminjaman['gambar'])
                                                    <img class="img-thumbnail"
                                                        src="{{ asset('storage/public/' . $peminjaman['gambar']) }}"
                                                        alt="" width="50px">
                                                @endif
                                            </td>
                                            <td>{{ $peminjaman['nama_pegawai'] }}</td>
                                            <td>{{ $peminjaman['tanggal_peminjaman'] }}</td>
                                            <td>{{ $peminjaman['deadline_pengembalian'] }}</td>
                                            <td>
                                                {{ $peminjaman['tanggal_pengembalian'] }}
                                                <a href="{{ url('peminjaman/edit/' . $peminjaman['id_peminjaman']) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                </a>
                                            </td>
                                            <td>{{ $peminjaman['keterangan'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
