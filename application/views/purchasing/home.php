<!DOCTYPE html>
<html lang="en">
<head>
   <?php $this->load->view('global/header'); ?>
   <link rel="STYLESHEET" type="text/css" href="<?php echo base_url(); ?>assets/vendor/dhtmlxCombo/codebase/dhtmlxcombo.css">
        <script src="<?php echo base_url(); ?>assets/vendor/dhtmlxCombo/codebase/dhtmlxcombo.js"></script>  
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
							<h3 class="panel-title">Home</h3>
							<p class="panel-subtitle">Purchasing</p>
						</div>
						<div class="panel-body">
							<div class="row">
<script type="text/javascript">

 /*$( function() {
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
	$( "#autocomplete" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: "purchasing/test_vendor",
          dataType: "jsonp",
          data: {
            term: request.term
          },
          success: function( data ) {
            response( data );
          }
        } );
      },
      minLength: 2,
      select: function( event, ui ) {
        log( "Selected: " + ui.item.value + " aka " + ui.item.id );
      },
	  open: function() {
        $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
      },
      close: function() {
        $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      }
    } );
  
});*/
</script>
							<div class="row">
								
								<div class="col-md-3">
									
								<div class="ui-widget">
									<label for="autocomplete">Vendor: </label>
									<div id="mycombo"></div>
								</div>
								<div class="ui-widget" style="margin-top:2em; font-family:Arial">
								Result:
								<div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
								</div>
									
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
<script type="text/javascript">
$(document).ready(function(){
	myCombo = new dhtmlXCombo("mycombo");
	myCombo.load("purchasing/test_vendor");
});
</script>



