<?php
error_reporting(0);
include "db.php";
header('Content-Type: application/json');
$id = strtoupper($_GET['id']);
$sql = "
SELECT 
    A.APPLICANT_ID,
    A.NAME,
    PA.APPLICATION_ID,
    PA.TYPE,
    PM.AMOUNT,
    V.STATUS AS VERIFICATION_STATUS,
    P.PASSPORT_ID,
    P.STATUS AS PASSPORT_STATUS

FROM APPLICANT A

LEFT JOIN PASSPORT_APPLICATION PA 
    ON A.APPLICANT_ID = PA.APPLICANT_ID

LEFT JOIN PAYMENT PM 
    ON PA.APPLICATION_ID = PM.APPLICATION_ID

LEFT JOIN VERIFICATION V 
    ON PA.APPLICATION_ID = V.APPLICATION_ID

LEFT JOIN PASSPORT P 
    ON A.APPLICANT_ID = P.APPLICANT_ID

WHERE UPPER(A.APPLICANT_ID) = :id
";

$stid = oci_parse($conn, $sql);
oci_bind_by_name($stid, ":id", $id);
$result = oci_execute($stid);
if (!$result) {
    echo json_encode(["error" => "Query failed"]);
    exit;
}
$data = [];
while ($row = oci_fetch_assoc($stid)) {
    $data[] = $row;
}
echo json_encode($data);
?>