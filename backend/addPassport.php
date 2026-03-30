<?php
include 'db.php';
$q = oci_parse($conn, "INSERT INTO PASSPORT VALUES (:p,:a,:s)");
oci_bind_by_name($q, ":p", $_POST['pid']);
oci_bind_by_name($q, ":a", $_POST['aid']);
oci_bind_by_name($q, ":s", $_POST['status']);
echo oci_execute($q) ? "Passport Added" : "Error";
?>