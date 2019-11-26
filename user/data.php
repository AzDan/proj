<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","complaintmgmt");
$sqlQuery = "SELECT id,Date,Labels FROM LablledComplaints;";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
$r3=$result->num_rows;

echo json_encode($data);

?>
