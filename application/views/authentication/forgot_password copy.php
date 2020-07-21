<div class="register-box">
	<div class="register-logo">
		<a href="<?php echo base_url() ;?>"><b><?php echo $site['nama_website']; ?></b></a>
	</div>

	<div class="register-box-body">
		<p class="login-box-msg">Masukkan Email</p>
		<?php echo form_open('forgot_password','') ;?>
	
		<div class="form-group has-feedback">
			<input type="email" name="email" class="form-control" required placeholder="Email">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <!-- <?php echo form_error('email','<div class="text-danger"><small>','</small></div>') ;?> -->
            <?php echo form_error('email') ?>
		</div>
		<div class="row">
			<div class="col-xs-4">
		      <button type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
		      <?php echo form_close() ;?>
			</div>
		</div>
		<a href="<?php echo base_url('auth/login') ;?>" class="text-center">I already have a membership</a>
	</div>
</div>
