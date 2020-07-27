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
  <div class="row">
    <div class="col-md-12">
      <div class="box">

        <div class="box-body">

          <div class="row">
            <div class="column">
              <h4><strong> Data Pelatihan</strong></h4>
            </div>

          </div>
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
              $no = 0;
              foreach ($get_all as $pelatihan) {

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
                // echo "<td class='text-center'>";
              ?>
                <td>
                  <button class="btn btn-primary" id="button_detail" data-toggle="modal" href="#myModalDetail" data-nama="<?php echo $pelatihan->nama ?>" data-tgl_buka="<?php echo $pelatihan->tgl_buka ?>" data-tgl_tutup="<?php echo $pelatihan->tgl_tutup ?>" data-tgl_buka="<?php echo $pelatihan->tgl_buka ?>" data-detail_pelatihan="<?php echo $pelatihan->detail_pelatihan ?>" data-nama_pelatih="<?php echo $pelatihan->nama_pelatih ?>" data-kontak_pelatih="<?php echo $pelatihan->kontak_pelatih ?>">Detail</button>
                  <br><br>
                  <button class="btn btn-primary" id="button_daftar" data-toggle="modal" href="#myModalDaftar" data-id_pelatihan="<?php echo $pelatihan->id ?>">Daftar</button>

                </td>
              <?php
                // echo "</td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>

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



<!-- Modal daftar -->
<div class="modal fade" id="myModalDaftar" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pendaftaran</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-hover table-condensed">
          <thead>
            <tr>
              <!-- <td>id_pelatihan :</td> -->
              <td><input type="hidden" id="id_pelatihan"></td>
            </tr>
            <tr>
              <td>Nama : </td>
              <td><input type="text" id="tgl_buka"></td>
            </tr>
            <tr>
              <td>Jenis Kelamin : </td>
              <td><input type="text" id="tgl_tutup"></td>
            </tr>
            <tr>
              <td>Alamat : </td>
              <td><textarea id="detail_pelatihan"></textarea></td>
            </tr>
            <tr>
              <td>Email : </td>
              <td><input type="text" id="nama_pelatih"></td>
            </tr>
            <tr>
              <td>No. HP : </td>
              <td><input type="text" id="kontak_pelatih"></td>
            </tr>
            <tr>
              <td>Pendidikan Terakhir : </td>
              <td><input type="text" id="kontak_pelatih"></td>
            </tr>
            <tr>
              <td>Alasan mengikuti pelatihan ini : </td>
              <td><textarea id="detail_pelatihan"></textarea></td>
            </tr>

          </thead>
        </table>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
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
  var id_pelatihan;
  $(document).on('click', '#button_daftar', function(e) {
    id_pelatihan = $(this).attr('data-id_pelatihan');
    $("#id_pelatihan").val(id_pelatihan);
    // console.log(id_pelatihan);
  });
</script>