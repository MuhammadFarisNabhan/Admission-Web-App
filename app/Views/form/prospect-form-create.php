<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/prospect/save" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="no">
                            <div class=" row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>" style="text-transform:uppercase;">
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
                                    <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="asal_sekolah" , name="asal_sekolah" value="<?= old('asal_sekolah'); ?>" style="text-transform:uppercase;">
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
                                    <input type="number" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="no_tlp" name="no_tlp" value="<?= old('no_tlp'); ?>">
                                    <?php if (session('validation') && session('validation')->hasError('no_tlp')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('validation')->getError('no_tlp'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <fieldset disabled>
                                <div class="row mb-3">
                                    <label for="status_pembayaran" class="col-sm-2 col-form-label">Status Pembayaran</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="disabledTextInput" placeholder="Pending" name="status_pembayaran" value="<?= old('status_pembayaran'); ?>">
                                        <?php if (session('validation') && session('validation')->hasError('status_pembayaran')) : ?>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= session('validation')->getError('status_pembayaran'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row mb-3">
                                <label for="program" class="col-sm-2 col-form-label">Program</label>
                                <div class="col-sm-10">
                                    <select class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="program" name="program" value="<?= old('program'); ?>">
                                        <option>
                                            <?php
                                            $programOptions = ['Reguler', 'Karyawan'];

                                            foreach ($programOptions as $option) {
                                                echo '<option>' . $option . '</option>';
                                            }
                                            ?>
                                        </option>
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
                                    <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="program_studi" name="program_studi" value="<?= old('program_studi'); ?>" style="text-transform:capitalize;">
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
                                    <input type="email" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>">
                                    <?php if (session('validation') && session('validation')->hasError('email')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('validation')->getError('email'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success position-relative start-50 top-100 translate-middle mt-5 px-4 py-2 fw-bold waves-effect waves-light" style="width: 300px;">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>