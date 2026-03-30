<?php
include 'db.php';
$q = oci_parse($conn, "DELETE FROM APPLICANT WHERE APPLICANT_ID=:id");
oci_bind_by_name($q, ":id", $_POST['id']);
echo oci_execute($q) ? "Deleted" : "Error";
?>