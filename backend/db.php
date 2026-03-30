<?php
$conn = oci_connect("system", "Nivas@2006", "localhost/XEPDB1");
if (!$conn) {
    $e = oci_error();
    echo $e['message'];
}
?>