<div class="register-box">
	<div class="register-logo">
		<a href="<?php echo base_url(); ?>"><b><?php echo $site['nama_website']; ?></b></a>
	</div>

	<div class="register-box-body">
		<p class="login-box-msg">Daftar Akun</p>
		<?php echo form_open('auth/check_register', ''); ?>
		<!-- <div class="form-group has-feedback">
			<input type="number" name="nik" class="form-control" required placeholder="NIK">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			<?php echo form_error('nik', '<div class="text-danger"><small>', '</small></div>'); ?>
		</div> -->
		<div class="form-group has-feedback">
			<input type="text" name="username" class="form-control" required placeholder="Nama Pengguna">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
			<?php echo form_error('username', '<div class="text-danger"><small>', '</small></div>'); ?>
		</div>
		<div class="form-group has-feedback">
			<input type="email" name="email" class="form-control" required placeholder="Email">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<?php echo form_error('email', '<div class="text-danger"><small>', '</small></div>'); ?>
		</div>
		<div class="form-group has-feedback">
			<input type="number" name="phone" class="form-control" required placeholder="No. Hp">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<?php echo form_error('phone', '<div class="text-danger"><small>', '</small></div>'); ?>
		</div>
		<div class="form-group has-feedback">
			<input id="password" type="password" name="password" class="form-control" required placeholder="Password">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>'); ?>
		</div>
		<div class="form-group has-feedback">
			<input id="confirm_password" type="password" name="confirm_password" class="form-control" required placeholder="Confirm Password">
			<input type="checkbox" onclick="myFunction()"> Tampilkan Password
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<?php echo form_error('confirm_password', '<div class="text-danger"><small>', '</small></div>'); ?>
		</div>
		<div class="row">
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Daftar Akun</button>
				<?php echo form_close(); ?>
			</div>
		</div>
		<a href="<?php echo base_url('auth/login'); ?>" class="text-center">Sudah Punya Akun? Klik disini</a>
	</div>
</div>
<script>
	function myFunction() {
		var x = document.getElementById("password");
		//   var x = document.getElementById("confirm_password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}

		var x = document.getElementById("confirm_password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
</script>