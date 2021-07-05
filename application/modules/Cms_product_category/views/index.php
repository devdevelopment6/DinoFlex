 
	  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Content</h3>
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
					<th>Meta Content</th>
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
				{ "bSortable": true },
                { "bSortable": true },
               // { "bSortable": true },
				//{ "bSortable": true },
				//{ "bSortable": true },
				//{ "bSortable": true },
				{ "bSortable": false },
            ],
            "iDisplayLength": 20,
            "aLengthMenu": [20, 40, 60, 80, 100],
            "fnServerParams":function ( aoData ) {
            },
            "aaSorting": [[ 0, "desc" ]],
            "sAjaxSource": "<?php echo base_url(); ?>cms_product_category/get_page_content",
            "fnDrawCallback": function () {

                //actDltLink();
            }
        } );
    }
</script>