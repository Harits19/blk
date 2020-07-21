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
                        <div class="column" >
                            <div class="pull-right">
                                <a href="<?php echo base_url() ?>admin/pelatihan/tambah" class="btn btn-default btn-flat"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Tambah Pelatihan</a>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($get_all as $pelatihan) {

                                $tanggal = strtotime($pelatihan->tgl_buka);
                                $tgl_buka = date('d-m-Y',$tanggal);
                                $tanggal = strtotime($pelatihan->tgl_tutup);
                                $tgl_tutup = date('d-m-Y',$tanggal);

                                $no++;
                                echo "<tr>";
                                echo "<td class='text-center'>$no</td>";
                                echo "<td>$pelatihan->nama</td>";
                                echo "<td>$tgl_buka</td>";
                                echo "<td>$tgl_tutup</td>";
                                echo "<td>$pelatihan->status</td>";
                                echo "<td class='text-center'>";
                            ?>
                                <a class="edit btn" href="<?php echo base_url('member/home/daftar/'), $pelatihan->id ?>">
                                    <i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;Daftar
                                </a>
                                <!-- <a class="hapus btn" href="<?php echo base_url('admin/pelatihan/hapus/'),$pelatihan->id?>"  onclick="return confirm('Apakah anda yakin?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Hapus</i>
                                </a> -->
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
</section>