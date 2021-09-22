<div class="modal fade" tabindex="-1" id="barangModal">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">

            <div class="modal-body">
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Barang</h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="text-muted fw-bold fs-5">Tambah / Edit Barang
                    </div>
                    <!--end::Description-->
                </div>
                <form id="submit">
                    <input type="hidden" class="form-control id" name="id" autocomplete="off">
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Nama</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                        </label>
                        <!--end::Label-->
                        <select class="form-select form-select-solid jenis" id="jenis" data-control="select2" data-hide-search="true" data-placeholder="Pilih Aplikasi" name="jenis">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach (jenis_barang() as $value => $text) {
                            ?>
                                <option value="<?= $value; ?>"><?= $text; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Nama</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid nama" placeholder="Enter Target Title" name="nama" />
                        </div>
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Harga Satuan</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid harga_satuan" placeholder="Enter Target Title" name="harga_satuan" />
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Prioritas</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <select class="form-select form-select-solid prioritas" id="prioritas" data-control="select2" data-hide-search="true" data-placeholder="Pilih Aplikasi" name="prioritas">
                                <option value="0">0. Sangat Rendah</option>
                                <option value="1">1. Rendah</option>
                                <option value="2">2. Sedang</option>
                                <option value="3">3. Tinggi</option>
                                <option value="4">4. Sangat Tinggi</option>
                                <option value="5">5. Utama</option>
                            </select>
                        </div>
                        <!--end::Col-->

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
            <h1 class="d-flex text-white fw-bolder my-1 fs-3">Barang</h1>
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
                <li class="breadcrumb-item text-white opacity-75">Master</li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-white opacity-75">Barang</li>
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
            <a class="btn_barang btn btn-bg-white btn-active-color-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">Barang Baru</a>
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
            <div class="card-header border-0 pt-4 mb-5">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <div class="d-flex overflow-auto h-55px">
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                                <?php
                                foreach (jenis_barang() as $value => $text) {
                                    if (empty($_GET)) {
                                        // no data passed by get
                                        $action = "";
                                    } else if ($_GET['jenis'] == $value) {
                                        $action = "active";
                                    } else {
                                        $action = "";
                                    }
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link text-active-primary me-6 <?= $action; ?>" href="<?= base_url() ?>master/barang?jenis=<?= $value; ?>"><?= $value; ?></a>
                                    </li>
                                <?php
                                }
                                ?>
                                <!--begin::Nav item-->

                                <!--end::Nav item-->
                                <!--begin::Nav item-->

                            </ul>
                        </div>
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
                                    <th><?= $this->lang->line('nama'); ?></th>
                                    <th>Stok</th>
                                    <th>Jenis</th>
                                    <th>Harga Satuan</th>
                                    <th>Prioritas</th>
                                    <th><?= $this->lang->line('keterangan'); ?></th>

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
    $(".btn_barang").on("click", function() {
        $("#submit").trigger("reset");
        $(".id").val("")
        $(".jenis").val("").trigger("change")
        $("#barangModal").modal("show")
    })
    $(function() {
        $(".harga_satuan").mask("#.##0", {
            reverse: true
        });
        $(".harga_jaminan").mask("#.##0", {
            reverse: true
        });
        barang_list();
    });

    function barang_list() {
        $.ajax({
            type: 'ajax',
            url: "<?php echo base_url() ?>index.php/master/barang/list?jenis=<?= $_GET['jenis']; ?>",
            async: false,
            dataType: 'json',
            success: function(data) {
                memuat()
                $("tbody#zone_data").empty();
                console.log(data)
                if (data.length === 0) {
                    $("tbody#zone_data").append("<td colspan='10'><?= $this->lang->line('tidak_ada_data'); ?></td>")
                } else {
                    var no = 1
                    for (i = 0; i < data.length; i++) {
                        if (data[i].MASUK == null) {
                            var masuk = 0
                        } else {
                            var masuk = data[i].MASUK
                        }
                        if (data[i].KELUAR == null) {
                            var keluar = 0
                        } else {
                            var keluar = data[i].KELUAR
                        }

                        var total = parseInt(masuk) - parseInt(keluar)

                        $("tbody#zone_data").append("<tr class=''>" +
                            "<td>" + no++ + ".</td>" +
                            "<td>" + data[i].MASTER_BARANG_NAMA + "</td>" +
                            "<td>" + total + "</td>" +
                            "<td>" + data[i].MASTER_BARANG_JENIS + "</td>" +
                            "<td>Rp. " + number_format(data[i].MASTER_BARANG_HARGA_SATUAN) + "</td>" +
                            "<td>" + data[i].MASTER_BARANG_PRIORITAS + "</td>" +
                            "<td>" + data[i].MASTER_BARANG_KETERANGAN + "</td>" +
                            "<td>" +
                            // "<a class='btn btn-danger btn-sm' onclick='hapus(\"" + data[i].MASTER_BARANG_ID + "\")'><i class='fas fa-trash'></i></a> " +
                            "<a class='btn btn-warning btn-sm' onclick='detail(\"" + data[i].MASTER_BARANG_ID + "\")'><i class='fas fa-edit'></i> Edit</a> " +
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

    $('#submit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/master/barang/add',
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                memuat()
            },
            success: function(data) {
                barang_list();
                Swal.fire('Berhasil', 'Jenis Barang berhasil ditambahkan', 'success')
                $("#barangModal").modal("hide")
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
                    url: '<?php echo base_url() ?>index.php/master/barang/hapus/' + id,
                    beforeSend: function() {
                        memuat()
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.length === 0) {} else {
                            barang_list();
                            Swal.fire('Berhasil', 'Jenis Barang Berhasil dihapus', 'success')
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
            url: '<?php echo base_url() ?>index.php/master/barang/detail/' + id,
            beforeSend: function() {
                memuat()
            },
            dataType: 'json',
            success: function(data) {
                memuat()
                $("#barangModal").modal("show")
                $(".jenis").val(data[0].MASTER_BARANG_JENIS).trigger('change')
                $(".satuan").val(data[0].MASTER_BARANG_SATUAN).trigger('change')
                $(".bahan").val(data[0].MASTER_BARANG_BAHAN).trigger('change')
                $(".prioritas").val(data[0].MASTER_BARANG_PRIORITAS).trigger('change')
                $(".id").val(data[0].MASTER_BARANG_ID)
                $(".nama").val(data[0].MASTER_BARANG_NAMA)
                $(".keterangan").val(data[0].MASTER_BARANG_KETERANGAN)
                $(".total").val(data[0].MASTER_BARANG_TOTAL)
                $(".harga_satuan").val(number_format(data[0].MASTER_BARANG_HARGA_SATUAN))
                $(".harga_jaminan").val(number_format(data[0].MASTER_BARANG_HARGA_JAMINAN))


            },
            error: function(x, e) {} //end error
        });
    }

    $('#jenis_filter').change(function() {
        memuat()
        barang_list()
    });
</script>