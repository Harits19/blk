<div class="register-box">
	<div class="register-logo">
		<a href="<?php echo base_url(); ?>"><b><?php echo $site['nama_website']; ?></b></a>
	</div>

	<div class="register-box-body">
		<p class="login-box-msg">Masukkan Email</p>
		<?php echo form_open('auth/send_token', ''); ?>

		<div class="form-group has-feedback">
			<input type="email" name="email" class="form-control" required placeholder="Email">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<!-- <?php echo form_error('email', '<div class="text-danger"><small>', '</small></div>'); ?> -->
			<?php echo form_error('email') ?>
		</div>
		<div class="row">
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
				<?php echo form_close(); ?>
			</div>
		</div>
		<a href="<?php echo base_url('auth/login'); ?>" class="text-center">Sudah Punya Akun? Klik disini</a>
	</div>

	<div id="myalert">
		<?php echo $this->session->flashdata('alert', true)?>
	</div>
	<br>
</div>

<!-- MENAMPILKAN NOTIFIKASI -->
<script>
	$(function() {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' // optional
		});
	});
	$('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);
</script>