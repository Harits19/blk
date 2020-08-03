<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<style>
  * {
    box-sizing: border-box;
  }

  /* Create two equal columns that floats next to each other */
  .column {
    float: left;
    width: 50%;

    padding-left: 20px;
    padding-right: 20px;
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
</style>
<section class="content">
  <div class="msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box">

        <div class="box-body">

          <div class="row">
            <div class="column">
              <h4><strong> Data Pelatihan</strong></h4>
            </div>

          </div>
          <?php
          if (!$get_all && $terdaftar) {
            echo "<br>";
            echo "Anda Sudah Terdaftar, Tidak bisa mendaftar 2 pelatihan sekaligus.";
          } elseif (!$get_all) {
            echo "<strong> Data Belum Tersedia </strong>";
          } else {

          ?>

            <input class="form-control" id="myInput" type="text" placeholder="Search..">

            <table class="table table-striped table-hover table-condensed">
              <thead>
                <tr>
                  <th>Nama Pelatihan</th>
                  <th>Tanggal Buka</th>
                  <th>Tanggal Tutup</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="myTable">
                <?php
                date_default_timezone_set('Asia/Jakarta');
                $current_date = date('Y-m-d');
                $no = 0;
                foreach ($get_all as $pelatihan) {

                  if ($pelatihan->status == 'tutup') {
                    continue;
                  }



                  $tanggal = strtotime($pelatihan->tgl_buka);
                  $tgl_buka = date('d-m-Y', $tanggal);
                  $tanggal = strtotime($pelatihan->tgl_tutup);
                  $tgl_tutup = date('d-m-Y', $tanggal);

                  $no++;
                  // echo "<tbody id='myTable'>";
                  echo "<tr>";
                  echo "<td>$pelatihan->nama</td>";
                  echo "<td>$tgl_buka</td>";
                  echo "<td>$tgl_tutup</td>";
                  echo "<td>$pelatihan->status</td>";
                  echo "<td class='text-center'>";

                ?>
                  <a class="btn btn-primary" id="button_detail" data-toggle="modal" href="#myModalDetail" data-nama="<?php echo $pelatihan->nama ?>" data-tgl_buka="<?php echo $pelatihan->tgl_buka ?>" data-tgl_tutup="<?php echo $pelatihan->tgl_tutup ?>" data-tgl_buka="<?php echo $pelatihan->tgl_buka ?>" data-detail_pelatihan="<?php echo $pelatihan->detail_pelatihan ?>" data-nama_pelatih="<?php echo $pelatihan->nama_pelatih ?>" data-kontak_pelatih="<?php echo $pelatihan->kontak_pelatih ?>">Detail</a>


                  <?php
                  if ($current_date < $pelatihan->tgl_buka) {
                  ?>

              <?php
                  }else{
                    ?>
                    <a class="btn btn-primary" id="button_daftar" data-toggle="modal" href="#myModalDaftar" data-id_pelatihan="<?php echo $pelatihan->id ?>">Daftar</a>

              <?php
                  }

                  echo "</td>";
                  echo "</tr>";
                }
              }

              ?>
              </tbody>
            </table>

            <?php
            ?>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal Detail -->
  <div class="modal fade" id="myModalDetail" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Pelatihan</h4>
        </div>
        <div class="modal-body">

          <table class="table table-striped table-hover table-condensed">
            <thead>
              <tr>
                <td>Nama Pelatihan :</td>
                <td><input type="text" id="nama"></td>
              </tr>
              <tr>
                <td>Tanggal Dibuka : </td>
                <td><input type="text" id="tgl_buka"></td>
              </tr>
              <tr>
                <td>Tanggal Ditutup : </td>
                <td><input type="text" id="tgl_tutup"></td>
              </tr>
              <tr>
                <td>Detail Pelatihan : </td>
                <td><textarea id="detail_pelatihan"></textarea></td>
              </tr>
              <tr>
                <td>Nama Pelatih : </td>
                <td><input type="text" id="nama_pelatih"></td>
              </tr>
              <tr>
                <td>Kontak Pelatih : </td>
                <td><input type="text" id="kontak_pelatih"></td>
              </tr>
            </thead>
          </table>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  var nama;
  var tgl_buka;
  var tgl_tutup;
  var detail_pelatihan;
  var nama_pelatih;
  var kontak_pelatih;
  $(document).on('click', '#button_detail', function(e) {
    nama = $(this).attr('data-nama');
    $(".modal-body #nama").val(nama);
    tgl_buka = $(this).attr('data-tgl_buka');
    $(".modal-body #tgl_buka").val(tgl_buka);
    tgl_tutup = $(this).attr('data-tgl_tutup');
    $(".modal-body #tgl_tutup").val(tgl_tutup);
    detail_pelatihan = $(this).attr('data-detail_pelatihan');
    $(".modal-body #detail_pelatihan").val(detail_pelatihan);
    nama_pelatih = $(this).attr('data-nama_pelatih');
    $(".modal-body #nama_pelatih").val(nama_pelatih);
    kontak_pelatih = $(this).attr('data-kontak_pelatih');
    $(".modal-body #kontak_pelatih").val(kontak_pelatih);
    console.log(nama);
  });
</script>

<div class="modal fade" id="myModalDaftar" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Pendaftaran Pelatihan</h3>
      </div>
      <form class="form-horizontal" method="post" action="<?php echo base_url() . 'member/home/proses_daftar' ?>">
        <div class="modal-body">
          <input type="hidden" name="id_pelatihan" id="id_pelatihan"?>

          <div class="form-group">
            <label class="control-label col-xs-3">NIK</label>
            <div class="col-xs-8">
              <input name="nama" class="form-control" type="text" placeholder="Isikan Nama Anda..." required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-3">Nama</label>
            <div class="col-xs-8">
              <input name="nama" class="form-control" type="text" value="<?= $userdata->username; ?>" placeholder="Isikan Nama Anda..." required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-3">Alamat</label>
            <div class="col-xs-8">
              <input name="alamat" class="form-control" type="textarea" placeholder="Isikan Alamat Anda..." required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-3">Wilayah</label>
            <div class="col-xs-8">
              <select name="wilayah" class="form-control" required>
                <option value="kota">Kota</option>
                <option value="luar kota">Luar Kota</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-3">Jenis Kelamin</label>
            <div class="col-xs-8">
              <select name="jenis_kelamin" class="form-control" required>
                <option value="laki-laki">Laki-Laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-3">Email</label>
            <div class="col-xs-8">
              <input name="email" class="form-control" type="email" value="<?= $userdata->email; ?>" placeholder="Isikan Email Anda..." required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-3">No. Hp</label>
            <div class="col-xs-8">
              <input name="no_hp" class="form-control" type="number" placeholder="No. Hp..." required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-3">Pendidikan Terakhir</label>
            <div class="col-xs-8">
              <input name="pendidikan_terakhir" class="form-control" type="text" placeholder="Pendidikan Terakhir Anda..." required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-xs-3">Alasan Mengikuti</label>
            <div class="col-xs-8">
              <textarea class="form-control" name="alasan_mengikuti" rows="3" placeholder="Alasan Mengikuti Anda..." required></textarea>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
          <button class="btn btn-info">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
<script>
  $(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  var id_pelatihan;
  $(document).on('click', '#button_daftar', function(e) {
    id_pelatihan = $(this).attr('data-id_pelatihan');
    $("#id_pelatihan").val(id_pelatihan);
    // console.log(id_pelatihan);
  });
</script>