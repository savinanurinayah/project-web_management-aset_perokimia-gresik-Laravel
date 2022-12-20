@extends('includes.template')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2>Peminjaman</h2>
                <hr>
                <div class="row">
                    <div class="col-6">
                      <div id="reader" width="600px"></div>
                    </div>
                    <form action="" method="get" class="form-horizontal">
                        <div class="card-body card-block">
                            <div class="form-row align-items-center row form-group">
                                <div class="col-4 col-md-7">
                                    <input type="text" id="q" name="q" 
                                        value="{{ request('q') }}" class="form-control">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>
                  <hr>
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
                                        <th>Status</th>
                                        <th>QR Code</th>
                                        <th>Nama Aset</th>
                                        <th>Gambar</th>
                                        <th>Kategori</th>
                                        <th>Lokasi</th>
                                        @if (session('userdata')['status'] == 'ADMIN')
                                            <th>Harga</th>
                                        @else
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php
                                        $no = 1;
                                    @endphp --}}
                                    @foreach ($asets as $aset)
                                        <tr class="text-center">
                                            <td>
                                                <div class="card-text text-sm-center">
                                                    @if ($aset->status_peminjaman)
                                                        <div
                                                            class="alert {{ $aset->status_peminjaman == 'DITERIMA' ? 'alert-success' : 'alert-success' }}">
                                                            {{ $aset->status_peminjaman }}
                                                        </div>
                                                    @else
                                                        @if ($aset->status_peminjaman_pegawai)
                                                            <div class="alert text-dark">
                                                                Aset Sedang Dipinjam
                                                            </div>
                                                        @else
                                                            <button type="button" data-id="{{ $aset->id_aset }}"
                                                                data-nama="{{ $aset->nama_aset }}"
                                                                class="btn btn-md btn-block btn-warning btn-peminjaman">Pinjam</button>
                                                        @endif
                                                    @endif
                                                </div>
                                            </td>
                                            <td><img src="https://chart.googleapis.com/chart?chs=240x240&cht=qr&chl={{ $aset['qr_code'] }}" alt="Kode QR"
                                                class="image-profile table-responsive-sm" width="100px">
                                                <hr>
                                                <a href="" data-toggle="modal" data-target="#exampleModal{{$aset->kode}}">
                                                    {{$aset->nama_aset}}
                                                </a>
                                            </td>
                                            <td>{{ $aset->nama_aset }}</a></td>
                                            <td>
                                                <div class="img-blok" style="min-height: 200px">
                                                    @if ($aset->gambar)
                                                        <img class=" mx-auto d-block"
                                                            src="{{ asset('storage/' . $aset->gambar) }}"
                                                            alt="" width="150px">
                                                    @endif
                                                </div>
                                            </td>
                                            <td>{{ $aset->nama_kategori }}</a></td>
                                            <td>{{ $aset->nama_lokasi }}</a></td>
                                            @if (session('userdata')['status'] == 'ADMIN')
                                                <td>{{ number_format($aset->nilai_aset, 0, ',', '.') }}</td>
                                            @else
                                            @endif
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

    <!-- modal static -->
    <div class="modal fade" id="peminjamanModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{{ asset('backend/img/logo/logo2.png') }}" alt="" width="70px">
                    <h5 class="modal-title" id="staticModalLabel">Form Peminjaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('peminjaman/tambah') }}" id="form-peminjaman" method="post">
                        @csrf
                        <input type="hidden" name="id_aset" value="">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="nama" class=" form-control-label">Nama Aset</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" readonly id="nama" name="nama" placeholder="Nama Aset"
                                    class="form-control">
                            </div>
                            <div class="col col-md-3">
                                <label for="tanggal_peminjaman" class=" form-control-label">Tanggal Peminjaman</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" required id="tanggal_peminjaman" name="tanggal_peminjaman"
                                    placeholder="Tanggal Peminjaman" class="form-control">
                            </div>
                            <div class="col col-md-3">
                                <label for="deadline_pengembalian" class=" form-control-label">Deadline Pengembalian</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" required id="deadline_pengembalian" name="deadline_pengembalian"
                                    placeholder="Deadline Pengembalian" class="form-control">
                            </div>

                            <div class="col col-md-3">
                                <label for="tanggal_pengembalian" class=" form-control-label">Tanggal Pengembalian</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" required id="tanggal_pengembalian" name="tanggal_pengembalian"
                                    placeholder="Tanggal Pengembalian" class="form-control">
                            </div>
                            <div class="col col-md-3">
                                <label for="keperluan" class=" form-control-label">Keperluan</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea required id="keperluan" name="keperluan" placeholder="Keperluan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-left">
                                <button type="submit" class="btn btn-secondary ">
                                    <a href="/peminjaman" class="text-white text-decoration-none">Close</a>
                                </button>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-warning btn-pinjam-aset ">
                                    Pinjam
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($asets as $aset)
    <div class="modal fade" id="exampleModal{{$aset->kode}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <img src="{{ asset('backend/img/logo/logo2.png') }}" alt="" width="70px">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                <img src="https://chart.googleapis.com/chart?chs=240x240&cht=qr&chl={{ $aset['qr_code'] }}" alt="Kode QR"
                class="image-profile table-responsive-sm" width="300px">
                </center>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    @foreach ($asets as $aset)
    <div class="modal fade" id="modalqrcode-{{$aset->kode}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{{ asset('backend/img/logo/logo2.png') }}" alt="" width="70px">
                    <h5 class="modal-title" id="staticModalLabel">QR Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="section__content section__content--p30">
                        <img src="https://chart.googleapis.com/chart?chs=240x240&cht=qr&chl={{ $aset['qr_code'] }}" alt="Kode QR"class="image-profile table-responsive-sm" width="100px">
                    </div>
                    <div class="modal-footer">
                        <div class="text-left">
                            <button type="submit" class="btn btn-secondary ">
                                <a href="/peminjaman" class="text-white text-decoration-none">Close</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
      // handle the scanned code as you like, for example:
      //console.log(`Code matched = ${decodedText}`, decodedResult);
      $("#q").val(decodedText)

    }

    function onScanFailure(error) {
      // handle scan failure, usually better to ignore and keep scanning.
      // for example:
      //console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
      "reader",
      { fps: 10, qrbox: {width: 250, height: 250} },
      /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>
    <!-- end modal static -->
@endsection
