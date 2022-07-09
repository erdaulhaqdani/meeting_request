<div class="col-md-3">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Statistik Pengaduan</h4>
            <canvas id="pengaduan"></canvas>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Statistik Janji Temu</h4>
            <canvas id="meeting"></canvas>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <p class="text-truncate font-size-14 mb-2">Jumlah Customer</p>
                    <h4 class="mb-2"><?php foreach ($customer->getResultObject() as $a) : ?>
                            <?= $a->idCustomer; ?>
                        <?php endforeach ?></h4>
                    <p class="text-muted mb-0 font-size-13">Customer berstatus aktif</p>
                </div>
                <div class="avatar-sm">
                    <span class="avatar-title bg-light text-primary rounded-3">
                        <i class="ri-user-3-line font-size-24"></i>
                    </span>
                </div>
            </div>
        </div><!-- end cardbody -->
    </div><!-- end card -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <p class="text-truncate font-size-14 mb-2">Tanda Terima</p>
                    <h4 class="mb-2"><?php foreach ($jumlah_tandaTerima->getResultObject() as $a) : ?>
                            <?= $a->id_tt; ?>
                        <?php endforeach ?></h4>
                    <p class="text-muted mb-0 font-size-13">Jumlah tanda terima masuk</p>
                </div>
                <div class="avatar-sm">
                    <span class="avatar-title bg-light text-primary rounded-3">
                        <i class=" ri-mail-check-line font-size-24"></i>
                    </span>
                </div>
            </div>
        </div><!-- end cardbody -->
    </div><!-- end card -->
</div><!-- end col -->
<div class="col-xl-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">

                <div class="flex-grow-1">
                    <p class="text-truncate font-size-14 mb-2">Customer Baru</p>
                    <h4 class="mb-2"><?php foreach ($cust_baru->getResultObject() as $a) : ?>
                            <?= $a->idCustomer; ?>
                        <?php endforeach ?></h4>
                    <p class="text-muted mb-0 font-size-13">Dalam 7 hari terakhir</p>
                </div>
                <div class="avatar-sm">
                    <span class="avatar-title bg-light text-success rounded-3">
                        <i class="ri-user-3-line font-size-24"></i>
                    </span>
                </div>
            </div>
        </div><!-- end cardbody -->
    </div><!-- end card -->
</div>

<!-- Chart donut statistik pengaduan -->
<script>
    var pengaduan = document.getElementById('pengaduan');
    var data_pengaduan = [];
    var label_pengaduan = [];

    <?php foreach ($groupPengaduan->getResult() as $key => $value) : ?>
        data_pengaduan.push(<?= $value->Jumlah ?>);
        label_pengaduan.push('<?= $value->Status ?>');
    <?php endforeach ?>

    var data_group_pengaduan = {
        datasets: [{
            data: data_pengaduan,
            backgroundColor: [
                '#f32f53',
                '#0f9cf3',
                '#6fd088',
                '#0097a7'
            ],
        }],
        labels: label_pengaduan,

    }

    var chart_pengaduan = new Chart(pengaduan, {
        type: 'doughnut',
        data: data_group_pengaduan,
        options: {
            plugins: {
                legend: {
                    align: 'start',
                    labels: {
                        boxWidth: 15
                    }
                }
            }
        }
    });
</script>

<!-- Chart donut statistik meeting -->
<script>
    var meeting = document.getElementById('meeting');
    var data_meeting = [];
    var label_meeting = [];

    <?php foreach ($groupMeeting->getResult() as $key => $value) : ?>
        data_meeting.push(<?= $value->Jumlah ?>);
        label_meeting.push('<?= $value->Status ?>');
    <?php endforeach ?>

    var data_group_meeting = {
        datasets: [{
            data: data_meeting,
            backgroundColor: [
                '#f32f53',
                '#0f9cf3',
                '#6fd088',
                '#0097a7'
            ],
        }],
        labels: label_meeting,
    }

    var chart_meeting = new Chart(meeting, {
        type: 'doughnut',
        data: data_group_meeting,
        options: {
            plugins: {
                legend: {
                    align: 'start',
                    labels: {
                        boxWidth: 15
                    }
                }
            }
        }
    });
</script>