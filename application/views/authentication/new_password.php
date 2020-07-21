<!-- <head>
    TITTLE ICON BELUM DIGANTI
    <link rel="icon" href="<?=base_url()?>assets/uploads/images/admin.png" type="image/x-icon">
</head> -->

<body>
    <div class="register-box">
        <div class="register-logo">
            <a href="<?php echo base_url(); ?>"><b>Balai Latihan Kerja</b></a>
        </div>

        <script>
            
            document.title = "Forgot Password | Balai Latihan Kerja";
        </script>


        <div class="register-box-body">
            <p class="login-box-msg">Masukkan Password Baru</p>
            <?php echo form_open('auth/reset_password/token/' . $token); ?>

            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" required placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>') ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="passconf" class="form-control" required placeholder="Confirm Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php echo form_error('passconf', '<div class="text-danger"><small>', '</small></div>') ?>
            </div>

            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <a href="<?php echo base_url('auth/login'); ?>" class="text-center">I already have a membership</a>
        </div>

        <div id="myalert">
            <?php echo $this->session->flashdata('alert', true) ?>
        </div>
        <br>
    </div>



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
</body>