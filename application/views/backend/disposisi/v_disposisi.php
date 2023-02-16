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
                    <h1 class="m-0">Disposisi Surat</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('backend/home'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Disposisi Surat</li>
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
                            <h5 class="card-title">Pencarian Dokumen</h5>
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
                            <h5 class="card-title">Disposisi Surat Masuk</h5>
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
                                            <!-- <th style="text-align: center;">Tipe Surat</th> -->
                                            <th style="text-align: center;">Disposisi</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($masuk as $row) : ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $no; ?>.</td>
                                                <td style="text-align: center;"><?= $row['no_surat'] ?></td>
                                                <td style="text-align: center;"><?= $row['asal_surat'] ?></td>
                                                <td style="text-align: center;"><?= $row['kepada'] ?></td>
                                                <td style="text-align: center;"><?= $row['perihal'] ?></td>
                                                <td style="text-align: center;"><?= $row['jenis_surat'] ?></td>
                                                <!-- <td style="text-align: center;"><?= $row['tipe_surat'] ?></td> -->
                                                <td style="text-align: center;"><?= $row['disposisi'] ?></td>
                                                <td style="text-align: center;">
                                                    <a href="<?= base_url('backend/disposisi/getbyid/') . $row['id_surat']; ?>" class="btn btn-success">Disposisi Surat</a>
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

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Disposisi Surat Keluar</h5>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table" id="tbl_dashboard" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No.</th>
                                            <th style="text-align: center;">No. Surat</th>
                                            <th style="text-align: center;">Asal Surat</th>
                                            <th style="text-align: center;">Tujuan</th>
                                            <th style="text-align: center;">Perihal</th>
                                            <th style="text-align: center;">Jenis Surat</th>
                                            <!-- <th style="text-align: center;">Tipe Surat</th> -->
                                            <th style="text-align: center;">Disposisi</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($keluar as $row) : ?>
                                            <tr>
                                                <td style="text-align: center;"><?= $no; ?>.</td>
                                                <td style="text-align: center;"><?= $row['no_surat'] ?></td>
                                                <td style="text-align: center;"><?= $row['asal_surat'] ?></td>
                                                <td style="text-align: center;"><?= $row['kepada'] ?></td>
                                                <td style="text-align: center;"><?= $row['perihal'] ?></td>
                                                <td style="text-align: center;"><?= $row['jenis_surat'] ?></td>
                                                <!-- <td style="text-align: center;"><?= $row['tipe_surat'] ?></td> -->
                                                <td style="text-align: center;"><?= $row['disposisi'] ?></td>
                                                <td style="text-align: center;">
                                                    <a href="<?= base_url('backend/disposisi/getbyid/') . $row['id_surat']; ?>" class="btn btn-success">Disposisi Surat</a>
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

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Belum Dijalankan</h5>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table" id="tbl_dashboard" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No.</th>
                                            <th style="text-align: center;">No. Surat</th>
                                            <th style="text-align: center;">Asal Surat</th>
                                            <th style="text-align: center;">Kepada/Tujuan</th>
                                            <th style="text-align: center;">Perihal</th>
                                            <th style="text-align: center;">Jenis Surat</th>
                                            <th style="text-align: center;">Tipe Surat</th>
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
                                                <td style="text-align: center;"><?= $row['tipe_surat'] ?></td>
                                                <td style="text-align: center;"><?= $row['disposisi'] ?></td>
                                                <td style="text-align: center;">
                                                    <a href="<?= base_url('backend/disposisi/getbyid/') . $row['id_surat']; ?>" class="btn btn-success">Disposisi Surat</a>
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

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('Backend/Parts/footer'); ?>

<script>
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
                url: '<?= base_url() . 'backend/disposisi/search'; ?>',
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
                            <td style="text-align: center;">
                                <a href="<?= base_url('backend/disposisi/getbyid/') ?>` + data.id_surat + `" class="btn btn-success">Disposisi Surat</a>
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
</script>