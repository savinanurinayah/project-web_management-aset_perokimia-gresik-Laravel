
@extends('includes.template')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <a class="btn btn-primary btn-md btn-add float-right mb-3" href="{{ url('/peminjaman/data') }}">
                        <i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3><strong>Edit Tanggal Pengembalian</strong></h3>
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

                        <form action="{{url('peminjaman/edit/'.$peminjaman->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="tanggal_pengembalian" class=" form-control-label">Tanggal Pengembalian</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" required id="tanggal_pengembalian" name="tanggal_pengembalian" value="{{$peminjaman->tanggal_pengembalian}}" placeholder="Tanggal Pengembalian" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="keterangan" class=" form-control-label">Keterangan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" required id="keterangan" name="keterangan" value="{{$peminjaman->keterangan}}" placeholder="Keterangan" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center mb-3">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="fa fa-dot-circle-o"></i> Update
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

