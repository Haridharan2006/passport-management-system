<?php
include 'db.php';
$q = oci_parse($conn, "INSERT INTO PAYMENT VALUES (:p,:a,:amt)");
oci_bind_by_name($q, ":p", $_POST['payId']);
oci_bind_by_name($q, ":a", $_POST['appIdPay']);
oci_bind_by_name($q, ":amt", $_POST['amount']);
echo oci_execute($q) ? "Payment Done" : "Error";
?>