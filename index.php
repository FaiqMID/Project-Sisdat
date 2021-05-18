<?php 
session_start(); 
header_remove('x-powered-by');
?>
<?php 
if(!isset($_SESSION['islogin'])){
	require_once('systems\login.php');
} else {
	
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once "includes\header.html";?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php require_once "systems\/navbarmenu.php";?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
	<div class="sidebar">
		<a href="#" class="brand-link">
			<span class="brand-text font-weight-light">Dashboard Rapat</span>
		</a>
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
			  <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
			  <a href="#" class="d-block">
				  <?php if (isset($_SESSION['nama'])){ echo $_SESSION['nama'];} ?>
				  <br>
				  <i class="fa fa-circle text-lime"></i> Online
			  </a>				
			</div>
        </div>
		
		<div class="modal" id="myModal" data-keyboard="false"  data-backdrop="false">

			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
					  <h4 class="modal-title">Logout</h4>
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
					  <h4 class="modal-title">Yakin akan keluar ?</h4>
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-outline-dark" data-dismiss="modal" id='yes' > Yes </button>
					  <button type="button" class="btn btn-outline-dark"  data-dismiss="modal">  No  </button>
					</div>
			    </div>			
			</div>
		</div>	 
        <?php require_once "systems\menus.php";?>  
	</div>
  </aside>
	    <div class="content-wrapper">
        <section class="content-header">
		   <?php //require_once('systems\get_title.php'); ?>
        </section>
		<section class="content">
			<div class="row">
				<section class="col-lg-12">
					<?php require_once('systems\views.php'); ?>
				</section>
			</div>
		</section>
  </div>
  <footer class="main-footer">
    <?php
	  require_once('includes\footer.html');
	?>
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<?php
require_once('includes\js.html');
?>
<script>
	$('#yes').on('click', function(event) {
	  window.location= './?module=SYS0002';//modul logout
	});
</script>	
</body>
</html>
<?php
}
?>
