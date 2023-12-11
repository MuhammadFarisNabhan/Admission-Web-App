<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>

        <?php foreach ($mahasiswa as $m) : ?>
            <div class="row mb-4">
                <div class="col-xl-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="dropdown float-end">
                                    <a class="text-body dropdown-toggle font-size-18" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                        <i class="uil uil-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <form action="#" method="post">
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalEdit2">Edit</button>
                                        </form>
                                        <!-- <a class="dropdown-item" href="#">Edit</a> -->
                                        <form action="/admitted/delete/<?= $m['id']; ?>" method="post">
                                            <button type="button" class="dropdown-item sa-warning-admitted" value="<?= $m['id']; ?>">Hapus</button>
                                        </form>
                                    </div>
                                    <div id="modalEdit2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Edit Admitted</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/admitted/update_user/<?= $m['id']; ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="slug" value="<?= $m['slug']; ?>">
                                                            <div class=" row mb-3">
                                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama') ? old('nama') : $m['nama']; ?>">
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
                                                                    <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="asal_sekolah" , name="asal_sekolah" value="<?= old('asal_sekolah') ? old('asal_sekolah') : $m['asal_sekolah']; ?>">
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
                                                                    <input type="number" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="no_tlp" name="no_tlp" value="<?= old('no_tlp') ? old('no_tlp') : $m['no_telp']; ?>">
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
                                                                        <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="disabledTextInput" placeholder="Lunas" name="status_pembayaran" value="<?= old('status_pembayaran'); ?>">
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
                                                                    <input type="number" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="no_formulir" name="no_formulir" value="<?= old('no_formulir') ? old('no_formulir') : $m['no_formulir']; ?>">
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
                                                                    <input type="date" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="tanggal_ujian" name="tanggal_ujian" value="<?= old('tanggal_ujian') ? old('tanggal_ujian') : $m['tanggal_ujian']; ?>">
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
                                                                        if ($options[0] == $m['hasil_ujian']) {
                                                                            echo '<option>' . htmlspecialchars($options[0]) . '</option>';
                                                                            echo '<option>' . htmlspecialchars($options[1]) . '</option>';
                                                                        } else if ($options[1] == $m['hasil_ujian']) {
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
                                                                <label for="program" class="col-sm-2 col-form-label">Program</label>
                                                                <div class="col-sm-10">
                                                                    <select class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="program" name="program" value="<?= old('program'); ?>">
                                                                        <?php
                                                                        $programOptions = ['Reguler', 'Karyawan'];
                                                                        if ($programOptions[0] == $m['program']) {
                                                                            echo '<option>' . htmlspecialchars($programOptions[0]) . '</option>';
                                                                            echo '<option>' . htmlspecialchars($programOptions[1]) . '</option>';
                                                                        } else if ($programOptions[1] == $m['program']) {
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
                                                                    <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="program_studi" name="program_studi" value="<?= old('program_studi') ? old('program_studi') : $m['program_studi']; ?>">
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
                                                                    <input type="email" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ? old('email') : $m['email']; ?>">
                                                                    <?php if (session('validation') && session('validation')->hasError('email')) : ?>
                                                                        <div id="validationServer03Feedback" class="invalid-feedback">
                                                                            <?= session('validation')->getError('email'); ?>
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
                                </div>
                                <div class="clearfix"></div>
                                <div>
                                    <img src="/assets/images/users/user-circle.svg " alt="" class="avatar-lg rounded-circle img-thumbnail">
                                </div>
                                <h5 class="mt-3 mb-1">
                                    <?= $m['nama']; ?>
                                </h5>
                                <p class="text-muted">
                                    <?= $m['program_studi']; ?>
                                </p>

                                <div class="mt-4">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#ModalEmail" class="btn btn-light btn-sm"><i class="uil uil-envelope-alt me-2"></i> Message</button>
                                </div>
                                <div class="modal fade" id="ModalEmail" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="composemodalTitle">New Message</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="<?= site_url('email'); ?>" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control email_tujuan" name="email_tujuan" placeholder="To" value="<?= $m['email']; ?>">
                                                        </div>

                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" placeholder="Subject" name="subject">
                                                        </div>
                                                        <div class="mb-3">
                                                            <textarea id="email-editor" name="pesan"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Send <i class="fab fa-telegram-plane ms-1"></i></button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="text-muted">
                                <h5 class="font-size-16">About</h5>
                                <?php if ($m['status'] == 0) {
                                    $status = 'Prospect';
                                } else if ($m['status'] == 1) {
                                    $status = 'Applicant';
                                } else if ($m['status'] == 2) {
                                    $status = 'Admitted';
                                } else if ($m['status'] == 3) {
                                    $status = 'Enrollee';
                                }
                                ?>
                                <p><?= $m['nama']; ?> mendaftar pada tanggal <?= $m['created_at']; ?>. <br><br>Status : <span class="badge bg-soft-success fs-6 text-primary"><?= $status; ?></span></p>

                                <div class="table-responsive mt-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card mb-0">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#about" role="tab">
                                    <i class="uil uil-user-circle font-size-20"></i>
                                    <span class="d-none d-sm-block">About</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#activity" role="tab">
                                    <i class="uil uil-notes font-size-20"></i>
                                    <span class="d-none d-sm-block">Activity</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab content -->
                        <div class="tab-content p-4">
                            <div class="tab-pane active" id="about" role="tabpanel">
                                <div>
                                    <div>
                                        <h4 class="card-title mb-4">Progress Pendaftar</h4>
                                        <div class="position-relative">
                                            <div class="d-inline progress">
                                                <button type="button" class="btn stages sa-prospect-message" value="<?= $m['status']; ?>" style="background-color: <?= ($m['status'] >= 0) ? '#5b73e8' : '#6C757D'; ?> ; ">Prospect</button>
                                                <button type="button" class="btn stages sa-applicant-message" value="<?= $m['status']; ?>" style="background-color: <?= ($m['status'] >= 1) ? '#5b73e8' : '#6C757D'; ?> ; ">Applicant</button>
                                                <button type="button" class="btn stages sa-admitted-message" value="<?= $m['status']; ?>" style="background-color: <?= ($m['status'] >= 2) ? '#5b73e8' : '#6C757D'; ?> ; ">Admitted</button>
                                                <button type="button" class="btn stages" data-bs-toggle="modal" data-bs-target="#modalEnrollee" style="background-color: <?= ($m['status'] >= 3) ? '#5b73e8' : '#6C757D'; ?> ; ">Enrollee</button>
                                            </div>
                                            <div id="modalProspect" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Prospect</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?= $m['nama']; ?> selesai di tahap Prospect</p>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                            <div id="modalApplicant" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Field Applicant</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?= $m['nama']; ?> selesai di tahap Applicant</p>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                            <div id="modalAdmitted" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Admitted</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?= $m['nama']; ?> berada di tahap Admitted</p>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                            <div id="modalEnrollee" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Enrollee</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="/admitted/update_change_stages/<?= $m['id']; ?>" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <?= csrf_field(); ?>
                                                                    <div class="row mb-3">
                                                                        <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control <?= (session('validation')) ? 'is-invalid' : ''; ?>" id="npm" name="npm" value="<?= old('npm'); ?>">
                                                                            <?php if (session('validation') && session('validation')->hasError('npm')) : ?>
                                                                                <div id="validationServer03Feedback" class="invalid-feedback">
                                                                                    <?= session('validation')->getError('npm'); ?>
                                                                                </div>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light" name="submit">Create</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-xl-4">
                                                <div class="mt-4">
                                                    <p class="mb-1">Status Pembayaran :</p>
                                                    <h5 class="font-size-16 ">
                                                        <span class="badge bg-soft-success fs-6 <?php echo ($m['status_pembayaran'] == 'Lunas' || $m['status_pembayaran'] == 'lunas') ?  'text-success' : 'text-danger'; ?>"><?= $m['status_pembayaran']; ?></span>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1">Asal Sekolah :</p>
                                                    <h5 class="font-size-16">
                                                        <?= $m['asal_sekolah']; ?>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1">No Telephon :</p>
                                                    <h5 class="font-size-16">
                                                        <?= $m['no_telp']; ?>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1">E-mail :</p>
                                                    <h5 class="font-size-16">
                                                        <?= $m['email']; ?>
                                                    </h5>
                                                </div>
                                            </div>

                                            <div class="col-xl-4">
                                                <div class="mt-4">
                                                    <p class="mb-1">Program :</p>
                                                    <h5 class="font-size-16">
                                                        <?= $m['program']; ?>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1">Program Studi:</p>
                                                    <h5 class="font-size-16">
                                                        <?= $m['program_studi']; ?>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1">No Formulir :</p>
                                                    <h5 class="font-size-16">
                                                        <?= $m['no_formulir']; ?>
                                                    </h5>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="mb-1">Tanggal Ujian:</p>
                                                    <h5 class="font-size-16">
                                                        <?= $m['tanggal_ujian']; ?>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="mt-4">
                                                    <p class="mb-1">Hasil Ujian :</p>
                                                    <h5 class="font-size-16">
                                                        <span class="badge bg-soft-success fs-6 <?php echo ($m['hasil_ujian'] == 'Lulus' || $m['hasil_ujian'] == 'lulus') ?  'text-success' : 'text-danger'; ?>"><?= $m['hasil_ujian']; ?></span>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="activity" role="tabpanel">
                                <div>
                                    <ul class="nav nav-justified" role="tablist">
                                        <!-- Email -->
                                        <div class="d-inline-block me-3 mb-3">
                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-toggle="modal" data-bs-target="#ModalEmail" role="tab"><i class="uil uil-envelope fs-5"></i> <span> Email</span>
                                                <!-- <div class="btn-group">
                                                <button type="button" class="btn btn-secondary waves-effect" data-bs-toggle="modal" data-bs-target="#ModalEmail" role="tab"><i class="uil uil-envelope fs-5"></i> <span> Email</span>
                                                </button>
                                                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#email1" data-bs-toggle="tab" role="tab">Template Berhasil Mendaftar</a>
                                                    <a class="dropdown-item" href="#email" data-bs-toggle="tab" role="tab">Email biasa</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div> -->
                                        </div>

                                        <!-- Call -->
                                        <div class="d-inline-block mb-4">
                                            <button type="button" class="btn bg-warning waves-effect" data-bs-toggle="modal" data-bs-target="#ModalLogCall"><i class="uil uil-phone fs-5"></i> <span class=""> Call</span></button>
                                            <!-- <div class="btn-group">
                                                <button type="button" class="btn bg-warning waves-effect"><i class="uil uil-phone fs-5"></i> <span class=""> Call</span></button>
                                                <button type="button" class="btn bg-warning dropdown-toggle dropdown-toggle-split waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#call" role="tab" data-bs-toggle="tab">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div> -->
                                        </div>

                                        <!-- Modal Email -->
                                        <div class="modal fade" id="ModalEmail" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="composemodalTitle">New Message</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="<?= site_url('email'); ?>" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control email_tujuan" name="email_tujuan" placeholder="To" value="<?= $m['email']; ?>">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control" placeholder="Subject" name="subject">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <textarea id="email-editor" name="pesan"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Send <i class="fab fa-telegram-plane ms-1"></i></button>
                                                            </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Call -->
                                        <div class="modal fade" id="ModalLogCall" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="composemodalTitle">New Log</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="<?= base_url("prospect/logCall/" . $m['id']); ?>" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <input type="hidden" name="id" value="<?= $m['id']; ?>">
                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control name" name="name" placeholder="Mahasiswa" value="<?= $m['nama']; ?>">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control" placeholder="Subject" name="subject">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <textarea name="comments" placeholder="<?= "Comments"; ?>" style="width: 100%; padding: 10px 10px; height:100px; border-radius:5px"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save <i class="uil uil-save ms-1"></i></button>
                                                            </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                    <div class="tab-content if-no-activity">
                                        <div class="modal-header d-flex flex-row mt-0" style="background-color: rgba(222, 222, 222, 0.8); height:10px; display: flexbox;flex-wrap: nowrap;">
                                            <span class="font-size-16 fw-bold ms-2 text-black">Activities</span>
                                        </div>
                                        <div class="modal-body text-center mt-0">
                                            <p>No activities recorded</p>
                                        </div>
                                    </div>
                                    <?php foreach ($datas as $d) : ?>
                                        <div class="tab-content activity-feed">
                                            <div class="modal-header d-flex flex-row mt-0" style="background-color: rgba(222, 222, 222, 0.8); height:10px; display: flexbox;flex-wrap: nowrap;">
                                                <a class="tab-content-dropdown1 d-inline mt-0" style="color:black;" id="<?= $d['datas'][0]['id_activity']; ?>">
                                                    <i class="uil uil-angle-right-b fs-5 fw-bolder mt-0"></i>
                                                </a>
                                                <div class="d-flex flex-row flex-grow-1 ms-1">
                                                    <span class="font-size-16 fw-bold me-2 text-black">
                                                        <?= $d['month']; ?>
                                                    </span>
                                                    <div class="position-relative ">
                                                        <div class="big-dot position-absolute top-50 start-50 translate-middle"></div>
                                                    </div>
                                                    <span class="font-size-16 fw-bold ms-2 text-black">
                                                        <?= $d['year']; ?>
                                                    </span>
                                                    <input type="hidden" class="times" value="<?= $d['yearMonth']; ?>" id="<?= $d['datas'][0]['id_activity']; ?>">
                                                </div>
                                            </div>
                                            <?php foreach ($d['datas'] as $data) : ?>
                                                <div class="modal-body">
                                                    <div class="d-flex flex-row hidden content-1 content-1-<?= $data['id_activity']; ?>">
                                                        <div class="d-inline arrow arrow-<?= $data['id_activity']; ?>">
                                                            <a class="tab-content-dropdown2" id="<?= $data['id_activity']; ?>" style="color:#6C757D">
                                                                <i class="uil uil-angle-right fs-4 ms-0 ps-0"></i>
                                                            </a>
                                                        </div>
                                                        <div class="d-inline flex-grow-1 ms-2">
                                                            <div class="d-block">
                                                                <?php if ($data['type_activity'] == 'Email') {
                                                                    $type = 'Email';
                                                                    $color = '#74788D';
                                                                    $icon = 'uil uil-envelope';
                                                                    $iconColor = 'btn btn-outline-secondary';
                                                                } else if ($data['type_activity'] == 'Call') {
                                                                    $type = 'Call';
                                                                    $color = '#F1B44C';
                                                                    $icon = 'uil uil-forwaded-call';
                                                                    $iconColor = 'btn btn-outline-warning';
                                                                } ?>
                                                                <i class="<?= $icon; ?> font-size-14 mt-0 p-2 py-1 <?= $iconColor; ?>" id="icons"></i>
                                                                <span class="font-size-18 ms-2 ps-0" style="color: <?= $color; ?>;">
                                                                    <?= $type; ?>
                                                                </span>
                                                            </div>
                                                            <div class="d-block mt-0 ms-4 ps-3 log log-<?= $data['id_activity']; ?>">
                                                                <h6 class="font-size-16 ps-1">You Logged a <?= $type; ?></h6>
                                                            </div>
                                                        </div>
                                                        <div class="align-items-end">
                                                            <span class="font-size-14 ms-3" style="color: #74788D;">
                                                                <?php
                                                                $date = str_replace('-', '/', substr($data['created_message'], 8, 2));
                                                                $month = date('M', strtotime($data['created_message']));
                                                                echo $date . " " . $month;
                                                                ?>
                                                            </span>
                                                            <div class="d-inline time-icon">
                                                                <span class="1-<?= $data['id_activity']; ?>"><i class="uil uil-sort font-size-16"></i></span>
                                                                <span class="2-<?= $data['id_activity']; ?> hidden"><i class="uil uil-scroll font-size-16"></i></span>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" class="created_message" value="<?= $data['created_message']; ?>" id="<?= $data['id_activity']; ?>">
                                                    </div>
                                                    <div class="d-block d-flex flex-row ms-4 ps-2 hidden content-2 content-2-<?= $data['id_activity']; ?>" id="<?= $data['id_activity']; ?>">
                                                        <div class="d-inline border border-1 rounded border-secondary mt-2" style="width: 100%; height:110px; overflow-y:scroll;">
                                                            <h6 class="ps-2 pt-2">
                                                                <?= "Subject : " . "<br>" . $data['subject']; ?>
                                                                <br><br>
                                                                <?= "Message : " . $data['comments']; ?>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endforeach; ?>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            // If No Activity
                                            var activity = $('.tab-content .activity-feed')
                                            var no_activity_display = $('.if-no-activity')

                                            if (activity.val() == 0) {
                                                no_activity_display.addClass('hidden');
                                            }


                                            // Section Header
                                            var clickCount1 = 0;
                                            var content1 = $('.content-1');
                                            $(".tab-content-dropdown1").each(function() {
                                                var time_section = $('.times').val();
                                                var created_message = $('.created_message').val();
                                                var slice_created_message = created_message.slice(0, 7);

                                                $(this).on('click', function() {
                                                    clickCount1++;
                                                    var id_content1 = $(this).attr('id');
                                                    $('.tab-content-dropdown2').each(function() {
                                                        var id_content2 = $(this).attr('id');
                                                        if (clickCount1 === 1) {
                                                            content1.removeClass('hidden');
                                                            $(".tab-content-dropdown1").css({
                                                                WebkitTransform: 'rotate(' + 90 + 'deg)'
                                                            })

                                                        } else if (clickCount1 === 2) {
                                                            content1.addClass('hidden');
                                                            $(".log").removeClass('hidden');
                                                            $(".content-2").addClass('hidden');
                                                            $(".arrow").css({
                                                                WebkitTransform: 'rotate(' + 0 + 'deg)'
                                                            })
                                                            $(".tab-content-dropdown1").css({
                                                                WebkitTransform: 'rotate(' + 0 + 'deg)'
                                                            })
                                                            clickCount1 = 0
                                                        }
                                                    })
                                                })
                                            })

                                            // Modal Body
                                            var clickCount2 = 0;
                                            var arr_sub_content = [];
                                            var time_icon = $(".time-icon");
                                            $(".tab-content-dropdown2, #icons").each(function() {
                                                $(this).on('click', function() {
                                                    clickCount2++;
                                                    var id_content2 = $(this).attr('id');

                                                    if (clickCount2 === 1) {
                                                        $('.content-2-' + id_content2).removeClass('hidden');
                                                        $('.log-' + id_content2).addClass('hidden');
                                                        $(".arrow-" + id_content2).css({
                                                            WebkitTransform: 'rotate(' + 90 + 'deg)'
                                                        })
                                                        arr_sub_content.push(id_content2);
                                                        $(".1-" + id_content2).addClass('hidden');
                                                        $(".2-" + id_content2).removeClass('hidden');

                                                    } else if (clickCount2 === 2) {
                                                        $('.content-2-' + id_content2).addClass('hidden');
                                                        $('.log-' + id_content2).removeClass('hidden');
                                                        clickCount2 = 0;
                                                        $(".arrow-" + id_content2).css({
                                                            WebkitTransform: 'rotate(' + 0 + 'deg)'
                                                        })
                                                        $(".1-" + id_content2).removeClass('hidden');
                                                        $(".2-" + id_content2).addClass('hidden');
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        <?php endforeach; ?>

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

<?= $this->endSection(); ?>