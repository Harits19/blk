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
                    </div>

                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <th>Nama Pelatihan</th>
                                <th>Jumlah Pendaftar</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 0;
                            $nama_pelatihan = "";

                            foreach ($get_all as $pelatihan_pendaftar) {


                                $no++;
                                echo "<tr>";
                                echo "<td class='text-center'>$no</td>";
                                echo "<td>$pelatihan_pendaftar->nama</td>";
                                echo "<td>$pelatihan_pendaftar->total_pendaftar</td>";
                                echo "<td class='text-center'>";
                            ?>
                                <a class="edit btn" href="<?php echo base_url('admin/pendaftar/lihat/'), $pelatihan_pendaftar->id ?>">
                                    <i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;Lihat Pendaftar
                                </a>

                            <?php
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
</section>