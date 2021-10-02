<div class="modal fade" tabindex="-1" id="akunModal">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">

            <div class="modal-body">
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Transaksi</h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="text-muted fw-bold fs-5">Tambah Transaksi
                    </div>
                    <!--end::Description-->
                </div>
                <form id="submit">
                    <input type="hidden" class="form-control id" name="id" autocomplete="off">
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Tanggal</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                        </label>
                        <!--end::Label-->
                        <input type="date" class="form-control form-control-solid tanggal" placeholder="Enter Target Title" name="tanggal" value="<?= date("Y-m-d"); ?>" />
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Debet</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid debet" placeholder="Enter Target Title" name="debet" />
                        </div>
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Kredit</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid kredit" placeholder="Enter Target Title" name="kredit" />
                        </div>
                        <!--end::Col-->

                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Penawaran</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                        </label>
                        <!--end::Label-->
                        <select name="penawaran" id="penawaran" class="form-select form-select-solid penawaran select2" style="width: 100%;">
                            <option value="">-</option>
                            <?php foreach (proyek_list() as $row) {
                            ?>
                                <option value="<?= $row->PENAWARAN_ID; ?>"><?= $row->PENAWARAN_NOMOR; ?> - <?= $row->RELASI[0]->MASTER_RELASI_NAMA; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Keterangan</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid keterangan" placeholder="Enter Target Title" name="keterangan" />
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
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container d-flex flex-stack flex-wrap">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-white fw-bolder my-1 fs-3">Kas Proyek</h1>
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
                <li class="breadcrumb-item text-white opacity-75">Akuntansi</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-white opacity-75">Proyek</li>
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
            <a class="btn_user btn btn-bg-white btn-active-color-primary btn_akun" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">Tambah</a>
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
            <div class="card-body pt-6">
                <!--begin::Table-->
                <div class="row g-9 mb-8">
                    <!--begin::Col-->
                    <div class="col-md-3">
                        <select name="akun" id="akun" class="form-select form-select-solid menu_filter select2 akun" style="width: 100%;" required>
                            <option value="">-- Nomor --</option>
                            <?php foreach (proyek_list() as $row) {
                            ?>
                                <option value="<?= $row->PENAWARAN_ID; ?>"><?= $row->PENAWARAN_NOMOR; ?> - <?= $row->RELASI[0]->MASTER_RELASI_NAMA; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control form-control-solid tanggal_dari" placeholder="Enter Target Title" name="tanggal_dari" value="<?= date("Y-m-d"); ?>" />
                    </div>
                    <!--begin::Col-->
                    <div class="col-md-3">
                        <input type="date" class="form-control form-control-solid tanggal_sampai" placeholder="Enter Target Title" name="tanggal_sampai" value="<?= date("Y-m-d"); ?>" />
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary filter_tanggal mb-2 mr-2"><i class="fas fa-search"></i> Lihat </button>
                        <!-- <button type="button" class="btn btn-success btn_transfer mb-2"><i class="fas fa-exchange-alt"></i> Transfer</button> -->
                    </div>
                    <!--end::Col-->

                </div>
                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">

                                    <th><?= $this->lang->line('tanggal'); ?></th>
                                    <th><?= $this->lang->line('keterangan'); ?></th>
                                    <th>Akun</th>
                                    <th>Debet</th>
                                    <th>Kredit</th>
                                    <th>Saldo</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <tbody class="text-gray-600 fw-bold" id="zone_saldo_awal">
                                <tr>
                                </tr>
                            </tbody>
                            <tbody class="text-gray-600 fw-bold" id="zone_data">
                                <tr>
                                </tr>
                            </tbody>
                            <tfoot class="text-gray-600 fw-bold" id="total_buku_besar">
                                <tr>
                                </tr>
                            </tfoot>
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
    $(".btn_akun").on("click", function() {
        $("#submit").trigger("reset");
        $(".id").val("")
        if ($(".akun").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan pilih Akun terlebih dahulu'
            })
        } else {
            $("#akunModal").modal("show")
        }

    })
    $(".btn_transfer").on("click", function() {
        $("#submit_transfer").trigger("reset");
        $("#transferModal").modal("show")


    })

    $(function() {
        $(".rupiah").mask("#.##0", {
            reverse: true
        });
        $(".kredit").mask("#.##0", {
            reverse: true
        });
        $(".debet").mask("#.##0", {
            reverse: true
        });
        buku_besar_list();
    });

    function buku_besar_list() {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url() ?>index.php/akuntansi/proyek/list?akun=" + $(".akun").val() + "",
            async: false,
            dataType: 'json',
            data: {
                tanggal_dari: $('.tanggal_dari').val(),
                tanggal_sampai: $('.tanggal_sampai').val(),
            },
            success: function(data) {
                $("tbody#zone_saldo_awal").empty();
                $("tbody#zone_data").empty();
                $("tfoot#total_buku_besar").empty()
                memuat()
                console.log(data)
                if ($(".akun").val() == "") {
                    $("tbody#zone_data").append("<td colspan='10'>Silahkan pilih Jenis Akun terlebih dahulu.</td>")
                }
                if (data.length === 0) {

                } else {
                    var no = 1
                    if (data['saldo_awal'][0].DEBET == null) {
                        var saldo_awal_debet = 0
                    } else {
                        var saldo_awal_debet = data['saldo_awal'][0].DEBET
                    }
                    if (data['saldo_awal'][0].KREDIT == null) {
                        var saldo_awal_kredit = 0
                    } else {
                        var saldo_awal_kredit = data['saldo_awal'][0].KREDIT
                    }
                    var saldo_awal = parseInt(saldo_awal_debet) - parseInt(saldo_awal_kredit)
                    // var saldo_awal = parseInt(data['saldo_awal'][0].DEBET) - parseInt(data['saldo_awal'][0].KREDIT)
                    console.log(saldo_awal)
                    $("tbody#zone_saldo_awal").append("<tr class=''>" +
                        "<td colspan='5' style='text-align:right; vertical-align:middle;'><b>Saldo Awal</b></td>" +
                        "<td>" + number_format(saldo_awal) + "</td>" +
                        "</tr>");
                    var saldo = 0 + saldo_awal
                    var total_debet = 0
                    var total_kredit = 0
                    for (i = 0; i < data['data'].length; i++) {
                        saldo += parseInt(data['data'][i].SALDO)

                        if (data['data'][i].BUKU_BESAR_REF == "") {
                            var btn_hapus = ""
                            //var btn_hapus = "<td><a class='btn btn-danger btn-sm' onclick='hapus(\"" + data['data'][i].BUKU_BESAR_ID + "\")'><i class='fas fa-trash'></i></a></td>"
                        } else {
                            var btn_hapus = ""
                        }

                        if (data['data'][i].PENAWARAN.length === 0) {
                            var penawaran = ""
                        } else {
                            var penawaran = data['data'][i].PENAWARAN[0].AKUN_NAMA
                        }


                        total_debet += parseInt(data['data'][i].BUKU_BESAR_DEBET)
                        total_kredit += parseInt(data['data'][i].BUKU_BESAR_KREDIT)

                        $("tbody#zone_data").append("<tr class=''>" +
                            "<td>" + data['data'][i].TANGGAL + "</td>" +
                            "<td>" + data['data'][i].BUKU_BESAR_KETERANGAN + "</td>" +
                            "<td>" + penawaran + "</td>" +
                            "<td>" + number_format(data['data'][i].BUKU_BESAR_DEBET) + "</td>" +
                            "<td>" + number_format(data['data'][i].BUKU_BESAR_KREDIT) + "</td>" +
                            "<td>" + number_format(saldo) + "</td>" +
                            btn_hapus +
                            "</tr>");
                    }
                    $("tfoot#total_buku_besar").append("<tr><td colspan='3' style='text-align:right; vertical-align:middle;'><b>Total</b></td><td>" + number_format(total_debet) + "</td><td>" + number_format(total_kredit) + "</td></tr>")
                }
            },
            error: function(x, e) {
                console.log("Gagal")
            }
        });
    }

    $('#submit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/akuntansi/proyek/add?akun=' + $(".akun").val() + '',
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                memuat()
            },
            success: function(data) {
                buku_besar_list();
                Swal.fire('Berhasil', '', 'success')
                $("#akunModal").modal("hide")
            }
        });
    })

    $('#submit_transfer').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/akuntansi/proyek/transfer',
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                memuat()
            },
            success: function(data) {
                buku_besar_list();
                Swal.fire('Berhasil', '', 'success')
                $("#transferModal").modal("hide")
            }
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
                    url: '<?php echo base_url() ?>index.php/akuntansi/proyek/hapus/' + id,
                    beforeSend: function() {
                        memuat()
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.length === 0) {} else {
                            buku_besar_list();
                            Swal.fire('Berhasil', 'DBerhasil dihapus', 'success')
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

    function detail(id) {
        $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>index.php/master/kas_kecil/detail/' + id,
            beforeSend: function() {
                memuat()
            },
            dataType: 'json',
            success: function(data) {
                memuat()
                $(".id").val(data[0].MASTER_DRIVER_ID)
                $(".nama").val(data[0].MASTER_DRIVER_NAMA)
                $(".alamat").val(data[0].MASTER_DRIVER_ALAMAT)
                $(".hp").val(data[0].MASTER_DRIVER_HP)
                $(".sim").val(data[0].MASTER_DRIVER_SIM)
                $(".ktp").val(data[0].MASTER_DRIVER_KTP)

                $("#driverModal").modal("show")
            },
            error: function(x, e) {} //end error
        });
    }
    $('.akun').change(function() {
        memuat()
        buku_besar_list()
    });
    $('.jenis_pengeluaran').change(function() {
        if ($('.jenis_pengeluaran').val() == "Uang Jalan") {
            $(".uang_jalan").attr("hidden", false)
            $(".nomor_surat_jalan").attr("required", true)

            $(".userfile").attr("hidden", true)
            $(".userfile").attr("required", false)
        } else {
            $(".uang_jalan").attr("hidden", true)
            $(".nomor_surat_jalan").attr("required", false)

            $(".userfile").attr("hidden", false)
            $(".userfile").attr("required", true)
        }
    });

    $('.filter_tanggal').on("click", function() {
        if ($(".akun").val() == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Silahkan pilih Akun terlebih dahulu'
            })
        } else {
            memuat()
            buku_besar_list()
        }

    });
</script>