<?php
include 'db.php';
$appId = $_POST['appId'];
$applicantId = $_POST['applicantId'];
$type = $_POST['type'];
$query = "INSERT INTO PASSPORT_APPLICATION (APPLICATION_ID, APPLICANT_ID, TYPE) 
          VALUES (:appId, :applicantId, :type)";
$stid = oci_parse($conn, $query);
oci_bind_by_name($stid, ":appId", $appId);
oci_bind_by_name($stid, ":applicantId", $applicantId);
oci_bind_by_name($stid, ":type", $type);
echo oci_execute($stid) ? "Application Added" : "Error";
?>