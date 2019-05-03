<title>Items</title>

<?php include './application/views/header.php'; ?> 
<body>
   <!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="<? base_url(); ?>">Inventory</a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				
				<div class="navbar-btn navbar-btn-right">
					
					<a class="btn btn-success update-pro" href="<?php echo base_url(); ?>auth/logout" title="Logout"><i class="fa fa-sign-out"></i></i> <span>LOGOUT</span></a>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						
					
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $this->session->userdata('nama'); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
			
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="#"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="<?php echo base_url(); ?>purchasing" class=""><i class="lnr lnr-user"></i> <span>Supplier</span></a></li>
						
						<li><a href="tables.html" class="active"><i class="lnr lnr-dice"></i> <span>Items</span></a></li>
						<li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Request</span></a></li>
						<li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Order</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">User Manager</h3>
							<p class="panel-subtitle">Daftar User</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div >
									<button class="btn btn-success btn-xs edit-modal" data-toggle="modal" data-target="#modal-user" data-id="ISBN564541"><i class="fa fa-plus"></i> Add New User</button>
									
								</div>
								
									<table class="table table-striped table-bordered table-hover" id="table-user">
									<thead>
										<tr>
											<th>No.</th>
											<th>ID</th>
											<th>Nama User</th>
											<th>Password</th>
											<th>Level User</th>
											<th>option</th>
										</tr>
									</thead>
									</table>
								
							</div>
							<div class="row">
								
								<div class="col-md-3">
									
									
									
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-6">
							<!-- RECENT PURCHASES -->
							
							<!-- END RECENT PURCHASES -->
						</div>
						<div class="col-md-6">
							<!-- MULTI CHARTS -->
							
							<!-- END MULTI CHARTS -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-7">
							<!-- TODO LIST -->
							
							<!-- END TODO LIST -->
						</div>
						<div class="col-md-5">
							<!-- TIMELINE -->
							
							<!-- END TIMELINE -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<!-- TASKS -->
							
							<!-- END TASKS -->
						</div>
						<div class="col-md-4">
							
						</div>
						<div class="col-md-4">
							<!-- REALTIME CHART -->
							
							<!-- END REALTIME CHART -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2019 Kelompok 4.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/scripts/klorofil-common.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/DataTables/datatables.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendor/DataTables/js/dataTables.bootstrap.js"></script>
</body>
<!-- Modal -->
<div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  		<p>some content</p>
        <input type="text" name="bookId" id="bookId" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</html>
<script type = "text/javascript">
	$(document).ready( function () {
		 $('#table-user').DataTable({ 
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": '<?php echo base_url('admin/datatable_user'); ?>',
                        "type": "POST"
                    },
					columnDefs : [{
						"orderable" : false,
						"targets" : 5,
						"render" : function (data, type, row) {
							var btn = "<center><button class=\"btn btn-warning btn-xs edit-modal\" data-toggle=\"modal\" data-target=\"#modal-user\" data-id="+data+"\"><i class=\"fa fa-edit\"></i></button><a href=\"#\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash\"></i></a></center>";
							return btn;
						}
					}],
                    //Set column definition initialisation properties.
                    "columns": [
												{"data": "no"},
                        {"data": "ID_USER"},
                        {"data": "NAMA_USER"},
                        {"data": "PASSWORD"},
                        {"data": "LEVEL_USER"},
                    ]
 
                });

	$(document).on("click", ".edit-modal", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
} );
</script>