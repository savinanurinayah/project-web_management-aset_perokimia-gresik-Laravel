@extends('includes.template')
@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4 ">
                <a href="{{ url('/pegawai') }}" class="text-decoration-none">
                    <div class="card h-100 bg-gradient-warning">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center ">
                                <div class="col mr-2 ">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1 text-white">User</div>
                                    <div class="h2 font-weight-bold text-white ">{{ $total_pegawai }}</div>
                                </div>
                            <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ url('/departemen') }}" class="text-decoration-none">
                    <div class="card h-100 bg-gradient-warning">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1 text-white">Departemen</div>
                                    <div class="h2 mb-0 font-weight-bold text-white">{{ $total_departemen }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-building-o fa-2x text-gradient-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ url('/aset') }}" class="text-decoration-none">
                    <div class="card h-100 bg-gradient-warning">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1 text-white">Aset</div>
                                    <div class="h2 mb-0 font-weight-bold text-white">{{ $total_aset }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-briefcase fa-2x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ url('/peminjaman') }}" class="text-decoration-none">
                    <div class="card h-100 bg-gradient-warning">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1 text-white">Peminjaman</div>
                                    {{-- <div class="h2 mb-0 font-weight-bold text-gray-800">{{ $total_peminjaman }}</div> --}}

                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-asl-interpreting fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
        <!--Row-->



        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to logout?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                        <a href="login.html" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!---Container Fluid-->
    </div>
@endsection
