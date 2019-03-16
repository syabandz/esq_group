<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="mytable">
        <thead>
            <tr class="bg-red">
                <th>No</th>
                <th>ID Pegawai</th>
                <th>Kode Pegawai</th>
                <th>Nama Pegawai</th>
                <th>Alamat Pegawai</th>
                <th>Gaji Pegawai</th>
                <th>JK Pegawai</th>
                <th>Status Pegawai</th>
                <th>Nama Jabatan</th>
                <th>Photo Pegawai</th>
                <th>Pegawai Date Join</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $jabatan_data = $this->db->get('t_jabatan')->result();
        foreach ($jabatan_data as $data2) {
        foreach ($pegawai_data as $data) {
        if ($data2->f_jabatan_id == $data->f_jabatan_id)
        {
        ?>
            <tr>
                <td class="th"><?php echo ++$start ?></td>
                <td><?php echo $data->f_pegawai_id ?></a></td>
                <td><?php echo $data->f_pegawai_kode ?></td>
                <td><?php echo $data->f_pegawai_nama ?></td>
                <td><?php echo $data->f_pegawai_alamat ?></td>
                <td><?php echo $data->f_pegawai_gaji ?></td>
                <td><?php echo $data->f_pegawai_jk ?></td>
                <td><?php echo $data->f_pegawai_status ?></td>
                <td><?php echo $data2->f_jabatan_nama ?></td>
                <td><?php echo $data->f_pegawai_photo ?></td>
                <td><?php echo $data->f_pegawai_date_join ?></td>
                <td class="th">
                <?php 
                echo anchor(site_url('esq/pegawai/update/'.$data->f_pegawai_id),'<i class="btn-sm fa fa-pencil-square-o" title="update"  aria-hidden="true"></i>'); 
                echo '&nbsp;&nbsp;&nbsp;'; 
                ?>
                <a href="javascript:void(0);" onclick="deletedata(<?php echo $data->f_pegawai_id ?>)" class="btn-sm fa fa-trash-o" title="delete" aria-hidden="true"></a>
                </td>
            </tr>
        <?php
        }}}
        ?>
        </tbody>                        
    </table>
</div>