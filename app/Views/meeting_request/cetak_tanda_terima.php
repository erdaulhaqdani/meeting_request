<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tanda Terima</title>
</head>
<style>
  body {
    font-family: arial;
    background-color: #ccc;
  }

  .rangkaSurat {
    width: 900px;
    margin: 0 auto;
    background-color: #fff;
    height: 600px;
    padding: 20px;
  }

  .kop {
    border-bottom: 5px solid #000;
    padding: 2px
  }

  .tengah {
    text-align: center;
    line-height: 5px;
  }

  .judul {
    text-align: center;
    padding: 3px;
  }

  .isi {
    padding: 5px;
    padding-left: 70px;
  }

  .isian {
    border-bottom: 1px solid #000;
    width: 60%;
    text-align: left
  }

  .kanan {
    width: 10%;
  }

  .penerima {
    margin-top: 50px;
  }

  .penerima .p {
    text-align: right;
    padding-bottom: 80px;
    width: 90%;
  }

  .penerima.kanan {
    width: 10%;
  }

  .penerima .nama {
    text-align: right;
    width: 90%;
  }
</style>

<body>

  <?php
  function formatTanggalNum($date)
  {
    // ubah string menjadi format tanggal

    return date('d-m-Y', strtotime($date));
  }
  $date = $tanda_terima['Tanggal'];
  ?>

  <div class="rangkaSurat">
    <table class="kop" width="100%" border="0">
      <tr>
        <!-- <td>
          <center><img src="logo_kemenkeu.png" width="140px" alt=""></center>
        </td> -->
        <td class="tengah">
          <h3>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</h3>
          <h3>DIREKTORAT JENDERAL KEKAYAAN NEGARA</h3>
          <h4>KANTOR WILAYAH DJKN JAWA BARAT</h4>
          <h3>KANTOR PELAYANAN KEKAYAAN NEGARA DAN LELANG BANDUNG</h3>
          <h3>AREA PELAYANAN TERPADU BERSAMA</h3>
          <p>Gedung Keuangan Negara (GKN) Bandung</p>
          <p>Jalan Asia Afrika No.114 Bandung 40261</p>
          <p> Telepon: (022) 4216161 Faksimile: (022)4263131</p>
        </td>
      </tr>
    </table>

    <table width="100%" border="0">
      <tr>
        <td class="judul" colspan="4">
          <h3>TANDA TERIMA</h3>
        </td>
      </tr>
      <tr>
        <td width="30%" class="isi">Telah diterima dari</td>
        <td width="2px">:</td>
        <td class="isian"> <?= $tanda_terima['Pengirim']; ?></td>
        <td class="kanan"></td>
      </tr>
      <tr>
        <td class="isi"> No. Surat </td>
        <td>:</td>
        <td class="isian"><?= $tanda_terima['No_surat']; ?></td>
        <td class="kanan"></td>
      </tr>
      <tr>
        <td class="isi"> Tanggal Surat </td>
        <td>:</td>
        <td class="isian"><?= formatTanggalNum($date) ?></td>
        <td class="kanan"></td>
      </tr>
      <tr>
        <td class="isi"> Perihal</td>
        <td>:</td>
        <td class="isian"><?= $tanda_terima['Perihal']; ?></td>
        <td class="kanan"></td>
      </tr>
    </table>

    <table class="penerima" border="0" width="100%">
      <tr>
        <td class="p">Penerima</td>
        <td class="kanan"></td>
      </tr>
      <tr>
        <td class="nama">(<?= session()->get('Nama'); ?>)</td>
        <td class="kanan"></td>
      </tr>

    </table>

    <!-- <table>
<tr>
  <td>Bandung, </td>
</tr>
  </table>
</div> -->

</body>

</html>