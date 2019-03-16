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
        <li class="active"><?php echo $title; ?></li>
    </ul>
</div>
<!-- End Breadcrumb -->
<div class="panel panel-primary">
    <div class="panel-heading">
    <i class="fa fa-list fa-fw"></i>&nbsp;&nbsp;<?php echo strtoupper($title); ?>
    </div>
    <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

            <?php if ($f_jabatan_id != ''){ ?>
            <div class="row">
                <div class="col-md-12" style="color:grey;"><h1>
                    <?php
                    echo "&nbsp;&nbsp;&nbsp;Update Jabatan : $f_jabatan_nama";
                    ?></h1>
                </div>
            </div><br>
            <?php }else{ echo "<br>"; }?>

            <div class="form-group form-float">
                <div class="form-line">
                    <label class="form-labels" for="f_jabatan_nama">Nama Jabatan </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo form_error('f_jabatan_nama') ?>
                    <input type="text" autofocus class="form-control" name="f_jabatan_nama" id="f_jabatan_nama" value="<?php echo $f_jabatan_nama; ?>" />
                </div>
            </div>
            <input type="hidden" name="f_jabatan_id" value="<?php echo $f_jabatan_id; ?>" /> 
            <div class="button-demo">
                <button type="submit" class="btn btn-primary waves-effect" title="Save"><?php echo $button ?></button> 
                <a href="<?php echo site_url('esq/jabatan') ?>" class="btn btn-warning waves-effect" title="Back to List">BACK TO LIST</a>
            </div>
        </form>
    </div>
</div>