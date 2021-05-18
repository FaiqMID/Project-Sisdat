<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "dbweb");
$columns = array('userid', 'firstname');

$query = "SELECT b.userid, b.firstname FROM undangan a, tusers b where a.id_pengguna=b.userid and a.id_rapat='".$_POST['rapatid']."'";
/*
if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE firstname LIKE "%'.$_POST["search"]["value"].'%" 
 OR lastname LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY userid DESC ';
}
*/
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$query1 = '';
$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["userid"].'" data-column="userid">' . $row["userid"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["firstname"].'" data-column="firstname">' . $row["firstname"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["userid"].'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT b.userid, b.firstname FROM undangan a, tusers b where a.id_pengguna=b.userid and a.id_rapat='".$_POST['rapatid']."'";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>