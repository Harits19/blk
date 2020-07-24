<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-maroon"><i class="fa fa-legal"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Pelatihan</span>
                    <span class="info-box-number"><?php echo $jumlah_pelatihan; ?></span>
                </div>

                <a  href="<?php echo base_url() ?>admin/pelatihan" class="btn"><i class="fa fa-database" aria-hidden="true"></i> Lihat Detail</a>
            </div>

        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Pelatihan</span>
                    <span class="info-box-number"><?php echo $jumlah_pelatihan; ?></span>
                </div>
            </div>
        </div>

        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah User</span>
                    <span class="info-box-number"><?php echo $jumlah_user; ?></span>
                </div>

                <a  href="<?php echo base_url() ?>admin/user" class="btn"><i class="fa fa-database" aria-hidden="true"></i> Lihat Detail</a>

            </div>
        </div>
        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-shield"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Security groups</span>
                        <span class="info-box-number">12</span>
                    </div>
                </div>
            </div> -->
    </div>
</section>