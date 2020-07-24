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
                                <th>&nbsp;</th>
                                <th>Nama Pelatihan</th>
                                <th>Tanggal Buka</th>
                                <th>Tanggal Tutup</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php
                            $no = 0;
                            foreach ($get_all as $pelatihan) {

                                $tanggal = strtotime($pelatihan->tgl_buka);
                                $tgl_buka = date('d-m-Y',$tanggal);
                                $tanggal = strtotime($pelatihan->tgl_tutup);
                                $tgl_tutup = date('d-m-Y',$tanggal);

                                $no++;
                                // echo "<tbody id='myTable'>";
                                echo "<tr>";
                                echo "<td class='text-center'>$no</td>";
                                echo "<td>$pelatihan->nama</td>";
                                echo "<td>$tgl_buka</td>";
                                echo "<td>$tgl_tutup</td>";
                                echo "<td>$pelatihan->status</td>";
                                echo "<td class='text-center'>";
                            ?>
                                <a class="edit btn" href="<?php echo base_url('member/home/detail/'), $pelatihan->id ?>">
                                    <i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;Detail Pelatihan
                                </a>
                                <a class="hapus btn" href="<?php echo base_url('admin/pelatihan/hapus/'),$pelatihan->id?>"  onclick="return confirm('Apakah anda yakin?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Daftar</i>
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
    <h2>Modal Example</h2>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
</section>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
