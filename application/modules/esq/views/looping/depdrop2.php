<div class="form-group form-float" id="mytable">
    <select class="form-control show-tick" data-live-search="true" name="f_pegawai_nama">
        <option value="" disabled selected> -- Pilih Nama Pegawai -- </option>
            <?php foreach ($pegawai_data as $data) { ?>
        <option value="<?php echo $data->f_jabatan_id; ?>"><?php echo $data->f_pegawai_nama; ?></option>
        <?php } ?>
    </select>
</div>