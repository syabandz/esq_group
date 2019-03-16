<!-- Star Breadcrumb -->
<div class="breadcrumbs ace-save-state">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="javascript:void(0);">&nbsp;&nbsp;Dashboard</a>
        </li>
        <li>
            <a href="<?php echo site_url('esq/pegawai') ?>">Pegawai List</a>
        </li>
        <li class="active"><?php echo $f_pegawai_nama; ?></li>
    </ul>
</div>
<!-- End Breadcrumb -->
<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-list fa-fw"></i>&nbsp;&nbsp;<?php echo strtoupper('Pegawai Information'); ?>
    </div>
    <div class="panel-body">

    <div class="row">
            <br><div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 th">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <img width="240" height="160" style="border: 3px solid #333333;" class="img-rounded"
            <?php if ($f_pegawai_photo == '') {?>
                src="<?php echo base_url(); ?>assets/images/user.png" title="your account have not photo, please update your photo !"
            <?php }else{ ?>
                src="<?php echo base_url(); ?>assets/images/<?php echo $f_pegawai_photo; ?>" 
            <?php } ?>
            />
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><br>
                <div class="button-demo">
                <a href="<?php echo site_url('esq/pegawai') ?>" class="btn btn-warning waves-effect" title="Back to List">BACK TO LIST</a>
                    <a href="<?php echo site_url('esq/pegawai/create') ?>" class="btn btn-primary waves-effect" title="Create">CREATE</a>
                    <a href="<?php echo site_url('esq/pegawai/update/'.$f_pegawai_id) ?>" class="btn btn-success waves-effect" title="Update">UPDATE</a>
                    <a href="javascript:void(0);" onclick="deletedata(<?php echo $f_pegawai_id ?>)" class="btn btn-danger waves-effect" title="Delete">DELETE</a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php if ($f_pegawai_id != ''){ ?>
                <div class="row">
                    <div class="col-md-12" style="color:grey; text-align:center;"><h1>
                        <?php
                        echo $f_pegawai_nama;
                        ?></h1>
                    </div>
                </div><br>
                <?php }else{ echo "<br>"; }?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel-body">
                        <table class="table">
                <tr><td style="width: 40%; text-align: right; ">Kode Pegawai</td><td><?php echo $f_pegawai_kode; ?></td></tr>
                <tr><td style="width: 40%; text-align: right; ">Nama Pegawai</td><td><?php echo $f_pegawai_nama; ?></td></tr>
                <tr><td style="width: 40%; text-align: right; ">Alamat Pegawai</td><td><?php echo $f_pegawai_alamat; ?></td></tr>
                <tr><td style="width: 40%; text-align: right; ">Gaji Pegawai</td><td><?php echo $f_pegawai_gaji; ?></td></tr>
                <tr><td style="width: 40%; text-align: right; ">Jk Pegawai</td><td><?php echo $f_pegawai_jk; ?></td></tr>
                <tr><td style="width: 40%; text-align: right; ">Status Pegawai</td><td><?php echo $f_pegawai_status; ?></td></tr>
                <tr><td style="width: 40%; text-align: right; ">Jabatan Pegawai</td><td><?php echo $f_pegawai_id; ?></td></tr>
                <tr><td style="width: 40%; text-align: right; ">Date Join Pegawai</td><td><?php echo $f_pegawai_date_join; ?></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
function deletedata(f_pegawai_id){
    swal({
        // var typesWithIcons = ['success', 'error', 'warning', 'info'];
        type: "warning",
        title: "Are you sure?",
        text: "You will not be able to recover this Data!",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm){
        if (isConfirm) {
            $.ajax({
                url : "<?php echo base_url('esq/pegawai/delete/') ?>",
                type : "POST",
                dataType : "JSON",
                data : {f_pegawai_id:f_pegawai_id},
                success: function(data){
                        window.location.href = "<?php echo site_url('esq/pegawai'); ?>";
                },
                error: function(){
                    swal({
                        type : "error",
                        title: "Failed",
                        text : "Your imaginary file can not deleted !",
                    });
                },
            });
        } else {
            swal("Cancelled", "Your Data is safe :)", "error");
        }
    });
}
</script>

<?php if ($this->session->userdata('message') <> '') : ?>
<script type="text/javascript">
$(document).ready(function() {
    swal({
            type : "success",
            title: "Success",
            text : "<?php echo $this->session->userdata('message'); ?> !",
        });
});
</script>
<?php endif; ?>