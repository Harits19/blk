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


                    <div class="column">
                        <h4><strong> Data Pelatihan</strong></h4>
                        <label><?php echo $get_nama_pelatihan->nama ?></label>
                    </div>

                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Hadir</th>
                                <th>Pending</th>\
                                <th>Tidak Hadir</th>
                                <th>Cadangan</th>
                                <th>Kuota</th>
                                <!-- <th>ID Pelatihan</th> -->
                            </tr>
                        </thead>
                        <tbody>

                        <!-- LOGIKA MASIH REVISI -->
                            <?php
                            $no = 0;

                            $pending = 0;
                            $tidak_hadir = 0;
                            $cadangan = 0;
                            $hadir = 0;
                            $kuota = 3;
                            foreach ($get_all_by_id as $pelatihan_pendaftar) {

                                $status = "";
                                


                                if ($pelatihan_pendaftar->status == "0") {

                                    $status = "Proses Konfirmasi";
                                    $pending++;
                                } elseif ($pelatihan_pendaftar->status == "1") {
                                    $status = "Hadir";
                                    $hadir++;
                                    $kuota--;
                                } elseif ($pelatihan_pendaftar->status == "2") {
                                    $status = "Tidak Hadir";
                                    $tidak_hadir++;
                                    $kuota++;
                                } elseif ($pelatihan_pendaftar->status == "3") {
                                    $status = "Cadangan";
                                    $cadangan++;
                                } else {
                                    $status = "null";
                                };

                                
                                



                                $no++;
                                echo "<tr>";
                                echo "<td class='text-center'>$no</td>";
                                echo "<td>$pelatihan_pendaftar->email</td>";
                                echo "<td>$status</td>";
                                echo "<td>$hadir</td>";
                                echo "<td>$pending</td>";
                                echo "<td>$tidak_hadir</td>";
                                echo "<td>$cadangan</td>";
                                echo "<td>$kuota</td>";



                                // echo "<td>$pelatihan_pendaftar->id_pelatihan</td>";
                                echo "<td class='text-center'>";

                                echo "<a class='edit btn' href='<?php echo base_url('admin/pendaftar/detail/'), $pelatihan_pendaftar->id ?><i class='fa fa-wrench' aria-hidden='true'></i>&nbsp;Detail</a>";

                                if ($tidak_hadir > 0 & $cadangan > 0 && $kuota > 0) {
                                    $tidak_hadir--;
                                    $cadangan--;
                                    $kuota--;
                                    echo "<a style=color:#fc1100>&nbsp;Kirim Verifikasi</a>";
                                } elseif ($cadangan > 0 && $kuota == 0) {
                                    echo "<a style=color:#e6e6e6>&nbsp;Dalam Antrian</a>";
                                } else {
                                    $kuota--;
                                    echo "<a style=color:#000>&nbsp;Sudah Mengirim Email</a>";
                                }

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