<!-- Star Breadcrumb -->
<div class="breadcrumbs ace-save-state">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">&nbsp;&nbsp;Dashboard</a>
        </li>
        <li class="active">Jabatan List</li>
    </ul>
</div>
<!-- End Breadcrumb -->

<div class="panel panel-primary" id="panel">
    <div class="panel-heading">
        <i class="fa fa-sitemap fa-fw"></i>&nbsp;&nbsp;Jabatan List
        <button type="button" class="close" data-dismiss="alert" data-target="#panel" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>

    <div class="panel-body">
        <div class="button-demo">
            <?php echo anchor(site_url('esq/jabatan/create'), ' CREATE ', 'class="btn button-demo btn-primary waves-effect" title="create" '); ?>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <?php //echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    </div>

    <div class="clearfix"></div>    
    <div class="panel-body">

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="mytable">
                <thead>
                    <tr class="bg-red">
                        <th>No</th>
                        <th data-sortable="true">ID Jabatan</th>
                        <th data-sortable="true">Nama Jabatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };

    var t = $("#mytable").dataTable({
        initComplete: function() {
            var api = this.api();
            $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function(e) {
                        if (e.keyCode == 13) {
                            api.search(this.value).draw();
                }
            });
        },
        oLanguage: {
            sProcessing: "loading..."
        },
        processing: true,
        serverSide: true,
        ajax: {"url": "jabatan/json", "type": "POST"},
        columns: [
            {
                "data": "f_jabatan_id",
                "orderable": false
            },{"data": "f_jabatan_id"},{"data": "f_jabatan_nama"},
            {
                "data" : "action",
                "orderable": false,
                "className" : "text-center"
            }
        ],
        order: [[0, 'asc']],
        rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
        }
    });
});
</script>

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

<?php if ($this->session->userdata('message') <> '') { ?>
<script type="text/javascript">
$(document).ready(function() {
    swal({
            type : "success",
            title: "Success",
            text : "<?php echo $this->session->userdata('message'); ?> !",
        });
});
</script>
<?php } elseif ($this->session->userdata('message2') <> '') { ?>
<script type="text/javascript">
$(document).ready(function() {
    swal({
            type : "error",
            title: "Error",
            text : "<?php echo $this->session->userdata('message2'); ?> !",
        });
});
</script>
<?php } ?>