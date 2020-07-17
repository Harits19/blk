<!DOCTYPE html>
<html>

<head>
    
</head>

<body>
    
    <form action="<?php echo base_url('admin/pelatihan/tambah_pelatihan_proses') ?>" method="post" enctype="application/x-www-form-urlencoded">
        <!-- Nama Pelatihan  -->
        <div class="form-group">
            <label for="nama_pelatihan" class="font-weight-bold">Nama Pelatihan</label>
            <input type="text" name="nama_pelatihan" id="nama" class="form-control">
            <?php echo form_error('nama_pelatihan') ?>
        </div>

        <div class="form-group">
            <label for="tgl_buka" class="font-weight-bold">Tanggal Pinjam</label>
            <div class="input-group">
                <!-- <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
            </div> -->

                <input type="text" name="tgl_buka" id="tgl_buka" class="form-control" placeholder="dd-mm-yyyy" aria-label="Input group example" aria-describedby="btnGroupAddon"></input>
                <?php echo form_error('tgl_buka') ?>
            </div>
        </div>

        <div class="form-group">
            <label for="tgl_tutup" class="font-weight-bold">Tanggal Tutup</label>
            <div class="input-group">
                <!-- <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
            </div> -->

                <input type="text" name="tgl_tutup" id="tgl_tutup" class="form-control" placeholder="dd-mm-yyyy" aria-label="Input group example" aria-describedby="btnGroupAddon"></input>
                <?php echo form_error('tgl_tutup') ?>
            </div>
        </div>


        <div class="form-group">
            <label for="status" class="font-weight-bold">Status</label>
            <div class="input-group">
                <select name="status" class="form-control">
                    <option value="0">Tutup</option>
                    <option value="1">Buka</option>
                </select>
            </div>
            <?php echo form_error('status') ?>
        </div>

        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" value="Tambah">
        </div>

    </form>
</body>

</html>