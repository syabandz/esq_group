<!-- Star Breadcrumb -->
<div class="breadcrumbs ace-save-state" >
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">&nbsp;&nbsp;Dashboard</a>
        </li>
        <li class="active">Dependent Dropdown</li>
    </ul>
</div>
<!-- End Breadcrumb -->

<div class="panel panel-primary" id="panel">
    <div class="panel-heading">
        <i class="fa fa-code-fork fa-fw"></i>&nbsp;&nbsp;Dependent Dropdown
        <button type="button" class="close" data-dismiss="alert" data-target="#panel" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="clearfix"></div>    
    <div class="panel-body">

        <div class="form-group form-float"><br>
            <select class="form-control show-tick" data-live-search="true" name="f_jabatan_id" id="f_jabatan_id" onchange="getCategory();">
                <option value=""> -- Pilih Nama Jabatan -- </option>
                    <?php $select2_data = $this->db->get('t_jabatan')->result() ?>
                    <?php foreach($select2_data as $cat) { ?>
                <option value="<?php echo $cat->f_jabatan_id; ?>"><?php echo $cat->f_jabatan_nama; ?></option>
                    <?php } ?>
            </select>
        </div>
        <div class="form-group form-float" id="mytable">
            <select class="form-control show-tick" data-live-search="true" name="f_pegawai_nama">
                <option value="" disabled selected> -- Pilih Nama Pegawai -- </option>
                    <?php foreach ($pegawai_data as $data) { ?>
                <option value="<?php echo $data->f_jabatan_id; ?>"><?php echo $data->f_pegawai_nama; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>


<script type="text/javascript">
// call search category book
function getCategory(){
    var f_jabatan_id = $("#f_jabatan_id").val();
      $.ajax({
        url : "<?php echo base_url().'esq/looping/category';?>",
        type:"POST",
        data: "f_jabatan_id="+f_jabatan_id,
        dataType : "html",
        success:function(msg){
            console.log(msg);
               	$("#mytable").html(msg);
            },
            error:function(){
				alert("Search failed");
			}
  	});
  }
</script>