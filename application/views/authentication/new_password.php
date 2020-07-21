<div class="register-box">
    <div class="register-logo">
        <a href="<?php echo base_url(); ?>"><b>Balai Latihan Kerja</b></a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Masukkan Email</p>
        <?php echo form_open('forgot_password/reset_password/token/'.$token); ?>

        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" required placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>'); ?>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="passconf" class="form-control" required placeholder="Confirm Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php echo form_error('Confirmation Password', '<div class="text-danger"><small>', '</small></div>'); ?>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
                <?php echo form_close(); ?>
            </div>
        </div>
        <a href="<?php echo base_url('auth/login'); ?>" class="text-center">I already have a membership</a>
    </div>
</div>


<!-- <div class="form-group has-feedback">
    <input type="password" name="password" class="form-control" required placeholder="Password">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>'); ?>
</div>
<div class="form-group has-feedback">
    <input type="password" name="confirm_password" class="form-control" required placeholder="Confirm Password">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    <?php echo form_error('Confirmation Password', '<div class="text-danger"><small>', '</small></div>'); ?>
</div> -->