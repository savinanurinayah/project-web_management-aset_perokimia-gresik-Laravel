@extends('includes.template')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <a class="btn btn-primary btn-md btn-add float-right mb-3" href="{{ url('/departemen') }}">
                            <i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <h3><strong>Tambah Kelas</strong></h3>
                            </div>
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
                            <form action="{{ url('departemen/tambah') }}" method="post" enctype="multipart/form-data"
                                class="form-horizontal">
                                @csrf
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="nama" class=" form-control-label">Kode</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" required id="kode" name="kode"
                                                value="{{ old('kode') }}" placeholder="Kode" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="nama" class=" form-control-label">Nama</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" required id="nama" name="nama"
                                                value="{{ old('nama') }}" placeholder="Nama" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-success btn-md">
                                        <i class=""></i> Tambah
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
