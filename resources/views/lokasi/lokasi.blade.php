@extends('includes.template')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Lokasi</h2>
                            <hr>
                            <form action="" method="get" class="form-horizontal">
                                <div class="card-body card-block">
                                    <div class="form-row align-items-center row form-group">
                                        <div class="col-4 col-md-7">
                                            <input type="text" id="q" name="q"
                                                placeholder="Search Nama Lokasi..." value="{{ request('q') }}"
                                                class="form-control">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </div>
                                    </div>

                                    <a class="btn btn-success btn-md btn-add float-right mb-3"
                                        href="{{ url('lokasi/tambah') }}">
                                        <i class="fa fa-plus"></i> Tambah Lokasi</a>
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
                        <div class="table-responsive table--no-card m-b-30 mt-3">
                            <table class="table table-bordered table-earning">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th>Aksi</th>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Dibuat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($lokasis as $lokasi)
                                        <tr class="text-center">
                                            <td><a class="btn btn-danger btn-sm" onclick="confirmation(event)"
                                                    href="{{ url('lokasi/delete/' . $lokasi['id_lokasi']) }}"><i class="fa fa-trash" ></i></a>
                                                <a href="{{ url('lokasi/edit/' . $lokasi['id_lokasi']) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $lokasi['nama'] }}</a></td>
                                            <td>{{ $lokasi['created_at'] }}</td>
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
