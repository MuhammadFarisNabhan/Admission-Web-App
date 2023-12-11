<div class="modal-body">
    <div class="d-flex flex-row hidden" id="content-1">
        <div class="d-inline">
            <a class="tab-content-dropdown2" style="color:#6C757D">
                <i class="uil uil-angle-right-b fs-4 ms-0 me-2 ps-0"></i>
            </a>
        </div>
        <div class="d-inline flex-grow-1">
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
                <i class="<?= $icon; ?> font-size-14 mt-0 p-2 py-1 <?= $iconColor; ?>"></i>
                <span class="font-size-18 ms-2 ps-0" style="color: <?= $color; ?>;">
                    <?= $type; ?>
                </span>
            </div>
            <div class="d-block mt-2 ms-5" id="log">
                <h6 class="font-size-16 ps-0">You Logged a <?= $type; ?></h6>
            </div>
        </div>
        <div class="align-items-end">
            <span class="font-size-18 ms-3" style="color: #74788D;"> Today</span>
            <i class="uil uil-sort font-size-16"></i>
            <!-- <i class="uil uil-scroll font-size-16"></i> -->
        </div>
    </div>
    <div class="d-block d-flex flex-row hidden ms-4 ps-2" id="content-2">
        <div class="d-inline border border-2 rounded border-secondary mt-3" style="width: 630px;">
            <h6 class="ps-2">
                Pesan :
                <?= $data['comments']; ?>
                <?= $data['id_activity']; ?>
            </h6>
        </div>
    </div>
</div>