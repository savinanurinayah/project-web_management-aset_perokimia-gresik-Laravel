@extends('includes.template')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2>Peminjaman</h2>
                <hr>
                <form action="" method="get" class="form-horizontal">
                    <div class="card-body card-block">
                        <div class="form-row align-items-center row form-group">
                            <div class="col-4 col-md-7">
                                <input type="text" id="q" name="q" placeholder="Search Nama Aset..."
                                    value="{{ request('q') }}" class="form-control">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </form>

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
                        <div class="table-responsive table--no-card m-b-30 mt-3">
                            <table class="table table-bordered table-earning">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th>Status</th>
                                        {{-- <th>No</th> --}}
                                        <th>Nama Aset</th>
                                        <th>Gambar</th>
                                        <th>Kategori</th>
                                        <th>Lokasi</th>
                                        @if (session('userdata')['status'] == 'ADMIN')
                                            <th>Harga</th>
                                        @else
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php
                                        $no = 1;
                                    @endphp --}}
                                    @foreach ($asets as $aset)
                                        <tr class="text-center">
                                            <td>
                                                <div class="card-text text-sm-center">
                                                    @if ($aset->status_peminjaman)
                                                        <div
                                                            class="alert {{ $aset->status_peminjaman == 'DITERIMA' ? 'alert-success' : 'alert-success' }}">
                                                            {{ $aset->status_peminjaman }}
                                                        </div>
                                                    @else
                                                        @if ($aset->status_peminjaman_pegawai)
                                                            <div class="alert text-dark">
                                                                Aset Sedang Dipinjam
                                                            </div>
                                                        @else
                                                            <button type="button" data-id="{{ $aset->id_aset }}"
                                                                data-nama="{{ $aset->nama_aset }}"
                                                                class="btn btn-md btn-block btn-warning btn-peminjaman">Pinjam</button>
                                                        @endif
                                                    @endif
                                                </div>
                                            </td>
                                            {{-- <td>{{ $no++ }}</td> --}}
                                            <td>{{ $aset->nama_aset }}</a></td>
                                            <td>
                                                <div class="img-blok" style="min-height: 200px">
                                                    @if ($aset->gambar)
                                                        <img class=" mx-auto d-block"
                                                            src="{{ asset('storage/public/' . $aset->gambar) }}"
                                                            alt="" width="150px">
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ $aset->nama_kategori }}</a></td>
                                            <td>{{ $aset->nama_lokasi }}</a></td>
                                            @if (session('userdata')['status'] == 'ADMIN')
                                                <td>{{ number_format($aset->nilai_aset, 0, ',', '.') }}</td>
                                            @else
                                            @endif
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

    <!-- modal static -->
    <div class="modal fade" id="peminjamanModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{{ asset('backend/img/logo/logo2.png') }}" alt="" width="70px">
                    <h5 class="modal-title" id="staticModalLabel">Form Peminjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('peminjaman/tambah') }}" id="form-peminjaman" method="post">
                        @csrf
                        <input type="hidden" name="id_aset" value="">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="nama" class=" form-control-label">Nama Aset</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" readonly id="nama" name="nama" placeholder="Nama Aset"
                                    class="form-control">
                            </div>
                            <div class="col col-md-3">
                                <label for="tanggal_peminjaman" class=" form-control-label">Tanggal Peminjaman</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" required id="tanggal_peminjaman" name="tanggal_peminjaman"
                                    placeholder="Tanggal Peminjaman" class="form-control">
                            </div>
                            <div class="col col-md-3">
                                <label for="deadline_pengembalian" class=" form-control-label">Deadline Pengembalian</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" required id="deadline_pengembalian" name="deadline_pengembalian"
                                    placeholder="Deadline Pengembalian" class="form-control">
                            </div>

                            <div class="col col-md-3">
                                <label for="tanggal_pengembalian" class=" form-control-label">Tanggal Pengembalian</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" required id="tanggal_pengembalian" name="tanggal_pengembalian"
                                    placeholder="Tanggal Pengembalian" class="form-control">
                            </div>
                            <div class="col col-md-3">
                                <label for="keperluan" class=" form-control-label">Keperluan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea required id="keperluan" name="keperluan" placeholder="Keperluan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-left">
                                <button type="submit" class="btn btn-secondary ">
                                    <a href="/peminjaman" class="text-white text-decoration-none">Close</a>
                                </button>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-warning btn-pinjam-aset ">
                                    Pinjam
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal static -->
@endsection
