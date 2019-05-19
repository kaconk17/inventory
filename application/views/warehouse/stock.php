<!DOCTYPE html>
<html lang="en">
<head>
   <?php $this->load->view('global/header'); ?>
</head>
<body>
     <!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
<?php $this->load->view('global/navbar'); ?>
		<!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
<?php $this->load->view('warehouse/_partials/sidebar'); ?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Stock</h3>
							<p class="panel-subtitle">warehouse Stock</p>
						</div>
						<div class="panel-body">
							<div class="row">
							
							</div>
							<div class="row">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="table-stock">
									<thead>
										<tr>
											<th>Check</th>
											<th>ID</th>
											<th>ID Barang</th>											
											<th>Nama Barang</th>
											<th>Qty Stock</th>
											<th>Satuan</th>
											<th>Min Stock</th>
											<th>Status Stock</th>
											
										</tr>
									</thead>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					
					
					
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
        <!-- END MAIN -->
<?php $this->load->view('global/footer'); ?>
</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
<?php $this->load->view('global/js'); ?>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	//====================tampil order======================
var table_stock = $('#table-stock').DataTable({ 
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order" : [], //Initial no order.
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": '<?php echo base_url('warehouse/tampil_stock'); ?>',
                        "type": "POST"
                    },
					columnDefs : [{
						"orderable" : false,
						"data" : null,
    				"defaultContent" : '',
						"className" : 'select-checkbox',
            "targets" :   0,
					
					}],
					select: {
            "style" :    'os',
            "selector" : 'td:first-child'
        	},
                    //Set column definition initialisation properties.
            "columns": [
											
						{"data": "no"},
						{"data": "ID_STOCK"},
						{"data": "ID_BARANG"},
						{"data": "NAMA_BARANG"},
						{"data": "QTY_STOCK"},
						{"data": "SATUAN"},
						{"data": "MIN_STOCK"},
						{"data": "STATUS_STOCK"},
                    ]
											
});
//====================end tampil order======================
});
</script>



