<?php
include 'db.php';
$id = $_POST['id'];
$name = $_POST['name'];
$query = "INSERT INTO APPLICANT (APPLICANT_ID, NAME) 
          VALUES (:id, :name)";
$stid = oci_parse($conn, $query);
oci_bind_by_name($stid, ":id", $id);
oci_bind_by_name($stid, ":name", $name);
if(oci_execute($stid)){
    echo "Added";
} else {
    $e = oci_error($stid);
    echo $e['message'];
}
?>