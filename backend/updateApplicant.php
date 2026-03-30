<?php
include 'db.php';
$q = oci_parse($conn, "UPDATE APPLICANT SET NAME=:n WHERE APPLICANT_ID=:id");
oci_bind_by_name($q, ":n", $_POST['name']);
oci_bind_by_name($q, ":id", $_POST['id']);
echo oci_execute($q) ? "Updated" : "Error";
?>