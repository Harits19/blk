<!DOCTYPE html>
<html>

<head>

</head>

<body>

    <form action="<?php echo base_url('admin/pelatihan/tambah_pelatihan_proses') ?>" method="post" enctype="application/x-www-form-urlencoded">
        <!-- Nama Pelatihan  -->

        <div class="form-group">
            <label for="nama" class="font-weight-bold">Nama Pelatihan</label>
            <?php echo form_input($nama, $pelatihan->nama) ?>
            <?php echo form_error('nama') ?>
        </div>

        <div class="form-group">
            <label for="no_ktp" class="font-weight-bold">No. KTP</label>
            <input type="numeric" name="no_ktp" id="no_ktp" class="form-control" placeholder="Cth: 3310032888888888">
            <?php echo form_error('no_ktp') ?>
        </div>

        <div class="form-group">
            <label for="nama_lengkap" class="font-weight-bold">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Isi Nama Lengkap Anda">
            <?php echo form_error('nama_lengkap') ?>
        </div>

        <div class="form-group">
            <label for="tempat_lahir" class="font-weight-bold">No. KTP</label>
            <input type="text name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Sebutkan Nama Kota">
            <?php echo form_error('tempat_lahir') ?>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin" class="font-weight-bold">Jenis Kelamin</label>
            <input type="text name="jenis_kelamin" id="jenis_kelamin" class="form-control" placeholder="">
            <?php echo form_error('jenis_kelamin') ?>
        </div>

        <div class="form-group">
            <label for="alamat" class="font-weight-bold">Alamat</label>
            <input type="text name="alamat" id="alamat" class="form-control" placeholder="">
            <?php echo form_error('alamat') ?>
        </div>

        <div class="form-group">
            <label for="rt_rw" class="font-weight-bold">RT/RW</label>
            <input type="text name="rt_rw" id="rt_rw" class="form-control" placeholder="">
            <?php echo form_error('rt_rw') ?>
        </div>

        <div class="form-group">
            <label for="kecamatan" class="font-weight-bold">Kecamatan</label>
            <input type="text name="kecamatan" id="kecamatan" class="form-control" placeholder="">
            <?php echo form_error('kecamatan') ?>
        </div>

        <div class="form-group">
            <label for="kelurahan" class="font-weight-bold">Kelurahan</label>
            <input type="text name="kecamatan" id="kelurahan" class="form-control" placeholder="">
            <?php echo form_error('kelurahan') ?>
        </div>

        <div class="form-group">
            <label for="warga_negara" class="font-weight-bold">Kewarganegaraan</label>
            <input type="text name="warga_negara" id="warga_negara" class="form-control" placeholder="">
            <?php echo form_error('warga_negara') ?>
        </div>

        <div class="form-group">
            <label for="no_telp" class="font-weight-bold">No. Telp</label>
            <input type="text name="no_telp" id="no_telp" class="form-control" placeholder="">
            <?php echo form_error('no_telp') ?>
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