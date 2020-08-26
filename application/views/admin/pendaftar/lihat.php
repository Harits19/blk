<style>
    * {
        box-sizing: border-box;
    }

    .removeRow {
        /* background-color: #dedede; */
        color: #0088f7;
    }

    #popup {
        display: none;
        /* position: fixed; */
        z-index: 1000;
        /* your styles */
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
                    <form id="formKonf" method="post" action="<?php echo base_url('admin/pendaftar/kirim_manual') ?>" role="login">


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

                            ?>
                        </div>


                        <table class="table table-striped table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>Nama Pendaftar</th>
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>Kuota ( <?php echo $kuota_kota . ' kota + ' . $kuota_luar_kota . ' luar kota )'; ?></th>
                                    <th>Status</th>
                                    <th>Foto KTP</th>

                                </tr>
                            </thead>
                            <tbody>

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
                                        if ($data_pelatihan->konfirmasi_pendaftar_cadangan ==  "sudah") {
                                            $status = " ";
                                        }
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
                                        $status = "Hadir";
                                        $check_box = false;
                                    } elseif ($pelatihan_pendaftar->status_pendaftar == "6") {
                                        $status = "Tidak Hadir";
                                        $check_box = false;
                                    }

                                    $no++;
                                    echo "<tr>";
                                    echo "<td class='text-center'>$no</td>";
                                    echo "<td>$pelatihan_pendaftar->nama_pendaftar</td>";
                                    echo "<td>$pelatihan_pendaftar->nik</td>";
                                    echo "<td>$pelatihan_pendaftar->alamat</td>";
                                    if (($data_pelatihan->konfirmasi_pendaftar == 'belum' || $data_pelatihan->konfirmasi_pendaftar_cadangan == 'belum') && $pelatihan_pendaftar->wilayah == "kota" && $check_box == true) {
                                        echo "<td><input type='checkbox' name='id_list[]' class='check-item   chk_boxes_kota' value='" . $pelatihan_pendaftar->id_pendaftar . "'></td>";
                                    } elseif (($data_pelatihan->konfirmasi_pendaftar == 'belum' || $data_pelatihan->konfirmasi_pendaftar_cadangan == 'belum') && $pelatihan_pendaftar->wilayah == "luar kota" && $check_box == true) {
                                        echo "<td><input type='checkbox' name='id_list[]' class='check-item   chk_boxes_luar_kota' value='" . $pelatihan_pendaftar->id_pendaftar . "'></td>";
                                    } else {
                                        echo "<td></td>";
                                    }
                                    echo "<td>$status</td>";

                                ?>
                                    <td>
                                        <a id="thumb" class="thumb1" href="<?php echo base_url('gambar/' . $pelatihan_pendaftar->foto_ktp); ?>">
                                            <img width='100' height='100' src="<?php echo base_url('gambar/' . $pelatihan_pendaftar->foto_ktp); ?>" />
                                        </a>
                                    </td>

                                    <?php

                                    echo "<td class='text-center'>";
                                    ?>

                                    <a class="btn btn-primary" id="button_detail" data-toggle="modal" href="#myModalDetail" data-nik="<?php echo $pelatihan_pendaftar->nik ?>" data-nama="<?php echo $pelatihan_pendaftar->nama_pendaftar ?>" data-alamat="<?php echo $pelatihan_pendaftar->alamat ?>" data-email="<?php echo $pelatihan_pendaftar->email ?>" data-wilayah="<?php echo $pelatihan_pendaftar->wilayah ?>" data-jenis_kelamin="<?php echo $pelatihan_pendaftar->jenis_kelamin ?>" data-no_hp="<?php echo $pelatihan_pendaftar->no_hp ?>" data-pendidikan_terakhir="<?php echo $pelatihan_pendaftar->pendidikan_terakhir ?>" data-foto_ktp="<?php echo $pelatihan_pendaftar->foto_ktp ?>" data-alasan_mengikuti="<?php echo $pelatihan_pendaftar->alasan_mengikuti ?>">Detail</a>


                                <?php

                                }


                                echo "</td>";
                                echo "</tr>";


                                ?>
                            </tbody>
                        </table>

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
                            <input type='hidden' name='keterangan' value='cadangan'></input>
                            <!-- <input type='hidden' name='id_pelatihan' value="<?php echo $data_pelatihan->id; ?>"></input> -->
                            <button type="button" name="btn_kirim" id="btn_kirim" class="btn btn-danger mb-4 mt-4">Kirim Konfirmasi Kehadiran</button>
                        <?php
                        } else {
                            echo "<p>Pelatihan Ditutup</p>";
                        }
                        ?>
                        </form>

                </div>
            </div>
        </div>

    </div>

    <script>
        var kuota_utama = "<?php print($kuota_utama); ?>";
        var kuota_luar_kota = "<?php print($kuota_luar_kota); ?>";
        var kuota_kota = "<?php print($kuota_kota); ?>";
        // var ignore_kuota = "<?php print($ignore_kuota); ?>";
        var ignore_kuota = "false";
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

            // $(document).ready(function() {
            //     $("#formMhs").submit(function(e) {
            //         e.preventDefault();
            //         $.ajax({
            //             url: 'simpan-data.php',
            //             type: 'post',
            //             data: $(this).serialize(),
            //             success: function(data) {
            //                 document.getElementById("formMhs").reset();
            //                 $('#status').html(data);
            //             }
            //         });
            //     });
            // })

            $('#btn_kirim').click(function() {
                if (confirm("Apakah Anda yakin ingin mengirim email verifikasi ke pendaftar ini?")) {
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
                        $("#formKonf").submit();
                        // $.ajax({
                        //     url: "<?php echo base_url('admin/pendaftar/kirim_manual') ?>",
                        //     type: "POST",
                        //     data: {
                        //         id: id
                        //     },
                        //     success: function(data) {
                        //         location.reload();
                        //     },
                        //     error: function(data) {
                        //         location.reload();
                        //     }
                        // });
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

        $(document).on('click', '#button_detail', function(e) {
            email = $(this).attr('data-email');
            $(".modal-body #email").val(email);
            nik = $(this).attr('data-nik');
            $(".modal-body #nik").val(nik);
            // alasan_mengikuti = $(this).attr('alasan_mengikuti');
            // $(".modal-body #alasan_mengikuti").val(alasan_mengikuti);

            alasan_mengikuti = $(this).attr('data-alasan_mengikuti');
            $(".modal-body #alasan_mengikuti").val(alasan_mengikuti);

            alamat = $(this).attr('data-alamat');
            $(".modal-body #alamat").val(alamat);
            nama = $(this).attr('data-nama');
            $(".modal-body #nama").val(nama);
            wilayah = $(this).attr('data-wilayah');
            $(".modal-body #wilayah").val(wilayah);
            no_hp = $(this).attr('data-no_hp');
            $(".modal-body #no_hp").val(no_hp);
            pendidikan_terakhir = $(this).attr('data-pendidikan_terakhir');
            $(".modal-body #pendidikan_terakhir").val(pendidikan_terakhir);
            foto_ktp = $(this).attr('data-foto_ktp');
            $(".modal-body #foto_ktp").val(foto_ktp);
            console.log(email);
        });
    </script>

    <div class="modal fade" id="myModalDetail" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Pendaftar</h4>
                </div>
                <form class="form-horizontal">

                    <div class="modal-body">



                        <input type="hidden" id="id" name="id">

                        <!-- <div class="form-group">
                            <label class="control-label col-xs-3">Email</label>
                            <div class="col-xs-8">
                                <input disabled name="email" id="email" class="form-control" type="text" placeholder="email" required>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label class="control-label col-xs-3">NIK</label>
                            <div class="col-xs-8">
                                <input id="nik" name="nik" class="form-control" type="number" disabled placeholder="Isikan NIK Anda..." required>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Nama</label>
                            <div class="col-xs-8">
                                <input id="nama" name="nama" class="form-control" type="text" disabled placeholder="Isikan Nama Anda..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Alamat</label>
                            <div class="col-xs-8">
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" disabled placeholder="Alamat..." required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Wilayah</label>
                            <div class="col-xs-8">
                                <select id="wilayah" name="wilayah" class="form-control" disabled required>
                                    <option value="kota">Kota</option>
                                    <option value="luar kota">Luar Kota</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Jenis Kelamin</label>
                            <div class="col-xs-8">
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" disabled required>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Email</label>
                            <div class="col-xs-8">
                                <input id="email" name="email" class="form-control" disabled type="email" placeholder="Isikan Email Anda..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">No. Hp</label>
                            <div class="col-xs-8">
                                <input id="no_hp" name="no_hp" class="form-control" type="number" disabled placeholder="No. Hp..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Pendidikan Terakhir</label>
                            <div class="col-xs-8">
                                <input id="pendidikan_terakhir" name="pendidikan_terakhir" class="form-control" type="text" disabled placeholder="Pendidikan Terakhir Anda..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3">Alasan Mengikuti</label>
                            <div class="col-xs-8">
                                <textarea class="form-control" id="alasan_mengikuti" name="alasan_mengikuti" rows="3" disabled placeholder="Alasan Mengikuti Anda..." required></textarea>
                            </div>
                        </div>






                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Image preview</h4>
                </div>
                <div class="modal-body">
                    <img src="" id="imagepreview" style="width: 400px; height: 264px;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>