@extends('includes.template')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Kategori</h2>
                            <hr>
                            <form action="" method="get" class="form-horizontal">
                                <div class="card-body card-block">
                                    <div class="form-row align-items-center row form-group">
                                        <div class="col-4 col-md-4">
                                            <input type="text" id="q" name="q"
                                                placeholder="Search Nama Kategori..." value="{{ request('q') }}"
                                                class="form-control">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <a class="btn btn-success au-btn au-btn-icon float-right mb-3"
                                        href="{{ url('kategori/tambah') }}">
                                        <i class="fa fa-plus"></i></i> Tambah Kategori</a>
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
                                    @foreach ($kategoris as $kategori)
                                        <tr class="text-center">
                                            <td><a class="btn btn-danger btn-sm btn-delete" onclick="confirmation(event)"
                                                    href="{{ url('kategori/delete/' . $kategori['id_kategori']) }}"><i
                                                        class="fa fa-trash"></i></a>
                                                <a href="{{ url('kategori/edit/' . $kategori['id_kategori']) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $kategori['nama'] }}</td>
                                            <td>{{ $kategori['created_at'] }}</td>
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
