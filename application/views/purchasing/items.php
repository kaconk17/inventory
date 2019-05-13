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
<?php $this->load->view('purchasing/_partials/sidebar'); ?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Items</h3>
							<p class="panel-subtitle">Daftar Barang</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div >
									<button class="btn btn-success btn-xs edit-modal" data-toggle="modal" data-target="#modal-barang"><i class="fa fa-plus"></i> Add New Item</button>
									<button id="btn-edit" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</button>
									<button id="btn-delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
								</div>
							</div>

							<div class="row">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="table-barang">
									<thead>
										<tr>
											<th>Check</th>
											<th>ID</th>
											<th>Kode Barang</th>
											<th>Nama Barang</th>
											<th>Satuan</th>
											<th>Harga</th>
											<th>Currency</th>
											<th>Nama Vendor</th>
										</tr>
									</thead>
									</table>
								</div>
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
<!-- Modal -->
<div class="modal fade" id="modal-barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalCenterTitle">Add New Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			
			<form>
				<div class="form-group">
					<label for="user-name-txt">Nama Vendor</label>
					<input type="text" class="form-control" id="nama-vendor" placeholder="Enter Vendor Name">
					<div id="suggesstion-box">
						<ul id="vendor-list" class="list-group"></ul>
					</div>
					<script type="text/javascript">
					function selectVendor(val) {
						$("#nama-vendor").val(val);
						$("#suggesstion-box").hide();
						}
					</script>
					
				</div>
				<div class="form-group">
					<label for="user-name-txt">Nama Barang</label>
					<input type="text" class="form-control" id="vendor-name-txt" placeholder="Enter Vendor Name">
					
				</div>
				<div class="form-group">
					<label for="alamat-txt">Alamat</label>
					<textarea name="alamat-vendor" id="alamat-vendor" cols="30" rows="3" class="form-control"></textarea>
				</div>
				<div class="form-group form-check">
					<label for="vendor-name-txt">Telepon</label>
					<input type="text" class="form-control" id="vendor-tlp-txt" placeholder="Enter Phone">
				</div>
				<div class="form-group form-check">
					<label for="vendor-name-txt">Email</label>
					<input type="text" class="form-control" id="vendor-email-txt" placeholder="Enter Email">
				</div>
			
		</form>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-save">Save changes</button>
      </div>
    </div>
  </div>
</div>
</html>
<script type="text/javascript">
$(document).ready(function() {
	var table = $('#table-barang').DataTable({ 
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order" : [], //Initial no order.
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": '<?php echo base_url('purchasing/tampil_barang'); ?>',
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
                        {"data": "ID_BARANG"},
                        {"data": "KODE_BARANG"},
                        {"data": "NAMA_BARANG"},
                        {"data": "SATUAN"},
						{"data": "HARGA_BARANG"},
						{"data": "CURRENCY"},
						{"data": "NAMA_VENDOR"},
                    ]
											
                });

	$("#nama-vendor").keyup(function(){
		$.ajax({
		type: "POST",
		url: "sugest_vendor",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#nama-vendor").css("background","#FFF");
		},
		success: function(data){
			//var b= jQuery.parseJSON(data);
			//var len = b.length;
			//$('#vendor-list').html('');
			$("#suggesstion-box").show();
			//for (var i = 0; i < len; i++) {
				//var li= "<li>"+b[i].NAMA_VENDOR+"</li>";
				//var li = "<li onClick='selectVendor("+b[i].NAMA_VENDOR+");>"+b[i].NAMA_VENDOR+"</li>";
				
			//}
			$("#vendor-list").html(data);
			
			$("#nama-vendor").css("background","#FFF");
			//alert(len);
			//alert(b[0].NAMA_VENDOR);
		}
		});
	});

	
	
	
});

</script>
