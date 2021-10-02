<?php
if (empty($this->uri->segment('4'))) {
    $id = create_id();
} else {
    $id = $this->uri->segment('4');
}

?>
<div class="modal fade" tabindex="-1" id="detailModal">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">

            <div class="modal-body">
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Detail Penawaran</h1>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="text-muted fw-bold fs-5">Tambahkan Detail Penawaran
                    </div>
                    <!--end::Description-->
                </div>
                <form id="submit_detail">
                    <input type="hidden" class="form-control id" name="id" value="<?= $id; ?>" autocomplete="off">
                    <!--begin::Input group-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Judul</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid judul" placeholder="Enter Target Title" name="judul" />
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
                    <div class="row g-9 mb-8">
                        <div class="col-md-12 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Rupiah</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid rupiah" placeholder="Enter Target Title" name="rupiah" />
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
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container d-flex flex-stack flex-wrap">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-white fw-bolder my-1 fs-3">Form Penawaran</h1>
            <!--end::Title-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-white opacity-75">
                    <a href="<?= base_url() ?>" class="text-white text-hover-primary">Home</a>
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
                <li class="breadcrumb-item">
                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-white opacity-75">Form Penawaran</li>
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
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Penawawan</h3>
                </div>
                <!--end::Card title-->
            </div>
            <div id="kt_account_profile_details" class="collapse show">
                <!--begin::Form-->
                <form id="submit" class="form">
                    <input type="hidden" class="form-control id" name="id" value="<?= $id; ?>" autocomplete="off">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->


                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Nomor Penawaran</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="nomor_penawaran" id="nomor_penawaran" class="nomor_penawaran form-control form-control-lg form-control-solid" placeholder="Company name" value="" readonly />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">Tanggal</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="date" name="tanggal" id="tanggal" class="tanggal form-control form-control-lg form-control-solid" placeholder="Phone number" value="<?= date('Y-m-d'); ?>" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">Relasi</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <select name="relasi" id="relasi" aria-label="Select a Country" data-control="select2" data-placeholder="Select a country..." class="relasi form-select form-select-solid form-select-lg fw-bold">
                                    <option value="">Pilih Relasi...</option>
                                    <?php foreach (relasi_list() as $row) {
                                    ?>
                                        <option value="<?= $row->MASTER_RELASI_ID; ?>"><?= $row->MASTER_RELASI_NAMA; ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Jenis Penawaran</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="jenis" id="jenis" class="jenis form-control form-control-lg form-control-solid" placeholder="Company website" value="" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Dokumen</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="file" name="userfile" id="userfile" class="userfile form-control form-control-lg form-control-solid" />
                                <input type="hidden" name="userfile_name" class="form-control userfile_name">
                                <a href="#" target="_blank" hidden class="text-gray-800 text-hover-primary d-flex flex-column link_dokument">
                                    <!--begin::Image-->
                                    <div class="symbol symbol-60px mb-5">
                                        <img src="<?= base_url() ?>assets/files/doc.svg" alt="" />
                                    </div>
                                    <!--end::Title-->
                                    <div class="fs-5 fw-bolder mb-2">Buka file</div>
                                </a>
                            </div>
                            <!--end::Col-->
                        </div>

                        <!--begin::Input group-->

                        <!--begin::Input group-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->

            </div>
        </div>
        <!--end::Card-->
        <div class="card mb-5 mb-xl-10" hidden>
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Detail Penawaran</h3>
                </div>
                <!--end::Card title-->
            </div>
            <div id="kt_account_profile_details" class="collapse show">
                <!--begin::Form-->
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <a class="btn_detail btn btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">Tambah Detail</a>
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Keterangan</th>
                                <th>Rupiah</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-bold" id="zone_data">

                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->

            </div>
        </div>
        <!--end::Card-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Nilai Penawawan</h3>
                </div>
                <!--end::Card title-->
            </div>
            <div id="kt_account_profile_details" class="collapse show">
                <!--begin::Form-->
                <!--begin::Card body-->
                <div class="card-body border-top p-9">

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="required">Total</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="total" class="total form-control form-control-lg form-control-solid" placeholder="Phone number" value="044 3276 454 935" onkeyup="kalkulasi()" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="required">Diskon</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="diskon" class="diskon form-control form-control-lg form-control-solid" value="0" onkeyup="kalkulasi()" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="required">PPN</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                        </label>
                        <!--end::Label-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px ppn" name="ppn" type="checkbox" id="allowmarketing" onchange="kalkulasi()" />
                                <label class="form-check-label" for="allowmarketing"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="required">PPH</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                        </label>
                        <!--end::Label-->
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px pph" name="pph" type="checkbox" id="allowmarketing" onchange="kalkulasi()" />
                                <label class="form-check-label" for="allowmarketing"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            <span class="required">Grand Total</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="grandtotal" class="grandtotal form-control form-control-lg form-control-solid" placeholder="Phone number" value="044 3276 454 935" />
                        </div>
                        <!--end::Col-->
                    </div>


                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
                </div>
                <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Post-->
</div>
<script>
    $(".btn_detail").on("click", function() {
        $("#detailModal").modal("show")
    })
    $(function() {
        detail();
        // detail_list();
    });

    $(".filter").on("click", function() {
        memuat()
        relasi_list();
    })
    $('.nama_relasi').keyup(function(e) {
        if (e.keyCode == 13) {
            memuat()
            relasi_list()
        }
    });

    function relasi_list() {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url() ?>index.php/master/relasi/list",
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

                        $("tbody#zone_data").append("<tr class=''>" +
                            "<td>" + no++ + ".</td>" +
                            "<td>" + data[i].MASTER_RELASI_NAMA + "</td>" +
                            "<td>" + data[i].MASTER_RELASI_ALAMAT + "<br>(" + data[i].MASTER_RELASI_HP + ")</td>" +
                            "<td>" +
                            // "<a class='btn btn-danger btn-sm mb-2' onclick='hapus(\"" + data[i].MASTER_RELASI_ID + "\")'><i class='fas fa-trash'></i></a> " +

                            "<a class='btn btn-warning btn-sm mb-2' onclick='detail(\"" + data[i].MASTER_RELASI_ID + "\")'><i class='fas fa-edit'></i> Edit</a> " +
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
            url: '<?php echo base_url(); ?>index.php/proyek/penawaran/add',
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                memuat()
            },
            success: function(data) {
                window.location.href = '<?= base_url(); ?>proyek/penawaran/form_penawaran/<?= $id; ?>'
            }
        });
    })
    $('#submit_detail').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/proyek/penawaran/add_detail',
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                memuat()
            },
            success: function(data) {
                $("#detailModal").modal("show")
                detail_list()
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
                    url: '<?php echo base_url() ?>index.php/proyek/penawaran/hapus/' + id,
                    beforeSend: function() {
                        memuat()
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.length === 0) {} else {
                            detail_list();
                            Swal.fire('Berhasil', 'Berhasil dihapus', 'success')
                            kalkulasi()
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
            url: '<?php echo base_url() ?>index.php/proyek/penawaran/detail/<?= $id; ?>',
            beforeSend: function() {
                memuat()
            },
            dataType: 'json',
            success: function(data) {
                memuat()
                if (data.length == 0) {
                    console.log('kosong')
                    $(".link_dokument").attr("style", "visibility: hidden;")
                } else {
                    $(".nomor_penawaran").val(data[0].PENAWARAN_NOMOR)
                    $(".tanggal").val(data[0].PENAWARAN_TANGGAL)
                    $(".jenis").val(data[0].PENAWARAN_JENIS)
                    $(".relasi").val(data[0].MASTER_RELASI_ID).trigger("change")
                    $(".diskon").val(data[0].PENAWARAN_DISKON)
                    $(".total").val(data[0].PENAWARAN_TOTAL)
                    $(".userfile_name").val(data[0].PENAWARAN_FILE)
                    if (data[0].PENAWARAN_FILE == "") {
                        console.log('kosong')

                    } else {
                        $(".link_dokument").attr("href", "<?= base_url(); ?>uploads/pembelian/" + data[0].PENAWARAN_FILE + "")
                    }

                    if (data[0].PENAWARAN_PPN != 0) {
                        $(".ppn").attr("checked", true)
                    }
                    if (data[0].PENAWARAN_PPH != 0) {
                        $(".pph").attr("checked", true)
                    }
                    kalkulasi()
                }

            },
            error: function(x, e) {} //end error
        });
    }

    function detail_list() {
        $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>index.php/proyek/penawaran/detail_list/<?= $id; ?>',
            beforeSend: function() {
                memuat()
            },
            dataType: 'json',
            success: function(data) {
                $("tbody#zone_data").empty()
                var no = 1
                var total = 0
                for (i = 0; i < data.length; i++) {
                    total += parseInt(data[i].PENAWARAN_DETAIL_TOTAL)
                    $("tbody#zone_data").append("<tr class=''>" +
                        "<td>" + no++ + ".</td>" +
                        "<td>" + data[i].PENAWARAN_DETAIL_JUDUL + "</td>" +
                        "<td>" + data[i].PENAWARAN_DETAIL_KETERANGAN + "</td>" +
                        "<td>" + data[i].PENAWARAN_DETAIL_TOTAL + "</td>" +
                        "<td><a class='btn btn-danger mb-2 btn-sm btn-block' onclick='hapus(\"" + data[i].PENAWARAN_DETAIL_ID + "\")'><i class='fas fa-trash'></i> Hapus</a> " +
                        "</td>" +
                        "</tr>");
                }
                $('.total').val(total)
                kalkulasi()
            },
            error: function(x, e) {} //end error
        });
    }

    function kalkulasi() {
        var total = parseInt($(".total").val())
        var diskon = parseInt($(".diskon").val())
        var t_total = total - diskon
        if ($(".ppn").prop("checked") == true) {
            var ppn = total * 10 / 100
        } else {
            var ppn = total * 0
        }
        if ($(".pph").prop("checked") == true) {
            var pph = total * 10 / 100
        } else {
            var pph = total * 0
        }

        var grandtotal = t_total + ppn + pph
        console.log(grandtotal)
        $(".grandtotal").val(grandtotal)

    }
</script>