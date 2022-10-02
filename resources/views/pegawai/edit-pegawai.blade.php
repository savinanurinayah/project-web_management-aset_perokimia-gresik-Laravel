
@extends('includes.template')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div>
                    <a class="btn btn-primary btn-md btn-add float-right mb-3" href="{{ url('/pegawai') }}">
                        <i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3><strong>Edit User</strong></h3>
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
                            $status = $pegawai->status;
                            $div = $pegawai->id_departemen;
                            $jk = $pegawai->jenis_kelamin;
                        @endphp
                        <form action="{{url('pegawai/edit/'.$pegawai->nip_pegawai)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="nip_pegawai" class=" form-control-label">ID. User</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="nip_pegawai" readonly name="nip_pegawai" value="{{$pegawai->nip_pegawai}}" placeholder="ID. User" class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="nama_pegawai" class=" form-control-label">Nama User</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" required id="nama_pegawai" name="nama_pegawai" value="{{$pegawai->nama_pegawai}}" placeholder="Nama User" class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="no_telepon" class=" form-control-label">No. Telepon</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" required id="no_telepon" name="no_telepon" value="{{$pegawai->no_telepon}}" placeholder="No. Telepon" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="jk-input" class="form-control-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <div class="form-check">
                                            <div class="radio">
                                                <label for="jk_l" class="form-check-label ">
                                                    <input type="radio"  {{ $jk == "Laki-laki" ? "checked" : "" }} checked required id="jk_l" name="jk" value="Laki-laki" class="form-check-input">Laki-laki
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="jk_p" class="form-check-label ">
                                                    <input type="radio" {{ $jk == "Perempuan" ? "checked" : "" }} required id="jk_p" name="jk" value="Perempuan" class="form-check-input">Perempuan
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="departemen" class=" form-control-label">Kelas</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="departemen" required id="departemen" class="form-control">
                                            <option value="">Please select</option>
                                            @foreach($departemens as $departemen)
                                            <option value="{{$departemen['id_departemen']}}" {{ $div == $departemen['id_departemen'] ? "selected" : "" }}>{{$departemen['nama']}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                @if(session('userdata')['status'] == 'ADMIN')
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Status</label>
                                    </div>
                                    <div class="col col-md-9">
                                        <div class="form-check">
                                            <div class="radio">
                                                <label for="status_a" class="form-check-label ">
                                                    <input type="radio" {{ $status == "ADMIN" ? "checked" : "" }} checked required id="status_a" name="status" value="ADMIN" class="form-check-input">ADMIN
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="status_u" class="form-check-label ">
                                                    <input type="radio" {{ $status == "USER" ? "checked" : "" }} required id="status_u" name="status" value="USER" class="form-check-input">USER
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endif
                                <div class="row form-group">
                                    <div class="col">
                                        <hr>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="username" class=" form-control-label">Username</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" readonly id="username" value="{{$pegawai->username}}" name="username" placeholder="Username" class="form-control">

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="password" class=" form-control-label">Password</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="password" name="password" placeholder="Password" class="form-control">

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

