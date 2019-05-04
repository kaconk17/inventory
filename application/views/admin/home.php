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
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="<?php echo base_url(); ?>" class="active"><i class="lnr lnr-user"></i> <span>Users</span></a></li>
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
									<div class="table-responsive">
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
			
			<form>
				<div class="form-group">
					<label for="user-name-txt">User Name</label>
					<input type="text" class="form-control" id="user-name-txt" placeholder="Enter User Name">
					
				</div>
				<div class="form-group">
					<label for="user-pass-txt">Password</label>
					<input type="password" class="form-control" id="user-pass-txt" placeholder="Password">
				</div>
				<div class="form-group form-check">
				
					<label class="form-check-label" for="level-user-txt">Level User</label>
					<select class="form-control" id="level-user-txt">
						<option>admin</option>
						<option>purchasing</option>
						<option>warehouse</option>
						<option>manager</option>
					
					</select>
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
     $(".modal-body #exampleInputEmail1").val( myBookId );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
	});

		$('#btn-save').click(function(){
			var user = $('#user-name-txt').val();
			var pass = $('#user-pass-txt').val();
			var level = $('#level-user-txt').val();

			$.ajax({
				type: "POST",
				url: "admin/add_user",
				data: 'user_name='+user+'&pass='+pass+'&level='+level,

				success: function (response) {
					if (response == "success") {
						alert('Data berhasil disimpan');
						window.location.replace("<?php echo base_url('admin'); ?>");
					} else{
						alert(response);
					}
					
				}
			});
		});
} );
</script>