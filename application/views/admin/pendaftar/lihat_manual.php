<style>
    * {
        box-sizing: border-box;
    }

    .removeRow {
        /* background-color: #dedede; */
        color: #0088f7;
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

                        <label><?php echo $data_pelatihan->nama ?></label>

                        <?php
                        $kuota_kota = $data_pelatihan->kuota_kota;
                        $kuota_luar_kota = $data_pelatihan->kuota_luar_kota;
                        $kuota_utama = $kuota_kota + $kuota_luar_kota;
                        $ignore_kuota = "false";

                        if (count($get_all_by_id) < $kuota_utama) {
                            $ignore_kuota = "true";
                        }

                        date_default_timezone_set('Asia/Jakarta');
                        $current_date = date('Y-m-d');
                        if ($current_date > $get_all_by_id[0]->tgl_verifikasi_cadangan) {
                            echo "<label style=color:#ff0000 >(Pelatihan Ditutup)</label>";
                        }

                        // echo $kuota_utama;

                        ?>
                    </div>


                    <!-- <div class="column">
                        <label>Kuota Tersedia <?php echo $kuota_tambahan ?></label>
                    </div> -->
                    <!-- <form method="post" action="<?php echo base_url('admin/pendaftar/kirim_manual') ?>" id="form-kirim"> -->
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Email</th>
                                <th>Wilayah</th>
                                <th>Kuota ( <?php echo $kuota_kota . ' kota + ' . $kuota_luar_kota . ' luar kota )'; ?></th>
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

                                $check_box = true;




                                if ($pelatihan_pendaftar->status_pendaftar == "0") {

                                    $status = "Proses Konfirmasi";
                                    if ($pelatihan_pendaftar->wilayah == "kota") {
                                        $kuota_kota--;
                                    } else {
                                        $kuota_luar_kota--;
                                    }
                                    $check_box = false;
                                } elseif ($pelatihan_pendaftar->status_pendaftar == "3") {

                                    $status = "Dalam Antrian";
                                } elseif ($pelatihan_pendaftar->status_pendaftar == "1") {
                                    if ($pelatihan_pendaftar->wilayah == "kota") {
                                        $kuota_kota--;
                                    } else {
                                        $kuota_luar_kota--;
                                    }
                                    $status = "Hadir";
                                    $check_box = false;
                                } elseif ($pelatihan_pendaftar->status_pendaftar == "2") {
                                    $status = "Tidak Hadir";
                                    $check_box = false;
                                } elseif ($pelatihan_pendaftar->status_pendaftar == "4") {

                                    $status = "Proses Konfirmasi(cadangan)";
                                    if ($pelatihan_pendaftar->wilayah == "kota") {
                                        $kuota_kota--;
                                    } else {
                                        $kuota_luar_kota--;
                                    }
                                    $check_box = false;
                                } elseif ($pelatihan_pendaftar->status_pendaftar == "5") {
                                    if ($pelatihan_pendaftar->wilayah == "kota") {
                                        $kuota_kota--;
                                    } else {
                                        $kuota_luar_kota--;
                                    }
                                    $status = "Hadir(cadangan)";
                                    $check_box = false;
                                } elseif ($pelatihan_pendaftar->status_pendaftar == "6") {
                                    $status = "Tidak Hadir";
                                    $check_box = false;
                                } 
                                // elseif ($pelatihan_pendaftar->status_pendaftar == "1") {
                                //     $status = "Hadir";
                                //     // $hadir++;
                                //     // $kuota--;
                                // } elseif ($pelatihan_pendaftar->status_pendaftar == "2") {
                                //     $status = "Tidak Hadir";
                                //     $kuota_tambahan++;
                                //     // $tidak_hadir++;
                                //     // $kuota++;
                                // } elseif ($pelatihan_pendaftar->status_pendaftar == "3") {
                                //     $status = "Cadangan";
                                //     // $cadangan++;
                                // } elseif ($pelatihan_pendaftar->status_pendaftar == "4") {
                                //     $status = "Cadangan Proses Konfirmasi(new)";
                                //     $kuota_tambahan--;
                                //     // $cadangan++;
                                // } elseif ($pelatihan_pendaftar->status_pendaftar == "5") {
                                //     $status = "Cadangan Hadir(new)";
                                //     $kuota_tambahan--;
                                //     // $cadangan++;
                                // } elseif ($pelatihan_pendaftar->status_pendaftar == "6") {
                                //     $status = "Cadangan Tidak Hadir(new)";

                                //     // $cadangan++;
                                // } else {
                                //     $status = "null";
                                // };








                                $no++;
                                echo "<tr>";
                                echo "<td class='text-center'>$no</td>";
                                // echo "<td>$pelatihan_pendaftar->status_pendaftar</td>";
                                echo "<td>$pelatihan_pendaftar->email</td>";
                                echo "<td>$pelatihan_pendaftar->wilayah</td>";
                                if (($data_pelatihan->konfirmasi_pendaftar == 'belum' || $data_pelatihan->konfirmasi_pendaftar_cadangan == 'belum') && $pelatihan_pendaftar->wilayah == "kota" && $check_box == true) {
                                    echo "<td><input type='checkbox' name='id[]' class='check-item   chk_boxes_kota' value='" . $pelatihan_pendaftar->id_pendaftar . "'></td>";
                                } elseif (($data_pelatihan->konfirmasi_pendaftar == 'belum' || $data_pelatihan->konfirmasi_pendaftar_cadangan == 'belum') && $pelatihan_pendaftar->wilayah == "luar kota" && $check_box == true) {
                                    echo "<td><input type='checkbox' name='id[]' class='check-item   chk_boxes_luar_kota' value='" . $pelatihan_pendaftar->id_pendaftar . "'></td>";
                                } else {
                                    echo "<td></td>";
                                }
                                echo "<td>$status</td>";

                                // echo "<td>$kuota_tambahan</td>";



                                // echo "<td>$pelatihan_pendaftar->id_pelatihan</td>";
                                echo "<td class='text-center'>";
                            ?>

                                <a class="edit btn" href="<?php echo base_url('admin/pendaftar/detail/'), $pelatihan_pendaftar->id_pendaftar ?>">
                                    <i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;Lihat Detail
                                </a>

                            <?php




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
                    <!-- </form> -->
                    <!-- <br>
                    <input id='ignore_kuota' name='ignore_kuota' type='checkbox' class='check-item ignore_kuota'>
                    <label for="ignore_kuota">&nbsp&nbspAbaikan Kuota</label>
                    <p>Sisa Kuota ( <?php echo $kuota_kota . " kota + " . $kuota_luar_kota . " luar kota)" ?> </p> -->
                    <?php
                    if ($data_pelatihan->konfirmasi_pendaftar == "belum") {
                    ?>
                    <br>
                    <input id='ignore_kuota' name='ignore_kuota' type='checkbox' class='check-item ignore_kuota'>
                    <label for="ignore_kuota">&nbsp&nbspAbaikan Kuota</label>
                    <p>Sisa Kuota ( <?php echo $kuota_kota . " kota + " . $kuota_luar_kota . " luar kota)" ?> </p>
                        <button type="button" name="btn_kirim" id="btn_kirim" class="btn btn-danger mb-4 mt-4">Kirim Konfirmasi Kehadiran</button>
                    <?php
                    } elseif ($data_pelatihan->konfirmasi_pendaftar == "sudah" && $data_pelatihan->konfirmasi_pendaftar_cadangan == "belum") {
                    ?>
                    <br>
                    <input id='ignore_kuota' name='ignore_kuota' type='checkbox' class='check-item ignore_kuota'>
                    <label for="ignore_kuota">&nbsp&nbspAbaikan Kuota</label>
                    <p>Sisa Kuota ( <?php echo $kuota_kota . " kota + " . $kuota_luar_kota . " luar kota)" ?> </p>

                        <button type="button" name="btn_kirim_cadangan" id="btn_kirim_cadangan" class="btn btn-danger mb-4 mt-4">Kirim Konfirmasi Kehadiran (cadangan) </button>
                    <?php
                    }else{
                        echo "<p>Pelatihan Ditutup</p>";
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
    <!-- <script>
        $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)    
            $("#check-all").click(function() { // Ketika user men-cek checkbox all      
                if ($(this).is(":checked")) // Jika checkbox all diceklis        
                    $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"      
                else // Jika checkbox all tidak diceklis        
                    $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"    
            });
            $("#btn-delete").click(function() { // Ketika user mengklik tombol delete      
                var confirm = window.confirm("Apakah Anda yakin ingin menghapus data-data ini?"); // Buat sebuah alert konfirmasi            
                if (confirm) // Jika user mengklik tombol "Ok"        
                    $("#form-kirim").submit(); // Submit form    
            });
        });
    </script> -->

    <script>
        var kuota_utama = "<?php print($kuota_utama); ?>";
        var kuota_luar_kota = "<?php print($kuota_luar_kota); ?>";
        var kuota_kota = "<?php print($kuota_kota); ?>";
        var ignore_kuota = "<?php print($ignore_kuota); ?>";
        // alert(ignore_kuota);

        var total_kota = 0;
        var total_luar_kota = 0;
        $(document).ready(function() {
            $('.chk_boxes_kota').click(function() {
                if ($(this).is(':checked')) {
                    $(this).closest('tr').addClass('removeRow');
                    total_kota++;
                    // confirm(total_kota);
                } else {
                    $(this).closest('tr').removeClass('removeRow');
                    total_kota--;
                    // confirm(total_kota);
                }
            });

            $('.chk_boxes_luar_kota').click(function() {
                if ($(this).is(':checked')) {
                    $(this).closest('tr').addClass('removeRow');
                    total_luar_kota++;
                    // confirm(total_luar_kota);
                } else {
                    $(this).closest('tr').removeClass('removeRow');
                    total_luar_kota--;
                    // confirm(total_luar_kota);
                }
            });

            $('.ignore_kuota').click(function() {
                if ($(this).is(':checked')) {
                    $(this).closest('tr').addClass('removeRow');
                    ignore_kuota = "true";
                    // alert(ignore_kuota);
                } else {
                    $(this).closest('tr').removeClass('removeRow');
                    ignore_kuota = "false";
                    // alert(ignore_kuota);
                }
            });

            $('#btn_kirim').click(function() {
                if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                    var id = [];

                    $(':checkbox:checked').each(function(i) {
                        id[i] = $(this).val();
                    });

                    if (total_kota < kuota_kota && ignore_kuota == "false") {
                        alert("Kuota Kota Kekurangan : " + (kuota_kota - total_kota) + " Pendaftar");
                    } else if (total_kota > kuota_kota && ignore_kuota == "false") {
                        alert("Kuota Kota Kelebihan : " + (total_kota - kuota_kota) + " Pendaftar");
                    } else if (total_luar_kota < kuota_luar_kota && ignore_kuota == "false") {
                        alert("Kuota Luar Kota Kekurangan : " + (kuota_luar_kota - total_luar_kota) + " Pendaftar");
                    } else if (total_luar_kota > kuota_luar_kota && ignore_kuota == "false") {
                        alert("Kuota Luar Kota Kelebihan : " + (total_luar_kota - kuota_luar_kota) + " Pendaftar");
                    } else {
                        // $("#form-kirim").submit();
                        $.ajax({
                            url: "<?php echo base_url('admin/pendaftar/kirim_manual') ?>",
                            type: "POST",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                location.reload();
                            },
                            error: function(data) {
                                location.reload();
                            }
                        });
                    }
                } else {
                    return false;
                }
            });

            $('#btn_kirim_cadangan').click(function() {
                if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                    var id = [];

                    $(':checkbox:checked').each(function(i) {
                        id[i] = $(this).val();
                    });

                    if (total_kota < kuota_kota && ignore_kuota == "false") {
                        alert("Kuota Kota Kekurangan : " + (kuota_kota - total_kota) + " Pendaftar");
                    } else if (total_kota > kuota_kota && ignore_kuota == "false") {
                        alert("Kuota Kota Kelebihan : " + (total_kota - kuota_kota) + " Pendaftar");
                    } else if (total_luar_kota < kuota_luar_kota && ignore_kuota == "false") {
                        alert("Kuota Luar Kota Kekurangan : " + (kuota_luar_kota - total_luar_kota) + " Pendaftar");
                    } else if (total_luar_kota > kuota_luar_kota && ignore_kuota == "false") {
                        alert("Kuota Luar Kota Kelebihan : " + (total_luar_kota - kuota_luar_kota) + " Pendaftar");
                    } else {
                        // $("#form-kirim").submit();
                        $.ajax({
                            url: "<?php echo base_url('admin/pendaftar/kirim_manual') ?>",
                            type: "POST",
                            data: {
                                id: id,
                                "cadangan": "true"
                            },
                            success: function(data) {
                                location.reload();
                            },
                            error: function(data) {
                                location.reload();
                            }
                        });
                    }
                } else {
                    return false;
                }
            });

            // $('.check_all').click(function() {
            //     $('.chk_boxes1').prop('checked', this.checked);
            //     if ($(this).is(':checked')) {
            //         $('.check').addClass('removeRow');
            //     } else {
            //         $('.check').removeClass('removeRow');
            //     }
            // });
        });
    </script>
</section>