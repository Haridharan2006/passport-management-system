<?php
include 'db.php';
$q = oci_parse($conn, "INSERT INTO VERIFICATION VALUES (:v,:a,:s)");
oci_bind_by_name($q, ":v", $_POST['verId']);
oci_bind_by_name($q, ":a", $_POST['appIdVer']);
oci_bind_by_name($q, ":s", $_POST['verStatus']);
echo oci_execute($q) ? "Verified" : "Error";
?>