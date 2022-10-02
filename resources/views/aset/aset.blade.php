@extends('includes.template')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Aset</h2>
                            <hr>
                            <form action="" method="get" class="form-horizontal">
                                <div class="card-body card-block">
                                    <div class="form-row align-items-center row form-group">
                                        <div class="col-4 col-md-7">
                                            <input type="text" id="q" name="q"
                                                placeholder="Search Nama Aset..." value="{{ request('q') }}"
                                                class="form-control">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <a class="btn btn-success au-btn au-btn-icon float-right mb-3"
                                        href="{{ url('aset/tambah') }}">
                                        <i class="fa fa-plus"></i> Tambah Aset</a>
                                </div>
                            </form>
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
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-bordered table-earning">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Action</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Kondisi</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Nilai Aset</th>
                                        <th>Gambar</th>
                                        <th>Dibuat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($asets as $aset)
                                        <tr class="text-center">
                                            <td>{{ $no++ }}</td>
                                            <td><a class="btn btn-danger btn-sm btn-delete" onclick="confirmation(event)"
                                                    href="{{ url('aset/delete/' . $aset['id_aset']) }}"><i
                                                        class="fa fa-trash"></i></a>
                                                <a href="{{ url('aset/edit/' . $aset['id_aset']) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>{{ $aset['kode'] }}</td>
                                            <td>{{ $aset['nama_aset'] }}</td>
                                            <td>{{ $aset['nama_kategori'] }}</td>
                                            <td>{{ $aset['kondisi'] }}</td>
                                            <td>{{ $aset['tanggal_pembelian'] }}</td>
                                            <td class="text-right">{{ number_format($aset['nilai_aset'], 0, ',', '.') }}
                                            </td>
                                            <td>
                                                <img class="img-thumbnail"
                                                    src="{{ asset('storage/public/' . $aset['gambar']) }}" alt=""
                                                    width="50px">
                                            </td>
                                            <td>{{ $aset['created_at'] }}</td>
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
