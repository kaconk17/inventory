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
							<h3 class="panel-title">Vendor</h3>
							<p class="panel-subtitle">Daftar Vendor</p>
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
<?php $this->load->view('global/footer'); ?>
</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
<?php $this->load->view('global/js'); ?>
</body>
</html>