<!-- Star Breadcrumb -->
<div class="breadcrumbs ace-save-state">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">&nbsp;&nbsp;Dashboard</a>
        </li>
        <li>
            <a href="<?php echo site_url('esq/pegawai') ?>">Pegawai List</a>
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

            <?php if ($f_pegawai_id != ''){ ?>
            <div class="row">
                <div class="col-md-12" style="color:grey;"><h1>
                    <?php
                    echo "&nbsp;&nbsp;&nbsp;Update Pegawai : $f_pegawai_nama";
                    ?></h1>
                </div>
            </div><br>
            <?php }else{ echo "<br>"; }?>

            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text"  readonly="readonly" class="form-control" name="f_pegawai_kode" id="f_pegawai_kode" value="<?php echo $f_pegawai_kode; ?>" /><?php echo form_error('f_pegawai_kode') ?>
                    <label class="form-label" for="varchar">Kode Pegawai</label>
                </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text"  autofocus class="form-control" name="f_pegawai_nama" id="f_pegawai_nama" value="<?php echo $f_pegawai_nama; ?>" /><?php echo form_error('f_pegawai_nama') ?>
                    <label class="form-label" for="varchar">Nama Pegawai</label>
                </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text"  class="form-control" name="f_pegawai_alamat" id="f_pegawai_alamat" value="<?php echo $f_pegawai_alamat; ?>" /><?php echo form_error('f_pegawai_alamat') ?>
                    <label class="form-label" for="varchar">Alamat Pegawai</label>
                </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text"  class="form-control" name="f_pegawai_gaji" id="f_pegawai_gaji" value="<?php echo $f_pegawai_gaji; ?>" /><?php echo form_error('f_pegawai_gaji') ?>
                    <label class="form-label" for="varchar">Gaji Pegawai</label>
                </div>
            </div>
            <div class="form-group form-float">
                <select class="form-control show-tick" data-live-search="true" name="f_pegawai_jk" id="f_pegawai_jk">
                    <?php if($f_pegawai_jk == ''){ ?>
                        <option value="" disabled selected>-- Pilih JK Pegawai --&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  form_error('f_pegawai_jk') ?></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    <?php } else{ ?>
                        <option value="<?php echo $f_pegawai_jk; ?>"><?php echo $f_pegawai_jk; ?></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group form-float">
                <select class="form-control show-tick" data-live-search="true" name="f_pegawai_status" id="f_pegawai_status">
                    <?php if($f_pegawai_status == ''){ ?>
                        <option value="" disabled selected>-- Pilih Status Pegawai --&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  form_error('f_pegawai_jk') ?></option>
                        <option value="Lajang">Lajang</option>
                        <option value="Menikah">Menikah</option>
                    <?php } else{ ?>
                        <option value="<?php echo $f_pegawai_status; ?>"><?php echo $f_pegawai_status; ?></option>
                        <option value="Lajang">Lajang</option>
                        <option value="Menikah">Menikah</option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group form-float">
                <select class="form-control show-tick" data-live-search="true" name="f_jabatan_id" id="f_jabatan_id">
                    <option value="" selected disabled> -- Pilih Jabatan --&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  form_error('f_jabatan_id') ?></option>
                    <?php
                    $jabatan_data = $this->db->get('t_jabatan')->result();
                    foreach ($jabatan_data as $key)
                    {
                        echo "<option value='$key->f_jabatan_id' ";              // untuk ambil id update
                        echo $key->f_jabatan_id==$f_jabatan_id?'selected':'';   // untuk ambil id create
                        echo ">".  strtoupper($key->f_jabatan_nama)."</option>";      // untuk tampil user
                    }
                    ?>
                </select>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <input type="text"  class="form-control" name="f_pegawai_date_join" id="date2" value="<?php echo $f_pegawai_date_join; ?>" /><?php echo form_error('f_pegawai_date_join') ?>
                    <label class="form-label" for="varchar">Date Join Pegawai</label>
                </div>
            </div>
            <div class="form-group form-float">
                <div class="form-line">
                    <img width="200" height="200" style="border: 3px solid #333333;" class="img-rounded" title="choose your photo profile" 
                    <?php if ($f_pegawai_photo == '') {?>
                        src="<?php echo base_url(); ?>assets/images/user.png" 
                    <?php }else{ ?>
                        src="<?php echo base_url(); ?>assets/images/<?php echo $f_pegawai_photo; ?>" 
                    <?php } ?>
                    />
                    <input type="file" class="uploads form-control" name="f_pegawai_photo" id="f_pegawai_photo" value="<?php echo $f_pegawai_photo; ?>" /><?php echo form_error('f_pegawai_photo') ?>
                </div>
            </div>
            <input type="hidden" name="f_pegawai_id" value="<?php echo $f_pegawai_id; ?>" /> 
            <div class="button-demo">
                <button type="submit" class="btn btn-primary waves-effect" title="Save"><?php echo $button ?></button> 
                <a href="<?php echo site_url('esq/pegawai') ?>" class="btn btn-warning waves-effect" title="Back to List">BACK TO LIST</a>
            </div>
        </form>
    </div>
</div>