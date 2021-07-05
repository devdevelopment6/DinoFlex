 
 
 <div class="col-md-12 col-sm-12 col-xs-12" style="padding-top: 20px;">
       <!-- <div class="form-group">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="<?php echo base_url();?>cms_products/add_product" class="btn btn-primary col-md-2 col-sm-6 col-xs-12" style="float: left;">Add Product</a>
                </div>
            </div>
        </div>-->
    </div>
        
	  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sample</h3>
            </div>
            <!-- /.box-header -->
			  	
            <div class="box-body">
              <div class="overlay display_loader" style="display:none;">
              		<i class="fa fa-refresh fa-spin fa-2x"></i>
              </div>
              <table id="Sample_product" class="table table-bordered table-hover">
                <thead>
                <tr>
                   <th>Id</th>
					<th>Current Project</th>
					<th>Future Project</th>
					<th>Square Footage</th>
					<th>Interior floor</th>
					<th>Exterior floor</th>
					<th>Other Products</th>
					<th>Additional Notes</th>
					<th>Self</th>
					<th>Created Date</th>
                    <th>Status</th>
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
        table = $('#Sample_product').dataTable({
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
				{ "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": true },
				{ "bSortable": true },
                { "bSortable": true },
				{ "bSortable": true },
                { "bSortable": true },
            ],
            "iDisplayLength": 20,
            "aLengthMenu": [20, 40, 60, 80, 100],
            "fnServerParams":function ( aoData ) {
            },
			"scrollX": true,
            "aaSorting": [[ 0, "desc" ]],
            "sAjaxSource": "<?php echo base_url(); ?>Sample_product/get_products",
            "fnDrawCallback": function () {
                //actDltLink();
            }
        } );
    }
</script>