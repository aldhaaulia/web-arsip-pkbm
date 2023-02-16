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
                    <h1 class="m-0">Detail Dokumen Penting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                            <h5 class="card-title">Detail Surat</h5>
                        </div>
                        <div class="card-body">

                            <form class="form-horizontal" id="frm_disposisi">

                                <input type="hidden" id="input_id_surat" name="input_id_surat" value="<?= $disposisi['id_surat'] ?>" />

                                <div class="form-group row">
                                    <label for="input_no_surat" class="col-sm-2 col-form-label">Tipe Surat</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="input_no_surat" value="<?= $disposisi['tipe_surat'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input_no_surat" class="col-sm-2 col-form-label">No Surat</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="input_no_surat" value="<?= $disposisi['no_surat'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input_asal_surat" class="col-sm-2 col-form-label">Asal Surat</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="input_asal_surat" value="<?= $disposisi['asal_surat'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input_jenis_surat" class="col-sm-2 col-form-label">Jenis Surat</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="input_jenis_surat" value="<?= $disposisi['jenis_surat'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input_perihal" class="col-sm-2 col-form-label">Perihal</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="input_perihal" value="<?= $disposisi['perihal'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input_kepada" class="col-sm-2 col-form-label">Kepada</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="input_kepada" value="<?= $disposisi['kepada'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="input_lampiran" class="col-sm-2 col-form-label">Lampiran</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="input_lampiran" value="<?= $disposisi['lampiran'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Preview</label>
                                    <div class="col-sm-4">
                                        <button data-toggle="modal" data-target="#berkasModal" type="button" class="btn btn-primary" id="view_berkas">Preview Berkas</button>
                                    </div>

                                    <?php if (!($disposisi['file_lampiran'] == '')) : ?>
                                        <div class="col-sm-4">
                                            <button data-toggle="modal" data-target="#lampiranModal" type="button" class="btn btn-primary" id="view_lampiran">Preview Lampiran</button>
                                        </div>
                                    <?php endif; ?>

                                </div>

                                <div class="form-group row">
                                    <label for="input_disposisi" class="col-sm-2 col-form-label">Disposisi</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="input_disposisi" name="input_disposisi" placeholder="Disposisi" readonly><?= $disposisi['disposisi'] ?></textarea>
                                    </div>
                                </div>

                            </form>

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

<!-- Modal Preview Berkas -->
<div class="modal fade" id="berkasModal" tabindex="-1" role="dialog" aria-labelledby="berkasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="berkasModalLabel">Preview Berkas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align : center">
                <object data="<?= base_url('assets/backend/uploads/'); ?><?= $disposisi['dir'] ?>/<?= $disposisi['file_berkas'] ?>" width="100%" height="500"></object>
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Preview Lampiran -->
<div class="modal fade" id="lampiranModal" tabindex="-1" role="dialog" aria-labelledby="lampiranModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lampiranModalLabel">Preview Lampiran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align : center">
                <object data="<?= base_url('assets/backend/uploads/'); ?><?= $disposisi['dir'] ?>/<?= $disposisi['file_lampiran'] ?>" width="100%" height="500"></object>
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('Backend/Parts/footer'); ?>

<script>
    $(document).ready(function() {});

    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
</script>