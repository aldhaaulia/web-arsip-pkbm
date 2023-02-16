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
                    <h1 class="m-0">Dokumen Penting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('backend/home'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dokumen Penting</li>
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
                            <h5 class="card-title">Dokumen Penting</h5>
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
                                        foreach ($surat as $row) : ?>
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

    $('#btn_multidel').click(function() {
        var link = '<?= base_url() . 'backend/C_Doc_Penting/deleteMulti' ?>';

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
</script>