<style>
    * {
        box-sizing: border-box;
    }

    /* Create two equal columns that floats next to each other */
</style>

<div class="msg" style="display:none;">
    <?= @$this->session->flashdata('msg'); ?>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <div class="box-body">
                    <?php

                    ?>


                    <div class="column">
                        <h4><strong> Data Pelatihan</strong></h4>
                        <label><?php echo $get_nama_pelatihan->nama ?></label>
                    </div>


                    <!-- <div class="column">
                        <label>Kuota Tersedia <?php echo $kuota_tambahan ?></label>
                    </div> -->

                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Email</th>
                                <th>Status</th>
                                <!-- <th>Hadir</th>
                                <th>Pending</th>\
                                <th>Tidak Hadir</th>
                                <th>Cadangan</th>
                                <th>Kuota</th> -->
                                <!-- <th>ID Pelatihan</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            <!-- LOGIKA MASIH REVISI -->
                            <?php
                            $no = 0;

                            // $pending = 0;
                            // $tidak_hadir = 0;
                            // $cadangan = 0;
                            // $hadir = 0;
                            // $kuota = 3;
                            $kuota_tambahan = 0;
                            
                            foreach ($get_all_by_id as $pelatihan_pendaftar) {

                                $status = "";



                                if ($pelatihan_pendaftar->status == "0") {

                                    $status = "Proses Konfirmasi";
                                    // $pending++;
                                } elseif ($pelatihan_pendaftar->status == "1") {
                                    $status = "Hadir";
                                    // $hadir++;
                                    // $kuota--;
                                } elseif ($pelatihan_pendaftar->status == "2") {
                                    $status = "Tidak Hadir";
                                    $kuota_tambahan++;
                                    // $tidak_hadir++;
                                    // $kuota++;
                                } elseif ($pelatihan_pendaftar->status == "3") {
                                    $status = "Cadangan";
                                    // $cadangan++;
                                } elseif ($pelatihan_pendaftar->status == "4") {
                                    $status = "Cadangan Proses Konfirmasi(new)";
                                    $kuota_tambahan--;
                                    // $cadangan++;
                                } elseif ($pelatihan_pendaftar->status == "5") {
                                    $status = "Cadangan Hadir(new)";
                                    $kuota_tambahan--;
                                    // $cadangan++;
                                } elseif ($pelatihan_pendaftar->status == "6") {
                                    $status = "Cadangan Tidak Hadir(new)";
                                    
                                    // $cadangan++;
                                }else {
                                    $status = "null";
                                };






                                $no++;
                                echo "<tr>";
                                echo "<td class='text-center'>$no</td>";
                                echo "<td>$pelatihan_pendaftar->email</td>";
                                echo "<td>$status</td>";
                                // echo "<td>$hadir</td>";
                                // echo "<td>$pending</td>";
                                // echo "<td>$tidak_hadir</td>";
                                // echo "<td>$cadangan</td>";
                                echo "<td>$kuota_tambahan</td>";



                                // echo "<td>$pelatihan_pendaftar->id_pelatihan</td>";
                                echo "<td class='text-center'>";
                            ?>

                                <a class="edit btn" href="<?php echo base_url('admin/pendaftar/detail/'), $pelatihan_pendaftar->id ?>">
                                    <i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;Lihat Detail
                                </a>
                                <?php
                                // TAMBAH PARAMETER DATABASE SUDAH KIRIM SEBAGAI SYARAT IF ELSE KEMUDIAN KURANGI KUOTA TAMBAHAN -1

                                if ($status == "Cadangan" && $kuota_tambahan > 0) {
                                    // $tidak_hadir--;
                                    // $cadangan--;
                                    // $kuota--;
                                    $kuota_tambahan--;
                                    $kirim_kuota = $kuota_tambahan;
                                ?>



                                    <a class="edit btn" style="color:#ff0000" href="<?php echo base_url('admin/pendaftar/kirim/'), $pelatihan_pendaftar->id ?>">
                                        <i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;Kirim Konfirmasi Kehadiran
                                    </a>
                            <?php

                                } elseif ($status == "Hadir" || $status == "Tidak Hadir" || $status == "Cadangan Hadir(new)" || $status =="Cadangan Tidak Hadir(new)"  ) {
                                    echo "<a style=color:#000>&nbsp;Terkomfirmasi</a>";
                                } elseif ($status == "Cadangan" && $kuota_tambahan == 0) {
                                    echo "<a style=color:#e6e6e6>&nbsp;Dalam Antrian</a>";
                                } else {
                                    echo "<a style=color:#000>&nbsp;Menunggu Konfirmasi</a>";
                                }


                                // } elseif ($cadangan > 0 && $kuota == 0) {
                                //     echo "<a style=color:#e6e6e6>&nbsp;Dalam Antrian</a>";
                                // } else {
                                //     $kuota--;
                                //     echo "<a style=color:#000>&nbsp;Sudah Mengirim Email</a>";
                                // }

                                //     echo "<a class='edit btn' <i class='fa fa-wrench' aria-hidden='true'></i>&nbsp;Sudah Terkirim</a>";
                                // }
                            }


                            echo "</td>";
                            echo "</tr>";
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</section>