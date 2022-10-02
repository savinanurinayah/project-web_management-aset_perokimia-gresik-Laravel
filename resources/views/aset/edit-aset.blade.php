@extends('includes.template')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <a class="btn btn-primary btn-md btn-add float-right mb-3" href="{{ url('/aset') }}">
                        <i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3><strong>Edit Aset</strong></h3>
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
                        @php
                            $id_kategori = $aset->id_kategori;
                            $id_lokasi = $aset->id_lokasi;
                            $nip_pegawai = $aset->nip_pegawai;
                        @endphp
                        <form action="{{url('aset/edit/'.$aset->id_aset)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="kode" class=" form-control-label">Kode Aset</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" required id="kode" name="kode" value="{{$aset->kode}}" placeholder="Kode Aset" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="nama" class=" form-control-label">Nama Inventaris</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" required id="nama" name="nama" value="{{$aset->nama_aset}}" placeholder="Nama Inventaris" class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="id_kategori" class=" form-control-label">Kategori</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="id_kategori" required id="id_kategori" class="form-control">
                                            <option value="">Please select</option>
                                            @foreach($kategoris as $kategori)
                                            <option value="{{$kategori['id_kategori']}}" {{ $id_kategori == $kategori['id_kategori'] ? "selected" : "" }}>{{$kategori['nama']}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="tanggal_pembelian" class=" form-control-label">Tanggal Pembelian</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="date" required id="tanggal_pembelian" name="tanggal_pembelian" value="{{$aset->tanggal_pembelian}}" placeholder="Tanggal Pembelian" class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="nilai_aset" class=" form-control-label">Nilai Inventaris</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" required id="nilai_aset" name="nilai_aset" value="{{$aset->nilai_aset}}" placeholder="Nilai Inventaris" class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="lokasi_aset" class=" form-control-label">Lokasi Inventaris</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="lokasi_aset" required id="lokasi_aset" class="form-control">
                                            <option value="">Please select</option>
                                            @foreach($lokasis as $lokasi)
                                            <option value="{{$lokasi['id_lokasi']}}" {{ $id_lokasi == $lokasi['id_lokasi'] ? "selected" : "" }}>{{$lokasi['nama']}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="detail_aset" class=" form-control-label">Keterangan Inventaris</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea required id="detail_aset" name="detail_aset" placeholder="Detail Inventaris" class="form-control">{{$aset->detail_aset}}</textarea>

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="gambar" class=" form-control-label">Gambar</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        @if($aset->gambar)
                                        <img class="img-thumbnail" src="{{asset('storage/'.$aset->gambar)}}" alt="" width="100px">
                                        @endif
                                        <input type="file" id="gambar" name="gambar" placeholder="Gambar" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="kondisi" class=" form-control-label">Kondisi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="kondisi" required id="kondisi" class="form-control">
                                            <option value="">Please select</option>
                                            @foreach($kondisis as $kond)
                                            <option value="{{$kond}}" {{ $kond == $aset['kondisi'] ? "selected" : "" }}>{{$kond}}</option>
                                            @endforeach
                                        </select>

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
