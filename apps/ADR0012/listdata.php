<?php 
include_once("config/Config.php");
include_once("libs/database.php");
$Sql = "select * from tusers";
$Qrc=$Conn[0]->Query($Sql) or die ("Terdapat kesalahan perintah!"); 
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3 class="box-title">Daftar Undangan Rapat <?php echo $_GET['id_rapat'];?></h3>
				</div>
				
				<div class="table-responsive">
					
						<label for="undangan">Pilih peserta rapat :</label>
						 <select class="form-control" id="userid" name="userid">
						 <option value="0">--- Pilih ---</option>
						   <?php while ($R1=$Conn[0]->Row($Qrc)){
							   echo "<option value='" . $R1[1] . "'>" . $R1[2] . "</option>";
						   }
						   ?>
						 </select>
						 <?php  
						 $Conn[0]->Close();
						 ?>
					
					<div align="right">
					 <button type="button" name="tambah" id="tambah" class="btn btn-info">Tambah</button>
					</div>
					<br />
					<div id="alert_message"></div>
					<table id="user_data" class="table table-bordered table-striped">
					 <thead>
					  <tr>
					   <th>userid</th>
					   <th>firstname</th>
					   <th></th>
					  </tr>
					 </thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var rapatid = '<?php echo $_GET['id_rapat'];?>';
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"apps/ADR0012/fetch.php",
     type:"POST",
	 data:{rapatid:rapatid}
    }
   });
  }
  
  $(document).on('click', '#tambah', function(){
   var rapatid = '<?php echo $_GET['id_rapat'];?>';
   var cbuserid=document.getElementById("userid")
   var userid=cbuserid.options[cbuserid.selectedIndex].value;
   console.log(userid);
   if(rapatid != '' && userid != '')
   {
    $.ajax({
     url:"apps/ADR0012/insert.php",
     method:"POST",
     data:{rapatid:rapatid, userid:userid},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Both Fields is required");
   }
  });
  
  $(document).on('click', '.delete', function(){
   var rapatid = <?php echo "'".$_GET['id_rapat']."'";?>;
   var userid = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"apps/ADR0012/delete.php",
     method:"POST",
     data:{rapatid:rapatid, userid:userid},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
 });
</script>