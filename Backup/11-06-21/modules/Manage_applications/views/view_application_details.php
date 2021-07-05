<?php// $this->load->view('notification'); ?>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Content List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="app_details" class="table table-bordered table-hover">
						<thead>
						<tr>
							<th>No</th>
							<th>Product Name</th>
							<th>Category Name</th>
							<th>Sub Category Name</th>
							<th>Selected Size</th>
							<th>Status</th>
							<th>action</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->

<script type="text/javascript">
    var table = "";
    $(document).ready(function(){
        getTable();
    });

    function getTable()
    {
        table = $('#app_details').dataTable({
            "bServerSide": true,
            "bProcessing": true,
            "bDeferRender": true,
            "aoColumnDefs": [
                { "className": "textcenter", "targets": [ 0 ] },
                { "sClass": "Editclass", "aTargets": [ 1 ] }
            ],
            "aoColumns": [
                { "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": false },
				{ "bSortable": false },
				{ "bSortable": false },
            ],
            "iDisplayLength": 20,
            "aLengthMenu": [20, 40, 60, 80, 100],
            "fnServerParams":function ( aoData ) {
            },
            "aaSorting": [],
            "sAjaxSource": "<?php echo base_url(); ?>manage_applications/get_application_details",
            "fnDrawCallback": function () {
                //actDltLink();
            }
        } );
    }
</script>
