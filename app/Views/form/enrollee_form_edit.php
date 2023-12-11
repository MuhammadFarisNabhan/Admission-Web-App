<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/enrollee/update/<?= $mahasiswa['id']; ?>" method="post" enctype="multipart/form-data">
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
                            <fieldset disabled="disabled">
                                <div class="row mb-3">
                                    <label for="status_pembayaran" class="col-sm-2 col-form-label">Status Pembayaran</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="status_pembayaran" placeholder="Lunas" name="status_pembayaran" value="<?= old('status_pembayaran') ? old('status_pembayaran') : $mahasiswa['status_pembayaran']; ?>">
                                        <?php if (session('validation') && session('validation')->hasError('status_pembayaran')) : ?>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= session('validation')->getError('status_pembayaran'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row mb-3">
                                <label for="no_formulir" class="col-sm-2 col-form-label">No Formulir</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="no_formulir" name="no_formulir" value="<?= old('no_formulir') ? old('no_formulir') : $mahasiswa['no_formulir']; ?>">
                                    <?php if (session('validation') && session('validation')->hasError('no_formulir')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('validation')->getError('no_formulir'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal_ujian" class="col-sm-2 col-form-label">Tanggal Ujian</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="tanggal_ujian" name="tanggal_ujian" value="<?= old('tanggal_ujian') ? old('tanggal_ujian') : $mahasiswa['tanggal_ujian']; ?>">
                                    <?php if (session('validation') && session('validation')->hasError('tanggal_ujian')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('validation')->getError('tanggal_ujian'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="hasil_ujian" class="col-sm-2 col-form-label">Hasil Ujian</label>
                                <div class="col-sm-10">
                                    <select class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="hasil_ujian" name="hasil_ujian" value="<?= old('hasil_ujian'); ?>">
                                        <?php
                                        $options = ['Lulus', 'Tidak Lulus'];
                                        if ($options[0] == $mahasiswa['hasil_ujian']) {
                                            echo '<option>' . htmlspecialchars($options[0]) . '</option>';
                                            echo '<option>' . htmlspecialchars($options[1]) . '</option>';
                                        } else if ($options[1] == $mahasiswa['hasil_ujian']) {
                                            echo '<option>' . htmlspecialchars($options[1]) . '</option>';
                                            echo '<option>' . htmlspecialchars($options[0]) . '</option>';
                                        }
                                        ?>
                                        <?php if (session('validation') && session('validation')->hasError('hasil_ujian')) : ?>
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                <?= session('validation')->getError('hasil_ujian'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="npm" name="npm" value="<?= old('npm') ? old('npm') : $mahasiswa['npm']; ?>">
                                    <?php if (session('validation') && session('validation')->hasError('npm')) : ?>
                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                            <?= session('validation')->getError('npm'); ?>
                                        </div>
                                    <?php endif; ?>
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
                            <button type="submit" class="btn btn-success position-relative start-50 top-100 translate-middle mt-5 px-4 py-2 fw-bold" style="width: 300px;">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>