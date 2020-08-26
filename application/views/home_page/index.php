<!DOCTYPE html>
<html lang="en">
<head>
<!--
New Event
http://www.templatemo.com/tm-486-new-event
-->
<title>New Event - Responsive HTML Template</title>
<meta name="description" content="">
<meta name="author" content="">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/animate.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/owl.theme.css">
<link rel="stylesheet" href="assets/css/owl.carousel.css">

<!-- Main css -->
<link rel="stylesheet" href="assets/css/style.css">

<!-- Google Font -->
<link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>

</head>
<body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">

<!-- =========================
     PRE LOADER       
============================== -->
<div class="preloader">

	<div class="sk-rotating-plane"></div>

</div>


<!-- =========================
     NAVIGATION LINKS     
============================== -->
<div class="navbar navbar-fixed-top custom-navbar" role="navigation">
	<div class="container">

		<!-- navbar header -->
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">Balai Latihan Kerja</a>
		</div>

		<div class="collapse navbar-collapse">

			<ul class="nav navbar-nav navbar-right">
				<li><a href="#intro" class="smoothScroll">Home</a></li>
				<!-- <li><a href="#overview" class="smoothScroll">Overview</a></li> -->
				<li><a href="#register" class="smoothScroll">Cara Pendaftaran</a></li>
				<li><a href="#program" class="smoothScroll">Pengumuman Penting</a></li>
				<!-- <li><a href="#speakers" class="smoothScroll">Speakers</a></li> -->
				<li><a href="#faq" class="smoothScroll">FAQ</a></li>
				<li><a href="#venue" class="smoothScroll">Contact</a></li>
				<!-- <li><a href="#contact" class="smoothScroll">Contact</a></li> -->
			</ul>

		</div>

	</div>
</div>


<!-- =========================
    INTRO SECTION   
============================== -->
<section id="intro" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<h3 class="wow bounceIn" data-wow-delay="0.9s">Selamat Datang !</h3>
				<h1 class="wow fadeInUp" data-wow-delay="1.6s">Webstite Pendaftaran Pelatihan</h1>
				<h3 class="wow fadeInUp" data-wow-delay="1.6s">Kota Probolinggo</h3>
				<a href="#overview" class="btn btn-lg btn-default smoothScroll wow fadeInUp hidden-xs" data-wow-delay="2.3s">Pelajari Lebih Lanjut</a>
				<a href="<?php echo base_url() ?>auth/login" class="btn btn-lg btn-danger smoothScroll wow fadeInUp" data-wow-delay="2.3s">LOGIN</a>
			</div>


		</div>
	</div>
</section>


<!-- =========================
    OVERVIEW SECTION   
============================== -->
<section id="overview" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.6s">
				<div class="section-title">Mengapa Diadakan Pelatihan ?</div>
				<h3>Dinas Penanaman Modal, Pelayanan Satu Pintu Terpadu dan Tenaga Kerja Selalu berusaha untuk meningkatkan kualitas SDM</h3>
				<p>Salah satu caranya adalah dengan mengadakan pelatihan - pelatihan yang dapat diikuti oleh masyarakat khususnya warga Kota Probolinggo.</p>
				<p>Dengan mengikuti pelatihan ini diharapakan masyarakat mendapatkan berbagai keterampilan dan keahlian khusus yang nantinya dapat dimanfaatkan guna mencari atau bahkan membuka lapangan kerja yang baru</p>
				<p class="testimonial-text">"Kekayaan Terbesar sebuah bangsa adalah manusianya buka sumber daya alamnya"</p>
                        <div class="testimonial-author">- Anies Baswedan</div>
			</div>
					
			<div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.9s">
				<img src="assets/images/overview-img.jpg" class="img-responsive" alt="Overview">
			</div>

		</div>
	</div>
</section>


<!-- =========================
    DETAIL SECTION   
============================== -->
<section id="detail" class="parallax-section">
	<div class="section-title"><h3>Apa Keuntungan Mengikuti Pelatihan ?</h3></div>
	<br>
	<br>
	<br>
	<br>
	<div class="container">	
		<div class="row">
			
			<div class="wow fadeInLeft col-md-4 col-sm-4" data-wow-delay="0.3s">
				<i class="fa fa-wrench"></i>
				<h3>keterampilan Baru</h3>
			</div>

			<div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.6s">
				<i class="fa fa-ban"></i>
				<h3>Tanpa Biaya</h3>
			</div>

			<div class="wow fadeInRight col-md-4 col-sm-4" data-wow-delay="0.9s">
				<i class="fa fa-comments"></i>
				<h3>Relasi Baru</h3>
			</div>

		</div>
	</div>
</section>


<!-- =========================
    VIDEO SECTION   
============================== -->
<section id="video" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-6 col-sm-10" data-wow-delay="1.3s">
				<h2></h2>
				<h3>Video berikut menampilkan beberapa kegiatan selama pelatihan yang sudah <b>UPTD BLK Kota Probolinggo</b> selenggarakan Sebelumnya</h3>
			</div>
			<div class="wow fadeInUp col-md-6 col-sm-10" data-wow-delay="1.6s">
				<div class="embed-responsive embed-responsive-16by9">
					<!-- <iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=vhxdprxSqAE" allowfullscreen></iframe> -->
					<iframe width="560" height="315" src="https://www.youtube.com/embed/vhxdprxSqAE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>

		</div>
	</div>
</section>


<!-- =========================
   REGISTER SECTION   
============================== -->
<section id="register" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Section title
			================================================== -->
			<div class="wow bounceIn col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 text-center">
				<div class="section-title">
					<h2>Cara Pendaftaran</h2>
					<p></p>
				</div>
			</div>

			<div class="wow fadeInUp col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10" data-wow-delay="0.9s">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

  					<div class="panel panel-default">
   						<div class="panel-heading" role="tab" id="headingAlurOne">
      						<h4 class="panel-title">
        						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseAlurOne" aria-expanded="false" aria-controls="collapseAlurOne">
          							 1. Login ke Halaman Website Pendaftaran Pelatihan
        						</a>
      						</h4>
    					</div>
   						<div id="collapseAlurOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingAlurOne">
      						<div class="panel-body">
								<p>Klik "LOGIN" pada halaman website, kemudian login sesuai akun yang anda miliki, jika anda <b>BELUM</b> memiliki akun, silahkan lakukan registrasi akun terlebih dahulu.
								Setelah berhasil melakukan registrasi, lakukan aktivasi akun anda dengan cara klik link aktivasi yang dikirim ke alamat email yang anda daftarkan saat proses registrasi tadi. </p>
								
      						</div>
   						 </div>
 					</div>

    				<div class="panel panel-default">
   						<div class="panel-heading" role="tab" id="headingAlurTwo">
      						<h4 class="panel-title">
        						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseAlurTwo" aria-expanded="false" aria-controls="collapseAlurTwo">
          							 2. Cari Dan Pilih Pelatihan Yang Ingin Anda Ikuti
        						</a>
      						</h4>
    					</div>
   						<div id="collapseAlurTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingAlurTwo">
      						<div class="panel-body">
                            	<p>Pada halaman utama setelah anda login, akan tampil informasi mengenai pelatihan apa saja yang tersedia.
									Anda bisa melakukan pencarian melalui kolom "search".
								</p>
      						</div>
   						 </div>
 					</div>

 					<div class="panel panel-default">
   						<div class="panel-heading" role="tab" id="headingAlurThree">
      						<h4 class="panel-title">
        						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseAlurThree" aria-expanded="false" aria-controls="collapseAlurThree">
          							 3. Klik Daftar Dan Masukkan Informasi Data Diri Anda
        						</a>
      						</h4>
    					</div>
   						<div id="collapseAlurThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingAlurThree">
      						<div class="panel-body">
                            	<p>Setelah menemukan pelatihan yang diinginkan klik tombol Daftar dan isi semua informasi dengan benar dan jujur.
									Jangan lupa upload file scan KTP anda dengan ukuran maksimal 1 Mb. <b>Anda hanya bisa mendaftar pada 1 (SATU) pelatihan saja.</b>
								</p>
      						</div>
   						 </div>
					  </div>
					  
					  <div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingAlurFour">
						   <h4 class="panel-title">
							 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseAlurFour" aria-expanded="false" aria-controls="collapseAlurFour">
								  4. Lakukan Verifikasi Melalui Email Anda
							 </a>
						   </h4>
					 </div>
						<div id="collapseAlurFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingAlurFour">
						   <div class="panel-body">
							 <p>Setelah anda sukses melakukan pendaftaran maka selanjutnya, buka email yang sudah anda daftarkan sebelumnya pada akun website pendaftaran pelatihan,
								 kemudian cari dan buka email verifikasi yang dikirim oleh website, dan klik link verifikasi yang ada.
							 </p>
						   </div>
						 </div>
				   </div>

				   <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingAlurFive">
					   <h4 class="panel-title">
						 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseAlurFive" aria-expanded="false" aria-controls="collapseALurFive">
							  5. Ikuti Wawancara Dengan Membawa Berkas Sesuai Ketentuan 
						 </a>
					   </h4>
				 </div>
					<div id="collapseAlurFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingAlurFive">
					   <div class="panel-body">
						 <p>Cari informasi mengenai pelaksanaan interview di website pendaftaran pelatihan di bagian "Pengumuman Penting"
							untuk mengetahui tanggal dan lokasi pelaksanaan interview serta berkas apa saja yang perlu dibawa.
						 </p>
					   </div>
					 </div>
			   </div>

			   <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingAlurSix">
				   <h4 class="panel-title">
					 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseAlurSix" aria-expanded="false" aria-controls="collapseAlurSix">
						   6. Tunggu Pengumuman Penerimaan Lebih Lanjut 
					 </a>
				   </h4>
			 </div>
				<div id="collapseAlurSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingAlurSix">
				   <div class="panel-body">
					 <p>Setelah mengikuti interview maka selanjutnya tunggu <b>pengumuman penerimaan anda</b>.
						 Pengumuman penerimaan peserta akan diumumkan melalui website.
					 </p>
				   </div>
				 </div>
		   </div>

 				 </div>
			</div>
			
			<div class="col-md-1"></div>

		</div>
	</div>
</section>


<!-- =========================
    PROGRAM SECTION   
============================== -->
<section id="program" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.6s">
				<div class="section-title">
					<h3>Berikut Informasi Penting Seputar Pelatihan</h3>
					<p>Klik pada bagian <b>"Pengumuman Penting"</b> untuk menampilkan informasi seputar pelaksanaan pelatihan.</p>
					<p>Klik pada bagian <b>"Daftar Pelatihan"</b> untuk menampilkan informasi mengenai pelatihan yang diadakan</p>
				</div>
			</div>

			<div class="wow fadeInUp col-md-10 col-sm-10" data-wow-delay="0.9s">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="active"><a href="#pengumuman" aria-controls="pengumuman" role="tab" data-toggle="tab">Pengumuman penting</a></li>
					<li><a href="#pelatihan1" aria-controls="pelatihan1" role="tab" data-toggle="tab">Daftar Pelatihan 1</a></li>
					<li><a href="#pelatihan2" aria-controls="pelatihan2" role="tab" data-toggle="tab">Daftar Pelatihan 2</a></li>
					<li><a href="#pelatihan3" aria-controls="pelatihan3" role="tab" data-toggle="tab">Daftar Pelatihan 3</a></li>
					<li><a href="#pelatihan4" aria-controls="pelatihan4" role="tab" data-toggle="tab">Daftar Pelatihan 4</a></li>
				</ul>
				<!-- tab panes -->
				<div class="tab-content">

					<div role="tabpanel" class="tab-pane active" id="pengumuman">
						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/program-img1.jpg" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 09.00 AM</span> 
								<span><i class="fa fa-map-marker"></i> Room 240</span>
							</h6>
							<h3>Pembukaan Pelatihan September 2020</h3>
							<h4>By Jenny Green</h4>
							<p>Pelatihan untuk bulan september 2020 telah dibuka, berikut daftar nya :</p>
							<p>1. Pelatihan 1</p>
							<p>2. Pelatihan 1</p>
						</div>

						<!-- program divider -->
						<div class="program-divider col-md-12 col-sm-12"></div>

						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/program-img2.jpg" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 10.00 AM</span> 
								<span><i class="fa fa-map-marker"></i> Room 360</span>
							</h6>
							<h3>Penutupan Pelatihan September 2020</h3>
							<h4>By Johnathan Mark</h4>
							<p>Mauris at tincidunt felis, vitae aliquam magna. Sed aliquam fringilla vestibulum. Praesent ullamcorper mauris fermentum turpis scelerisque rutrum eget eget turpis.</p>
						</div>

						<!-- program divider -->
						<div class="program-divider col-md-12 col-sm-12"></div>

						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/program-img3.jpg" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 11.00 AM</span> 
								<span><i class="fa fa-map-marker"></i> Room 450</span>
							</h6>
							<h3>Pelaksanaan Interview pelatihan september 2020</h3>
							<h4>By Johnathan Doe</h4>
							<p>Nam pulvinar, elit vitae rhoncus pretium, massa urna bibendum ex, aliquam efficitur lorem odio vitae erat. Integer rutrum viverra magna, nec ultrices risus rutrum nec.</p>
						</div>
					</div>

					<div role="tabpanel" class="tab-pane" id="pelatihan1">
						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/program-img4.jpg" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 11.00 AM</span> 
								<span><i class="fa fa-map-marker"></i> Room 240</span>
							</h6>
							<h3>Teknik Pendingin (AC)</h3>
							<h4>By Matt Lee</h4>
							<p>Integer rutrum viverra magna, nec ultrices risus rutrum nec. Pellentesque interdum vel nisi nec tincidunt. Quisque facilisis scelerisque venenatis. Nam vulputate ultricies luctus.</p>
						</div>

						<!-- program divider -->
						<div class="program-divider col-md-12 col-sm-12"></div>

						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/mobil.JPG" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 01.00 PM</span> 
								<span><i class="fa fa-map-marker"></i> Room 450</span>
							</h6>
							<h3>Otomotif Mobil</h3>
							<h4>By David Orlando</h4>
							<p>Aliquam faucibus lobortis dolor, id pellentesque eros pretium in. Aenean in erat ut quam aliquet commodo. Vivamus aliquam pulvinar ipsum ut sollicitudin. Suspendisse quis sollicitudin mauris.</p>
						</div>

						<!-- program divider -->
						<div class="program-divider col-md-12 col-sm-12"></div>

						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/motor.JPG" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 03.00 PM</span> 
								<span><i class="fa fa-map-marker"></i> Room 650</span>
							</h6>
							<h3>Otomotif Sepeda Motor</h3>
							<h4>By James Lee Mark</h4>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat.</p>
						</div>
					</div>

					<div role="tabpanel" class="tab-pane" id="pelatihan2">
						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/listrik.JPG" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 03.00 PM</span> 
								<span><i class="fa fa-map-marker"></i> Room 750</span>
							</h6>
							<h3>Kejuruan Listrik</h3>
							<h4>By Michael Walker</h4>
							<p>Aliquam faucibus lobortis dolor, id pellentesque eros pretium in. Aenean in erat ut quam aliquet commodo. Vivamus aliquam pulvinar ipsum ut sollicitudin. Suspendisse quis sollicitudin mauris.</p>
						</div>

						<!-- program divider -->
						<div class="program-divider col-md-12 col-sm-12"></div>

						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/las.JPG" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 05.00 PM</span> 
								<span><i class="fa fa-map-marker"></i> Room 850</span>
							</h6>
							<h3>Kejuruan Las</h3>
							<h4>By Cherry Stella</h4>
							<p>Nunc eu nibh vel augue mollis tincidunt id efficitur tortor. Sed pulvinar est sit amet tellus iaculis hendrerit. Mauris justo erat, rhoncus in arcu at, scelerisque tempor erat.</p>
						</div>

						<!-- program divider -->
						<div class="program-divider col-md-12 col-sm-12"></div>

						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/makan.JPG" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 07.00 PM</span> 
								<span><i class="fa fa-map-marker"></i> Room 750</span>
							</h6>
							<h3>Kejuruan Pengolahan Makanan Minuman</h3>
							<h4>By John David</h4>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat.</p>
						</div>
					</div>

					<div role="tabpanel" class="tab-pane" id="pelatihan3">
						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/komputer1.JPG" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 03.00 PM</span> 
								<span><i class="fa fa-map-marker"></i> Room 750</span>
							</h6>
							<h3>IT Jaringan Komputer</h3>
							<h4>By Michael Walker</h4>
							<p>Aliquam faucibus lobortis dolor, id pellentesque eros pretium in. Aenean in erat ut quam aliquet commodo. Vivamus aliquam pulvinar ipsum ut sollicitudin. Suspendisse quis sollicitudin mauris.</p>
						</div>

						<!-- program divider -->
						<div class="program-divider col-md-12 col-sm-12"></div>

						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/komputer2.JPG" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 05.00 PM</span> 
								<span><i class="fa fa-map-marker"></i> Room 850</span>
							</h6>
							<h3>IT Perakitan Komputer</h3>
							<h4>By Cherry Stella</h4>
							<p>Nunc eu nibh vel augue mollis tincidunt id efficitur tortor. Sed pulvinar est sit amet tellus iaculis hendrerit. Mauris justo erat, rhoncus in arcu at, scelerisque tempor erat.</p>
						</div>

						<!-- program divider -->
						<div class="program-divider col-md-12 col-sm-12"></div>

						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/komputer3.JPG" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 07.00 PM</span> 
								<span><i class="fa fa-map-marker"></i> Room 750</span>
							</h6>
							<h3>IT Basic Office</h3>
							<h4>By John David</h4>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat.</p>
						</div>
					</div>

					<div role="tabpanel" class="tab-pane" id="pelatihan4">
						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/menjahit.JPG" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 03.00 PM</span> 
								<span><i class="fa fa-map-marker"></i> Room 750</span>
							</h6>
							<h3>Kejuruan Menjahit</h3>
							<h4>By Michael Walker</h4>
							<p>Aliquam faucibus lobortis dolor, id pellentesque eros pretium in. Aenean in erat ut quam aliquet commodo. Vivamus aliquam pulvinar ipsum ut sollicitudin. Suspendisse quis sollicitudin mauris.</p>
						</div>

						<!-- program divider -->
						<div class="program-divider col-md-12 col-sm-12"></div>

						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/batik.JPG" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 05.00 PM</span> 
								<span><i class="fa fa-map-marker"></i> Room 850</span>
							</h6>
							<h3>Kejuruan Operator Garmen</h3>
							<h4>By Cherry Stella</h4>
							<p>Nunc eu nibh vel augue mollis tincidunt id efficitur tortor. Sed pulvinar est sit amet tellus iaculis hendrerit. Mauris justo erat, rhoncus in arcu at, scelerisque tempor erat.</p>
						</div>

						<!-- program divider -->
						<div class="program-divider col-md-12 col-sm-12"></div>

						<!-- program speaker here -->
						<div class="col-md-2 col-sm-2">
							<img src="assets/images/rias.jpeg" class="img-responsive" alt="program">
						</div>
						<div class="col-md-10 col-sm-10">
							<h6>
								<span><i class="fa fa-clock-o"></i> 07.00 PM</span> 
								<span><i class="fa fa-map-marker"></i> Room 750</span>
							</h6>
							<h3>Kejuruan Tata Rias</h3>
							<h4>By John David</h4>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat.</p>
						</div>
					</div>

				</div>

		</div>
	</div>
</section>

<!-- =========================
    SPEAKERS SECTION   
============================== -->
<!-- <section id="speakers" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12 wow bounceIn">
				<div class="section-title">
					<h2>Creative Speakers</h2>
					<p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet.</p>
				</div>
			</div> -->

			<!-- Testimonial Owl Carousel section
			================================================== -->
			<!-- <div id="owl-speakers" class="owl-carousel">

				<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.9s">
					<div class="speakers-wrapper">
						<img src="images/speakers-img1.jpg" class="img-responsive" alt="speakers">
							<div class="speakers-thumb">
								<h3>Jenny Green</h3>
								<h6>UI Designer</h6>
							</div>
					</div>
				</div>

				<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
					<div class="speakers-wrapper">
						<img src="images/speakers-img2.jpg" class="img-responsive" alt="speakers">
							<div class="speakers-thumb">
								<h3>David Yoon</h3>
								<h6>Creative Director</h6>
							</div>
					</div>
				</div>

				<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.9s">
					<div class="speakers-wrapper">
						<img src="images/speakers-img3.jpg" class="img-responsive" alt="speakers">
							<div class="speakers-thumb">
								<h3>Je Mary Lee</h3>
								<h6>Web Specialist</h6>
							</div>
					</div>
				</div>

				<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
					<div class="speakers-wrapper">
						<img src="images/speakers-img4.jpg" class="img-responsive" alt="speakers">
							<div class="speakers-thumb">
								<h3>Johnathan Doe</h3>
								<h6>Frontend Dev</h6>
							</div>
					</div>
				</div>

				<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
					<div class="speakers-wrapper">
						<img src="images/speakers-img5.jpg" class="img-responsive" alt="speakers">
							<div class="speakers-thumb">
								<h3>Elite Hamilton</h3>
								<h6>Marketing Guru</h6>
							</div>
					</div>
				</div>
				
			</div>

		</div>
	</div>
</section> -->


<!-- =========================
    FAQ SECTION   
============================== -->
<section id="faq" class="parallax-section">
	<div class="container">
		<div class="row">

			<!-- Section title
			================================================== -->
			<div class="wow bounceIn col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 text-center">
				<div class="section-title">
					<h2>Apakah anda memiliki pertanyaan ?</h2>
					<p>Jika anda memiliki pertanyaan atau keluhan yang lain silhkan hubungi kontak kami di bawah</p>
				</div>
			</div>

			<div class="wow fadeInUp col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10" data-wow-delay="0.9s">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingFAQOne">
						   <h4 class="panel-title">
							 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFAQOne" aria-expanded="false" aria-controls="collapseFAQOne">
									Apakah BBPLK itu ?
							 </a>
						   </h4>
					 </div>
						<div id="collapseFAQOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFAQOne">
						   <div class="panel-body">
							 <p>BBPLK = Balai Besar Pengembangan Pelatihan Kerja. BBPLK adalah tempat pelatihan dengan keahlian tertentu di bawah naungan Kementerian Ketenagakerjaan  </p>
						   </div>
						 </div>
				  </div>  

				  <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingFAQTwo">
					   <h4 class="panel-title">
						 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFAQTwo" aria-expanded="false" aria-controls="collapseFAQTwo">
								Apakah semua pendaftar pelatihan akan diterima ?
						 </a>
					   </h4>
				 </div>
					<div id="collapseFAQTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFAQTwo">
					   <div class="panel-body">
						 <p>Tidak. Untuk mengikuti pelatihan, sebelumnya calon peserta mengikuti seleksi wawancara untuk mengetahui kemampuan dasar, minat dan komitmennya untuk mengikuti kegiatan pelatihan di BBPLK Kota Probolinggo. BBPLK Kota Probolinggo hanya dapat menampung siswa yang lulus tes wawancara pelatihan kerja sebanyak kuota pelatihan yang sedang dibuka.  </p>
					   </div>
					 </div>
				  </div> 
				  
				  <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingFAQThree">
					   <h4 class="panel-title">
						 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFAQThree" aria-expanded="false" aria-controls="collapseFAQThree">
								Apakah tersedia Tes Wawancara Online ?
						 </a>
					   </h4>
				 </div>
					<div id="collapseFAQThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFAQThree">
					   <div class="panel-body">
						 <p>Tidak. Tes Wawancara dilaksanakan di lokasi secara langsung di BBPLK Kota Probolinggo</p>
					   </div>
					 </div>
				  </div> 
				  
				  <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingFAQFour">
					   <h4 class="panel-title">
						 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFAQFour" aria-expanded="false" aria-controls="collapseFAQFour">
								Bagaimana proses seleksi pelatihan kerja di BBPLK Kota Probolinggo ?
						 </a>
					   </h4>
				 </div>
					<div id="collapseFAQFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFAQFour">
					   <div class="panel-body">
						 <p>
							Melalui 2 tahap yaitu :<br>
							1. Seleksi administratif, dengan mengumpulkan berkas saat pendaftaran<br>
							2. Wawancara, untuk mengetahui minat dan komitmen calon peserta pelatihan
						 </p>
					   </div>
					 </div>
			  </div>

			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingFAQFive">
				   <h4 class="panel-title">
					 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFAQFive" aria-expanded="false" aria-controls="collapseFAQFive">
							Apa saja keuntungan mengikuti pelatihan ini ?
					 </a>
				   </h4>
			 </div>
				<div id="collapseFAQFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFAQFive">
				   <div class="panel-body">
					 <p>
						1. Program pelatihan yang sesuai kebutuhan industri saat ini<br>
						2. Metode pembelajaran yang menekankan pada praktek<br>
						3. Fasilitas peralatan praktek dengan teknologi terbaru sesuai kebutuhan industri<br>
						4. Instruktur pelatihan yang professional di bidangnya<br>
						5. Tidak ada batasan jenjang pendidikan untuk menjadi peserta pelatihan<br>
						6. Alumni pelatihan ditempatkan di industri atau perusahaan<br>
						7. Mendapatkan sertifikat pelatihan
					 </p>
				   </div>
				 </div>
		  </div>

		  <div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingFAQSix">
			   <h4 class="panel-title">
				 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFAQSix" aria-expanded="false" aria-controls="collapseFAQSix">
						Kapan dibuka pelatihan lagi ? Kemudian Program Pelatihan apa saja yang akan dibuka ?
				 </a>
			   </h4>
		 </div>
			<div id="collapseFAQSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFAQSix">
			   <div class="panel-body">
				 <p>Info pembukaan pelatihan periode baru maupun kelas/program yang dibuka pada periode tersebut selalu terupdate di halaman website</p>
			   </div>
			 </div>
		  </div> 
					

		  <div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingFAQSeven">
			   <h4 class="panel-title">
				 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFAQSeven" aria-expanded="false" aria-controls="collapseFAQSeven">
						Apa saja persayaratan untuk mengikuti pelatihan ini ?
				 </a>
			   </h4>
		 </div>
			<div id="collapseFAQSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFAQSeven">
			   <div class="panel-body">
				 <p>
					1. Laki-laki / perempuan<br>
					2. Sehat jasmani rohani<br>
					3. Tidak buta warna (untuk program pelatihan tertentu)<br>
					4. Tidak ada batasan usia maksimal<br>
					5. Disabilitas dipersilahkan mendaftar<br>
					6. Menyerahkan berkas pendaftaran<br>
					7. Lulus tes wawancara
				 </p>
			   </div>
			 </div>
	  </div>

	  <div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingFAQEight">
		   <h4 class="panel-title">
			 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFAQEight" aria-expanded="false" aria-controls="collapseFAQEight">
					Berkas apa saja yang diperlukan untuk pendaftaran ?
			 </a>
		   </h4>
	 </div>
		<div id="collapseFAQEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFAQEight">
		   <div class="panel-body">
			 <p>
				1. Fotocopy Ijazah pendidikan terakhir<br>
				2. Fotocopy KTP<br>
				3. Pas photo 3x4 2 lembar
			 </p>
		   </div>
		 </div>
  </div>

  <div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingFAQNine">
	   <h4 class="panel-title">
		 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFAQNine" aria-expanded="false" aria-controls="collapseFAQNine">
				Siapa saja yang diperbolehkan mendaftar pelatihan ?
		 </a>
	   </h4>
 </div>
	<div id="collapseFAQNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFAQNine">
	   <div class="panel-body">
		 <p>
			Dikhusukan untuk warga Kota dan Kabupaten Probolinggo
		 </p>
	   </div>
	 </div>
</div>


<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingFAQTen">
	   <h4 class="panel-title">
		 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFAQTen" aria-expanded="false" aria-controls="collapseFAQTen">
				Apa yang didapatkan peserta apabila lulus pelatihan ?
		 </a>
	   </h4>
 </div>
	<div id="collapseFAQTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFAQTen">
	   <div class="panel-body">
		 <p>
			Ada 2 sertifikat sebagai berikut :<br>
			1. Sertifikat Pelatihan. Setelah peserta mengikuti pelatihan maka akan mendapatkan sertifikat pelatihan.<br>
			2. Sertifikat Kompetensi dari BNSP. Setelah selesai mengikuti pelatihan, peserta PBK(Pelatihan Berbasis Kompetensi) berhak mengikuti UJK(Uji Kompetensi), jika lulus maka berhak memperoleh sertifikat kompetensi dari BNSP(Badan Nasional Sertifikasi Profesi).
		 </p>
	   </div>
	 </div>
</div>

<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingFAQEleven">
	   <h4 class="panel-title">
		 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFAQEleven" aria-expanded="false" aria-controls="collapseFAQEleven">
				Bagaimana jika peserta dinyatakan tidak lulus ?
		 </a>
	   </h4>
 </div>
	<div id="collapseFAQEleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFAQEleven">
	   <div class="panel-body">
		 <p>
			Apabila dinyatakan tidak lulus maka PBK hanya memperoleh surat pernyataan pernah mengikuti pelatihan.
		 </p>
	   </div>
	 </div>
</div>
		
		
				  
	
	
		</div>		
		</div>
		</div>
	</div>
</section>


<!-- =========================
    VENUE SECTION   
============================== -->
<section id="venue" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInLeft col-md-offset-1 col-md-5 col-sm-8" data-wow-delay="0.9s">
				<h3>Dinas penanaman modal,pelayaanan satu pintu terpadu dan tenaga kerja </h3>
				<p></p>
				<h4>Alamat</h4>
  				<h4>120 Market Street, Suite 110</h4>
  				<h4>Kota Probolinggo</h4>
				<h4>Tel: 010-020-0120</h4>		
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.227870846635!2d113.19312201477796!3d-7.76564279440326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7ad81c9ae1ddb%3A0xa82b9ca472dd6736!2sBlk.%20B%2C%20Curahgrinting%2C%20Kec.%20Kanigaran%2C%20Kota%20Probolinggo%2C%20Jawa%20Timur%2067212!5e0!3m2!1sid!2sid!4v1596859178248!5m2!1sid!2sid" width="340" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</div>
</section>


<!-- =========================
    SPONSORS SECTION   
============================== -->
<section id="sponsors" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow bounceIn col-md-12 col-sm-12">
				<div class="section-title">
					<h2>Sponsors</h2>
					<p>Berikut sponsor yang ikut berkontribusi dalam pelaksanaan pelatihan kali ini</p>
				</div>
			</div>

			<div class="wow fadeInUp col-md-3 col-sm-6 col-xs-6" data-wow-delay="0.3s">
				<img src="assets/images/sponsor-img1.jpg" class="img-responsive" alt="sponsors">	
			</div>

			<div class="wow fadeInUp col-md-3 col-sm-6 col-xs-6" data-wow-delay="0.6s">
				<img src="assets/images/sponsor-img2.jpg" class="img-responsive" alt="sponsors">	
			</div>

			<div class="wow fadeInUp col-md-3 col-sm-6 col-xs-6" data-wow-delay="0.9s">
				<img src="assets/images/sponsor-img3.jpg" class="img-responsive" alt="sponsors">	
			</div>

			<div class="wow fadeInUp col-md-3 col-sm-6 col-xs-6" data-wow-delay="1s">
				<img src="assets/images/sponsor-img4.jpg" class="img-responsive" alt="sponsors">	
			</div>

		</div>
	</div>
</section>


<!-- =========================
    CONTACT SECTION   
============================== -->
<!-- <section id="contact" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-offset-1 col-md-5 col-sm-6" data-wow-delay="0.6s">
				<div class="contact_des">
					<h3>New Event</h3>
					<p>Proin sodales convallis urna eu condimentum. Morbi tincidunt augue eros, vitae pretium mi condimentum eget. Suspendisse eu turpis sed elit pretium congue.</p>
					<p>Mauris at tincidunt felis, vitae aliquam magna. Sed aliquam fringilla vestibulum. Praesent ullamcorper mauris fermentum turpis scelerisque rutrum eget eget turpis.</p>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat. Lorem ipsum dolor.</p>
					<a href="#" class="btn btn-danger">DOWNLOAD NOW</a>
				</div>
			</div>

			<div class="wow fadeInUp col-md-5 col-sm-6" data-wow-delay="0.9s">
				<div class="contact_detail">
					<div class="section-title">
						<h2>Keep in touch</h2>
					</div>
					<form action="#" method="post">
						<input name="name" type="text" class="form-control" id="name" placeholder="Name">
					  	<input name="email" type="email" class="form-control" id="email" placeholder="Email">
					  	<textarea name="message" rows="5" class="form-control" id="message" placeholder="Message"></textarea>
						<div class="col-md-6 col-sm-10">
							<input name="submit" type="submit" class="form-control" id="submit" value="SEND">
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</section> -->


<!-- =========================
    FOOTER SECTION   
============================== -->
<footer>
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<p class="wow fadeInUp" data-wow-delay="0.6s">Copyright &copy; 2020 BLK Probolinggo 
                    
                    | Design: <a rel="nofollow" href="http://www.templatemo.com/page/1" target="_parent">Kelompok 3</a></p>

				<ul class="social-icon">
					<li><a href="#" class="fa fa-facebook wow fadeInUp" data-wow-delay="1s"></a></li>
					<li><a href="#" class="fa fa-twitter wow fadeInUp" data-wow-delay="1.3s"></a></li>
					<li><a href="#" class="fa fa-dribbble wow fadeInUp" data-wow-delay="1.6s"></a></li>
					<li><a href="#" class="fa fa-behance wow fadeInUp" data-wow-delay="1.9s"></a></li>
					<li><a href="#" class="fa fa-google-plus wow fadeInUp" data-wow-delay="2s"></a></li>
				</ul>

			</div>
			
		</div>
	</div>
</footer>


<!-- Back top -->
<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>


<!-- =========================
     SCRIPTS   
============================== -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.parallax.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/smoothscroll.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>