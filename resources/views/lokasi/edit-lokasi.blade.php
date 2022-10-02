@extends('includes.template')
@section('content')
    <!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <a class="btn btn-primary btn-md btn-add float-right mb-3" href="{{ url('/lokasi') }}">
                        <i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3><strong>Edit Lokasi</strong></h3>
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
                        <form action="{{url('lokasi/edit/'.$lokasi->id_lokasi)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="nama" class=" form-control-label">Nama</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" required id="nama" name="nama" value="{{$lokasi->nama}}" placeholder="Nama" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="alamat" class=" form-control-label">Alamat</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea required id="alamat" name="alamat" placeholder="Alamat" class="form-control">{{$lokasi->alamat}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-success btn-md">
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
