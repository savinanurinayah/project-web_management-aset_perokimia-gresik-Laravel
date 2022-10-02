<script src="{{ asset('backend/') }}/vendor/jquery/jquery.min.js"></script>
<script src="{{ asset('backend/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('backend/') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="{{ asset('backend/') }}/js/ruang-admin.min.js"></script>
<script src="{{ asset('backend/') }}/vendor/chart.js/Chart.min.js"></script>
<script src="{{ asset('backend/') }}/js/demo/chart-area-demo.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    $(document).ready(function() {
        $(".btn-peminjaman").click(function(e) {
            e.preventDefault();
            let id_aset = $(this).attr("data-id");
            let nama_aset = $(this).attr("data-nama");
            // console.log('nama_aset', nama_aset);
            $("#form-peminjaman [name=id_aset]").val(id_aset);
            $("#form-peminjaman [name=nama]").val(nama_aset);
            $("#peminjamanModal").modal("show");
        })

        $(".btn-terima, .btn-tolak, .btn-selesai").click(function(e) {
            e.preventDefault();
            let status = $(this).attr('data-status');
            let id_peminjaman = $(this).attr('data-id');
            swal({
                    title: "Yakin?",
                    text: "Kamu ingin merubah status menjadi " + status.toLocaleUpperCase() + "?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willCencel) => {
                    if (willCencel) {
                        let link = $(this).attr("data-href");
                        window.location.href = link;
                        swal("Data Berhasil Diubah!", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi diubah!");
                    }
                });
        })

    })
</script>
<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
                title: "Yakin?",
                text: "Kamu ingin menghapus data",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willCencel) => {
                if (willCencel) {
                    window.location.href = urlToRedirect;
                    swal("Data Berhasil Dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus!");
                }
            });
    }
</script>
