<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>

        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <div id="total-revenue-chart"></div>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1">
                                <a data-bs-toggle="popover" data-bs-title="Total Pendaftar" data-bs-content="Applicant + Admitted + Enrollee = Total Pendaftar" style="text-decoration: none; color:#495057;">Total Pendaftar</a>
                            </h4>
                            <p class="text-muted mb-0"><span data-plugin="counterup"><?= $pendaftar; ?></span></p>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <div id="customers-chart"> </div>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1">
                                <a data-bs-toggle="popover" data-bs-title="Total Daftar Ulang" data-bs-content="Enrollee = Total Daftar Ulang" style="text-decoration: none; color:#495057;">Total Daftar Ulang</a>
                            </h4>
                            <p class="text-muted mb-0"><span data-plugin="counterup"><?= $daftar_ulang; ?></span></p>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->


            <div class="col-md-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end mt-2">
                            <div id="orders-chart"> </div>
                        </div>
                        <div>
                            <h4 class="mb-1 mt-1">
                                <a data-bs-toggle="popover" data-bs-title="Total Belum Daftar Ulang" data-bs-content="Admitted = Total Belum Daftar Ulang" style="text-decoration: none; color:#495057;">Total Belum Daftar Ulang</a>
                            </h4>
                            <p class="text-muted mb-0"><span data-plugin="counterup"><?= $belum_daftar; ?></span></p>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->

        </div> <!-- end row-->

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fw-semibold">Urutkan :</span> <span class="text-muted" id='ubah'>
                                        Perminggu
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton5">
                                    <button type="submit" class="dropdown-item" id='tombolPerminggu' value="Perminggu">
                                        Perminggu
                                    </button>
                                    <button type="submit" class="dropdown-item" id='tombolPerbulan' value="Perbulan">
                                        Perbulan
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Grafik -->
                        <h4 class="card-title mb-4" id="title-chart">Data Perminggu </h4>

                        <div class="mt-0">
                            <div id="column_chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col-->

            <!-- Grafik ke-2 -->
            <!-- <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="float-end">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fw-semibold">Urutkan :</span> <span class="text-muted" id='ubah'>
                                        Perminggu
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton5">
                                    <button type="submit" class="dropdown-item" id='tombolPerminggu' value="Perminggu">
                                        Perminggu
                                    </button>
                                    <button type="submit" class="dropdown-item" id='tombolPerbulan' value="Perbulan">
                                        Perbulan
                                    </button>
                                    <button type="submit" class="dropdown-item" id='tombolPertahun' value="Pertahun">
                                        Pertahun
                                    </button>
                                </div>
                            </div>
                        </div>

                        <h4 class="card-title mb-4">Data Perbulan </h4>

                        <div class="mt-0">
                            <div id="column_chart2" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div> <!-- end row-->
    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

<!-- Ubah Urut -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tombolPerminggu').on('click', function() {
            $('#ubah').text('Perminggu');
            $('#title-chart').text('Data Perminggu');

            let change = createChart();
            createInstance(change);
        })
        $('#tombolPerbulan').on('click', function() {
            $('#ubah').text('Perbulan');
            $('#title-chart').text('Data Perbulan');

            let change = createChart2();
            createInstance(change);
        })
    })
</script>

<script>
    var options = {
        chart: {
            height: 375,
            type: 'bar',
            toolbar: {
                show: false,
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '45%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Pendaftar',
            data: <?php echo json_encode($data_pendaftar_week) ?>,
        }, {
            name: 'Belum Daftar Ulang',
            data: <?php echo json_encode($data_belum_daftar_ulang_week) ?>,
        }, {
            name: 'Daftar Ulang',
            data: <?php echo json_encode($data_daftar_ulang_week) ?>,
        }],
        colors: ['#5b73e8', '#f1b44c', '#34c38f'],
        xaxis: {
            categories: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu'],
        },
        yaxis: {
            title: {
                text: 'Orang'
            }
        },
        grid: {
            borderColor: '#f1f1f1',
        },
        fill: {
            opacity: 1

        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + " orang"
                }
            }
        }
    }

    function createChart() {
        options.series[0].data = <?php echo json_encode($data_pendaftar_week) ?>;
        options.series[1].data = <?php echo json_encode($data_belum_daftar_ulang_week) ?>;
        options.series[2].data = <?php echo json_encode($data_daftar_ulang_week) ?>;

        options.xaxis.categories = <?php echo json_encode($range_week) ?>;
        return options;
    }

    function createChart2() {
        options.series[0].data = <?php echo json_encode($data_pendaftar_month) ?>;
        options.series[1].data = <?php echo json_encode($data_belum_daftar_ulang_month) ?>;
        options.series[2].data = <?php echo json_encode($data_daftar_ulang_month) ?>;

        options.xaxis.categories = <?php echo json_encode($range_month) ?>;
        return options;
    }

    function createInstance(options) {
        var chart = new ApexCharts(
            document.querySelector("#column_chart"),
            options
        );
        chart.render();
    }
</script>

<script>
    var pendaftar = <?php echo json_encode($data_pendaftar_week) ?>;
    var belum_daftar = <?php echo json_encode($data_belum_daftar_ulang_week) ?>;
    var daftar_ulang = <?php echo json_encode($data_daftar_ulang_week) ?>;

    var categories = <?php echo json_encode($range_week) ?>;
    console.log(pendaftar, belum_daftar, daftar_ulang);
</script>

<?= $this->endSection(); ?>