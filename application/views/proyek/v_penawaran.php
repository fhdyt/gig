<div class="modal fade" tabindex="-1" id="statusModal">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Status</h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="text-muted fw-bold fs-5">Tambah Status Penawaran
                    </div>
                    <!--end::Description-->
                </div>
                <form id="submit_status">
                    <input type="hidden" class="form-control id_status" name="id_status" value="" autocomplete="off">
                    <!--begin::Input group-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Tanggal</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="date" class="form-control form-control-solid tanggal" placeholder="Enter Target Title" name="tanggal" />
                        </div>


                    </div>
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Status</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid status" placeholder="Enter Target Title" name="status" />
                        </div>
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Keterangan</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid keterangan" placeholder="Enter Target Title" name="keterangan" />
                        </div>

                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="historyModal">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">History</h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="text-muted fw-bold fs-5">Penawaran
                    </div>
                    <!--end::Description-->
                </div>

                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold" id="zone_data_history">

                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->

            </div>
        </div>
    </div>
</div>
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container d-flex flex-stack flex-wrap">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-white fw-bolder my-1 fs-3">Penawaran</h1>
            <!--end::Title-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-white opacity-75">
                    <a href="../../demo2/dist/index.html" class="text-white text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-white opacity-75">Proyek</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-white opacity-75">Penawaran</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <div class="d-flex align-items-center py-3 py-md-1">
            <!--begin::Wrapper-->
            <div class="me-4">

                <!--end::Menu-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Button-->
            <a href="<?= base_url(); ?>proyek/penawaran/form_penawaran" class=" btn btn-bg-white btn-active-color-primary">Penawaran Baru</a>
            <!--end::Button-->
        </div>
        <!--end::Actions-->
        <!--end::Page title-->

    </div>
    <!--end::Container-->
</div>

<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container">
    <!--begin::Post-->
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-880px ps-14" placeholder="Search user">
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

                    </div>
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <div class="card-body pt-0">
                <!--begin::Table-->
                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th>No.</th>
                                    <th>Nomor Penawaran</th>
                                    <th>Jenis</th>
                                    <th>Tanggal</th>
                                    <th>Relasi</th>
                                    <th>PPN</th>
                                    <th>PPh</th>
                                    <th>Nilai</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold" id="zone_data">

                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>

                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Post-->
</div>
<script>
    $(".btn_relasi").on("click", function() {
        $("#submit").trigger("reset");
        $(".id").val("")
        $("#relasiModal").modal("show")
    })
    $(function() {
        penawaran_list();
    });

    $(".filter").on("click", function() {
        memuat()
        penawaran_list();
    })
    $('.nama_relasi').keyup(function(e) {
        if (e.keyCode == 13) {
            memuat()
            penawaran_list()
        }
    });

    function penawaran_list() {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url() ?>index.php/proyek/penawaran/list",
            async: false,
            dataType: 'json',
            data: {
                nama_relasi: $(".nama_relasi").val()
            },
            success: function(data) {
                $("tbody#zone_data").empty();
                memuat()
                console.log(data)
                if (data.length === 0) {
                    $("tbody#zone_data").append("<td colspan='10'><?= $this->lang->line('tidak_ada_data'); ?></td>")
                } else {
                    var no = 1
                    for (i = 0; i < data.length; i++) {
                        if (data[i].STATUS.length === 0) {
                            var status = '-'
                        } else {
                            var status = data[i].STATUS[0].PENAWARAN_STATUS
                        }

                        if (parseInt(data[i].PENAWARAN_PPN) > 0) {
                            var ppn = 'x'
                        } else {
                            var ppn = ''
                        }
                        if (parseInt(data[i].PENAWARAN_PPH) > 0) {
                            var pph = 'x'
                        } else {
                            var pph = ''
                        }
                        console.log(parseInt(data[0].PENAWARAN_PPH))
                        $("tbody#zone_data").append("<tr class=''>" +
                            "<td>" + no++ + ".</td>" +
                            "<td>" + data[i].PENAWARAN_NOMOR + "</td>" +
                            "<td>" + data[i].PENAWARAN_JENIS + "</td>" +
                            "<td>" + data[i].TANGGAL + "</td>" +
                            "<td>" + data[i].RELASI[0].MASTER_RELASI_NAMA + "</td>" +
                            "<td>" + ppn + "</td>" +
                            "<td>" + pph + "</td>" +
                            "<td>" + data[i].PENAWARAN_GRANDTOTAL + "</td>" +
                            "<td>" + status + "<br></td>" +
                            "<td>" +
                            "<a class='btn btn-success btn-sm mb-2' onclick='status(\"" + data[i].PENAWARAN_ID + "\")'>Status</a> " +
                            "<a class='btn-sm mb-2 btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary' onclick='history(\"" + data[i].PENAWARAN_ID + "\")'>History</a> " +
                            "<a class='btn btn-primary btn-sm mb-2 ' href='<?= base_url(); ?>proyek/penawaran/form_penawaran/" + data[i].PENAWARAN_ID + "?'>Lihat</a> " +
                            "</td>" +
                            "</tr>");
                    }
                }
            },
            error: function(x, e) {
                console.log("Gagal")
            }
        });
    }

    // $("form#submit").on("submit", function(e) {

    //     console.log($(this).serialize())
    // })

    $('#submit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/master/relasi/add',
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                memuat()
            },
            success: function(data) {
                relasi_list();
                Swal.fire('Berhasil', 'Relasi berhasil ditambahkan', 'success')
                $("#relasiModal").modal("hide")
            }
        });
    })
    $('#submit_status').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/proyek/penawaran/add_status',
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                memuat()
            },
            success: function(data) {}
        });
    })

    function hapus(id) {
        console.log(id)
        Swal.fire({
            title: '<?= $this->lang->line('hapus'); ?> ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: `<?= $this->lang->line('hapus'); ?>`,
            denyButtonText: `Batal`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'ajax',
                    url: '<?php echo base_url() ?>index.php/master/relasi/hapus/' + id,
                    beforeSend: function() {
                        memuat()
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.length === 0) {} else {
                            relasi_list();
                            Swal.fire('Berhasil', 'Relasi Berhasil dihapus', 'success')
                        }
                    },
                    error: function(x, e) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Proses Gagal'
                        })
                    } //end error
                });

            }
        })
    }

    function status(id) {
        $("#statusModal").modal("show")
        $(".id_status").val(id)

    }

    function history(id) {
        $("#historyModal").modal("show")
        $("tbody#zone_data_history").empty();
        $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>index.php/proyek/penawaran/status_list/' + id,
            beforeSend: function() {
                memuat()
            },
            dataType: 'json',
            success: function(data) {
                console.log('adf')
                if (data.length === 0) {
                    $("tbody#zone_data_history").append("<td colspan='10'>Belum ada perubahan status Penawaran</td>")
                } else {
                    var no = 1
                    for (i = 0; i < data.length; i++) {

                        $("tbody#zone_data_history").append("<tr class=''>" +
                            "<td>" + no++ + ".</td>" +
                            "<td>" + data[i].TANGGAL + "</td>" +
                            "<td>" + data[i].PENAWARAN_STATUS + "</td>" +
                            "<td>" + data[i].PENAWARAN_STATUS_KETERANGAN + "</td>" +
                            "</tr>");
                    }
                }
            },
            error: function(x, e) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Proses Gagal'
                })
            } //end error
        });
    }

    function detail(id) {
        $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>index.php/master/relasi/detail/' + id,
            beforeSend: function() {
                memuat()
            },
            dataType: 'json',
            success: function(data) {
                memuat()
                $(".id").val(data[0].MASTER_RELASI_ID)
                $(".qr_id").val(data[0].MASTER_RELASI_QR_ID)
                $(".nama").val(data[0].MASTER_RELASI_NAMA)
                $(".alamat").val(data[0].MASTER_RELASI_ALAMAT)
                $(".hp").val(data[0].MASTER_RELASI_HP)
                $(".npwp").val(data[0].MASTER_RELASI_NPWP)
                $(".ktp").val(data[0].MASTER_RELASI_KTP)

                $("#relasiModal").modal("show")
            },
            error: function(x, e) {} //end error
        });
    }
</script>