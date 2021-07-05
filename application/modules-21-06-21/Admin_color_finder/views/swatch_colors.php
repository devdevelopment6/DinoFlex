 
 
 <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 20px;">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="<?php echo base_url();?>admin_color_finder/add_swatch" class="btn btn-primary col-md-2 col-sm-6 col-xs-12" style="float: left;">Add Swatch Color</a>
                </div>
            </div>
        </div>
    </div>
        
	  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Swatch Color List</h3>
            </div>
            <!-- /.box-header -->
			  	
            <div class="box-body">
              <div class="overlay display_loader" style="display:none;">
              		<i class="fa fa-refresh fa-spin fa-2x"></i>
              </div>
              <table id="content" class="table table-bordered table-hover">
                <thead>
                <tr>
                   <th>Id</th>
                   
					         <th>Swatch Name</th>
                   <th>Swatch Image</th>
                   <th>Color Category</th>
                   <th>Swatch Code</th>
                   <th>Price Level</th>
					         <th>Created Date</th>
                   <th>Status</th>
                   <th>Action</th>
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
        table = $('#content').dataTable({
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
				        { "bSortable": false },
                { "bSortable": false },
                { "bSortable": true },
      				  { "bSortable": false },
      				  { "bSortable": false },
      				  { "bSortable": false },
      				{ "bSortable": false },
            ],
            "iDisplayLength": 20,
            "aLengthMenu": [20, 40, 60, 80, 100],
            "fnServerParams":function ( aoData ) {
            },
            "aaSorting": [[ 0, "desc" ]],
            "sAjaxSource": "<?php echo base_url(); ?>admin_color_finder/get_swatch_colors",
            "fnDrawCallback": function () {
    				$(".delete_swatch").on('click',function(){
    					var id=$(this).data('id');
    					$.confirm({
    						title: 'Confirm!',
    						content: 'Are you sure to delete this record??',
    						type: 'red',
    						buttons: {
    							confirm: function () {
    								$.ajax({
    									"url": base_url+'/admin_color_finder/delete_swatch',
    									"method": 'POST',
    									"data":{'id':id},
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
                //actDltLink();
            }
        } );
    }
</script>