<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container d-flex flex-stack flex-wrap">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-white fw-bolder my-1 fs-3">Akses User</h1>
            <!--end::Title-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <li class="breadcrumb-item text-white opacity-75">
                    <a href="../../demo2/dist/index.html" class="text-white text-hover-primary">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-white opacity-75">Sistem</li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-white opacity-75">User</li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-white opacity-75">Akses User</li>
            </ul>
            <!--end::Breadcrumb-->
        </div>
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
                        <select class="form-select form-select-solid menu_filter" id="menu_filter" data-control="select2" data-hide-search="true" data-placeholder="Pilih Aplikasi" name="team_assign">
                            <option value=""><?= $this->lang->line('semua'); ?></option>

                            <?php
                            foreach ($aplikasi as $row) {
                            ?>
                                <option value="<?= $row->APLIKASI_ID; ?>"><?= $row->APLIKASI_NAMA; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->

            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
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
                                    <th>Aplikasi</th>
                                    <th>Menu</th>
                                    <th>Aplikasi</th>
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
                    </div>

                </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Post-->
</div>
<script>
    $(".btn_user").on("click", function() {
        $("#submit").trigger("reset");
        $("#userModal").modal("show")
    })
    $(function() {
        menu_list();
        perusahaan_list();
    });

    function menu_list() {
        $.ajax({
            type: 'ajax',
            url: "<?php echo base_url() ?>index.php/sistem/user/menu_list/<?php echo $this->uri->segment('4'); ?>?menu_filter=" + $(".menu_filter").val(),
            async: false,
            dataType: 'json',
            success: function(data) {
                $("tbody#zone_data").empty();
                memuat()
                console.log(data)
                if (data.length === 0) {} else {
                    var no = 1
                    for (i = 0; i < data.length; i++) {
                        if (data[i].STATUS == "AKTIF") {
                            var tr = "table-success"
                        } else {
                            var tr = "table-default"
                        }
                        $("tbody#zone_data").append("<tr class='" + tr + "'>" +
                            "<td>" + no++ + ".</td>" +
                            "<td>" + data[i].APLIKASI_NAMA + "</td>" +
                            "<td>" + data[i].MENU_NAMA + "</td>" +
                            "<td>" + data[i].MENU_LINK + "</td>" +
                            "<td><a class='btn btn-primary' onclick='akses(\"" + data[i].MENU_ID + "\")'><i class='fas fa-thumbs-up'></i></a></td>" +
                            "</tr>");
                    }
                }
            },
            error: function(x, e) {
                console.log("Gagal")
            }
        });
    }

    function perusahaan_list() {
        $.ajax({
            type: 'ajax',
            url: "<?php echo base_url() ?>index.php/sistem/user/perusahaan_list/<?php echo $this->uri->segment('4'); ?>?menu_filter=" + $(".menu_filter").val(),
            async: false,
            dataType: 'json',
            success: function(data) {
                $("tbody#zone_data_perusahaan").empty();
                console.log(data)
                if (data.length === 0) {} else {
                    var no = 1
                    for (i = 0; i < data.length; i++) {
                        if (data[i].STATUS == "AKTIF") {
                            var tr = "table-success"
                        } else {
                            var tr = "table-default"
                        }
                        $("tbody#zone_data_perusahaan").append("<tr class='" + tr + "'>" +
                            "<td>" + data[i].PERUSAHAAN_KODE + "<br><small class='text-muted'>" + data[i].PERUSAHAAN_NAMA + "</small></td>" +
                            "<td><a class='btn btn-primary btn-sm' onclick='akses_perusahaan(\"" + data[i].PERUSAHAAN_KODE + "\")'><i class='fas fa-thumbs-up'></i></a></td>" +
                            "</tr>");
                    }
                }
            },
            error: function(x, e) {
                console.log("Gagal")
            }
        });
    }

    // function aplikasi_list() {
    //     $.ajax({
    //         type: 'ajax',
    //         url: "<?php echo base_url() ?>index.php/sistem/aplikasi/list",
    //         async: false,
    //         dataType: 'json',
    //         success: function(data) {
    //             $("#aplikasi").empty();
    //             if (data.length === 0) {} else {
    //                 for (i = 0; i < data.length; i++) {
    //                     $("#aplikasi").append("<option value='" + data[i].APLIKASI_LINK + "'>" + data[i].APLIKASI_NAMA + "</option>");
    //                 }
    //             }
    //         },
    //         error: function(x, e) {
    //             console.log("Gagal")
    //         }
    //     });
    // }

    $('#submit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/sistem/user/add',
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                memuat()
            },
            success: function(data) {
                menu_list();
                Swal.fire('Berhasil', 'User berhasil ditambahkan', 'success')
                $("#userModal").modal("hide")
            }
        });
    })

    function akses(menu_id) {
        console.log(menu_id)
        Swal.fire({
            title: 'Ganti akses Menu ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: `Ganti`,
            denyButtonText: `Batal`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'ajax',
                    url: '<?php echo base_url() ?>index.php/sistem/user/akses_menu/<?php echo $this->uri->segment('4'); ?>/' + menu_id,
                    beforeSend: function() {
                        memuat()
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.length === 0) {} else {
                            menu_list();
                            Swal.fire('Berhasil', 'User Berhasil dihapus', 'success')
                        }
                    },
                    error: function(x, e) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Proses Gagal'
                        })
                        console.log(e)
                    } //end error
                });

            }
        })
    }

    function akses_perusahaan(perusahaan_kode) {
        console.log(perusahaan_kode)
        Swal.fire({
            title: 'Ganti akses Perusahaan ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: `Ganti`,
            denyButtonText: `Batal`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'ajax',
                    url: '<?php echo base_url() ?>index.php/sistem/user/akses_perusahaan/<?php echo $this->uri->segment('4'); ?>/' + perusahaan_kode,
                    beforeSend: function() {
                        memuat()
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.length === 0) {} else {
                            memuat()
                            perusahaan_list();
                            Swal.fire('Berhasil', 'User Berhasil dihapus', 'success')
                        }
                    },
                    error: function(x, e) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Proses Gagal'
                        })
                        console.log(e)
                    } //end error
                });

            }
        })
    }

    $('#menu_filter').change(function() {
        memuat()
        menu_list()
    });
</script>