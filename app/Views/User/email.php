<div class="d-inline-block position-relative">
    <div class="btn-group mb-2">
        <button type="submit" class="btn btn-secondary waves-effect waves-light mt-2 py-2 hidden send_email" data-bs-toggle="modal" data-bs-target="#ModalEmail" id="data_selected"><i class="uil uil-envelope font-size-15 align-middle me-1"></i> <span id="sum_checkbox"> Send Email</span></button>
        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split waves-effect waves-light mt-2 py-2 hidden" id="dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mdi mdi-chevron-down fw-bolder"></i>
        </button>
        <div class="dropdown-menu">
            <button type="button" class="dropdown-item delete_all sa-success"><i class="uil uil-trash-alt font-size-15 align-middle me-1"></i> <span> Delete selected data</span></button>
        </div>
    </div><!-- /btn-group -->
    <!-- <div id="ModalEmail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Send Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= site_url('email'); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <?= csrf_field(); ?>
                            <div class="tab-pane" id="email" role="tabpanel">
                                <form action="<?= site_url('email'); ?>" method="post">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control email_tujuan" id="floatingInput" placeholder="name@example.com" name="email_tujuan" value="">
                                        <label for="floatingInput">Alamat email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="subject" value="" name="subject">
                                        <label for="floatingInput">Subjek</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="pesan"></textarea>
                                        <label for="floatingTextarea2">Pesan</label>
                                    </div>
                                    <div class="form-floating d-grid gap-2">
                                        <button type="submit" class="btn btn-success btn-lg waves-effect waves-light">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Modal -->
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
                                <input type="text" class="form-control email_tujuan" name="email_tujuan" placeholder="To">
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