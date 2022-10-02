@extends('includes.template')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">

                        </div>
                    </div>
                </div>
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
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Deadline Pengembalian</th>
                                        <th>Tanggal Pengembalian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($asets as $aset)
                                        <tr class="text-center">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $aset['nama_aset'] }}</td>
                                            <td>{{ $aset['nama_kategori'] }}</td>
                                            <td>{{ $aset['tanggal_peminjaman'] }}</td>
                                            <td>{{ $aset['deadline_pengembalian'] }}</td>
                                            <td>{{ $aset['tanggal_pengembalian'] }}</td>
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
