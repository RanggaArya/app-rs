<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">

        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body py-3">
                        <form action="" method="GET" class="form-inline justify-content-end">
                            <label class="mr-2 font-weight-bold">Filter:</label>
                            <select name="month" class="form-control mr-2 form-control-sm">
                                <option value="all" <?= ($sel_month == 'all') ? 'selected' : '' ?>>-- 1 Tahun Full --</option>
                                <?php 
                                $months = ['01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni','07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember'];
                                foreach($months as $k => $v): ?>
                                    <option value="<?= $k ?>" <?= ($k == $sel_month) ? 'selected' : '' ?>><?= $v ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select name="year" class="form-control mr-2 form-control-sm">
                                <option value="all" <?= ($sel_year == 'all') ? 'selected' : '' ?>>-- Semua Tahun --</option>
                                <?php for($i=date('Y'); $i>=2023; $i--): ?>
                                    <option value="<?= $i ?>" <?= ($i == $sel_year) ? 'selected' : '' ?>><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm">Tampilkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-md-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" 
                                     data-toggle="tooltip" data-placement="top" 
                                     title="Jumlah individu unik (berdasarkan IP Address) yang mengakses website.">
                                    Visitors (Orang) <i class="fa fa-info-circle ml-1"></i>
                                </div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800"><?= number_format($summary->unique_visitors) ?></div>
                            </div>
                            <div class="col-auto"><i class="fa fa-users fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-xl-4 col-md-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"
                                     data-toggle="tooltip" data-placement="top" 
                                     title="Jumlah sesi kedatangan. Satu orang (Visitor) bisa melakukan berkali-kali kunjungan (Visits) di waktu yang berbeda (beda sessions).">
                                    Visits (Kunjungan) <i class="fa fa-info-circle ml-1"></i>
                                </div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800"><?= number_format($summary->number_of_visits) ?></div>
                            </div>
                            <div class="col-auto"><i class="fa fa-door-open fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-xl-4 col-md-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"
                                     data-toggle="tooltip" data-placement="top" 
                                     title="Total seluruh halaman yang dibuka/diklik. Jika satu orang membuka 5 artikel, maka akan terhitung 5 Views.">
                                    Pages (Views) <i class="fa fa-info-circle ml-1"></i>
                                </div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800"><?= number_format($summary->pages) ?></div>
                            </div>
                            <!--<div class="col-auto"><i class="fa fa-file-alt fa-2x text-gray-300"></i></div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Grafik History: <?= $periode_label ?></h6></div>
                    <div class="card-body">
                        <div style="height: 350px;"><canvas id="mainChart"></canvas></div>
                        <br>
                        
                        <div class="table-responsive mt-4">
                            <table class="table table-bordered table-striped table-hover table-sm text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-left">Waktu / Periode</th>
                                        <th>Visitors (Orang)</th>
                                        <th>Visits (Kunjungan)</th>
                                        <th>Pages (Views)</th>
                                        <th>Avg Pages/Visit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // Inisialisasi variabel total
                                    $sum_visitors = 0; 
                                    $sum_visits = 0; 
                                    $sum_pages = 0;
                                    
                                    if(!empty($timeline)):
                                        foreach($timeline as $row): 
                                            // Hitung Total
                                            $sum_visitors += $row->visitors;
                                            $sum_visits   += $row->visits;
                                            $sum_pages    += $row->pages;
                                            
                                            // Hitung Rata-rata
                                            $avg = ($row->visits > 0) ? round($row->pages / $row->visits, 1) : 0;
                                    ?>
                                    <tr>
                                        <td class="text-left pl-3 font-weight-bold"><?= $row->label ?></td>
                                        <td><?= number_format($row->visitors) ?></td>
                                        <td><?= number_format($row->visits) ?></td>
                                        <td><?= number_format($row->pages) ?></td>
                                        <td><?= $avg ?></td>
                                    </tr>
                                    <?php endforeach; else: ?>
                                    <tr><td colspan="5">Tidak ada data untuk ditampilkan.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot class="bg-secondary text-white font-weight-bold">
                                    <tr>
                                        <td class="text-left pl-3">TOTAL</td>
                                        <td><?= number_format($sum_visitors) ?></td>
                                        <td><?= number_format($sum_visits) ?></td>
                                        <td><?= number_format($sum_pages) ?></td>
                                        <td>-</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card shadow">
                    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-info">Aktivitas per Jam</h6></div>
                    <div class="card-body">
                        <div style="height: 250px;"><canvas id="hourChart"></canvas></div>
                        <div class="table-responsive mt-3" style="max-height: 200px; overflow-y: auto;">
                            <table class="table table-bordered table-sm text-center" style="font-size: 12px;">
                                <thead class="bg-light">
                                    <tr><th>Jam</th><th>Visitors</th><th>Visits</th><th>Pages</th></tr>
                                </thead>
                                <tbody>
                                    <?php foreach($stats_hour as $row): ?>
                                    <tr>
                                        <td><?= str_pad($row->jam, 2, '0', STR_PAD_LEFT) . ":00" ?></td>
                                        <td><?= number_format($row->visitors) ?></td>
                                        <td><?= number_format($row->visits) ?></td>
                                        <td><?= number_format($row->pages) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="card shadow">
                    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-warning">Aktivitas per Hari</h6></div>
                    <div class="card-body">
                        <div style="height: 250px;"><canvas id="dayChart"></canvas></div>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-sm text-center" style="font-size: 12px;">
                                <thead class="bg-light">
                                    <tr><th>Hari</th><th>Visitors</th><th>Visits</th><th>Pages</th></tr>
                                </thead>
                                <tbody>
                                    <?php foreach($stats_day as $row): ?>
                                    <tr>
                                        <td class="text-left pl-3"><?= $row->hari ?></td>
                                        <td><?= number_format($row->visitors) ?></td>
                                        <td><?= number_format($row->visits) ?></td>
                                        <td><?= number_format($row->pages) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 border-bottom-0">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <i class="fa fa-list-ol mr-1"></i> Top 25 Halaman Paling Sering Dikunjungi
                        </h6>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead class="bg-light text-dark">
                                    <tr>
                                        <th style="width: 50%;">URL / Halaman</th>
                                        <th class="text-center text-primary">Visitors (Orang)</th>
                                        <th class="text-center text-warning">Visits (Kunjungan)</th>
                                        <th class="text-center text-success">Pages (Views)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($top_pages)): ?>
                                        <?php foreach($top_pages as $page): ?>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="font-weight-bold text-dark">
                                                    <?= ($page->page_slug != 'home' && $page->page_slug != '') ? ucfirst(str_replace('-', ' ', $page->page_slug)) : 'Halaman Utama / Lainnya'; ?>
                                                </div>
                                                <small class="text-muted">
                                                    <a href="<?= $page->page_url ?>" target="_blank" class="text-secondary" style="text-decoration: underline;">
                                                        <?= $page->page_url ?> <i class="fa fa-external-link-alt ml-1" style="font-size: 10px;"></i>
                                                    </a>
                                                </small>
                                            </td>
                                            <td class="text-center align-middle h6"><?= number_format($page->visitors) ?></td>
                                            <td class="text-center align-middle h6"><?= number_format($page->visits) ?></td>
                                            <td class="text-center align-middle h5 font-weight-bold text-success"><?= number_format($page->pages) ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center py-4 text-muted">
                                                <i class="fa fa-info-circle mb-2" style="font-size: 24px;"></i><br>
                                                Belum ada data kunjungan pada periode ini.
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
// Helper: Membuat Dataset Grafik (Bar)
function createDatasets(visitors, visits, pages) {
    return [
        { 
            label: 'Visitors', 
            data: visitors, 
            backgroundColor: '#4e73df', // Biru
            borderColor: '#4e73df',
            borderWidth: 1 
        },
        { 
            label: 'Visits', 
            data: visits, 
            backgroundColor: '#f6c23e', // Kuning
            borderColor: '#f6c23e',
            borderWidth: 1 
        },
        { 
            label: 'Pages', 
            data: pages, 
            backgroundColor: '#1cc88a', // Hijau
            borderColor: '#1cc88a',
            borderWidth: 1 
        }
    ];
}

// 1. GRAFIK UTAMA (BAR CHART)
var ctxMain = document.getElementById('mainChart').getContext('2d');
new Chart(ctxMain, {
    type: 'bar', // Menggunakan BAR CHART sesuai permintaan
    data: {
        labels: <?= json_encode(array_column($timeline, 'label')) ?>,
        datasets: createDatasets(
            <?= json_encode(array_column($timeline, 'visitors')) ?>,
            <?= json_encode(array_column($timeline, 'visits')) ?>,
            <?= json_encode(array_column($timeline, 'pages')) ?>
        )
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            y: { beginAtZero: true }
        },
        interaction: {
            mode: 'index',
            intersect: false,
        },
        plugins: {
            tooltip: {
                mode: 'index',
                intersect: false
            }
        }
    }
});

// 2. GRAFIK PER JAM (BAR)
var ctxHour = document.getElementById('hourChart').getContext('2d');
new Chart(ctxHour, {
    type: 'bar',
    data: {
        labels: <?= json_encode(array_map(function($r){ return str_pad($r->jam, 2, '0', STR_PAD_LEFT).":00"; }, $stats_hour)) ?>,
        datasets: createDatasets(
            <?= json_encode(array_column($stats_hour, 'visitors')) ?>,
            <?= json_encode(array_column($stats_hour, 'visits')) ?>,
            <?= json_encode(array_column($stats_hour, 'pages')) ?>
        )
    },
    options: { maintainAspectRatio: false, scales: { y: { beginAtZero: true } } }
});

// 3. GRAFIK PER HARI (BAR)
var ctxDay = document.getElementById('dayChart').getContext('2d');
new Chart(ctxDay, {
    type: 'bar',
    data: {
        labels: <?= json_encode(array_column($stats_day, 'hari')) ?>,
        datasets: createDatasets(
            <?= json_encode(array_column($stats_day, 'visitors')) ?>,
            <?= json_encode(array_column($stats_day, 'visits')) ?>,
            <?= json_encode(array_column($stats_day, 'pages')) ?>
        )
    },
    options: { maintainAspectRatio: false, scales: { y: { beginAtZero: true } } }
});
</script>