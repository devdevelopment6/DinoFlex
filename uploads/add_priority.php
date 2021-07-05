
<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Priority</h3>
            </div>
		<form role="form" method="post" id="custom-form" action="<?php echo base_url(); ?>task/create_priority" name="add_task" enctype="multipart/form-data">
			<div class="box-body">
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="priority_name"> Priority Name </label>
						<input type="text" id="priority_name" name = "priority_name" value="" placeholder="Priority name" class="form-control" />
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-7">
					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control">
							<option value="" disabled> --- Select Status --- </option>
							<option value="1" >Active</option>
							<option value="0" >Inactive</option>
						</select>
					</div>
				</div>
			</div>
			 <div class="box-footer">
				 <div class="col-md-5 col-sm-5 col-xs-5">
					<input type="submit" class="btn btn-success btn-sm" name="add_priority" id="add_priority" value="Add Priority">
					<input type="reset" class="btn btn-default btn-sm">
				</div>
			</div>
		</form>
		</div>
          <!-- /.box -->

          <!-- Form Element sizes -->
        
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Priority Listing</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="<?php echo base_url()."task/delete_all_priority" ;?>" method = "post">
					<table id="content_table" class="table table-bordered table-hover">
						<thead>
						<tr>
							<th>SR No.</th>
							<th>Name</th>
							<th>Status</th>
							<th>Actions</th>
							<th><input type="checkbox" id="ckbCheckAll" /><input  onclick="return confirm('Are you sure you want to delete selected records?');"  type="submit" id="remove" name="remove" value="Delete all" class="btn-warning"></th>
						</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					</form>
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
	var content_table='';
	$(document).ready(function(){
		getContentTable();
	});
	function getContentTable()
	{

		if(content_table != "")
		{
			content_table.fnDestroy();
			$.fn.DataTable.ext.errMode = 'none';
			content_table.fnDraw();
		}
		content_table = $('#content_table').dataTable({

			"bServerSide": true,
			"bProcessing": true,
			"bDeferRender": true,
			"aoColumnDefs": [
				{ "className": "textcenter", "targets": [ 0 ] },
				{ "sClass": "Editclass", "aTargets": [ 1 ] }
			],
			"aoColumns": [
				{ "bSortable": false },
				{ "bSortable": false },
				{ "bSortable": false },
				{ "bSortable": false },
				{ "bSortable": false },
			],

			"iDisplayLength": 20,
			"aLengthMenu": [20, 40, 60, 80, 100],
			"fnServerParams": function ( aoData ) {
				//aoData.push( { "name": "country", "value": $("#country").val() } );
				//	aoData.push( { "name": "city", "value": $("#city").val()} );

			},
			"aaSorting": [],
			"sAjaxSource": base_url+"task/get_priority",
			"fnDrawCallback": function () {
				$(".delete_priority").on('click',function(){
					var id=$(this).data('id');
					$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this record??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/task/delete_priority/'+id,
									"method": 'POST',
									"data":{},
									success:function(res){
										console.log(res);
										location.reload();
									}
								});
							},
							cancel: function () {
							},
						}
					});
				});
				$("#overlay").hide();
			}
		} );
	}
</script>
<script type="application/javascript">
	/** After windod Load */
	jQuery(function($) {
		window.setTimeout(function() {
			$("#alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();
			});
		}, 4000);
	});
</script>
<script>
	$(document).ready(function () {
		$("#ckbCheckAll").click(function () {
			$(".checkBoxClass").prop('checked', $(this).prop('checked'));
		});

		$(".checkBoxClass").change(function(){
			if (!$(this).prop("checked")){
				$("#ckbCheckAll").prop("checked",false);
			}
		});
	});
</script>