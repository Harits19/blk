<div class="login-box">
	<div class="login-logo">
		<a href="<?php echo base_url(); ?>"><b><?php echo $site['nama_website'] ?></b></a>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg text-bold"> Masuk Dengan Email & Password Anda</p>
		<form method="post" action="<?php echo base_url('auth/login'); ?>" role="login">
			<div class="form-group has-feedback">
				<input type="email" name="email" class="form-control" required minlength="5" placeholder="Email" />
				<span class="glyphicon  glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input id="password" type="password" name="password" class="form-control" required minlength="5" placeholder="Password" />
				<!-- <input type="checkbox" onclick="myFunction()"> Tampilkan Password -->
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>

			<div class="form-group">
				<button type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Masuk</button>
			</div>


			<a href="<?php echo base_url('auth/forgot'); ?>"> Lupa Kata Sandi?</a><br>
			<a href="<?php echo base_url('auth/register'); ?>"> Daftar Akun</a>
		</form>
	</div>
	<div id="myalert">
		<?php echo $this->session->flashdata('alert', true) ?>
	</div>
	<br>
	<div class="box box-solid box-info">
		<div class="box-header">
			<h3 class="box-title">User Login</h3>
		</div>
		<div class="box-body">
			<b>E-mail</b> : admin@mail.com (administrator) <br>
			<b>E-mail</b> : member@mail.com (member)<br>
			<b>Password</b> : password
		</div>
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

		// BARIS KOLOM
		// <div class="row">
		// 		<!-- <div class="checkbox icheck col-xs-12 col-sm-6 col-md-6">
		// 			<label>
		// 				<?php echo form_checkbox('remember_code', '1', false, 'id="remember_code"'); ?>
		// 				Ingat Saya
		// 			</label>
		// 		</div> -->
		// 		<div class="col-xs-12 col-sm-6 col-md-6" style="padding-bottom: 5px">
		// 			<button type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Masuk</button>
		// 		</div>
		// 	</div>
	</script>

	<!-- <script>
		function myFunction() {
			var x = document.getElementById("password");
			//   var x = document.getElementById("confirm_password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}

			// var x = document.getElementById("confirm_password");
			// if (x.type === "password") {
			// 	x.type = "text";
			// } else {
			// 	x.type = "password";
			// }
		}

		
	</script> -->