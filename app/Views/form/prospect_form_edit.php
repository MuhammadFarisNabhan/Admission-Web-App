<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/prospect/update/<?= $mahasiswa['id']; ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="slug" value="<?= $mahasiswa['slug']; ?>">
                            <div class=" row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama') ? old('nama') : $mahasiswa['nama']; ?>">
                                    <?php if (session('validation') && session('validation')->hasError('nama')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('validation')->getError('nama'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="asal_sekolah" class="col-sm-2 col-form-label">Asal Sekolah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="asal_sekolah" , name="asal_sekolah" value="<?= old('asal_sekolah') ? old('asal_sekolah') : $mahasiswa['asal_sekolah']; ?>">
                                    <?php if (session('validation') && session('validation')->hasError('asal_sekolah')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('validation')->getError('asal_sekolah'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="no_tlp" class="col-sm-2 col-form-label">No Telepon</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="no_tlp" name="no_tlp" value="<?= old('no_tlp') ? old('no_tlp') : $mahasiswa['no_telp']; ?>">
                                    <?php if (session('validation') && session('validation')->hasError('no_tlp')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('validation')->getError('no_tlp'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Status Pembayaran</label>
                                <div class="col-md-10">
                                    <select class="form-select <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="status_pembayaran" name="status_pembayaran" value="<?= old('status_pembayaran') ? old('status_pembayaran') : $mahasiswa['status_pembayaran']; ?>">
                                        <option value="Pending">Pending</option>
                                        <option value="Lunas">Lunas</option>
                                        <?php if (session('validation') && session('validation')->hasError('status_pembayaran')) : ?>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= session('validation')->getError('status_pembayaran'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="program" class="col-sm-2 col-form-label">Program</label>
                                <div class="col-sm-10">
                                    <select class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="program" name="program" value="<?= old('program'); ?>">
                                        <?php
                                        $programOptions = ['Reguler', 'Karyawan'];
                                        if ($programOptions[0] == $mahasiswa['program']) {
                                            echo '<option>' . htmlspecialchars($programOptions[0]) . '</option>';
                                            echo '<option>' . htmlspecialchars($programOptions[1]) . '</option>';
                                        } else if ($programOptions[1] == $mahasiswa['program']) {
                                            echo '<option>' . htmlspecialchars($programOptions[1]) . '</option>';
                                            echo '<option>' . htmlspecialchars($programOptions[0]) . '</option>';
                                        }
                                        ?>
                                        <?php if (session('validation') && session('validation')->hasError('program')) : ?>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= session('validation')->getError('program'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="program_studi" class="col-sm-2 col-form-label">Program Studi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="program_studi" name="program_studi" value="<?= old('program_studi') ? old('program_studi') : $mahasiswa['program_studi']; ?>">
                                    <?php if (session('validation') && session('validation')->hasError('program_studi')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('validation')->getError('program_studi'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ? old('email') : $mahasiswa['email']; ?>">
                                    <?php if (session('validation') && session('validation')->hasError('email')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('validation')->getError('email'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <button type="" id="changeBtn" data-bs-toggle="" data-bs-target="" class="btn btn-success position-relative start-50 top-100 translate-middle mt-5 px-4 py-2 fw-bold waves-effect waves-light" style="width: 300px;">Update Data</button>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $('#status_pembayaran').on('change', function() {
                                    const selectedValue = $(this).val();
                                    const myButton = $('#changeBtn');

                                    if (selectedValue == 'lunas' || selectedValue == 'Lunas') {
                                        myButton.attr('data-bs-toggle', 'modal');
                                        myButton.attr('data-bs-target', '#myModal');
                                        myButton.attr('type', 'button');
                                        myButton.attr('class', 'btn btn-primary position-relative start-50 top-100 translate-middle mt-5 px-4 py-2 fw-bold waves-effect waves-light');
                                        myButton.text('Fill Form Applicant')
                                    } else if (selectedValue == 'pending' || selectedValue == 'Pending') {
                                        myButton.attr('data-bs-toggle', '');
                                        myButton.attr('data-bs-target', '');
                                        myButton.attr('type', 'submit');
                                        myButton.attr('class', 'btn btn-success position-relative start-50 top-100 translate-middle mt-5 px-4 py-2 fw-bold waves-effect waves-light');
                                        myButton.text('Update Data')
                                    }
                                });
                            </script>

                            <!-- sample modal content -->
                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Form Applicant</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="/prospect/update/<?= $mahasiswa['id']; ?>" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <?= csrf_field(); ?>
                                                    <div class="row mb-3">
                                                        <label for="no_formulir" class="col-sm-2 col-form-label">No Formulir</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="no_formulir" name="no_formulir" value="<?= old('no_formulir'); ?>" autofocus>
                                                            <?php if (session('validation') && session('validation')->hasError('no_formulir')) : ?>
                                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                                    <?= session('validation')->getError('no_formulir'); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="tgl_ujian" class="col-sm-2 col-form-label">Tanggal Ujian</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="tgl_ujian" name="tgl_ujian" value="<?= old('tgl_ujian'); ?>">
                                                            <?php if (session('validation') && session('validation')->hasError('tgl_ujian')) : ?>
                                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                                    <?= session('validation')->getError('tgl_ujian'); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Create</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>