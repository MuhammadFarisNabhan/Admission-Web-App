<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>
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
                                            <a href="/prospect/create" class="btn btn-success ms-3 py-2"><i class="uil uil-file-plus-alt font-size-15 align-middle me-1"></i><span> Add Data</span></a>
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
                                                <form method="post" action="/prospect/upload_file" enctype="multipart/form-data">
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
                                            <a href="/prospect/template_file" target="_blank" class="btn btn-secondary"><i class="uil uil-file-download font-size-15 align-middle me-1"></i> <span class="align-middle">Template File</span></a>
                                        </span>
                                    </button>
                                </div>
                                <?= $this->include('User/email'); ?>

                                <!-- <div class="row search-bar">
                                    <div class="col col-md-5 col-xl-5 top-0 end-0 position-absolute">
                                        <form action="/prospect/search" method="post">
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
                                        <th style="text-align: center;" class="text-center">
                                            <input type="checkbox" name="checkbox_all" class="all_chk">
                                        </th>
                                        <th style="text-align: center;" class="text-center">No</th>
                                        <th style="text-align: center;" class="text-center">Nama</th>
                                        <th style="text-align: center;" class="text-center">Asal Sekolah</th>
                                        <th style="text-align: center;" class="text-center">No Telepon</th>
                                        <th style="text-align: center;" class="text-center">Status Pembayaran</th>
                                        <th style="text-align: center;" class="text-center">Program</th>
                                        <th style="text-align: center;" class="text-center">Program Studi</th>
                                        <th style="text-align: center;" class="text-center">Email</th>
                                        <th style="text-align: center;" class="text-center">Aksi</th>
                                    </tr>
                                    <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                                    <?php foreach ($prospect as $p) : ?>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <input name="checkbox_value[]" type="checkbox" data-id="<?= $p['id']; ?>" value="<?= $p['id']; ?>" class="sub_chk">
                                        </td>
                                        <td>
                                            <?= $i++; ?>
                                        </td>
                                        <td class="text-center">
                                            <form action="/prospect/user/<?= $p['id']; ?>" method="post" class="d-inline">
                                                <input type="hidden" name="_method" value="USER">
                                                <button type="submit" style="border:none;background-color:white;" id="nama_mahasiswa">
                                                    <?= $p['nama']; ?>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <?= $p['asal_sekolah']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $p['no_telp']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $p['status_pembayaran']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $p['program']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $p['program_studi']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $p['email']; ?>
                                        </td>
                                        <td>
                                            <div class="grid-container">
                                                <div class="grid-items">
                                                    <form action="/prospect/edit/<?= $p['id']; ?>" method="post" class="d-inline">
                                                        <input type="hidden" name="_method" value="EDIT">
                                                        <button type="submit" class="btn btn-warning px-2 waves-effect waves-light"><i class="uil uil-pen font-size-18"></i></button>
                                                    </form>
                                                </div>
                                                <div class="grid-items">
                                                    <form action="/prospect/delete/<?= $p['id']; ?> " method="post" class="d-inline delete-form">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="button" class="btn btn-danger px-2 waves-effect waves-light sa-warning-prospect" value="<?= $p['id']; ?>"><i class="uil uil-trash-alt font-size-18"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            <?php endforeach; ?>
                            </thead>
                            </table>
                            <?= $pager->Links('prospect', 'prospect_pagination');
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

                                    $.ajax({
                                        type: 'POST',
                                        url: '/prospect/deleteAll',
                                        data: {
                                            query: allVals
                                        },
                                        success: function() {
                                            window.location.href = '/prospect';
                                        }
                                    })
                                });

                                $('.send_email').on('click', function(e) {
                                    var allVals = [];

                                    $(".sub_chk:checked").each(function() {
                                        allVals.push($(this).attr('data-id'));
                                    });

                                    console.log(allVals);

                                    $.ajax({
                                        type: 'POST',
                                        url: '/prospect/getEmail',
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
</div>

<?= $this->endSection(); ?>