<?php

$this->load->view('Backend/Parts/header');
$this->load->view('Backend/Parts/navbar_main');
$this->load->view('Backend/Parts/sidebar');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Surat Masuk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('backend/home'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Dokumen</a></li>
                        <li class="breadcrumb-item active">Surat Masuk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Pencarian Surat Masuk</h5>
                        </div>
                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-sm-8">
                                    <input class="form-control" id="search_surat" placeholder="Ketik untuk cari Dokumen (No. Surat / Perihal)">
                                </div>
                                <button type="button" class="btn btn-primary col-sm-2" id="btn_search">Cari</button>
                            </div>

                            <div class="table-responsive">
                                <table class="table" id="tbl_search" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No. Surat</th>
                                            <th style="text-align: center;">Perihal</th>
                                            <th style="text-align: center;">Tipe Surat</th>
                                            <th style="text-align: center;">Label</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody id="search_tbody">

                                    </tbody>
                                </table>
                            </div>

                            <div class="row" id="surat_list"></div>

                        </div>

                    </div><!-- /.card -->

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Dokumen - Surat Masuk</h5>
                            <div class="card-tools">
                                <a class="btn btn-tool" title="Tambah Data" href="<?= base_url('backend/dokumen/masuk/add'); ?>">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table" id="tbl_dashboard" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No.</th>
                                            <th style="text-align: center;">No. Surat</th>
                                            <th style="text-align: center;">Asal Surat</th>
                                            <th style="text-align: center;">Kepada</th>
                                            <th style="text-align: center;">Perihal</th>
                                            <th style="text-align: center;">Jenis Surat</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($surat as $row) : ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $no; ?>.</td>
                                                <td style="text-align: center;"><?= $row['no_surat'] ?></td>
                                                <td style="text-align: center;"><?= $row['asal_surat'] ?></td>
                                                <td style="text-align: center;"><?= $row['kepada'] ?></td>
                                                <td style="text-align: center;"><?= $row['perihal'] ?></td>
                                                <td style="text-align: center;"><?= $row['jenis_surat'] ?></td>
                                                <td style="text-align: center;">
                                                    <a href="<?= base_url('backend/dokumen/masuk/getbyid/') . $row['id_surat']; ?>" class="btn btn-success"><i class="fa fa-pen"></i></a>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <!-- <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="btn_save">Save</button>
                        </div> -->

                    </div><!-- /.card -->
                </div>

                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Disposisi - Surat Masuk</h5>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table" id="tbl_dashboard" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No.</th>
                                            <th style="text-align: center;">No. Surat</th>
                                            <th style="text-align: center;">Asal Surat</th>
                                            <th style="text-align: center;">Kepada</th>
                                            <th style="text-align: center;">Perihal</th>
                                            <th style="text-align: center;">Jenis Surat</th>
                                            <th style="text-align: center;">Disposisi</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($disposisi as $row) : ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $no; ?>.</td>
                                                <td style="text-align: center;"><?= $row['no_surat'] ?></td>
                                                <td style="text-align: center;"><?= $row['asal_surat'] ?></td>
                                                <td style="text-align: center;"><?= $row['kepada'] ?></td>
                                                <td style="text-align: center;"><?= $row['perihal'] ?></td>
                                                <td style="text-align: center;"><?= $row['jenis_surat'] ?></td>
                                                <td style="text-align: center;"><?= $row['disposisi'] ?></td>
                                                <td style="text-align: center;">
                                                    <!-- <a href="<?= base_url('backend/disposisi/getbyid/') . $row['id_surat']; ?>" class="btn btn-success">Disposisi Surat</a> -->
                                                    <button data-toggle="modal" data-target="#selesaiModal" id="update_btn" data-item="<?= $row['id_surat'] ?>" type="button" class="btn btn-success">Ubah Status</button>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <!-- <div class="card-footer">
                            <button type="button" class="btn btn-primary" id="btn_save">Save</button>
                        </div> -->

                    </div><!-- /.card -->
                </div>

                <div class="col-lg-12">

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Multi Delete</h5>
                        </div>
                        <div class="card-body">
                            <form class="form" method="post" id="frm_laporan">

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label>From Date</label>
                                        <input type="date" class="form-control" id="from_date" name="from_date" placeholder="From Date">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>To Date</label>
                                        <input type="date" class="form-control" id="to_date" name="to_date" placeholder="To Date">
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary" id="btn_multidel">Delete</button>

                            </form>

                        </div>

                    </div><!-- /.card -->

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Dokumen Surat Masuk</h5>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table" id="tbl_dashboard" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No.</th>
                                            <th style="text-align: center;">No. Surat</th>
                                            <th style="text-align: center;">Tipe Surat</th>
                                            <th style="text-align: center;">Pengirim</th>
                                            <th style="text-align: center;">Tujuan</th>
                                            <th style="text-align: center;">Perihal</th>
                                            <th style="text-align: center;">Jenis Surat</th>
                                            <th style="text-align: center;">Disposisi</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($all as $row) : ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $no; ?>.</td>
                                                <td style="text-align: center;"><?= $row['no_surat'] ?></td>
                                                <td style="text-align: center;"><?= $row['tipe_surat'] ?></td>
                                                <td style="text-align: center;"><?= $row['asal_surat'] ?></td>
                                                <td style="text-align: center;"><?= $row['kepada'] ?></td>
                                                <td style="text-align: center;"><?= $row['perihal'] ?></td>
                                                <td style="text-align: center;"><?= $row['jenis_surat'] ?></td>
                                                <td style="text-align: center;"><?= $row['disposisi'] ?></td>
                                                <td style="text-align: center;">
                                                    <a href="<?= base_url('backend/dokumen/penting/getbyid/') . $row['id_surat']; ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                                    <button data-toggle="modal" data-target="#deleteModal" id="deleteUser" data-item="<?= $row['id_surat'] ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div><!-- /.card -->
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Warning</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="frm_del" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="del_id_surat" name="id_surat" value="" />
                    </form>
                    <h4>Are you sure want to delete this data ?</h4>
                </div>
            </div>
            <div class="modal-footer">
                <button id="del_surat" class="btn btn-primary" type="button" data-dismiss="modal">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- delete User Modal-->
<div class="modal fade" id="selesaiModal" tabindex="-1" role="dialog" aria-labelledby="selesaiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selesaiModalLabel">Label Surat</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h4>Pemberian Label Pada Surat</h4>
                    <form id="frm_upd" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="id_surat" name="id_surat" value="" />
                        <select name="input_label_surat" id="input_label_surat" class="form-control" style="width:100%;">
                            <option hidden>--Label Surat--</option>
                            <option value="2">Penting</option>
                            <option value="1">Biasa</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button id="Upd_surat" class="btn btn-primary" type="button" data-dismiss="modal">Ya, Sudah</button>
            </div>
        </div>
    </div>
</div>

<!-- delete surat Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Warning</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="frm_del" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="del_id_surat" name="id_surat" value="" />
                    </form>
                    <h4>Are you sure want to delete this data ?</h4>
                </div>
            </div>
            <div class="modal-footer">
                <button id="del_surat" class="btn btn-primary" type="button" data-dismiss="modal">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('Backend/Parts/footer'); ?>

<script>
    $(document).ready(function() {
        $(document).on("click", "#update_btn", function() {
            var id_surat = $(this).data('item');
            // console.log(id_akun);
            $('#id_surat').val(id_surat);
        });
        $(document).on("click", "#deleteUser", function() {
            var id_surat = $(this).data('item');
            // console.log(id_surat);
            $('#del_id_surat').val(id_surat);
        });

    });

    $('#del_surat').click(function() {
        var link_Save = '<?= base_url() . 'backend/C_Doc_Penting/deleteSurat' ?>';

        var form = $('#frm_del');
        var data = form.serializeArray();
        console.log(data);
        var formHtml = form[0];
        var NewData = new FormData(formHtml);

        $.ajax({
            url: link_Save,
            type: "POST",
            data: NewData,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false
        }).done(function(response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.msg,
                });
                $('#res_id_akun').val('');
                $('#new_password').val('');
                // location.reload();
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: response.msg,
                });
            }
        });
    });

    $('#Upd_surat').click(function() {
        var link_Save = '<?= base_url() . 'backend/dokumen/masuk/savelabel' ?>';

        var form = $('#frm_upd');
        var data = form.serializeArray();
        console.log(data);
        var formHtml = form[0];
        var NewData = new FormData(formHtml);

        var label_surat = $('#input_label_surat').val();

        var is_valid = false;

        if (label_surat != '') {
            is_valid = true;
        } else {
            is_valid = false;
        }

        if (is_valid) {
            $.ajax({
                url: link_Save,
                type: "POST",
                data: NewData,
                dataType: "JSON",
                contentType: false,
                cache: false,
                processData: false
            }).done(function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.msg,
                    });
                    $('#input_label_surat').val('');
                    setTimeout(() => {
                        location.reload();
                    }, 300);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.msg,
                    });
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Label Belum Dipilih',
            });
        }

    });

    $('#btn_multidel').click(function() {
        var link = '<?= base_url() . 'backend/dokumen/masuk/deleteMulti' ?>';

        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();

        console.log(from_date + ' & ' + to_date)

        var is_valid = false;

        if (from_date != '' && to_date != '') {
            is_valid = true;
        } else {
            is_valid = false;
        }

        if (is_valid) {

            $.ajax({
                url: link,
                type: "POST",
                data: {
                    from_date: from_date,
                    to_date: to_date
                },
                dataType: "JSON",
            }).done(function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.msg,
                    });
                    // location.reload();
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: response.msg,
                    });
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Pastikan From Date dan To Date sudah terisi',
            });
        }

    });

    $('#btn_search').on('click', function() {
        searchSurat();
    });

    $('#search_surat').on('keyup', function(e) {
        if (e.keyCode === 13) {
            searchSurat();
        }
    });

    function searchSurat() {
        $('#search_tbody').html('');
        var search = $('#search_surat').val();
        var is_valid = false;

        if (search != '') {
            is_valid = true;
        } else {
            is_valid = false;
        }

        if (is_valid) {
            $.ajax({
                url: '<?= base_url() . 'backend/dokumen/masuk/search_Surat'; ?>',
                type: 'post',
                datatype: 'json',
                data: {
                    'q': $('#search_surat').val()
                },
                success: function(result) {
                    if (result.status == true) {
                        let surat = result.data;

                        $.each(surat, function(i, data) {
                            $('#search_tbody').append(`
                        <tr>
                            <td style="text-align: center;">` + data.no_surat + `</td>
                            <td style="text-align: center;">` + data.perihal + `</td>
                            <td style="text-align: center;">` + data.tipe_surat + `</td>
                            <td style="text-align: center;">` + data.label + `</td>
                            <td style="text-align: center;">
                            <a href="<?= base_url('backend/dokumen/penting/getbyid/') ?>` + data.id_surat + `" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                <button data-toggle="modal" data-target="#deleteModal" id="deleteUser" data-item="` + data.id_surat + `" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    `)
                        });

                        $('#search_surat').val('')
                        $('#surat_list').html('')

                    } else {
                        $('#surat_list').html(`
                    <div class="col">
                        <h1 class="text-center">` + result.msg + `</h1>
                    </div>
                `)
                    }
                }
            });
        } else {

        }

    }

    $('#del_surat').click(function() {
        var link_Save = '<?= base_url() . 'backend/C_Doc_Penting/deleteSurat' ?>';

        var form = $('#frm_del');
        var data = form.serializeArray();
        console.log(data);
        var formHtml = form[0];
        var NewData = new FormData(formHtml);

        $.ajax({
            url: link_Save,
            type: "POST",
            data: NewData,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false
        }).done(function(response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.msg,
                });
                $('#res_id_akun').val('');
                $('#new_password').val('');
                // location.reload();
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: response.msg,
                });
            }
        });
    });
</script>