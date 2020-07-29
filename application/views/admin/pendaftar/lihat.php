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

                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $current_date = date('Y-m-d');
                        if ($current_date > $get_all_by_id[0]->tgl_verifikasi_cadangan) {
                            echo "<label style=color:#ff0000 >(Pelatihan Ditutup)</label>";
                        }
                        ?>
                    </div>


                    <!-- <div class="column">
                        <label>Kuota Tersedia <?php echo $kuota_tambahan ?></label>
                    </div> -->

                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Email</th>
                                <th></th>
                                <th>Status</th>
                                <!-- <th>$current_date < $pelatihan_pendaftar->tgl_verifikasi</th> -->
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
                            $kuota_tambahan = 0;

                            

                            $status_pendaftaran = true;


                            $date = false;

                            foreach ($get_all_by_id as $pelatihan_pendaftar) {

                                $status = "";
                                // if($current_date < $pelatihan_pendaftar->tgl_verifikasi){
                                //     $date = true;
                                // }else{
                                //     $date = true;
                                // }



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
                                } else {
                                    $status = "null";
                                };






                                $no++;
                                echo "<tr>";
                                echo "<td class='text-center'>$no</td>";
                                echo "<td>$pelatihan_pendaftar->email</td>";

                                // echo "<td>$date</td>";
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
                                if ($status == "Cadangan" && $kuota_tambahan > 0) {
                                    $kuota_tambahan--;

                                    // 
                                    if ($current_date < $pelatihan_pendaftar->tgl_verifikasi_cadangan) {
                                ?>
                                        <a class="edit btn" style="color:#ff0000" href="<?php echo base_url('admin/pendaftar/kirim/'), $pelatihan_pendaftar->id ?>">
                                            <i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;Kirim Konfirmasi Kehadiran
                                        </a>
                            <?php
                                    } else {
                                        echo "<a style=color:#e6e6e6>&nbsp;Dalam Antrian</a>";
                                    }
                                } elseif ($status == "Hadir" || $status == "Tidak Hadir" || $status == "Cadangan Hadir(new)" || $status == "Cadangan Tidak Hadir(new)") {
                                    echo "<a style=color:#000>&nbsp;Terkomfirmasi</a>";
                                } elseif ($status == "Cadangan" && $kuota_tambahan == 0) {
                                    echo "<a style=color:#e6e6e6>&nbsp;Dalam Antrian</a>";
                                } else {
                                    echo "<a style=color:#6b6b6b    >&nbsp;Menunggu Konfirmasi</a>";
                                }

                                echo "<td>$status</td>";


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