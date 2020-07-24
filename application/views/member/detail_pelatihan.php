<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<label for="nama" class="font-weight-bold">Nama Pelatihan</label>
<input class="form-control" id="myInput" type="text" disabled value="
<?php echo $detailpelatihan->nama ?>
">
<label for="nama" class="font-weight-bold">Tanggal dibuka</label>
<input class="form-control" id="myInput" type="text" disabled value="
<?php echo $detailpelatihan->tgl_buka ?>
">
<label for="nama" class="font-weight-bold">Tanggal ditutup </label>
<input class="form-control" id="myInput" type="text" disabled value="
<?php echo $detailpelatihan->tgl_tutup ?>
">
<label for="nama" class="font-weight-bold">Detail Pelatihan </label>
<input class="form-control" id="myInput" type="text" disabled value="
<?php echo $detailpelatihan->detail_pelatihan ?>
">
<label for="nama" class="font-weight-bold">Nama Pelatih </label>
<input class="form-control" id="myInput" type="text" disabled value="
<?php echo $detailpelatihan->nama_pelatih ?>
">
<label for="nama" class="font-weight-bold">Kontak Pelatih </label>
<input class="form-control" id="myInput" type="text" disabled value="
<?php echo $detailpelatihan->kontak_pelatih ?>
">

<h4>Daftar Sekarang</h4>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Daftar</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">Masukkan Data diri anda</h4></center>
        </div>
        

   <form action="">
      
      <div class="form-group">
        <label for="exampleInputEmail1">NIK</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIK">
        <small id="emailHelp" class="form-text text-muted">Pastikan NIK anda Benar</small>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Lengkap</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap">
        <small id="emailHelp" class="form-text text-muted">Pastikan nama anda Benar</small>
      </div>
      
      
            <h5>Jenis Kelamin</h5>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
        <label class="form-check-label" for="exampleRadios1">
          Laki Laki
       </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
        <label class="form-check-label" for="exampleRadios2">
          Perempuan
        </label>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Alamat</label>
        <input type="text" class="form-control" id="exampleInputPassword1" >
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input type="text" class="form-control" id="exampleInputPassword1" >
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">No. Hp</label>
        <input type="text" class="form-control" id="exampleInputPassword1" >
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Pendidikan Terakhir</label>
        <input type="text" class="form-control" id="exampleInputPassword1" >
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Alasan Mengikuti Pelatihan</label>
        <input type="text" class="form-control" id="exampleInputPassword1" >
      </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
   </form>
 

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>