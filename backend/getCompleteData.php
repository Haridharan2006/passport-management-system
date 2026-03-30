<?php
header('Content-Type: application/json');
include 'db.php';
$query = "SELECT 
    a.APPLICANT_ID,
    a.NAME,
    pa.APPLICATION_ID,
    pa.TYPE,
    p.AMOUNT,
    v.STATUS AS VERIFICATION_STATUS,
    ps.PASSPORT_ID,
    ps.STATUS AS PASSPORT_STATUS

FROM APPLICANT a

LEFT JOIN PASSPORT_APPLICATION pa 
ON a.APPLICANT_ID = pa.APPLICANT_ID

LEFT JOIN PAYMENT p 
ON pa.APPLICATION_ID = p.APPLICATION_ID

LEFT JOIN VERIFICATION v 
ON pa.APPLICATION_ID = v.APPLICATION_ID

LEFT JOIN PASSPORT ps 
ON a.APPLICANT_ID = ps.APPLICANT_ID";

$stid = oci_parse($conn, $query);
oci_execute($stid);
$data = [];
while ($row = oci_fetch_assoc($stid)) {
    $data[] = $row;
}
echo json_encode($data);
?>