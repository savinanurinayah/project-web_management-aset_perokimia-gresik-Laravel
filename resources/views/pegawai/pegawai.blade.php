@extends('includes.template')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">User</h2>
                            <hr>
                            <form action="" method="get" class="form-horizontal">
                                <div class="">
                                    <div class="form-row align-items-center row form-group">
                                        <div class="col-4 col-md-4">
                                            <input type="text" id="q" name="q"
                                                placeholder="Search Nama User..." value="{{ request('q') }}"
                                                class="form-control">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <a class="btn btn-success btn-md btn-add float-right mb-2 mr-2"
                                        href="{{ url('pegawai/tambah') }}">
                                        <i class="fa fa-plus"></i> Tambah User
                                    </a>
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
                                        <th>Aksi</th>
                                        <th>Status</th>
                                        <th>No.</th>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No. Telepon</th>
                                        <th>Departemen</th>
                                        <th>Dibuat</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($pegawais as $pegawai)
                                        <tr class="text-center">
                                            <td>
                                                @if (session('userdata')['nip_pegawai'] != $pegawai['nip_pegawai'])
                                                    <a class="btn btn-danger btn-sm btn-delete"
                                                        onclick="confirmation(event)"
                                                        href="{{ url('pegawai/delete/' . $pegawai['nip_pegawai']) }}"><i
                                                            class="fa fa-trash"></i></a>
                                                @endif
                                                <a href="{{ url('pegawai/edit/' . $pegawai['nip_pegawai']) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>{{ $pegawai['status'] }}</td>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pegawai['nip_pegawai'] }}</td>
                                            <td>{{ $pegawai['nama_pegawai'] }}</td>
                                            <td>{{ $pegawai['jenis_kelamin'] }}</td>
                                            <td>{{ $pegawai['no_telepon'] }}</td>
                                            <td>{{ $pegawai['departemen'] }}</td>
                                            <td>{{ $pegawai['created_at'] }}</td>
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
