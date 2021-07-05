<div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 20px;">
	<?php if($content=="") {?>
		<div class="form-group">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<a href="<?php echo base_url();?>cms_contacts/add_contacts_content" class="btn btn-primary col-md-2 col-sm-6 col-xs-12" style="float: left;">Add Contact Content</a>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Case Study Content Listing</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="content_table" class="table table-bordered table-hover">
						<thead>
						<tr>
							<th>SR No.</th>
							<th>Name</th>
							<th>subject</th>
							<th>Header Content</th>
							<th>Toll Free Contact</th>
							<th>Actions</th>
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
				{ "bSortable": false },
			],

			"iDisplayLength": 20,
			"aLengthMenu": [20, 40, 60, 80, 100],
			"fnServerParams": function ( aoData ) {
				//aoData.push( { "name": "country", "value": $("#country").val() } );
				//	aoData.push( { "name": "city", "value": $("#city").val()} );

			},
			"aaSorting": [],
			"sAjaxSource": base_url+"cms_contacts/get_user_contacts_content",
			"fnDrawCallback": function () {
				$(".delete_contacts").on('click',function(){
					var id=$(this).data('id');
					$.confirm({
						title: 'Confirm!',
						content: 'Are you sure to delete this record??',
						type: 'red',
						buttons: {
							confirm: function () {
								$.ajax({
									"url": base_url+'/cms_contacts/delete_user_contacts/'+id,
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