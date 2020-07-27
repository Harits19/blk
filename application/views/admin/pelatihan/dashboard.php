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
    // $(document).on('click', '#button_tambah', function(e) {
    //     // id_pelatihan = $(this).attr('data-id_pelatihan');
    //     // $("#id_pelatihan").val(id_pelatihan);
    //     // console.log(id_pelatihan);
    // });

    // $(document).on('click', '#button_edit', function(e) {
    //     nama = $(this).attr('data-nama');
    //     $(".modal-body #nama").val(nama);
    //     tgl_buka = $(this).attr('data-tgl_buka');
    //     $(".modal-body #tgl_buka").val(tgl_buka);
    //     tgl_tutup = $(this).attr('data-tgl_tutup');
    //     $(".modal-body #tgl_tutup").val(tgl_tutup);
    //     detail_pelatihan = $(this).attr('data-detail_pelatihan');
    //     $(".modal-body #detail_pelatihan").val(detail_pelatihan);
    //     nama_pelatih = $(this).attr('data-nama_pelatih');
    //     $(".modal-body #nama_pelatih").val(nama_pelatih);
    //     kontak_pelatih = $(this).attr('data-kontak_pelatih');
    //     $(".modal-body #kontak_pelatih").val(kontak_pelatih);
    //     console.log(nama);
    // });
</script>

<div class="msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <div class="box-body">

                    <div class="row">
                        <div class="column">
                            <h4><strong> Data Pelatihan</strong></h4>
                        </div>
                        <div class="column">
                            <div class="pull-right">
                                <button class="btn btn-primary" id="button_tambah" data-toggle="modal" href="#myModalTambah">Tambah Pelatihan</button>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Nama Pelatihan</th>
                                <th>Tanggal Buka</th>
                                <th>Tanggal Tutup</th>
                                <th>Status</th>
                                <th>Kuota (Kota + Luar Kota) </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($get_all as $pelatihan) {

                                $tanggal = strtotime($pelatihan->tgl_buka);
                                $tgl_buka = date('d-m-Y', $tanggal);
                                $tanggal = strtotime($pelatihan->tgl_tutup);
                                $tgl_tutup = date('d-m-Y', $tanggal);
                                $status = "";

                                // if ($pelatihan->status == 0) {

                                //     $status = "Tutup";
                                // } elseif ($pelatihan->status == 1) {

                                //     $status = "Buka";
                                // } else {
                                //     $status = "-";
                                // }

                                $kuota_utama = $pelatihan->kuota_kota + $pelatihan->kuota_luar_kota;




                                $no++;
                                echo "<tr>";
                                echo "<td class='text-center'>$no</td>";
                                echo "<td>$pelatihan->nama</td>";
                                echo "<td>$tgl_buka</td>";
                                echo "<td>$tgl_tutup</td>";
                                echo "<td>$pelatihan->status</td>";
                                echo "<td><strong>$kuota_utama</strong> ( $pelatihan->kuota_kota  + $pelatihan->kuota_luar_kota )</td>";
                                echo "<td class='text-center'>";
                            ?>
                                <a class="edit btn" id="button_edit" data-toggle="modal" href="#myModalEdit">
                                    <i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;Edit
                                </a>
                                <a class="hapus btn" href="<?php echo base_url('admin/pelatihan/hapus/'), $pelatihan->id ?>" onclick="return confirm('Apakah anda yakin?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Hapus</i>
                                </a>
                                <a class="hapus btn" href="<?php echo base_url('admin/pelatihan/tutup/'), $pelatihan->id ?>" onclick="return confirm('Apakah anda yakin?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Tutup dan Kirim Email Verifikasi</i>
                                </a>
                            <?php
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModalTambah" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel">Tambah Pelatihan</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/pelatihan/tambah_pelatihan_proses' ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Pelatihan</label>
                            <div class="col-xs-8">
                                <input name="nama" class="form-control" type="text" placeholder="Nama Pelatihan" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Tanggal Buka</label>
                            <div class="col-xs-8">
                                <input name="tgl_buka" class="form-control" type="date" placeholder="Tanggal Buka..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Tanggal Tutup</label>
                            <div class="col-xs-8">
                                <input name="tgl_tutup" class="form-control" type="date" placeholder="Tanggal Tutup..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Kuota Kota </label>
                            <div class="col-xs-8">
                                <input name="kuota_kota" class="form-control" type="number" placeholder="Kuota..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Kuota Luar Kota</label>
                            <div class="col-xs-8">
                                <input name="kuota_luar_kota" class="form-control" type="number" placeholder="Kuota..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Status</label>
                            <div class="col-xs-8">
                                <select name="status" class="form-control" required>
                                    <option value="tersedia">Tersedia</option>
                                    <option value="tutup">Tutup</option>
                                </select>
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

    <?php
    echo "$kuota_luar_kota<br>";
    echo "$kuota_kota <br>";
    echo "$total_pendaftar<br>";
    echo "$total_pendaftar_kota <br>";
    echo "$total_pendaftar_luar_kota <br>";
    foreach ($get_all as $pelatihan) :

    ?>
        <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Pelatihan</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/pelatihan/edit_pelatihan_proses' ?>">
                        <div class="modal-body">

                            <input type="hidden" name="id" value="<?php echo $pelatihan->id ?>">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Nama Pelatihan</label>
                                <div class="col-xs-8">
                                    <input name="nama" class="form-control" type="text" value="<?php echo $pelatihan->nama ?>" placeholder="Nama Pelatihan" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Tanggal Buka</label>
                                <div class="col-xs-8">
                                    <input name="tgl_buka" class="form-control" type="date" value="<?php echo $pelatihan->tgl_buka ?>" placeholder="Tanggal Buka..." required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Tanggal Tutup</label>
                                <div class="col-xs-8">
                                    <input name="tgl_tutup" class="form-control" type="date" value="<?php echo $pelatihan->tgl_tutup ?>" placeholder="Tanggal Tutup..." required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Kuota Kota</label>
                                <div class="col-xs-8">
                                    <input name="kuota_kota" class="form-control" type="number" value="<?php echo $pelatihan->kuota_kota ?>" placeholder="Kuota..." required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Kuota Luar Kota</label>
                                <div class="col-xs-8">
                                    <input name="kuota_luar_kota" class="form-control" type="number" value="<?php echo $pelatihan->kuota_luar_kota ?>" placeholder="Kuota..." required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-xs-3">Status</label>
                                <div class="col-xs-8">
                                    <select name="status" class="form-control" required>

                                        <option value="tersedia">Tersedia</option>
                                        <option value="tutup">Tutup</option>
                                    </select>
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
    <?php endforeach; ?>


</section>