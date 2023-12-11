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

                                    <?php if ($m['status'] == 0) {
                                        $controller = 'prospect';
                                        $modalEdit = '#modalEdit0';
                                    } else if ($m['status'] == 1) {
                                        $controller = 'applicant';
                                        $modalEdit = '#modalEdit1';
                                    } else if ($m['status'] == 2) {
                                        $controller = 'admitted';
                                        $modalEdit = '#modalEdit2';
                                    } else if ($m['status'] == 3) {
                                        $controller = 'enrollee';
                                        $modalEdit = '#modalEdit3';
                                    }
                                    ?>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <form action="#" method="post">
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="<?= $modalEdit; ?>">Edit</button>
                                        </form>
                                        <!-- <a class="dropdown-item" href="#">Edit</a> -->
                                        <form action="/<?= $controller; ?>/delete/<?= $m['id']; ?>" method="post">
                                            <button type="submit" class="dropdown-item" id="sa-warning-user">Hapus</button>
                                        </form>
                                    </div>
                                    <?php if ($m['status'] == 0) {
                                        echo $this->include('User/modalEdit0');
                                    } else if ($m['status'] == 1) {
                                        echo $this->include('User/modalEdit1');
                                    } else if ($m['status'] == 2) {
                                        echo $this->include('User/modalEdit2');
                                    } else if ($m['status'] == 3) {
                                        echo $this->include('User/modalEdit3');
                                    }
                                    ?>
                                </div>
                                <div class="clearfix"></div>
                                <div>
                                    <img src="assets/images/users/user-circle.svg " alt="" class="avatar-lg rounded-circle img-thumbnail">
                                </div>
                                <h5 class="mt-3 mb-1">
                                    <?= $m['nama']; ?>
                                </h5>
                                <p class="text-muted">
                                    <?= $m['program_studi']; ?>
                                </p>

                                <div class="mt-4">
                                    <button type="button" class="btn btn-light btn-sm"><i class="uil uil-envelope-alt me-2"></i> Message</button>
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
                                <p><?= $m['nama']; ?> mendaftar pada tanggal <?= $m['created_at']; ?>. <br>Masuk pada tahap <?= $status; ?>. </p>

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
                            <!-- <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tasks" role="tab">
                                <i class="uil uil-clipboard-notes font-size-20"></i>
                                <span class="d-none d-sm-block">Tasks</span>
                            </a>
                        </li> -->
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
                                    <i class="uil uil-envelope-alt font-size-20"></i>
                                    <span class="d-none d-sm-block">Messages</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab content -->
                        <div class="tab-content p-4">
                            <div class="tab-pane active" id="about" role="tabpanel">
                                <div>
                                    <div>
                                        <h4 class="card-title">Progress Pendaftar</h4>
                                        <div class="">
                                            <div class="progress" style="height:30px">
                                                <?php if ($m['status'] == 0) {
                                                    $progress = '25%';
                                                } else if ($m['status'] == 1) {
                                                    $progress = '50%';
                                                } else if ($m['status'] == 2) {
                                                    $progress = '75%';
                                                } else if ($m['status'] == 3) {
                                                    $progress = '100%';
                                                }
                                                ?>
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="height:30px; width:<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"><span class="fw-bolder font-size-18"><?= $status; ?></span></div>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-xl-6">
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
                                            <div class="col-xl-6">
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

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="messages" role="tabpanel">
                                <div>
                                    <ul class="nav nav-justified" role="tablist">
                                        <div class="d-inline-block me-3 ">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-warning waves-effect"><i class="uil uil-phone fs-5"></i> <span class=""> Call</span></button>
                                                <button type="button" class="btn btn-outline-warning dropdown-toggle dropdown-toggle-split waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#call" role="tab" data-bs-toggle="tab">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div><!-- /btn-group -->
                                        </div>
                                        <div class="d-inline-block me-3 ">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-success waves-effect"><i class="uil uil-whatsapp fs-5"></i> <span class=""> Whatsapp</span></button>
                                                <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#call" role="tab" data-bs-toggle="tab">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div><!-- /btn-group -->
                                        </div>
                                        <div class="d-inline-block">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-secondary waves-effect" href="#email" data-bs-toggle="tab" role="tab"><i class="uil uil-envelope fs-5"></i> <span> Email</span>
                                                    <!-- <a href="#email" data-bs-toggle="tab" role="tab" style="color:#6C757D" onmouseover="this.style.color='#FFF'" onmouseleave="this.style.color='#6C757D'"></a> -->
                                                    <a href="#email" data-bs-toggle="tab" role="tab" style="color:#6C757D" onmouseover="this.style.color='#FFF'" onmouseleave="this.style.color='#6C757D'"></a>
                                                </button>
                                                <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#email1" data-bs-toggle="tab" role="tab">Template Berhasil Mendaftar</a>
                                                    <a class="dropdown-item" href="#email" data-bs-toggle="tab" role="tab">Email biasa</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div><!-- /btn-group -->
                                        </div>
                                    </ul>
                                    <div class="tab-content p-3">
                                        <div class="tab-pane" id="call" role="tabpanel">
                                            <div class="card">

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="email" role="tabpanel">
                                            <form action="<?= site_url('email'); ?>" method="post">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= $m['email']; ?>">
                                                    <label for="floatingInput">Alamat email</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="subject" value="">
                                                    <label for="floatingInput">Subjek</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">
                                                </textarea>
                                                    <label for="floatingTextarea2">Pesan</label>
                                                </div>
                                                <div class="form-floating d-grid gap-2">
                                                    <button type="submit" class="btn btn-success btn-lg waves-effect waves-light">Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="email1" role="tabpanel">
                                            <form action="<?= site_url('email'); ?>" method="post">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= $m['email']; ?>">
                                                    <label for="floatingInput">Alamat email</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" placeholder="subject" value="SELAMAT <?= strtoupper($m['nama']); ?> TELAH TERDAFTAR DI <?= strtoupper($m['program_studi']); ?> UNIVERSITAS NASIONAL">
                                                    <label for="floatingInput">Subjek</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">     Selamat kepada saudara/i <?= strtoupper($m['nama']); ?> telah terdaftar pada program studi <?= strtoupper($m['program_studi']); ?> UNIVERSITAS NASIONAL.
                                                </textarea>
                                                    <label for="floatingTextarea2">Pesan</label>
                                                </div>
                                                <div class="form-floating d-grid gap-2">
                                                    <button type="submit" class="btn btn-success btn-lg waves-effect waves-light">Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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