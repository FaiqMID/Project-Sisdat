<?php
$connect = mysqli_connect("localhost", "root", "", "dbweb");
if(isset($_POST["rapatid"], $_POST["userid"]))
{
 $rapatid = mysqli_real_escape_string($connect, $_POST["rapatid"]);
 $userid = mysqli_real_escape_string($connect, $_POST["userid"]);
 $query = "INSERT INTO undangan(id_rapat, id_pengguna) VALUES('$rapatid', '$userid')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>