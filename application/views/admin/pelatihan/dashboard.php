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
                                <th>Konf. Pendaftar Utama</th>
                                <th>Konf. Pendaftar Cadangan</th>
                                <th>Status</th>
                                <th>Kuota (Kota + Luar Kota) </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($get_all as $pelatihan) {

                                $tanggal = strtotime($pelatihan->tgl_buka);
                                $tgl_buka = date('d/m/Y', $tanggal);

                                $tanggal = strtotime($pelatihan->tgl_tutup);
                                $tgl_tutup = date('d/m/Y', $tanggal);

                                // $tanggal = strtotime($pelatihan->tgl_verifikasi);
                                // $tgl_verifikasi = date('d/m/Y', $tanggal);

                                // $tanggal = strtotime($pelatihan->tgl_verifikasi_cadangan);
                                // $tgl_verifikasi_cadangan = date('d/m/Y', $tanggal);



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
                                echo "<td>$pelatihan->konfirmasi_pendaftar</td>";
                                echo "<td>$pelatihan->konfirmasi_pendaftar_cadangan</td>";
                                echo "<td>$pelatihan->status</td>";
                                echo "<td><strong>$kuota_utama</strong> ( $pelatihan->kuota_kota  + $pelatihan->kuota_luar_kota )</td>";
                                echo "<td class='text-center'>";
                            ?>
                                <a class="btn btn-primary" id="button_edit" data-toggle="modal" href="#myModalEdit" data-detail_pelatihan="<?php echo $pelatihan->detail_pelatihan ?>" data-nama_pelatih="<?php echo $pelatihan->nama_pelatih ?>" data-kontak_pelatih="<?php echo $pelatihan->kontak_pelatih ?>" data-nama="<?php echo $pelatihan->nama ?>" data-tgl_buka="<?php echo $pelatihan->tgl_buka ?>" data-tgl_tutup="<?php echo $pelatihan->tgl_tutup ?>" data-tgl_buka="<?php echo $pelatihan->tgl_buka ?>" data-detail_pelatihan="<?php echo $pelatihan->detail_pelatihan ?>" data-nama_pelatih="<?php echo $pelatihan->nama_pelatih ?>" data-kontak_pelatih="<?php echo $pelatihan->kontak_pelatih ?>" data-tgl_verifikasi="<?php echo $pelatihan->tgl_verifikasi ?>" data-tgl_verifikasi_cadangan="<?php echo $pelatihan->tgl_verifikasi_cadangan ?>" data-status="<?php echo $pelatihan->status ?>" data-kuota_kota="<?php echo $pelatihan->kuota_kota ?>" data-kuota_luar_kota="<?php echo $pelatihan->kuota_luar_kota ?>" data-id="<?php echo $pelatihan->id ?>">Edit</a>

                                <a class="btn btn-primary" href="<?php echo base_url('admin/pelatihan/hapus/'), $pelatihan->id ?>" onclick="return confirm('Apakah anda yakin?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Hapus</i>
                                </a>
                                <?php
                                if ($pelatihan->konfirmasi_pendaftar == "belum") {


                                ?>

                                    <a class="btn btn-primary" href="<?php echo base_url('admin/pelatihan/konfirmasi_pendaftar/'), $pelatihan->id ?>" onclick="return confirm('Apakah anda yakin?')">
                                        &nbsp;Konf. Pendaftar</i>
                                    </a>
                                <?php

                                } elseif ($pelatihan->konfirmasi_pendaftar == "sudah" && $pelatihan->konfirmasi_pendaftar_cadangan == "belum") {
                                ?>

                                    <a class="btn btn-primary" href="<?php echo base_url('admin/pelatihan/konfirmasi_pendaftar_cadangan/'), $pelatihan->id ?>" onclick="return confirm('Apakah anda yakin?')">
                                        &nbsp;Konf. Pendaftar Cadangan</i>
                                    </a>
                            <?php
                                }
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <?php
                    if (!$get_all) {

                        echo "<br>";

                        echo "<strong> Data Belum Tersedia </strong>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModalEdit" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Pelatihan</h4>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/pelatihan/edit_pelatihan_proses' ?>">

                    <div class="modal-body">



                        <input type="hidden" id="id" name="id">

                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Pelatihan</label>
                            <div class="col-xs-8">
                                <input name="nama" id="nama" class="form-control" type="text" placeholder="Nama Pelatihan" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Tanggal Buka</label>
                            <div class="col-xs-8">
                                <input id="tgl_buka" name="tgl_buka" class="form-control" type="date" placeholder="Tanggal Buka..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Tanggal Tutup</label>
                            <div class="col-xs-8">
                                <input id="tgl_tutup" name="tgl_tutup" class="form-control" type="date" placeholder="Tanggal Tutup..." required>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label col-xs-3">Tanggal Verifikasi</label>
                            <div class="col-xs-8">
                                <input name="tgl_verifikasi" id="tgl_verifikasi" class="form-control" type="date" placeholder="Tanggal Verifikasi..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Tanggal Verifikasi Cadangan</label>
                            <div class="col-xs-8">
                                <input id="tgl_verifikasi_cadangan" name="tgl_verifikasi_cadangan" class="form-control" type="date" placeholder="Tanggal Verifikasi Cadangan..." required>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label class="control-label col-xs-3">Kuota Kota</label>
                            <div class="col-xs-8">
                                <input id="kuota_kota" name="kuota_kota" class="form-control" type="number" placeholder="Kuota..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Kuota Luar Kota</label>
                            <div class="col-xs-8">
                                <input id="kuota_luar_kota" name="kuota_luar_kota" class="form-control" type="number" placeholder="Kuota..." required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-xs-3">Status</label>
                            <div class="col-xs-8">
                                <select name="status" id="status" class="form-control" required>

                                    <option value="tersedia">Tersedia</option>
                                    <option value="tutup">Tutup</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Detail Pelatihan</label>
                            <div class="col-xs-8">
                                <textarea class="form-control" name="detail_pelatihan" id="detail_pelatihan" rows="3" placeholder="Detail Pelatihan..." required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Pelatih</label>
                            <div class="col-xs-8">
                                <input name="nama_pelatih" id="nama_pelatih" class="form-control" type="text" placeholder="Nama Pelatih..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Kontak Pelatih</label>
                            <div class="col-xs-8">
                                <input name="kontak_pelatih" id="kontak_pelatih" class="form-control" type="number" placeholder="Kontak Pelatih..." required>
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
                                <input id="tgl_buka" name="tgl_buka" class="form-control datepicker" type="date" placeholder="Tanggal Buka..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Tanggal Tutup</label>
                            <div class="col-xs-8">
                                <input id="tgl_tutup" name="tgl_tutup" class="form-control datepicker" type="date" placeholder="Tanggal Tutup..." required>
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

                        <div class="form-group">
                            <label class="control-label col-xs-3">Detail Pelatihan</label>
                            <div class="col-xs-8">
                                <textarea class="form-control" name="detail_pelatihan" rows="3" placeholder="Detail Pelatihan..." required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama Pelatih</label>
                            <div class="col-xs-8">
                                <input name="nama_pelatih" class="form-control" type="text" placeholder="Nama Pelatih..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Kontak Pelatih</label>
                            <div class="col-xs-8">
                                <input name="kontak_pelatih" class="form-control" type="number" placeholder="Kontak Pelatih..." required>
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
    var nama;
    var tgl_buka;
    var tgl_tutup;
    var detail_pelatihan;
    var nama_pelatih;
    var kontak_pelatih;
    $(document).on('click', '#button_edit', function(e) {
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
        tgl_verifikasi = $(this).attr('data-tgl_verifikasi');
        $(".modal-body #tgl_verifikasi").val(tgl_verifikasi);
        tgl_verifikasi_cadangan = $(this).attr('data-tgl_verifikasi_cadangan');
        $(".modal-body #tgl_verifikasi_cadangan").val(tgl_verifikasi_cadangan);
        status = $(this).attr('data-status');
        $(".modal-body #status").val(status);
        kuota_kota = $(this).attr('data-kuota_kota');
        $(".modal-body #kuota_kota").val(kuota_kota);
        kuota_luar_kota = $(this).attr('data-kuota_luar_kota');
        $(".modal-body #kuota_luar_kota").val(kuota_luar_kota);
        id = $(this).attr('data-id');
        $(".modal-body #id").val(id);

        detail_pelatihan = $(this).attr('data-detail_pelatihan');
        $(".modal-body #detail_pelatihan").val(detail_pelatihan);
        nama_pelatih = $(this).attr('data-nama_pelatih');
        $(".modal-body #nama_pelatih").val(nama_pelatih);
        kontak_pelatih = $(this).attr('data-kontak_pelatih');
        $(".modal-body #kontak_pelatih").val(kontak_pelatih);
        console.log(nama);
    });

    // $(function() {
    //     $(".datepicker").datepicker({
    //         format: 'yyyy-mm-dd',
    //         autoclose: true,
    //         todayHighlight: true,
    //     });
    //     $("#tgl_buka").on('changeDate', function(selected) {
    //         var startDate = new Date(selected.date.valueOf());
    //         $("#tgl_tutup").datepicker('setStartDate', startDate);
    //         if ($("#tgl_buka").val() > $("#tgl_tutup").val()) {
    //             $("#tgl_tutup").val($("#tgl_buka").val());
    //         }
    //     });
    // });
</script>