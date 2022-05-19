<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-clip: border-box;
            border: 0 solid #2d3448;
            border-radius: 0.25rem;
        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem 1.25rem;
        }

        .row {
            --bs-gutter-x: 24px;
            --bs-gutter-y: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-0.5 * var(--bs-gutter-x));
            margin-left: calc(-0.5 * var(--bs-gutter-x));
        }

        .row>* {
            -ms-flex-negative: 0;
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * 0.5);
            padding-left: calc(var(--bs-gutter-x) * 0.5);
            margin-top: var(--bs-gutter-y);
        }

        .col {
            -webkit-box-flex: 1;
            -ms-flex: 1 0 0%;
            flex: 1 0 0%;
        }

        .col-4 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 33.33333333%;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <div class="invoice-title">
                <h3><?= $title ?></h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <address>
                        <strong>Identitas pengaju</strong><br>
                        <?php //getNamaKategori
                        $Nama = '';
                        $NIK = '';
                        $Email = '';
                        foreach ($customer as $a) {
                            if ($pengaduan['idCustomer'] == $a['idCustomer']) {
                                $Nama = $a['Nama'];
                                $NIK = $a['NIK'];
                                $Email = $a['Email'];
                            }
                        }
                        ?>
                        <?= $Nama; ?><br>
                        <?= $NIK; ?><br>
                        <?= $Email; ?><br>
                    </address>
                </div>
                <div class="col-4">
                    <?php //getNamaKategori
                    $k = '';
                    foreach ($kategori as $a) {
                        if ($pengaduan['idKategori'] == $a['idKategori']) {
                            $k = $a['namaKategori'];
                        }
                    }
                    ?>
                    <address>
                        <strong>Kode Tiket P-<?= $pengaduan['idPengaduan']; ?></strong><br>
                        <?= $k; ?><br>
                        <?= $pengaduan['Judul']; ?><br>
                        <?= $pengaduan['Isi']; ?><br>
                        Lampiran : <a href="/lampiran/<?= $pengaduan['Lampiran']; ?>">Lampiran</a><br>
                        <?= $pengaduan['Status']; ?>
                    </address>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4 mt-3">

                </div>
                <div class="col-4 mt-3">
                    <address>
                        <strong>Tanggal dibuat</strong><br>
                        <?php $tgl = date("d F Y H:i", strtotime($pengaduan['created_at'])); ?>
                        <?= $tgl; ?><br>
                    </address>
                </div>
            </div>
        </div>
    </div>
</body>

</html>