<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","complaintmgmt");
$v=11;
$sqlQuery = "SELECT id,Date,Labels FROM LablledComplaints where month(date)=$v";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
$r3=$result->num_rows;

echo json_encode($data);

?>
