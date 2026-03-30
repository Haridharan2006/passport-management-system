<?php
include 'db.php';
$query = "SELECT * FROM SYS.APPLICANT";
$stid = oci_parse($conn, $query);
oci_execute($stid);
$data = [];
while ($row = oci_fetch_assoc($stid)) {
    $data[] = $row;
}
echo json_encode($data);
?>