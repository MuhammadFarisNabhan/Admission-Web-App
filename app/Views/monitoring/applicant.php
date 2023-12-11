<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>
        <!-- Table -->
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <?php if (session()->getFlashdata('message')) : ?>
                            <div class="alert alert-success mt-3" role="alert">
                                <?= session()->getFlashdata('message'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="row mb-2">
                            <div class="col">
                                <div class="dropdown d-inline-block position-relative">
                                    <button type="button" class="btn header-item tambah_data" id="page-header-user-dropdown" aria-expanded="false">
                                        <span class="d-xl-inline-block mx-auto  fw-medium font-size-15">
                                            <a href="/applicant/create" class="btn btn-success ms-3 py-2"><i class="uil uil-file-plus-alt font-size-15 align-middle me-1"></i><span> Add Data</span></a>
                                        </span>
                                    </button>
                                </div>

                                <button type="button" class="btn btn-primary waves-effect waves-light upload_file" data-bs-toggle="modal" data-bs-target="#myModal"><i class="uil uil-upload font-size-12 align-middle me-1"></i> <span class="align-middle">Upload File</span></button>
                                <!-- sample modal content -->
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">Upload File</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="/applicant/upload_file" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <?= csrf_field(); ?>
                                                        <input type="file" name="upload_file" class="form-control" placeholder="Enter File" id="upload_file">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light" name="submit">Upload</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <div class="dropdown d-inline-block position-relative ">
                                    <button type="button" class="btn header-item template_file" id="page-header-user-dropdown" aria-expanded="false">
                                        <span class="d-xl-inline-block mx-auto  fw-medium font-size-15">
                                            <a href="/applicant/template_file" target="_blank" class="btn btn-secondary"><i class="uil uil-file-download font-size-15 align-middle me-1"></i> <span class="align-middle">Template File</span></a>
                                        </span>
                                    </button>
                                </div>
                                <?= $this->include('User/email'); ?>

                                <!-- <div class="row search-bar">
                                    <div class="col col-md-5 col-xl-5 top-0 end-0 position-absolute">
                                        <form action="" method="post">
                                            <div class="input-group my-3">
                                                <input type="text" class="form-control" placeholder="Masukkan keyword pencarian.." name="keyword">
                                                <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                                            </div>
                                        </form>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">
                                            <input type="checkbox" name="checkbox_all" class="all_chk">
                                        </th>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Asal Sekolah</th>
                                        <th style="text-align: center;">No Telepon</th>
                                        <th style="text-align: center;">Status Pembayaran</th>
                                        <th style="text-align: center;">No Formulir</th>
                                        <th style="text-align: center;">Tanggal Ujian</th>
                                        <th style="text-align: center;">Program</th>
                                        <th style="text-align: center;">Program Studi</th>
                                        <th style="text-align: center;">Email</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                    <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                                    <?php foreach ($applicant as $a) : ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input name="checkbox_value[]" type="checkbox" data-id="<?= $a['id']; ?>" value="<?= $a['id']; ?>" class="sub_chk">
                                        </td>
                                        <td>
                                            <?= $i++; ?>
                                        </td>
                                        <td class="text-center">
                                            <form action="/applicant/user/<?= $a['id']; ?>" method="post" class="d-inline">
                                                <input type="hidden" name="_method" value="USER">
                                                <button type="submit" style="border:none;background-color:white" id="nama_mahasiswa">
                                                    <?= $a['nama']; ?>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <?= $a['asal_sekolah']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $a['no_telp']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $a['status_pembayaran']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $a['no_formulir'] ? $a['no_formulir'] : ''; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $a['tanggal_ujian'] ? $a['tanggal_ujian']  : ''; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $a['program']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $a['program_studi']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $a['email']; ?>
                                        </td>
                                        <td>
                                            <div class="grid-container">
                                                <div class="grid-items">
                                                    <form action="/applicant/edit/<?= $a['id']; ?>" method="post" class="d-inline">
                                                        <input type="hidden" name="_method" value="EDIT">
                                                        <button type="submit" class="btn btn-warning px-2"><i class="uil uil-pen font-size-18"></i></button>
                                                    </form>
                                                </div>
                                                <div class="grid-items">
                                                    <form action="/applicant/delete/<?= $a['id']; ?> " method="post" class="d-inline delete-form">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="button" class="btn btn-danger px-2 waves-effect waves-light sa-warning-applicant" value="<?= $a['id']; ?>"><i class="uil uil-trash-alt font-size-18"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                            </thead>
                            </table>
                            <?= $pager->links('applicant', 'applicant_pagination');
                            ?>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {

                                $('.all_chk').on('click', function(e) {
                                    var allVals = []
                                    if ($(this).is(':checked')) {
                                        $(".sub_chk").prop('checked', true);
                                        $(".sub_chk:checked").each(function() {
                                            allVals.push($(this).data('id'));
                                        });
                                    } else {
                                        $(".sub_chk").prop('checked', false);
                                    }
                                });

                                var data_selected = $('#data_selected');
                                var dropdown = $('#dropdown');
                                var checkArr = [];
                                $(".sub_chk").each(function() {
                                    $(this).on('click', function() {
                                        if ($(this).is(":checked")) {
                                            checkArr.push($(this).data('id'));
                                            data_selected.removeClass('hidden');
                                            dropdown.removeClass('hidden');
                                        } else {
                                            var idToRemove = $(this).data('id');
                                            var indexToRemove = checkArr.indexOf(idToRemove);
                                            if (indexToRemove !== -1) {
                                                checkArr.splice(indexToRemove, 1);
                                            }

                                            if (checkArr.length === 0) {
                                                data_selected.addClass('hidden');
                                                dropdown.addClass('hidden');
                                            }
                                        }
                                    });
                                });


                                $(".all_chk").on('click', function() {
                                    if ($(this).is(":checked")) {
                                        data_selected.removeClass('hidden');
                                        dropdown.removeClass('hidden');
                                    } else {
                                        data_selected.addClass('hidden');
                                        dropdown.addClass('hidden');
                                    }
                                });
                                $('.delete_all').on('click', function(e) {
                                    var allVals = [];

                                    $(".sub_chk:checked").each(function() {
                                        allVals.push($(this).attr('data-id'));
                                    });

                                    console.log(allVals);

                                    $.ajax({
                                        type: 'POST',
                                        url: '/applicant/deleteAll',
                                        data: {
                                            query: allVals
                                        },
                                        success: function() {

                                            window.location.href = '/applicant';
                                        }
                                    })
                                });
                                $('.send_email').on('click', function(e) {
                                    var allVals = [];

                                    $(".sub_chk:checked").each(function() {
                                        allVals.push($(this).attr('data-id'));
                                    });

                                    $.ajax({
                                        type: 'POST',
                                        url: '/applicant/getEmail',
                                        data: {
                                            query: allVals
                                        },
                                        success: function(response) {
                                            $('.email_tujuan').attr('value', response.emails);
                                        }
                                    })
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>