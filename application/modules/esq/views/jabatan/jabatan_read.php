<!-- Star Breadcrumb -->
<div class="breadcrumbs ace-save-state">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="javascript:void(0);">&nbsp;&nbsp;Dashboard</a>
        </li>
        <li>
            <a href="<?php echo site_url('esq/jabatan') ?>">Jabatan List</a>
        </li>
        <li class="active"><?php echo $f_jabatan_nama; ?></li>
    </ul>
</div>
<!-- End Breadcrumb -->
<div class="panel panel-primary">
    <div class="panel-heading">
        <i class="fa fa-list fa-fw"></i>&nbsp;&nbsp;<?php echo strtoupper('Jabatan Information'); ?>
    </div>
    <div class="panel-body">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php if ($f_jabatan_id != ''){ ?>
                <div class="row">
                    <div class="col-md-12" style="color:grey;"><h1>
                        <?php
                        echo "&nbsp;&nbsp;&nbsp;$f_jabatan_nama";
                        ?></h1>
                    </div>
                </div><br>
                <?php }else{ echo "<br>"; }?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="button-demo">
                    <a href="<?php echo site_url('esq/jabatan') ?>" class="btn btn-warning waves-effect" title="Back to List">BACK TO LIST</a>
                    <a href="<?php echo site_url('esq/jabatan/create') ?>" class="btn btn-primary waves-effect" title="Create">CREATE</a>
                    <a href="<?php echo site_url('esq/jabatan/update/'.$f_jabatan_id) ?>" class="btn btn-success waves-effect" title="Update">UPDATE</a>
                    <a href="javascript:void(0);" onclick="deletedata(<?php echo $f_jabatan_id ?>)" class="btn btn-danger waves-effect" title="Delete">DELETE</a>
                </div>
            </div>
        </div><br>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="panel-body">
                        <table class="table">
                            <tr><td style="width: 20%; text-align: right; ">ID Jabatan</td><td><?php echo $f_jabatan_id; ?></td></tr>
                            <tr><td style="width: 20%; text-align: right; ">Nama Jabatan</td><td><?php echo $f_jabatan_nama; ?></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
function deletedata(f_jabatan_id) {
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
                url : "<?php echo base_url('esq/jabatan/delete/') ?>",
                type : "POST",
                dataType : "JSON",
                data : {f_jabatan_id:f_jabatan_id},
                success: function(data) {
                    window.location.href = "<?php echo site_url('esq/jabatan'); ?>";
                },
                error: function() {
                    swal({
                        type : "error",
                        title: "Failed",
                        text : "Your Data can not deleted !",
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