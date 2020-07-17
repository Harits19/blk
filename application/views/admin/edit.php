<div class="container">
  <div class="row">
    <div class="col-lg-12">
      
      <br>
      <h4 class="text-uppercase">Edit Mobil</h4>
      <hr>
      <?php echo form_open('admin/pelatihan/edit_pelatihan_proses') ?>
      <input type="hidden" name="id" value="<?php echo $pelatihan->id ?>">
      <!-- Merk Mobil -->
      <div class="form-group">
        <label for="nama" class="font-weight-bold">Merk Mobil</label>
        <?php echo form_input($nama, $pelatihan->nama) ?>
        <?php echo form_error('nama') ?>
      </div>

      <div class="form-group">
        <label for="nama" class="font-weight-bold">Merk Mobil</label>
        <?php echo form_input($tgl_buka, $pelatihan->tgl_buka) ?>
        <?php echo form_error('nama') ?>
      </div>

      <div class="form-group">
        <label for="nama" class="font-weight-bold">Merk Mobil</label>
        <?php echo form_input($tgl_tutup, $pelatihan->tgl_tutup) ?>
        <?php echo form_error('nama') ?>
      </div>

      <div class="form-group">
        <label for="nama" class="font-weight-bold">Merk Mobil</label>
        <?php echo form_input($status, $pelatihan->status) ?>
        <?php echo form_error('nama') ?>
      </div>
      
      <!-- Submit -->
      <div class="form-group">
        <?php echo form_input($submit) ?>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>