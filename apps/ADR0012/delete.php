<?php
$connect = mysqli_connect("localhost", "root", "", "dbweb");
if(isset($_POST["rapatid"])&&isset($_POST["userid"]))
{
 $query = "DELETE FROM undangan WHERE id_rapat = '".$_POST['rapatid']."' and id_pengguna='".$_POST['userid']."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>